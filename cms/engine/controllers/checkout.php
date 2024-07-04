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
    function checkoutController() {
        global $smarty, $config;
        // Здесь можно добавить логику для обработки заказа, проведения оплаты и т.д.
        // Создаем новую корзину
        $_SESSION['cart'] = [];
        // Устанавливаем массив переменных в Smarty
        $smarty->assign('title', 'Оплата - Skills Engine');
        $smarty->assign('page_name', '
            <li class="breadcrumb-item active">Оплата</li>
        ');
        // Передаем данные в Smarty
        $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/checkout.tpl', ['status' => 'success']));
        // Проверяем, выключен ли сайт
        require_once(ENGINE_DIR . '/modules/offline.php');
    }
    $smarty->assign($config);