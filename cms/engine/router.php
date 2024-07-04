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
    require_once(ENGINE_DIR . '/controllers/cart.php');
    require_once(ENGINE_DIR . '/controllers/checkout.php');
    require_once(ENGINE_DIR . '/controllers/universal.php');

    // Добавляем вызов addToCartController в самом начале файла
    addToCartController();
    universalController();

    // Дополнительные переменные из URL
    $pages = $_GET['pages'] ?? null;
    $news = $_GET['news'] ?? null;
    $newsCategory = $_GET['news-category'] ?? null;
    $products = $_GET['products'] ?? null;
    $productsCategory = $_GET['products-category'] ?? null;
    $movies = $_GET['movies'] ?? null;
    $moviesCategory = $_GET['movies-category'] ?? null;
    $ads = $_GET['ads'] ?? null;
    $adsCategory = $_GET['ads-category'] ?? null;
    $files = $_GET['files'] ?? null;
    $filesCategory = $_GET['files-category'] ?? null;
    $profileId = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Обработка запросов
    if (isset($_GET['cart'])) {
        viewCartController();
    } elseif (isset($_GET['checkout'])) {
        checkoutController();
    } elseif (isset($newsCategory)) {
        require_once(ENGINE_DIR . '/controllers/newsByCategory.php');
        newsByCategoryController($newsCategory);
    } elseif (isset($productsCategory)) {
        require_once(ENGINE_DIR . '/controllers/productsByCategory.php');
        productsByCategoryController($productsCategory);
    } elseif (isset($moviesCategory)) {
        require_once(ENGINE_DIR . '/controllers/moviesByCategory.php');
        moviesByCategoryController($moviesCategory);
    } elseif (isset($adsCategory)) {
        require_once(ENGINE_DIR . '/controllers/adsByCategory.php');
        adsByCategoryController($adsCategory);
    } elseif (isset($filesCategory)) {
        require_once(ENGINE_DIR . '/controllers/filesByCategory.php');
        filesByCategoryController($filesCategory);
    } elseif (empty($pages) && empty($news) && !isset($_GET['news']) && empty($products) && !isset($_GET['products']) && empty($ads) && !isset($_GET['ads']) && empty($files) && !isset($_GET['files']) && !isset($_GET['profile']) && !isset($_GET['movies'])) {
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
            case !empty($products):
                require_once(ENGINE_DIR . '/controllers/full-products.php');
                productsController($products);
                break;
            case isset($_GET['products']):
                require_once(ENGINE_DIR . '/controllers/short-products.php');
                allProductsController();
                break;
            case !empty($movies):
                require_once(ENGINE_DIR . '/controllers/full-movies.php');
                moviesController($movies);
                break;
            case isset($_GET['movies']):
                require_once(ENGINE_DIR . '/controllers/short-movies.php');
                allMoviesController();
                break;
            case !empty($ads):
                require_once(ENGINE_DIR . '/controllers/full-ads.php');
                adsController($ads);
                break;
            case isset($_GET['ads']):
                require_once(ENGINE_DIR . '/controllers/short-ads.php');
                allAdsController();
                break;
            case !empty($files):
                require_once(ENGINE_DIR . '/controllers/full-files.php');
                filesController($files);
                break;
            case isset($_GET['files']):
                require_once(ENGINE_DIR . '/controllers/short-files.php');
                allFilesController();
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