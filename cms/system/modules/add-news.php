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

    // Проверяем соединение
    if ($db_connect->connect_error) {
        die("Ошибка подключения: " . $db_connect->connect_error);
    }
	
    // Получаем максимальное значение id из таблицы товаров
    $sql = "SELECT MAX(id) AS max_id FROM news";
    $result = $db_connect->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
			$page_id = $row["max_id"] + 1;
            $max_id = $row["max_id"];
        }
    } else {
		$page_id = 1;
        $max_id = 0;
    }

    // Сбрасываем счетчик автоинкремента к максимальному значению id товаров
    $sql_reset_auto_increment = "ALTER TABLE news AUTO_INCREMENT = " . ($max_id + 1);
    $db_connect->query($sql_reset_auto_increment);

    // Получаем категории
    $categories = [];
    $sql = "SELECT id, parentid, name FROM news_categories ORDER BY name ASC";
    $result = $db_connect->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    }
    
    // Обработка формы добавления пользователя
    if (isset($_POST['addnew'])) {
        
        $folder = $_POST['folder'] ?? '';
        $p_id = $_POST['p_id'] ?? '';
        // Проверка загруженного изображения (не в редакторе)
        require_once(ENGINE_DIR . '/modules/check_upload_image.php');
		
		// Получаем данные из формы
        $autor = isset($_POST['autor']) ? strip_tags(trim($_POST['autor'])) : '';
        $date = isset($_POST['date']) && !empty($_POST['date']) ? strip_tags(trim($_POST['date'])) : date('Y-m-d H:i:s');
        $categories = isset($_POST['category']) ? implode(', ', $_POST['category']) : '';
        $title = strip_tags(trim($_POST['title']));
        $alt_name = strip_tags(trim($_POST['alt_name']));
        $short_desc = htmlspecialchars($_POST['short_desc'], ENT_QUOTES);
		$full_desc = htmlspecialchars($_POST['full_desc'], ENT_QUOTES);
		$meta_desc = strip_tags(trim($_POST['meta_desc']));
		$meta_keys = strip_tags(trim($_POST['meta_keys']));
        $views = isset($_POST['views']) ? intval($_POST['views']) : 0;
    
        // Выполняем запрос на добавление пользователя в базу данных
        $insertQuery = "INSERT INTO news"; 
		$insertQuery .= "(autor, date, categories, title, image, alt_name, short_desc, full_desc, meta_desc, meta_keys, views) VALUES ('$autor', '$date', '$categories', '$title', '$image', '$alt_name', '$short_desc', '$full_desc', '$meta_desc', '$meta_keys', '$views')";
		
        $result = $db_connect->query($insertQuery);
    
        // Проверяем результат выполнения запроса
        if ($result) {
            echo "Новый пользователь успешно добавлен!";
        } else {
            echo "Ошибка при добавлении пользователя: " . $db_connect->error;
        }
    
        // Перенаправление на ту же страницу после добавления
        header("Location: /admin?action=news");
        exit();
    }
    
    // Закрываем соединение с базой данных
    $db_connect->close();

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
    $yourData = array('title' => $lang['nav']['addnews'] . ' - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active"><a href="/admin?action=news">Новости</a></li>
        <li class="breadcrumb-item active">' . $lang['nav']['addnews'] . '</li>
    ');
    $smarty->assign('add_page', 'add_page');
	$smarty->assign('page_id', $page_id);
    $smarty->assign('max_id', $max_id + 1);
    $smarty->assign('theme', SYSTEM_DIR);
    $smarty->assign('config', $config);
    $smarty->assign('categories', $categories);