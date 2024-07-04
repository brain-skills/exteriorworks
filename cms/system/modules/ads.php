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
        $deleteQuery = "DELETE FROM ads WHERE id = ?";
        $stmt = mysqli_prepare($db_connect, $deleteQuery);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $page_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } else {
            die("Ошибка подготовки запроса: " . mysqli_error($db_connect));
        }
        
        header("Location: /admin?action=ads");
        exit();
    }
    
    // Выполняем запрос для получения полного списка фильмов
    $selectQuery = "SELECT * FROM ads";
    $result = $db_connect->query($selectQuery);
    $ads = [];

    while ($ad = $result->fetch_assoc()) {
        $categories = explode(',', $ad['categories']);
        $altNames = [];

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
        $ad['category_links'] = array_map(function ($altName) {
            return "/ac/{$altName}";
        }, $altNames);
        $ad['category_names'] = $categories;
        $ads[] = $ad;
    }

    // Получаем alt_names для каждой категории и формируем ассоциативный массив
    $categoriesAltNames = [];
    $categoryAltNameQuery = $db_connect->query("SELECT name, alt_name FROM ads_categories");
    while ($categoryAltName = $categoryAltNameQuery->fetch_assoc()) {
        $categoriesAltNames[$categoryAltName['name']] = $categoryAltName['alt_name'];
    }
    
    // Закрываем соединение с базой данных
    $db_connect->close();

    $langValue = $config['cms_lang'];

    // Проверка наличия файла языка и подключение
    switch ($langValue) {
        case 'Русский':
            $langad = ENGINE_DIR . '/lang/russian/admin.lng';
            break;
        case 'English':
            $langad = ENGINE_DIR . '/lang/english/admin.lng';
            break;
        case 'ქართული':
            $langad = ENGINE_DIR . '/lang/georgian/admin.lng';
            break;
        default:
            $langad = ENGINE_DIR . '/lang/english/admin.lng';
    }

    $lang = require_once($langad);
    
    // Устанавливаем массив переменных в Smarty
    $smarty->assign('ads', $ads);
    $yourData = array('title' => $lang['nav']['adslist'] . ' - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active">' . $lang['nav']['adslist'] . '</li>
    ');
    $smarty->assign('theme', SYSTEM_DIR);
    $smarty->assign('config', $config);