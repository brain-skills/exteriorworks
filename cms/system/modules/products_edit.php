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
    $query_categories = "SELECT * FROM products_categories";
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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $action == 'products_edit') {
        // Обработка POST-запроса для сохранения изменений страницы
        if (isset($_POST['page_id'])) {
            
            $page_id = $_POST['page_id'];
            $folder = $_POST['folder'] ?? '';
            $p_id = $_POST['p_id'] ?? '';
            // Проверка загруженного изображения (не в редакторе)
            require_once(ENGINE_DIR . '/modules/check_upload_image.php');
            
            $autor = isset($_POST['autor']) ? strip_tags(trim($_POST['autor'])) : '';
            $date = strip_tags(trim($_POST['date']));
            $categories = isset($_POST['category']) ? implode(', ', $_POST['category']) : '';
            $title = strip_tags(trim($_POST['title']));
            $alt_name = strip_tags(trim($_POST['alt_name']));
            $short_desc = htmlspecialchars($_POST['short_desc'], ENT_QUOTES);
            $full_desc = htmlspecialchars($_POST['full_desc'], ENT_QUOTES);
            $meta_keys = isset($_POST['meta_keys']) ? strip_tags(trim($_POST['meta_keys'])) : '';
            $meta_desc = isset($_POST['meta_desc']) ? strip_tags(trim($_POST['meta_desc'])) : '';
            $price = isset($_POST['price']) ? (float)strip_tags(trim($_POST['price'])) : 0.0;
            $stock_quantity = isset($_POST['stock_quantity']) ? (int)strip_tags(trim($_POST['stock_quantity'])) : 0;   
            $measure_unit = strip_tags(trim($_POST['measure_unit']));
            $brand = strip_tags(trim($_POST['brand']));
            $model = strip_tags(trim($_POST['model']));
            $sku = strip_tags(trim($_POST['sku']));
            $mass = strip_tags(trim($_POST['mass']));
            $dimensions = strip_tags(trim($_POST['dimensions']));
            $color = strip_tags(trim($_POST['color']));
            $material = strip_tags(trim($_POST['material']));
            $warranty = strip_tags(trim($_POST['warranty']));
            $discount = strip_tags(trim($_POST['discount']));
            $promotion = strip_tags(trim($_POST['promotion']));
            $min_order = strip_tags(trim($_POST['min_order']));
            $views = isset($_POST['views']) ? intval($_POST['views']) : 0;

            $query = "UPDATE products SET date = ?, categories = ?, title = ?, image = ?, alt_name = ?, short_desc = ?, full_desc = ?, meta_keys = ?, meta_desc = ?, price = ?, stock_quantity = ?, measure_unit = ?, brand = ?, model = ?, sku = ?, mass = ?, dimensions = ?, color = ?, material = ?, warranty = ?, discount = ?, promotion = ?, min_order = ? WHERE id = ?";
            $stmt = mysqli_prepare($db_connect, $query);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sssssssssdissssdssssdsii", $date, $categories, $title, $image, $alt_name, $short_desc, $full_desc, $meta_keys, $meta_desc, $price, $stock_quantity, $measure_unit, $brand, $model, $sku, $mass, $dimensions, $color, $material, $warranty, $discount, $promotion, $min_order, $page_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                header("Location: /admin?action=products");
                exit();
            } else {
                echo "Ошибка подготовки запроса: " . mysqli_error($db_connect);
                exit();
            }

        } else {
            echo "Ошибка: ID страницы не указан.";
            exit();
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && $action == 'products_edit') {
        // Обработка GET-запроса для отображения страницы редактирования
        if (isset($_GET['id'])) {
            $page_id = $_GET['id'];

            // Запрос к базе данных для получения данных страницы
            $query = "SELECT * FROM products WHERE id = ?";
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
    $yourData = array('title' => 'Редактирование товара - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active"><a href="/admin?action=products">Товары</a></li>
        <li class="breadcrumb-item active">Редактирование товара</li>
    ');
    $smarty->assign('theme', SYSTEM_DIR);
    $smarty->assign('config', $config);