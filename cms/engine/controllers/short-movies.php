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

    function allMoviesController() {
        global $db_connect, $smarty, $config;
        // Получаем текущую страницу из URL или устанавливаем ее в 1, если не указана
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        // Рассчитываем начальную точку для запроса на основе пагинации
        $start = ($currentPage - 1) * $config['modules']['movies']['movies_per_page'];
        // Получаем все фильмы из базы данных с учетом лимита и пагинации
        $result = $db_connect->query("SELECT * FROM movies LIMIT $start, {$config['modules']['movies']['movies_per_page']}");
        // Проверяем успешность запроса
        if (!$result) {
            die('Ошибка выполнения запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        // Получаем все фильмы
        $moviesList = $result->fetch_all(MYSQLI_ASSOC);
        // Для каждого фильма получаем категории и их alt_name
        foreach ($moviesList as &$movie) {
            $categories = explode(',', $movie['categories']);
            $altNames = [];
            // Получаем alt_name для каждой категории
            foreach ($categories as $category) {
                $category = trim($category);
                $altNameQuery = $db_connect->prepare('SELECT alt_name FROM movies_categories WHERE name = ?');
                $altNameQuery->bind_param('s', $category);
                $altNameQuery->execute();
                $altNameResult = $altNameQuery->get_result();
                $altName = $altNameResult->fetch_assoc();
                $altNames[] = $altName ? $altName['alt_name'] : '';
            }
            $movie['category_alt_names'] = implode(',', $altNames);
        }
        
        if (!empty($movies['short_desc'])) {
            $movies['short_desc'] = html_entity_decode($movies['short_desc'], ENT_QUOTES, 'UTF-8');
        }
        
        if (!empty($movies['full_desc'])) {
            $movies['full_desc'] = html_entity_decode($movies['full_desc'], ENT_QUOTES, 'UTF-8');
        }
        
        // Рассчитываем количество страниц для пагинации
        $totalPages = ceil(countMovies() / $config['modules']['movies']['movies_per_page']);
        require_once(ENGINE_DIR . '/modules/pagination.php');
        // Передаем данные в Smarty
        $smarty->assign('title', 'Фильмы - Skills Engine');
        $smarty->assign('page_name', '<li class="breadcrumb-item active">Фильмы и сериалы</li>');
        $smarty->assign('currentPage', $currentPage);
        $smarty->assign('totalPages', $totalPages);
        $smarty->assign('pagination', generatePagination($currentPage, $totalPages));
        $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/' . $config['modules']['movies']['movies_short_tpl'], ['moviesList' => $moviesList]));
        // Проверяем, выключен ли сайт
        require_once(ENGINE_DIR . '/modules/offline.php');
    }
    // Функция для подсчета общего количества фильмов
    function countMovies() {
        global $db_connect;
        $result = $db_connect->query('SELECT COUNT(*) as total FROM movies');
        $count = $result->fetch_assoc()['total'];
        return $count;
    }
    $smarty->assign($config);