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

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'change_currency' && isset($_POST['currency'])) {
        require_once(ENGINE_DIR . '/modules/currency.php');
    }
    
    function homeController() {
        global $db_connect, $smarty, $config;
        // Получение 10 последних добавленных новостей
        $sqlLatestNews = "SELECT * FROM news ORDER BY date DESC LIMIT 10";
        $resultLatestNews = $db_connect->query($sqlLatestNews);
        // Проверка успешности выполнения запроса
        if ($resultLatestNews === false) {
            die("Ошибка выполнения запроса: " . $db_connect->error);
        }
        $latestNews = $resultLatestNews->fetch_all(MYSQLI_ASSOC);

        // Получение 10 популярных новостей по рейтингу
        $sqlPopularNews = "SELECT * FROM news ORDER BY rating DESC LIMIT 10";
        $resultPopularNews = $db_connect->query($sqlPopularNews);
        // Проверка успешности выполнения запроса
        if ($resultPopularNews === false) {
            die("Ошибка выполнения запроса: " . $db_connect->error);
        }
        $popularNews = $resultPopularNews->fetch_all(MYSQLI_ASSOC);

        // Получение 10 самых просматриваемых новостей
        $sqlMostViewedNews = "SELECT * FROM news ORDER BY views DESC LIMIT 10";
        $resultMostViewedNews = $db_connect->query($sqlMostViewedNews);
        // Проверка успешности выполнения запроса
        if ($resultMostViewedNews === false) {
            die("Ошибка выполнения запроса: " . $db_connect->error);
        }
        $mostViewedNews = $resultMostViewedNews->fetch_all(MYSQLI_ASSOC);

        // Закрываем соединение с базой данных
        $db_connect->close();

        $smarty->assign('latestNews', $latestNews);
        $smarty->assign('popularNews', $popularNews);
        $smarty->assign('mostViewedNews', $mostViewedNews);

        $homepage = 'Главная страница';
        // Устанавливаем массив переменных в Smarty
        $smarty->assign('title', $config['title']);
        $smarty->assign('homepage', $homepage);
        $smarty->assign('page_name', '
            <li class="breadcrumb-item active">' . $config['title'] . '</li>
        ');
        $smarty->assign('theme', TEMPLATES_DIR . '/' . $config['skin']);
        // Передаем данные в Smarty
        $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/home.tpl'));
        // Проверяем, выключен ли сайт
        require_once(ENGINE_DIR . '/modules/offline.php');
    }
	$smarty->assign($config);