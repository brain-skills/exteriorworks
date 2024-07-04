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

    // Контроллеры
    require_once(ENGINE_DIR . '/controllers/home.php');
    require_once(ENGINE_DIR . '/controllers/profile.php');
    require_once(ENGINE_DIR . '/controllers/universal.php');

    // Добавляем вызов universalController в самом начале файла
    universalController();

    // Дополнительные переменные из URL
    $pages = $_GET['pages'] ?? null;
    $news = $_GET['news'] ?? null;
    $newsCategory = $_GET['news-category'] ?? null;
    $profileId = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Обработка запросов
    if (isset($newsCategory)) {
        require_once(ENGINE_DIR . '/controllers/newsByCategory.php');
        newsByCategoryController($newsCategory);
    } elseif (empty($pages) && empty($news) && !isset($_GET['news'])) {
        homeController();
    } else {
        switch (true) {
            case !empty($pages):
                require_once(ENGINE_DIR . '/controllers/pages.php');
                pagesController($pages);
                break;
            case !empty($news):
                require_once(ENGINE_DIR . '/controllers/full-news.php');
                newsController($news);
                break;
            case isset($_GET['news']):
                require_once(ENGINE_DIR . '/controllers/short-news.php');
                allNewsController();
                break;
            case isset($_GET['profile']):
                // Добавлено условие для отображения текущего профиля или конкретного профиля
                if (isset($_GET['id'])) {
                    $profileId = intval($_GET['id']);
                    require_once(ENGINE_DIR . '/controllers/profile.php');  // Include the profile controller
                    profileController($profileId);
                } else {
                    $currentUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : (isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : null);
                    if ($currentUserId) {
                        require_once(ENGINE_DIR . '/controllers/profile.php');  // Include the profile controller
                        profileController($currentUserId);
                    } else {
                        echo 'Invalid request';
                    }
                }
                break;
            default:
                echo 'Invalid request';
                break;
        }
    }