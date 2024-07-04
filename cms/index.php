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

    define('SKILLSENERGY', true);
    define('SYSTEM_DIR', 'system');
    define('ENGINE_DIR', 'engine');
    define('TEMPLATES_DIR', 'templates');
    require_once(ENGINE_DIR . '/data/dbconfig.php');

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once(ENGINE_DIR . '/libs/Smarty.class.php');
    $smarty = new Smarty();

    // Загрузка конфигурации
    require_once(ENGINE_DIR . '/data/config.php');

    if (!$config['cms_installed']) {
        // Если установка не была выполнена, выполняем установку
        require_once('install.php');
        // После установки обновляем значение в конфиге
        $config['cms_installed'] = true;
        // Сохранение данных в $config
        $configContent = '<?php $config = ' . var_export($config, true) . ';';
        // Добавление пробела между => и array
        $configContent = preg_replace("/=>\s*array/", "=> array", $configContent);
        // Запись в файл $config
        file_put_contents(ENGINE_DIR . '/data/config.php', $configContent);    
    }

    $user_authenticated = isset($_SESSION['user_id']) || isset($_COOKIE['user_id']) || (isset($_SESSION['user_authenticated']) && $_SESSION['user_authenticated']);
    $smarty->assign('user_authenticated', $user_authenticated ?? false);

    if (isset($_SESSION['user_email'])) {
        $query = "SELECT users.*, groups.name AS group_name FROM users LEFT JOIN `groups` ON users.group = groups.id WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($db_connect, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_email']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                $smarty->assign('user_email', htmlspecialchars($user['email']));
                $smarty->assign('user_group_id', $user['group']);
                $smarty->assign('user_balance', $user['balance']);
                $smarty->assign('group_name', $user['group_name']);
            }
        } else {
            $smarty->assign('error_message', "Ошибка подготовки запроса: " . mysqli_error($db_connect));
        }
    }

    $smarty->assign('login', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/login.tpl'));
    $smarty->assign('user_email', $user['email'] ?? null);
    $smarty->assign('group_name', $user['group_name'] ?? null);

    // Включаем авторизацию
    require_once(ENGINE_DIR . '/login.php');

    // Включаем маршрутизатор
    require_once(ENGINE_DIR . '/router.php');