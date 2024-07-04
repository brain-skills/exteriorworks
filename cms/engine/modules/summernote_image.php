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

    // Проверяем, был ли запрос выполнен методом POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['folder']) && $_GET['folder'] && isset($_GET['p_id']) && $_GET['p_id']) {
        // Проверяем, есть ли загруженное изображение и нет ли ошибок при загрузке
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            // Создаем путь для сохранения изображения
            $folder = $_GET['folder'];
            $p_id = $_GET['p_id'];
            $dir = '/uploads/images/' . $folder . '/' . date('Y') . '/' . date('m') . '/';
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . $dir;
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Создаем папку, если ее нет
            }
            // Добавляем индекс к файлу, чтоб небыло совпадения назваиня
            $file_count = count(scandir($uploadDir)) - 1;
            // Получаем имя и путь загруженного изображения
            $imageName = $p_id . '_' . $file_count . '_' . basename($_FILES['image']['name']);
            $imagePath = $uploadDir . $imageName;
            // Перемещаем изображение из временной директории в папку uploads/img
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                // Возвращаем ссылку на загруженное изображение
                echo $dir . $imageName;
            } else {
                echo 'Ошибка при перемещении изображения';
            }
        } else {
            echo 'Ошибка при загрузке изображения';
        }
    } else {
        echo 'Неверный метод запроса';
    }