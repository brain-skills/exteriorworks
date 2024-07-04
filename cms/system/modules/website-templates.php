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

    // Укажите новый путь к tpl файлам
    $tplDirectory = 'templates/' . $config['skin'] . '/';
    $subAction = isset($_GET['sub_action']) ? $_GET['sub_action'] : '';
    if ($subAction === 'edit') {
        $tplFile = isset($_GET['tpl_file']) ? $_GET['tpl_file'] : '';

        if (!empty($tplFile)) {
            $tplFilePath = $tplDirectory . $tplFile;
            $tplContent = file_get_contents($tplFilePath);
            $tplContentEscaped = htmlspecialchars($tplContent, ENT_QUOTES, 'UTF-8');
            $smarty->assign('tpl_file', $tplFile);
            $smarty->assign('tpl_content', $tplContentEscaped);
        }
    } elseif ($subAction === 'save') {
        $tplFile = isset($_POST['tpl_file']) ? $_POST['tpl_file'] : '';
        $tplContent = isset($_POST['tpl_content']) ? $_POST['tpl_content'] : '';
        if (!empty($tplFile)) {
            $tplFilePath = $tplDirectory . $tplFile;
            // Сохраняем изменения в файл
            file_put_contents($tplFilePath, htmlspecialchars_decode($tplContent, ENT_QUOTES));
            // Отправляем сообщение об успешном сохранении
            echo 'Файл успешно сохранен.';
            exit;
        }
    } elseif ($subAction === 'view') {
        $folder = isset($_GET['folder']) ? $_GET['folder'] : '';
        if (!empty($folder)) {
            $folderPath = $tplDirectory . $folder;
            $folderFiles = scandir($folderPath);
            $folderFiles = array_diff($folderFiles, array('.', '..'));
            // Фильтруем только tpl файлы
            $tplFiles = array_filter($folderFiles, function ($file) {
                return pathinfo($file, PATHINFO_EXTENSION) === 'tpl';
            });
            $smarty->assign('tpl_files', $tplFiles);
            $smarty->assign('folder_name', $folder);
        }
    } else {
        // Получить все файлы и папки в основной директории шаблонов
        $allFiles = scandir($tplDirectory);
        $allFiles = array_diff($allFiles, array('.', '..'));
        // Отфильтровать только tpl файлы
        $tplFiles = array_filter($allFiles, function ($file) {
            return pathinfo($file, PATHINFO_EXTENSION) === 'tpl';
        });
        $smarty->assign('tpl_files', $tplFiles);
    }
    $tplFiles = scandir($tplDirectory);
    $tplFiles = array_diff($tplFiles, array('.', '..'));

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

    $smarty->assign('tpl_files', $tplFiles);
    $yourData = array('title' => $lang['nav']['websitetemplates'] . ' - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active">' . $lang['nav']['websitetemplates'] . '</li>
    ');
    $smarty->assign('tplDirectory', $tplDirectory);