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
    require_once(ENGINE_DIR . '/modules/currency.php');
    
    function addToCartController(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            // Проверка, существует ли корзина в сессии
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            // Добавление товара в корзину
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] += $quantity;
            } else {
                $_SESSION['cart'][$product_id] = ['quantity' => $quantity];
            }
        }
    }
    function viewCartController(){
        global $db_connect, $smarty, $config;
        // Получаем дополнительные данные о товарах из базы данных
        $productDetails = getProductDetails($_SESSION['cart'] ?? []);
        // Вычисляем общую сумму
        $totalPrice = calculateTotalPrice($productDetails);
        // Передача данных корзины и общей суммы в Smarty
        $smarty->assign('cartContent', $productDetails);
        $smarty->assign('totalPrice', $totalPrice);
        // Устанавливаем массив переменных в Smarty
        $smarty->assign('title', 'Корзина - Skills Engine');
        $smarty->assign('page_name', '
            <li class="breadcrumb-item"><a href="/products">Товары</a></li>
            <li class="breadcrumb-item active">Корзина</li>
        ');
        // Передаем данные в Smarty
        $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/cart.tpl'));
        // Проверяем, выключен ли сайт
        require_once(ENGINE_DIR . '/modules/offline.php');
    }
    // Вспомогательная функция для получения дополнительных данных о товарах
    function getProductDetails($cartContent){
        global $db_connect;
        $productDetails = [];
        foreach ($cartContent as $product_id => $item) {
            // Используем * для выбора всех столбцов
            $query = "SELECT * FROM products WHERE id = ?";
            $stmt = mysqli_prepare($db_connect, $query);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $product_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($result && $product = mysqli_fetch_assoc($result)) {
                    $productDetails[$product_id] = $product + ['quantity' => $item['quantity']];
                    // Объединяем данные из базы данных с количеством в корзине
                }
            }
        }
        return $productDetails;
    }
    // Вспомогательная функция для вычисления общей суммы
    function calculateTotalPrice($productDetails){
        $totalPrice = 0;
        foreach ($productDetails as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }
    $smarty->assign($config);