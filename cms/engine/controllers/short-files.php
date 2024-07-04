<?php
    /*
    =====================================================
    Skills Energy - by MEGA Media Group
    -----------------------------------------------------
    https://skills.energy/license
    -----------------------------------------------------
    Copyright (c) 2023-2024 MEGA Media Group
    =====================================================
    This code is protected by copyright
    =====================================================
    */

    // Подключаем файл с массивом данных для передачи в шаблон
    require_once(ENGINE_DIR . '/data/config.php');
    
    function allFilesController() {
        global $db_connect, $smarty, $config;
        // Получаем текущую страницу из URL или устанавливаем ее в 1, если не указана
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        // Рассчитываем начальную точку для запроса на основе пагинации
        $start = ($currentPage - 1) * $config['modules']['files']['files_per_page'];
        // Получаем все файлы из базы данных с учетом лимита и пагинации
        $result = $db_connect->query("SELECT * FROM files LIMIT $start, {$config['modules']['files']['files_per_page']}");
        // Проверяем успешность запроса
        if (!$result) {
            die('Ошибка выполнения запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        // Получаем все файлы
        $filesList = $result->fetch_all(MYSQLI_ASSOC);
        // Для каждого файла получаем категории и их alt_name
        foreach ($filesList as &$file) {
            $categories = explode(',', $file['categories']);
            $altNames = [];
            // Получаем alt_name для каждой категории
            foreach ($categories as $category) {
                $category = trim($category);
                $altNameQuery = $db_connect->prepare('SELECT alt_name FROM files_categories WHERE name = ?');
                $altNameQuery->bind_param('s', $category);
                $altNameQuery->execute();
                $altNameResult = $altNameQuery->get_result();
                $altName = $altNameResult->fetch_assoc();
                $altNames[] = $altName ? $altName['alt_name'] : '';
            }
            $file['category_alt_names'] = implode(',', $altNames);
        }
        
        if (!empty($files['short_desc'])) {
            $files['short_desc'] = html_entity_decode($files['short_desc'], ENT_QUOTES, 'UTF-8');
        }
        
        if (!empty($files['full_desc'])) {
            $files['full_desc'] = html_entity_decode($files['full_desc'], ENT_QUOTES, 'UTF-8');
        }

        // Рассчитываем количество страниц для пагинации
        $totalPages = ceil(countFiles() / $config['modules']['files']['files_per_page']);
        require_once(ENGINE_DIR . '/modules/pagination.php');
        // Передаем данные в Smarty
        $smarty->assign('title', 'Файлы - Skills Engine');
        $smarty->assign('page_name', '<li class="breadcrumb-item active">Файлы</li>');
        $smarty->assign('currentPage', $currentPage);
        $smarty->assign('totalPages', $totalPages);
        $smarty->assign('pagination', generatePagination($currentPage, $totalPages));
        $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/' . $config['modules']['files']['files_short_tpl'], ['filesList' => $filesList]));
        // Проверяем, выключен ли сайт
        require_once(ENGINE_DIR . '/modules/offline.php');
    }
    // Функция для подсчета общего количества файлов
    function countFiles() {
        global $db_connect;
        $result = $db_connect->query('SELECT COUNT(*) as total FROM files');
        $count = $result->fetch_assoc()['total'];
        return $count;
    }
    $smarty->assign($config);