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

    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;

    if ($user_id !== null) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = mysqli_prepare($db_connect, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                // Добавляем данные пользователя в Smarty
                $smarty->assign('user_email', htmlspecialchars($user['email']));
                foreach ($user as $key => $value) {
                    $smarty->assign($key, $value);
                }
            }
        }
    }

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
    $yourData = array('title' => $lang['sections']['profile']['main']['title'] . ' - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active">' . $lang['sections']['profile']['main']['title'] . '</li>
    ');
    $smarty->assign('theme', SYSTEM_DIR);
    $smarty->assign('config', $config);