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

    $groups_query = "SELECT g.*, COUNT(u.id) AS user_count FROM `groups` g LEFT JOIN users u ON g.id = u.group GROUP BY g.id";
    $result = mysqli_query($db_connect, $groups_query);

    if (!$result) {
        die('Ошибка выполнения запроса: ' . mysqli_error($db_connect));
    }

    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
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
    $smarty->assign('rows', $rows);
    $yourData = array('title' => $lang['nav']['rolesandrights'] . ' - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active">' . $lang['nav']['rolesandrights'] . '</li>
    ');
    $smarty->assign('theme', SYSTEM_DIR);
    $smarty->assign('config', $config);