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

    // Запрос к базе данных для получения данных категорий
    $query_categories = "SELECT * FROM movies_categories";
    $result_categories = mysqli_query($db_connect, $query_categories);

    // Проверка успешности выполнения запроса
    if ($result_categories) {
        // Преобразование результата запроса в ассоциативный массив
        $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
        
        // Передача массива категорий в шаблон
        $smarty->assign('categories', $categories);
    } else {
        // Если произошла ошибка при выполнении запроса
        echo "Ошибка выполнения запроса категорий: " . mysqli_error($db_connect);
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $action == 'movies_edit') {
        // Обработка POST-запроса для сохранения изменений страницы
        if (isset($_POST['page_id'])) {
            
            $page_id = $_POST['page_id'];
            $folder = $_POST['folder'] ?? '';
            $p_id = $_POST['p_id'] ?? '';
            // Проверка загруженного изображения (не в редакторе)
            require_once(ENGINE_DIR . '/modules/check_upload_image.php');
            
            $page_id = $_POST['page_id'];
            $autor = strip_tags(trim($_POST['autor']));
            $date = strip_tags(trim($_POST['date']));
            $categories = isset($_POST['category']) ? implode(', ', $_POST['category']) : '';
            $title = strip_tags(trim($_POST['title']));
            $alt_name = strip_tags(trim($_POST['alt_name']));
            $search_id = strip_tags(trim($_POST['search_id']));
            $year = strip_tags(trim($_POST['year']));
            $quality = strip_tags(trim($_POST['quality']));
            $director = strip_tags(trim($_POST['director']));
            $actors = strip_tags(trim($_POST['actors']));
            $short_desc = htmlspecialchars($_POST['short_desc'], ENT_QUOTES);
            $full_desc = htmlspecialchars($_POST['full_desc'], ENT_QUOTES);
            $meta_desc = strip_tags(trim($_POST['meta_desc']));
            $meta_keys = strip_tags(trim($_POST['meta_keys']));
            $views = isset($_POST['views']) ? intval($_POST['views']) : 0;

            $query = "UPDATE movies SET title = ?, full_desc = ?, alt_name = ?, meta_keys = ?, meta_desc = ?, date = ?, categories = ? WHERE id = ?";
            $stmt = mysqli_prepare($db_connect, $query);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sssssssi", $title, $full_desc, $alt_name, $meta_keys, $meta_desc, $date, $categoriesString, $page_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                header("Location: /admin?action=movies");
                exit();
            } else {
                echo "Ошибка подготовки запроса: " . mysqli_error($db_connect);
                exit();
            }
        } else {
            echo "Ошибка: ID страницы не указан.";
            exit();
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && $action == 'movies_edit') {
        // Обработка GET-запроса для отображения страницы редактирования
        if (isset($_GET['id'])) {
            $page_id = $_GET['id'];

            // Запрос к базе данных для получения данных страницы
            $query = "SELECT * FROM movies WHERE id = ?";
            $stmt = mysqli_prepare($db_connect, $query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $page_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($result && mysqli_num_rows($result) > 0) {
                    // Если страница найдена, передаем данные в шаблон для редактирования
                    $page = mysqli_fetch_assoc($result);
                    $smarty->assign('page', $page);

                    // Разбиваем строку с категориями в массив
                    $selectedCategories = explode(", ", $page['categories']);
                    $smarty->assign('selectedCategories', $selectedCategories);
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
    $yourData = array('title' => 'Редактирование фильма - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active"><a href="/admin?action=movies">Фильмы</a></li>
        <li class="breadcrumb-item active">Редактирование фильма</li>
    ');
    $smarty->assign('theme', SYSTEM_DIR);
    $smarty->assign('config', $config);