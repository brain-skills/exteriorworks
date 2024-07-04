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

    function profileController($userId) {
        global $db_connect, $smarty, $config;
        // Получаем данные из базы данных для указанного пользователя
        $stmt = $db_connect->prepare('SELECT * FROM users WHERE id = ?');
        if (!$stmt) {
            die('Ошибка подготовки запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        if ($stmt->error) {
            die('Ошибка выполнения запроса (' . $stmt->errno . ') ' . $stmt->error);
        }
        $result = $stmt->get_result();
        $stmt->close();
        $user = $result->fetch_assoc();
        if (!$user) {
            // Пользователь не найден
            $smarty->assign('error_message', 'Пользователь не найден');
            $smarty->display(TEMPLATES_DIR . '/' . $config['skin'] . '/error.tpl');
        } else {
            // Устанавливаем массив переменных в Smarty
            $smarty->assign('title', $user['name'] . ' - Профиль пользователя');
            $smarty->assign('page_name', '
                <li class="breadcrumb-item active">' . $user['name'] . '</li>
            ');
            // Передаем данные в Smarty
            $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/profile.tpl', ['user' => $user]));
            // Проверяем, выключен ли сайт
            require_once(ENGINE_DIR . '/modules/offline.php');
        }
    }
    $smarty->assign($config);