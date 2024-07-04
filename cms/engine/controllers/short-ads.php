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

    function allAdsController() {
        global $db_connect, $smarty, $config;
        // Получаем текущую страницу из URL или устанавливаем ее в 1, если отсутствует
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        // Рассчитываем начальную точку для запроса на основе пагинации
        $start = ($currentPage - 1) * $config['modules']['ads']['ads_per_page'];
        // Получаем все объявления из базы данных с ограничением и пагинацией
        $result = $db_connect->query("SELECT * FROM ads LIMIT $start, {$config['modules']['ads']['ads_per_page']}");
        // Проверяем успешность запроса
        if (!$result) {
            die('Ошибка выполнения запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        // Получаем все объявления
        $adsList = $result->fetch_all(MYSQLI_ASSOC);
        // Для каждого объявления получаем категории и их alt_name
        foreach ($adsList as &$ad) {
            $categories = explode(',', $ad['categories']);
            $altNames = [];
            // Получаем alt_name для каждой категории
            foreach ($categories as $category) {
                $category = trim($category);
                $altNameQuery = $db_connect->prepare('SELECT alt_name FROM ads_categories WHERE name = ?');
                $altNameQuery->bind_param('s', $category);
                $altNameQuery->execute();
                $altNameResult = $altNameQuery->get_result();
                $altName = $altNameResult->fetch_assoc();
                $altNames[] = $altName ? $altName['alt_name'] : '';
            }
            $ad['category_alt_names'] = implode(',', $altNames);
        }
        
        if (!empty($ads['short_desc'])) {
            $ads['short_desc'] = html_entity_decode($ads['short_desc'], ENT_QUOTES, 'UTF-8');
        }
        
        if (!empty($ads['full_desc'])) {
            $ads['full_desc'] = html_entity_decode($ads['full_desc'], ENT_QUOTES, 'UTF-8');
        }

        // Рассчитываем количество страниц для пагинации
        $totalPages = ceil(countAds() / $config['modules']['ads']['ads_per_page']);
        require_once(ENGINE_DIR . '/modules/pagination.php');
        // Передаем данные в Smarty
        $smarty->assign('title', 'Объявления - Skills Engine');
        $smarty->assign('page_name', '<li class="breadcrumb-item active">Объявления</li>');
        $smarty->assign('currentPage', $currentPage);
        $smarty->assign('totalPages', $totalPages);
        $smarty->assign('pagination', generatePagination($currentPage, $totalPages));
        $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/' . $config['modules']['ads']['ads_short_tpl'], ['adsList' => $adsList]));
        // Проверяем, выключен ли сайт
        require_once(ENGINE_DIR . '/modules/offline.php');
    }
    // Функция для подсчета общего числа объявлений
    function countAds() {
        global $db_connect;
        $result = $db_connect->query('SELECT COUNT(*) as total FROM ads');
        $count = $result->fetch_assoc()['total'];
        return $count;
    }
    $smarty->assign($config);