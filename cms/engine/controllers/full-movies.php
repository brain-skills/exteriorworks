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

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'change_currency' && isset($_POST['currency'])) {
        require_once(ENGINE_DIR . '/modules/currency.php');
    }
    
    function moviesController($movie) {
        global $db_connect, $smarty, $config;
        // Получаем данные из базы данных
        $stmt = $db_connect->prepare('SELECT * FROM movies WHERE alt_name = ?');
        if (!$stmt) {
            die('Ошибка подготовки запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        $stmt->bind_param('s', $movie);
        $stmt->execute();
        if ($stmt->error) {
            die('Ошибка выполнения запроса (' . $stmt->errno . ') ' . $stmt->error);
        }
        $result = $stmt->get_result();
        $movie = $result->fetch_assoc();
        $stmt->close();
        if (!$movie) {
            // Фильм не найден
            $smarty->assign('error_message', 'Фильм не найден');
            $smarty->display(TEMPLATES_DIR . '/' . $config['skin'] . '/error.tpl');
        } else {
            $movie['short_desc'] = html_entity_decode($movie['short_desc'], ENT_QUOTES, 'UTF-8');
            $movie['full_desc'] = html_entity_decode($movie['full_desc'], ENT_QUOTES, 'UTF-8');
            
            // Получаем категории и их alt_name для данного фильма
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
            // Устанавливаем массив переменных в Smarty
            $smarty->assign('title', $movie['title'] . ' - Skills Engine');
            $smarty->assign('page_name', '
                <li class="breadcrumb-item"><a href="/movies">Фильмы</a></li>
                <li class="breadcrumb-item active">' . $movie['title'] . '</li>
            ');
            $smarty->assign('category_alt_names', $movie['category_alt_names']);
            $smarty->assign('categories', $categories);
            // Передаем данные в Smarty
            $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/' . $config['modules']['movies']['movies_full_tpl'], ['movie' => $movie]));
            // Проверяем, выключен ли сайт
            require_once(ENGINE_DIR . '/modules/offline.php');
        }
    }
    $smarty->assign($config);