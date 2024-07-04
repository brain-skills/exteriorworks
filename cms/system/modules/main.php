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

    // Запрос для получения групп и количества пользователей в каждой группе
    $groups_query = "SELECT g.id, g.name, COUNT(u.id) AS user_count FROM `groups` g LEFT JOIN users u ON g.id = u.group GROUP BY g.id";
    $result = mysqli_query($db_connect, $groups_query);

    // Проверяем соединение
    if ($db_connect->connect_error) {
        die("Connection failed: " . $db_connect->connect_error);
    }

    // Получаем количество пользователей
    $result = $db_connect->query("SELECT COUNT(*) AS ads_count FROM ads");
    $adsCount = $result->fetch_assoc()['ads_count'];

    // Получаем количество файлов
    $result = $db_connect->query("SELECT COUNT(*) AS files_count FROM files");
    $filesCount = $result->fetch_assoc()['files_count'];

    // Получаем количество фильмов
    $result = $db_connect->query("SELECT COUNT(*) AS movies_count FROM movies");
    $moviesCount = $result->fetch_assoc()['movies_count'];

    // Получаем количество новостей
    $result = $db_connect->query("SELECT COUNT(*) AS news_count FROM news");
    $newsCount = $result->fetch_assoc()['news_count'];

    // Получаем количество продуктов
    $result = $db_connect->query("SELECT COUNT(*) AS products_count FROM products");
    $productsCount = $result->fetch_assoc()['products_count'];

    // Получаем количество продаж (замените sales на вашу таблицу продаж)
    $result = $db_connect->query("SELECT COUNT(*) AS sales_count FROM sales");
    $salesCount = $result->fetch_assoc()['sales_count'];

    // Получаем количество страниц
    $result = $db_connect->query("SELECT COUNT(*) AS pages_count FROM static_pages");
    $pagesCount = $result->fetch_assoc()['pages_count'];

    // Получаем количество пользователей
    $result = $db_connect->query("SELECT COUNT(*) AS users_count FROM users");
    $usersCount = $result->fetch_assoc()['users_count'];

    // Получаем статистику по полу
    $gender_query = "SELECT gender, COUNT(*) AS gender_count FROM users GROUP BY gender";
    $gender_result = mysqli_query($db_connect, $gender_query);

    // Инициализация переменных для каждого пола
    $maleCount = 0;
    $femaleCount = 0;
    $unknownCount = 0;

    // Обработка результата запроса
    while ($row = mysqli_fetch_assoc($gender_result)) {
        switch ($row['gender']) {
            case 'Мужчина':
                $maleCount = $row['gender_count'];
                break;
            case 'Женщина':
                $femaleCount = $row['gender_count'];
                break;
            case '':
                $unknownCount = $row['gender_count'];
                break;
        }
    }

    // Запрос для получения данных о пользователях по возрасту
    $age_query = "SELECT age, COUNT(*) AS age_count FROM users WHERE age IS NOT NULL GROUP BY age";
    $age_result = mysqli_query($db_connect, $age_query);

    // Инициализация массива для хранения данных по возрасту
    $ageData = array();

    // Обработка результата и сохранение данных в массив
    while ($row = mysqli_fetch_assoc($age_result)) {
        $ageData[] = array(
            'age' => $row['age'],
            'count' => $row['age_count'],
        );
    }

    // Запрос для получения данных о пользователях по городам
    $city_query = "SELECT city, COUNT(*) AS city_count FROM users WHERE city IS NOT NULL GROUP BY city";
    $city_result = mysqli_query($db_connect, $city_query);

    // Инициализация массива для хранения данных по городам
    $cityData = array();

    // Обработка результата и сохранение данных в массив
    while ($row = mysqli_fetch_assoc($city_result)) {
        $cityData[] = array(
            'city' => ($row['city'] != '') ? $row['city'] : 'не указавшие город',
            'count' => $row['city_count'],
        );
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
    $yourData = array(
        'title' => $lang['nav']['commoncharts'] . ' - Skills Energy',
        'maleCount' => $maleCount,
        'femaleCount' => $femaleCount,
        'unknownCount' => $unknownCount,
        'ageData' => $ageData,
        'cityData' => $cityData,
    );
    
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active">' . $lang['nav']['commoncharts'] . '</li>
    ');
    $smarty->assign('adsCount', $adsCount);
    $smarty->assign('filesCount', $filesCount);
    $smarty->assign('moviesCount', $moviesCount);
    $smarty->assign('newsCount', $newsCount);
    $smarty->assign('productsCount', $productsCount);
    $smarty->assign('salesCount', $salesCount);
    $smarty->assign('pagesCount', $pagesCount);
    $smarty->assign('usersCount', $usersCount);