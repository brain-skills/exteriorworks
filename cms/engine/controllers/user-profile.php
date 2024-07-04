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

    function userProfileController() {
        global $db_connect, $smarty, $config;
        // Получаем данные пользователя по переданному user_id
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
                    // Устанавливаем массив переменных в Smarty
                    $smarty->assign('title', $user['name'] . ' - Профиль пользователя');
                    $smarty->assign('page_name', '<li class="breadcrumb-item active">' . $user['name'] . '</li>');
                    // Передаем данные в Smarty
                    $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/user-profile.tpl', ['user' => $user]));
                    // Проверяем, выключен ли сайт
                    require_once(ENGINE_DIR . '/modules/offline.php');
                }
            }
        }
    }
    $smarty->assign($config);