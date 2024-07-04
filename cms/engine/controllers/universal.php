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

	// Устанавливаем массив для передачи данных в шаблон
	require_once(ENGINE_DIR . '/data/config.php');
    function universalController() {
        global $smarty, $config, $db_connect;

        // Получаем категории новостей
        $newsQuery = "SELECT * FROM news_categories";
        $newsResult = mysqli_query($db_connect, $newsQuery);
        $newsCategories = [];
        while ($row = mysqli_fetch_assoc($newsResult)) {
            $newsCategories[] = $row;
        }
        
        // Получаем категории фильмов
        $movieQuery = "SELECT * FROM movies_categories";
        $movieResult = mysqli_query($db_connect, $movieQuery);
        $movieCategories = [];
        while ($row = mysqli_fetch_assoc($movieResult)) {
            $movieCategories[] = $row;
        }
        
        // Получаем категории товаров
        $productsQuery = "SELECT * FROM products_categories";
        $productsResult = mysqli_query($db_connect, $productsQuery);
        $productsCategories = [];
        while ($row = mysqli_fetch_assoc($productsResult)) {
            $productsCategories[] = $row;
        }
        
        // Получаем категории объявлений
        $adsQuery = "SELECT * FROM ads_categories";
        $adsResult = mysqli_query($db_connect, $adsQuery);
        $adsCategories = [];
        while ($row = mysqli_fetch_assoc($adsResult)) {
            $adsCategories[] = $row;
        }
        
        // Получаем категории файлов
        $filesQuery = "SELECT * FROM files_categories";
        $filesResult = mysqli_query($db_connect, $filesQuery);
        $filesCategories = [];
        while ($row = mysqli_fetch_assoc($filesResult)) {
            $filesCategories[] = $row;
        }

        // Передаем данные в Smarty
        $smarty->assign('news_categories', $newsCategories);
        $smarty->assign('products_categories', $productsCategories);
        $smarty->assign('files_categories', $filesCategories);
        $smarty->assign('ads_categories', $adsCategories);
        $smarty->assign('movie_categories', $movieCategories);

        // Проверка нажатия кнопки с name submit_feedback
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_feedback'])) {
            // Устанавливаем форму обратной связи в глобальное пространство
            require_once(ENGINE_DIR . '/modules/submit_feedback.php');
        }
    }
    $smarty->assign('config', $config);