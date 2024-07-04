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

    header("Content-type: text/html; charset=utf-8");
    define('ENGINE_DIR', 'engine');
    define('SYSTEM_DIR', 'system');
    define('TEMPLATES_DIR', 'templates');
    require_once(ENGINE_DIR . '/data/dbconfig.php');
    require_once(ENGINE_DIR . '/libs/Smarty.class.php');

    // Создаем экземпляр Smarty
    $smarty = new Smarty();
    session_start();
    
    // Запрос к базе данных для получения пользователя по email
    $query = "SELECT users.*, groups.name AS group_name FROM users LEFT JOIN `groups` ON users.group = groups.id WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($db_connect, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_email']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $smarty->assign('user_email', htmlspecialchars($_SESSION['user_email']));
            $smarty->assign('user_group_id', $user['group']);
            foreach ($user as $key => $value) {
                $smarty->assign($key, $value);
            }
        }
    } else {
        // Ошибка подготовки запроса
        $smarty->assign('error_message', "Ошибка подготовки запроса: " . mysqli_error($db_connect));
    }
    
    // Выполняем запрос к базе данных
    $query = "SELECT * FROM users";
    $result = $db_connect->query($query);
    
    // Проверка на успешность выполнения запроса
    if ($result === false) {
        die('Ошибка выполнения запроса: ' . $db_connect->error);
    }
    // Получаем все строки результата в виде ассоциативного массива
    $userDataArray = array();
    while ($row = $result->fetch_assoc()) {
        $userDataArray[] = $row;
    }
    
    // Передаем данные о пользователях в Smarty
    $smarty->assign('users', $userDataArray);
    
    $action = isset($_GET['action']) ? $_GET['action'] : 'main';
    
    // Определяем имя файла для данных
    $dataFile = "system/modules/{$action}.php";
    
    // Проверяем, существует ли файл
    if (file_exists($dataFile)) {
        // Подключаем файл для данных
        include($dataFile);
    }
    
    // Определение корневого адреса сайта
    $root_url = $_SERVER['DOCUMENT_ROOT'];
    // Передача корневого адреса в Smarty
    $smarty->assign('root_url', $root_url);
    
    require_once(ENGINE_DIR . '/data/config.php');
    // Определение языка в зависимости от конфигурации
    $langValue = $config['cms_lang'];
    
    // Проверка наличия файла языка и подключение
    switch ($langValue) {
        case 'Русский':
            $langFile = ENGINE_DIR . '/lang/russian/admin.lng';
            break;
        case 'English':
            $langFile = ENGINE_DIR . '/lang/english/admin.lng';
            break;
        default:
            $langFile = ENGINE_DIR . '/lang/english/admin.lng';
    }
    
    if (file_exists($langFile)) {
        $lang = include($langFile);
    } else {
        $lang = array();
    }

    $content = '';

    // Обработка редактирования и удаления страниц
    switch ($action) {
        case 'page_edit':
            // Обработка редактирования страницы
            include("system/modules/page_edit.php");
            break;
        case 'news_edit':
            // Обработка редактирования страницы
            include("system/modules/news_edit.php");
            break;
        default:
            // Обработка других действий, если необходимо
            break;
    }

    // Импортируем глобальный функционал для всех разделов админ панели
    require_once(SYSTEM_DIR . '/general.php');
    
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    
    // Подключение общего шаблона
    $smarty->assign($config);
    $smarty->assign('lang', $lang);
    $content = $smarty->fetch('file:system/content/' . $action . '.tpl');
    $smarty->assign('content', $content); 
    $smarty->display('system/main.tpl');