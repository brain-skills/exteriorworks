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

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_feedback_id'])) {
        $feedback_id = intval($_POST['delete_feedback_id']);
        $stmt = $db_connect->prepare("DELETE FROM feedback_orders WHERE id = ?");
        $stmt->bind_param('i', $feedback_id);
        $stmt->execute();
        $stmt->close();
    
        // Перенаправление на текущую страницу для обновления списка заявок
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }

    // SQL запрос для извлечения заявок, отсортированных по дате создания (новые вверху)
    $sql = "SELECT id, name, email, phone, subject, message, ip, city, created_at FROM feedback_orders ORDER BY created_at DESC";

    $result = $db_connect->query($sql);

    // Проверка наличия данных
    if ($result->num_rows > 0) {
        // Создание массива для хранения заявок
        $feedback_orders = array();
        // Чтение результатов выборки
        while ($row = $result->fetch_assoc()) {
            // Добавление каждой заявки в массив
            $feedback_orders[] = $row;
        }
    } else {
        // Если заявок нет, можно установить сообщение об отсутствии данных
        $feedback_orders = array(); // Пустой массив, если нет заявок
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

    $yourData = array('title' => $lang['nav']['feedbackrequests'] . ' - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active">' . $lang['nav']['feedbackrequests'] . '</li>
    ');
    $smarty->assign('theme', SYSTEM_DIR);
    $smarty->assign('feedback_orders', $feedback_orders);
    $smarty->assign('config', $config);