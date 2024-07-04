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
    
    function productsByCategoryController($category) {
        global $db_connect, $smarty, $config;
        // Проверяем, существует ли категория
        $categoryQuery = $db_connect->prepare('SELECT * FROM products_categories WHERE alt_name = ?');
        $categoryQuery->bind_param('s', $category);
        $categoryQuery->execute();
        $categoryResult = $categoryQuery->get_result();
        $categoryData = $categoryResult->fetch_assoc();
        $categoryQuery->close();
        if (!$categoryData) {
            // Категория не найдена, отображаем ошибку 404
            header("HTTP/1.0 404 Not Found");
            $smarty->assign('error_message', 'Категория не найдена');
            $smarty->display(TEMPLATES_DIR . '/' . $config['skin'] . '/error.tpl');
            exit;
        }
        // Получаем данные из базы данных
        $stmt = $db_connect->prepare('SELECT * FROM products WHERE categories LIKE ?');
        if (!$stmt) {
            die('Ошибка подготовки запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        $categorySearch = '%' . $categoryData['name'] . '%';
        $stmt->bind_param('s', $categorySearch);
        $stmt->execute();
        if ($stmt->error) {
            die('Ошибка выполнения запроса (' . $stmt->errno . ') ' . $stmt->error);
        }
        $result = $stmt->get_result();
        $productsList = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        // Обработка смены валюты
        $currentCurrency = getCurrentCurrency();
        $baseCurrency = $config['modules']['products']['default_currency'];
        $baseRate = $config['modules']['products']['currencies'][$baseCurrency];
        $currentRate = $config['modules']['products']['currencies'][$currentCurrency];

        foreach ($productsList as &$product) {
            $product['converted_price'] = convertPrice($product['price'], $baseCurrency, $currentCurrency, $baseRate, $currentRate);
        }
        // Получаем alt_names для каждой категории
        foreach ($productsList as &$product) {
            $categories = explode(',', $product['categories']);
            $altNames = [];
            foreach ($categories as $category) {
                $category = trim($category);
                $altNameQuery = $db_connect->prepare('SELECT alt_name FROM products_categories WHERE name = ?');
                $altNameQuery->bind_param('s', $category);
                $altNameQuery->execute();
                $altNameResult = $altNameQuery->get_result();
                $altName = $altNameResult->fetch_assoc();
                $altNames[] = $altName ? $altName['alt_name'] : '';
            }
            $product['category_alt_names'] = implode(',', $altNames);
        }
        // Рассчитываем количество страниц для пагинации относительно товаров с данной категорией
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $productsPerPage = $config['modules']['products']['products_fromcats_per_page'];
        require_once(ENGINE_DIR . '/modules/pagination.php');
        $totalPages = ceil(count($productsList) / $productsPerPage);
        // Определяем, с какой новости начинать отображение на текущей странице
        $start = ($currentPage - 1) * $productsPerPage;
        // Передача данных в Smarty
        $smarty->assign('title', $categoryData['name'] . ' - Skills Engine');
        $smarty->assign('page_name', '
            <li class="breadcrumb-item"><a href="/products">Товары</a></li>
            <li class="breadcrumb-item active">' . $categoryData['name'] . '</li>
        ');
        $smarty->assign('currentPage', $currentPage);
        $smarty->assign('totalPages', $totalPages);
        $smarty->assign('pagination', generatePagination($currentPage, $totalPages));
        $smarty->assign('currentCurrency', $currentCurrency);
        $smarty->assign('productsList', array_slice($productsList, $start, $productsPerPage));
        $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/' . $config['modules']['products']['products_short_tpl'], ['productsList' => array_slice($productsList, $start, $productsPerPage), 'category_alt_names' => $categoryData['alt_name']]));
        // Проверяем, выключен ли сайт
        require_once(ENGINE_DIR . '/modules/offline.php');
    }
    $smarty->assign($config);