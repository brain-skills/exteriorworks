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

    // Подключаемся к БД
    require_once(ENGINE_DIR . '/data/dbconfig.php');
    
    $db_connect = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);

    // Проверяем соединение
    if ($db_connect->connect_error) {
        die("Ошибка подключения: " . $db_connect->connect_error);
    }

    // Подключаем определитель локации
    require_once(ENGINE_DIR . '/modules/location.php');

    // Проверьте наличие cookie "cookie_consent"
    $cookieConsent = isset($_COOKIE['cookie_consent']) ? $_COOKIE['cookie_consent'] : null;

    // Функция для получения размера текущей базы данных с единицей измерения
    function getDatabaseSize($mysqli, $dbname) {
        $sql = "SELECT table_schema AS `Database`, 
                    ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS `Size (MB)` 
                FROM information_schema.TABLES 
                WHERE table_schema = '$dbname' 
                GROUP BY table_schema";
        
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        
        $size_in_mb = $row['Size (MB)'];
        $unit = 'MB'; // Default unit
        
        // Convert to KB or GB if size is large enough
        if ($size_in_mb > 1024) {
            $size = $size_in_mb / 1024;
            $unit = 'GB';
        } else {
            $size = $size_in_mb;
        }
        
        return [
            'size' => round($size, 2),
            'unit' => $unit
        ];
    }

    // Проверяем соединение
    if ($db_connect->connect_error) {
        die("Ошибка подключения: " . $db_connect->connect_error);
    }

    // Получение размера базы данных
    $databaseSizeData = getDatabaseSize($db_connect, $dbname);
    $databaseSize = $databaseSizeData['size'];
    $databaseSizeUnit = $databaseSizeData['unit'];

    // Функция для получения размера директории
    function getDirectorySize($dir) {
        $size = 0;
        if (is_dir($dir)) {
            foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)) as $file) {
                $size += $file->getSize();
            }
        } else {
            $size = 0; // Если директория не существует или недоступна, устанавливаем размер в 0
        }
        return $size;
    }

    // Путь к директории кэша Smarty
    $cacheDir = 'templates_c';
    
    try {
        // Получение размера кэша Smarty
        if (is_dir($cacheDir)) {
            $cacheSize = getDirectorySize($cacheDir) / 1024 / 1024; // размер в MB
            $cacheSize = round($cacheSize, 2);
        } else {
            $cacheSize = 0; // Если директория не существует, установим размер кэша в 0
        }
    } catch (Exception $e) {
        // Обработка ошибки получения размера кэша Smarty
        echo "Error: " . $e->getMessage();
        $cacheSize = 0; // или другое значение по умолчанию
    }

    function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }
        return rmdir($dir);
    }
    
    // Путь к директории кэша Smarty
    $cacheDir = 'templates_c'; // Замените на реальный абсолютный путь к директории кэша Smarty

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (deleteDirectory($cacheDir)) {
            // После удаления директории создаем ее заново
            mkdir($cacheDir, 0755, true);
        }
        // Переадресация обратно на страницу, с которой пришел запрос
        $redirect = $_POST['redirect'] ?? 'admin.php'; // Замените на реальный путь к вашей админ панели, если POST-параметр отсутствует
        header('Location: ' . $redirect);
        exit();
    }

    // Устанавливаем массив переменных в Smarty
    $smarty->assign('cookieConsent', $cookieConsent);
    $smarty->assign('databaseSize', $databaseSize);
    $smarty->assign('progressdatabaseSize', 'style="width: calc(' . $databaseSize . '*10%)"');
    $smarty->assign('databaseSizeUnit', $databaseSizeUnit);
    $smarty->assign('cacheSize', $cacheSize);
    $smarty->assign('progresscacheSize', 'style="width: calc(' . $cacheSize . '*10%)"');