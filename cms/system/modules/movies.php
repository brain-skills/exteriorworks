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

    // Путь к config.php относительно текущего файла
    require_once(ENGINE_DIR . '/data/config.php');

    // Проверяем соединение
    if ($db_connect->connect_error) {
        die("Ошибка подключения: " . $db_connect->connect_error);
    }

    // Проверка, была ли отправлена форма для удаления страницы
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_page_id'])) {
        $page_id = $_POST['delete_page_id'];
        
        // Выполняем запрос для удаления страницы
        $deleteQuery = "DELETE FROM movies WHERE id = ?";
        $stmt = mysqli_prepare($db_connect, $deleteQuery);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $page_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } else {
            die("Ошибка подготовки запроса: " . mysqli_error($db_connect));
        }
        
        header("Location: /admin?action=movies");
        exit();
    }

    // Выполняем запрос для получения полного списка фильмов
    $selectQuery = "SELECT * FROM movies ORDER BY date DESC";
    $result = $db_connect->query($selectQuery);
    $movies = [];

    while ($movie = $result->fetch_assoc()) {
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
        $movie['category_links'] = array_map(function ($altName) {
            return "/mc/{$altName}";
        }, $altNames);
        $movie['category_names'] = $categories;
        $movies[] = $movie;
    }

    // Получаем alt_names для каждой категории и формируем ассоциативный массив
    $categoriesAltNames = [];
    $categoryAltNameQuery = $db_connect->query("SELECT name, alt_name FROM movies_categories");
    while ($categoryAltName = $categoryAltNameQuery->fetch_assoc()) {
        $categoriesAltNames[$categoryAltName['name']] = $categoryAltName['alt_name'];
    }

    // Закрываем соединение с базой данных
    $db_connect->close();

    $langValue = $config['cms_lang'];

    // Проверка наличия файла языка и подключение
    switch ($langValue) {
        case 'Русский':
            $langFile = ENGINE_DIR . '/lang/russian/admin.lng';
            break;
        case 'English':
            $langFile = ENGINE_DIR . '/lang/english/admin.lng';
            break;
        case 'ქართული':
            $langFile = ENGINE_DIR . '/lang/georgian/admin.lng';
            break;
        default:
            $langFile = ENGINE_DIR . '/lang/english/admin.lng';
    }

    $lang = require_once($langFile);

    // Устанавливаем массив переменных в Smarty
    $smarty->assign('movies', $movies);
    $smarty->assign('categoriesAltNames', $categoriesAltNames);
    $yourData = array('title' => $lang['nav']['movieslist'] . ' - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active">' . $lang['nav']['movieslist'] . '</li>
    ');
    $smarty->assign('theme', SYSTEM_DIR);
    $smarty->assign('config', $config);