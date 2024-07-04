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

    // Получаем размер файла в байтах
    $fileSizeBytes = filesize($file['file_path']); // Замените 'file_path' на соответствующий ключ в вашем массиве данных

    // Определяем единицы измерения
    if ($fileSizeBytes < 1024) {
        // Если размер файла меньше 1 КБ, оставляем в байтах
        $fileSizeFormatted = $fileSizeBytes . ' Б';
    } elseif ($fileSizeBytes < (1024 * 1024)) {
        // Если размер файла меньше 1 МБ, переводим в килобайты
        $fileSizeFormatted = round($fileSizeBytes / 1024, 2) . ' КБ';
    } elseif ($fileSizeBytes < (1024 * 1024 * 1000)) {
        // Если размер файла меньше 1 ГБ, переводим в мегабайты
        $fileSizeFormatted = round($fileSizeBytes / (1024 * 1024), 2) . ' МБ';
    } else {
        // Если размер файла больше 1 ГБ, переводим в гигабайты
        $fileSizeFormatted = round($fileSizeBytes / (1024 * 1024 * 1024), 2) . ' ГБ';
    }

    // Устанавливаем массив переменных в Smarty
    $smarty->assign('fileSizeFormatted', $fileSizeFormatted);