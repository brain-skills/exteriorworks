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

    function moviesByCategoryController($category) {
        global $db_connect, $smarty, $config;
        // Проверяем, существует ли категория
        $categoryQuery = $db_connect->prepare('SELECT * FROM movies_categories WHERE alt_name = ?');
        $categoryQuery->bind_param('s', $category);
        $categoryQuery->execute();
        $categoryResult = $categoryQuery->get_result();
        $categoryData = $categoryResult->fetch_assoc();
        $categoryQuery->close();
        if (!$categoryData) {
            // Категория не найдена, отображаем ошибку 404
            header("HTTP/1.0 404 Not Found");
            $smarty->assign('error_message', 'Категория не найдена');
            $smarty->display(TEMPLATES_DIR . '/' . $config['skin'] . '/error.tpl');
            exit;
        }
        // Получаем данные из базы данных
        $stmt = $db_connect->prepare('SELECT * FROM movies WHERE categories LIKE ?');
        if (!$stmt) {
            die('Ошибка подготовки запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        $categorySearch = '%' . $categoryData['name'] . '%';
        $stmt->bind_param('s', $categorySearch);
        $stmt->execute();
        if ($stmt->error) {
            die('Ошибка выполнения запроса (' . $stmt->errno . ') ' . $stmt->error);
        }
        $result = $stmt->get_result();
        $moviesList = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        // Получаем alt_names для каждой категории
        foreach ($moviesList as &$movie) {
            $categories = explode(',', $movie['categories']);
            $altNames = [];
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
        // Рассчитываем количество страниц для пагинации относительно фильмов с данной категорией
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $moviesPerPage = $config['modules']['movies']['movies_fromcats_per_page'];
        $totalPages = ceil(count($moviesList) / $moviesPerPage);
        // Определяем, с какой новости начинать отображение на текущей странице
        $start = ($currentPage - 1) * $moviesPerPage;
        require_once(ENGINE_DIR . '/modules/pagination.php');
        // Передаем данные в Smarty
        $smarty->assign('title', $categoryData['name'] . ' - Skills Engine');
        $smarty->assign('page_name', '
            <li class="breadcrumb-item"><a href="/movies">Фильмы и сериалы</a></li>
            <li class="breadcrumb-item active">' . $categoryData['name'] . '</li>
        ');
        $smarty->assign('currentPage', $currentPage);
        $smarty->assign('totalPages', $totalPages);
        $smarty->assign('pagination', generatePagination($currentPage, $totalPages));
        $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/' . $config['modules']['movies']['movies_short_tpl'], ['moviesList' => array_slice($moviesList, $start, $moviesPerPage), 'category_alt_names' => $categoryData['alt_name']]));
        // Проверяем, выключен ли сайт
        require_once(ENGINE_DIR . '/modules/offline.php');
    }
    $smarty->assign($config);