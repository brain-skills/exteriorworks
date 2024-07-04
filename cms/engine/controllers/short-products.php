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

    function allProductsController() {
        global $db_connect, $smarty, $config;
        $currentCurrency = getCurrentCurrency();
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $start = ($currentPage - 1) * $config['modules']['products']['products_per_page'];
        $result = $db_connect->query("SELECT * FROM products LIMIT $start, {$config['modules']['products']['products_per_page']}");
        if (!$result) {
            die('Ошибка выполнения запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        $productsList = $result->fetch_all(MYSQLI_ASSOC);
        $baseCurrency = $config['modules']['products']['default_currency'];
        $currentRate = $config['modules']['products']['currencies'][getCurrentCurrency()];
        $baseRate = $config['modules']['products']['currencies'][$baseCurrency];
        foreach ($productsList as &$product) {
            $product['converted_price'] = convertPrice($product['price'], $baseCurrency, getCurrentCurrency(), $baseRate, $currentRate);
        }
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
        
        if (!empty($products['short_desc'])) {
            $products['short_desc'] = html_entity_decode($products['short_desc'], ENT_QUOTES, 'UTF-8');
        }
        
        if (!empty($products['full_desc'])) {
            $products['full_desc'] = html_entity_decode($products['full_desc'], ENT_QUOTES, 'UTF-8');
        }
        
        // Рассчитываем количество страниц для пагинации
        $totalPages = ceil(countProducts() / $config['modules']['products']['products_per_page']);
        require_once(ENGINE_DIR . '/modules/pagination.php');
        $smarty->assign('title', 'Товары - Skills Engine');
        $smarty->assign('page_name', '<li class="breadcrumb-item active">Товары</li>');
        $smarty->assign('currentPage', $currentPage);
        $smarty->assign('totalPages', $totalPages);
        $smarty->assign('pagination', generatePagination($currentPage, $totalPages));
        $smarty->assign('currentCurrency', $currentCurrency);
        $smarty->assign('productsList', $productsList);
        $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/' . $config['modules']['products']['products_short_tpl'], ['productsList' => $productsList]));
        require_once(ENGINE_DIR . '/modules/offline.php');
    }
    $smarty->assign($config);