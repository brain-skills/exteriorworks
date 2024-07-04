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

    // Устанавливаем массив для передачи данных в шаблон
    require_once(ENGINE_DIR . '/data/config.php');

    function allNewsController() {
        global $db_connect, $smarty, $config;
        // Получаем номер текущей страницы
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        // Рассчитываем с какой записи начать выборку
        $start = ($currentPage - 1) * $config['modules']['news']['news_per_page'];
        // Получаем все новости из базы данных с учетом лимита и пагинации
        $result = $db_connect->query("SELECT * FROM news LIMIT $start, {$config['modules']['news']['news_per_page']}");
        // Проверяем успешность выполнения запроса
        if (!$result) {
            die('Ошибка выполнения запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        $newsList = $result->fetch_all(MYSQLI_ASSOC);
        // Для каждой новости получаем категории и их alt_name
        foreach ($newsList as &$news) {
            $categories = explode(',', $news['categories']);
            $altNames = [];
            // Получаем alt_name для каждой категории
            foreach ($categories as $category) {
                $category = trim($category);
                $altNameQuery = $db_connect->prepare('SELECT alt_name FROM news_categories WHERE name = ?');
                $altNameQuery->bind_param('s', $category);
                $altNameQuery->execute();
                $altNameResult = $altNameQuery->get_result();
                $altName = $altNameResult->fetch_assoc();
                $altNames[] = $altName ? $altName['alt_name'] : '';
            }
            $news['category_alt_names'] = implode(',', $altNames);
        }
        
        if (!empty($news['short_desc'])) {
            $news['short_desc'] = html_entity_decode($news['short_desc'], ENT_QUOTES, 'UTF-8');
        }
        
        if (!empty($news['full_desc'])) {
            $news['full_desc'] = html_entity_decode($news['full_desc'], ENT_QUOTES, 'UTF-8');
        }

        // Рассчитываем количество страниц для пагинации
        $totalPages = ceil(countNews() / $config['modules']['news']['news_per_page']);
        require_once(ENGINE_DIR . '/modules/pagination.php');
        // Передаем данные в Smarty
        $smarty->assign('title', 'Новости - Skills Engine');
        $smarty->assign('page_name', '<li class="breadcrumb-item active">Новости</li>');
        $smarty->assign('currentPage', $currentPage);
        $smarty->assign('totalPages', $totalPages);
        $smarty->assign('pagination', generatePagination($currentPage, $totalPages));
        $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/' . $config['modules']['news']['news_short_tpl'], ['newsList' => $newsList]));
        // Проверяем, выключен ли сайт
        require_once(ENGINE_DIR . '/modules/offline.php');
    }
    // Функция для подсчета общего количества новостей
    function countNews() {
        global $db_connect;
        $result = $db_connect->query('SELECT COUNT(*) as total FROM news');
        $count = $result->fetch_assoc()['total'];
        return $count;
    }
    $smarty->assign($config);