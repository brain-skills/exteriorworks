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
    
    // Обработка формы добавления пользователя
    if (isset($_POST['adduser'])) {
        // Получаем данные из формы
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $group = $_POST['group'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
    
        $gender = $_POST['gender'];

        // Получаем максимальный id пользователя
        $getUserIdQuery = "SELECT MAX(id) AS max_id FROM users";
        $result = $db_connect->query($getUserIdQuery);

        // Получаем максимальный id пользователя
        $maxIdRow = $result->fetch_assoc();
        $userId = $maxIdRow['max_id'] + 1;
    
        // Обработка загруженного изображения avatar
        $avatarPath = handleUploadedFile('avatar', 'uploads/profiles/' . date('Y/n/') . $userId . '/', 'avatar.jpg', $userId);

        // Обработка загруженного изображения bg_image
        $bgImagePath = handleUploadedFile('bg_image', 'uploads/profiles/' . date('Y/n/') . $userId . '/', 'bg.jpg', $userId);
    
        $bio = $_POST['bio'];

        // Хеширование пароля
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Выполняем запрос на добавление пользователя в базу данных
        $insertQuery = "INSERT INTO users (`email`, `password`, name, `group`, age, phone, city, gender, avatar, bg_image, bio) VALUES ('$email', '$hashedPassword', '$name', '$group', '$age', '$phone', '$city', '$gender', '$avatarPath', '$bgImagePath', '$bio')";
        $result = $db_connect->query($insertQuery);
    
        // Проверяем результат выполнения запроса
        if ($result) {
            echo "Новый пользователь успешно добавлен!";
        } else {
            echo "Ошибка при добавлении пользователя: " . $db_connect->error;
        }
    
        // Перенаправление на ту же страницу после добавления
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit();
    }
    
    // Функция для обработки загруженного файла
    function handleUploadedFile($inputName, $uploadDir, $filename, $userId){
        $filePath = ''; // Переменная для хранения пути к сохраненному файлу
        if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == UPLOAD_ERR_OK) {
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $filePath = $uploadDir . $filename;
            move_uploaded_file($_FILES[$inputName]['tmp_name'], $filePath);
        }
        return $filePath;
    }
    
    // Обработка формы удаления пользователя
    if (isset($_POST['deluser'])) {
        // Получаем данные из формы
        $delUsername = $_POST['delusername'];
    
        // Выполняем запрос на удаление пользователя из базы данных
        $deleteQuery = "DELETE FROM users WHERE name = '$delUsername'";
        $result = $db_connect->query($deleteQuery);
        
        // После удаления строки, обновите AUTO_INCREMENT
        $updateAutoIncrement = "ALTER TABLE users AUTO_INCREMENT = 1";
        mysqli_query($db_connect, $updateAutoIncrement);
    
        // Проверяем результат выполнения запроса
        if ($result) {
            echo "Пользователь успешно удален!";
        } else {
            echo "Ошибка при удалении пользователя: " . $db_connect->error;
        }
    
        // Перенаправление на ту же страницу после добавления
        header("Location: {$_SERVER['REQUEST_URI']}");
        exit();
    }
    
    // Выполняем запрос для получения полного списка пользователей
    $selectQuery = "SELECT * FROM users";
    $result = $db_connect->query($selectQuery);
    $rows = [];
    
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
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
    $smarty->assign('rows', $rows);
    $yourData = array('title' => $lang['nav']['usermanagement'] . ' - Skills Energy');
    $smarty->assign('data', $yourData);
    $smarty->assign('page_name', '
        <li class="breadcrumb-item active">' . $lang['nav']['usermanagement'] . '</li>
    ');
    $smarty->assign('theme', SYSTEM_DIR);
    $smarty->assign('config', $config);