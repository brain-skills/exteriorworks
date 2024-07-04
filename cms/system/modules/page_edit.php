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

    $action = isset($_GET['action']) ? $_GET['action'] : 'main';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $action == 'page_edit') {
        // Обработка POST-запроса для сохранения изменений страницы
        if (isset($_POST['page_id'])) {
            $page_id = $_POST['page_id'];
            $title = $_POST['title'];
            $full_desc = $_POST['full_desc'];
            $alt_name = $_POST['alt_name'];
            $meta_keys = $_POST['meta_keys'];
            $meta_desc = $_POST['meta_desc'];
            $date = $_POST['date'];
            $views = isset($_POST['views']) ? intval($_POST['views']) : 0;

            $query = "UPDATE static_pages SET title = ?, full_desc = ?, alt_name = ?, meta_keys = ?, meta_desc = ?, date = ? WHERE id = ?";
            $stmt = mysqli_prepare($db_connect, $query);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssssssi", $title, $full_desc, $alt_name, $meta_keys, $meta_desc, $date, $page_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                header("Location: /admin?action=pages");
                exit();
            } else {
                echo "Ошибка подготовки запроса: " . mysqli_error($db_connect);
                exit();
            }
        } else {
            echo "Ошибка: ID страницы не указан.";
            exit();
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && $action == 'page_edit') {
        // Обработка GET-запроса для отображения страницы редактирования
        if (isset($_GET['id'])) {
            $page_id = $_GET['id'];

            // Запрос к базе данных для получения данных страницы
            $query = "SELECT * FROM static_pages WHERE id = ?";
            $stmt = mysqli_prepare($db_connect, $query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $page_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($result && mysqli_num_rows($result) > 0) {
                    // Если страница найдена, передаем данные в шаблон для редактирования
                    $page = mysqli_fetch_assoc($result);
                    $smarty->assign('page', $page);
                } else {
                    // Если страница не найдена, выдаем ошибку
                    echo "Ошибка: Страница не найдена.";
                    exit();
                }

                // Закрываем запрос
                mysqli_stmt_close($stmt);
            } else {
                // В случае ошибки выводим сообщение
                echo "Ошибка подготовки запроса: " . mysqli_error($db_connect);
                exit();
            }
        } else {
            // Если запрос не был отправлен методом GET или отсутствует параметр id, выводим сообщение об ошибке
            echo "Ошибка: Доступ запрещен.";
            exit();
        }
    }

    // Устанавливаем массив переменных в Smarty
    $smarty->assign('add_page', 'add_page');
    $smarty->assign('page_id', $page_id);
    $smarty->assign('stmt', $stmt);
    $yourData = array('title' => 'Редактирование страницы - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active"><a href="/admin?action=pages">Страницы</a></li>
        <li class="breadcrumb-item active">Редактирование страницы</li>
    ');
    $smarty->assign('theme', SYSTEM_DIR);
    $smarty->assign('config', $config);