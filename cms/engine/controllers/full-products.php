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

    function productsController($product) {
        global $db_connect, $smarty, $config;
        $currentCurrency = getCurrentCurrency();
        $stmt = $db_connect->prepare('SELECT * FROM products WHERE alt_name = ?');
        if (!$stmt) {
            die('Ошибка подготовки запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        $stmt->bind_param('s', $product);
        $stmt->execute();
        if ($stmt->error) {
            die('Ошибка выполнения запроса (' . $stmt->errno . ') ' . $stmt->error);
        }
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();
        if (!$product) {
            $smarty->assign('error_message', 'Товар не найден');
            $smarty->display(TEMPLATES_DIR . '/' . $config['skin'] . '/error.tpl');
        } else {
        
            $product['short_desc'] = html_entity_decode($product['short_desc'], ENT_QUOTES, 'UTF-8');
            $product['full_desc'] = html_entity_decode($product['full_desc'], ENT_QUOTES, 'UTF-8');
        
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
            $baseCurrency = $config['modules']['products']['default_currency'];
            $currentRate = $config['modules']['products']['currencies'][getCurrentCurrency()];
            $baseRate = $config['modules']['products']['currencies'][$baseCurrency];
            $product['converted_price'] = convertPrice($product['price'], $baseCurrency, getCurrentCurrency(), $baseRate, $currentRate);
            $smarty->assign('title', $product['title'] . ' - Skills Engine');
            $smarty->assign('page_name', '
                <li class="breadcrumb-item"><a href="/products">Товары</a></li>
                <li class="breadcrumb-item active">' . $product['title'] . '</li>
            ');
            $smarty->assign('category_alt_names', $product['category_alt_names']);
            $smarty->assign('categories', $categories);
            $smarty->assign('currentCurrency', $currentCurrency);
            $smarty->assign('product', $product);
            $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/' . $config['modules']['products']['products_full_tpl'], ['product' => $product]));
            require_once(ENGINE_DIR . '/modules/offline.php');
        }
    }
    $smarty->assign($config);