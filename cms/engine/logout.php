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

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Удаляем все переменные сессии
    $_SESSION = array();
    
    // Уничтожаем сессию
    session_destroy();
    
    // Удаляем cookie
    if (isset($_COOKIE['user_id'])) {
        setcookie('user_id', '', time() - 3600, "/");
    }
    setcookie('PHPSESSID', '', time() - 3600);
    
    // Возвращаем успешный ответ
    http_response_code(200);
    exit();