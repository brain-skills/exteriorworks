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

    // Получаем абсолютный путь к текущему файлу
    $current_file_path = __DIR__;

    if (isset($_SERVER['HTTP_REFERER'])) {
        $referer = $_SERVER['HTTP_REFERER'];

        // Проверяем, содержит ли HTTP_REFERER указанный префикс для административной панели
        if (strpos($referer, '/admin') !== false) {
            // Если да, используем относительный путь от корня сайта для административной панели
            require_once($current_file_path . '/../engine/data/dbconfig.php');
        } else {
            // Иначе, используем абсолютный путь для пользовательской части сайта
            require_once('engine/data/dbconfig.php');
        }
    }

    // Стартуем сессию
    session_start();

    // Получение пути к аватарке
    $avatar = ''; // Изначально устанавливаем пустую строку

    // Определение базового URL
    $base_url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $base_url .= "://" . $_SERVER['HTTP_HOST'];

    // Сохраняем URL, с которого пришел запрос, в сессии
    if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], "admin") !== false) {
        $_SESSION['referer'] = $_SERVER['HTTP_REFERER'];
    }

    // Проверяем, отправлена ли форма для авторизации
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
        // Обработка данных из формы
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Пример условия (замените на свою логику)
        $query = "SELECT id, email, password, `group`, name, avatar FROM users WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($db_connect, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    // Проверка пароля
                    $hashed_password = $user['password'];
                    if (password_verify($password, $hashed_password)) {
                        // Устанавливаем переменные сессии
                        $_SESSION['user_name'] = $user['name'];
                        $_SESSION['user_email'] = $user['email'];
                        $_SESSION['user_authenticated'] = true;
                        $_SESSION['user_group_id'] = $user['group'];
                        // Обновляем путь к аватарке с полным URL
                        $avatar = $user['avatar'];
                        if (!empty($avatar)) {
                            $avatar = "{$base_url}/{$avatar}";
                        } else {
                            // Если путь к аватарке не указан, используем изображение по умолчанию
                            $avatar = "{$base_url}/uploads/profiles/default.svg";
                        }
                        // Устанавливаем cookies
                        setcookie('user_id', $user['id'], time() + (86400 * 30), "/");

                        // Определяем, куда перенаправить пользователя после авторизации
                        if (isset($_SESSION['referer'])) {
                            $redirectUrl = $_SESSION['referer'];
                            unset($_SESSION['referer']); // Удаляем URL из сессии после использования
                        } else {
                            $redirectUrl = '/';
                        }

                        // Перенаправляем пользователя
                        header("Location: $redirectUrl");
                        exit();
                    } else {
                        // Неверный пароль
                        $error_message = "Неверный пароль";
                    }
                } else {
                    // Пользователь с таким email не найден
                    $error_message = "Пользователь с таким email не найден";
                }
            } else {
                // Ошибка запроса
                $error_message = "Ошибка запроса: " . mysqli_error($db_connect);
            }
        } else {
            // Ошибка подготовки запроса
            $error_message = "Ошибка подготовки запроса: " . mysqli_error($db_connect);
        }
    }

    // Если пользователь авторизован, получаем дополнительную информацию о пользователе
    $user = null;  // Устанавливаем $user в значение по умолчанию
    if (isset($_SESSION['user_authenticated']) && $_SESSION['user_authenticated']) {
        $query = "SELECT id, email, `group`, name, avatar FROM users WHERE email = ? LIMIT 1";
        $stmt = mysqli_prepare($db_connect, $query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_email']);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
            }
        }
    }

    // Обновляем путь к аватарке для отображения в шаблоне
    if (isset($user['avatar']) && !empty($user['avatar'])) {
        $avatar = "{$base_url}/{$user['avatar']}";
    } else {
        // Если путь к аватарке не указан, используем изображение по умолчанию
        $avatar = "{$base_url}/uploads/profiles/default.svg";
    }

    // Передаем данные о пользователях в Smarty
    $smarty->assign('user_authenticated', isset($_SESSION['user_authenticated']) && $_SESSION['user_authenticated']);
    $smarty->assign('user_name', $user['name'] ?? null);
    $smarty->assign('user_email', $_SESSION['user_email'] ?? null);
    $smarty->assign('user_group_id', $_SESSION['user_group_id'] ?? null);
    $smarty->assign('avatar', $avatar);
    $smarty->assign('error_message', $error_message ?? null);
    $smarty->assign('base_url', $base_url);
    $smarty->assign('login', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/login.tpl'));