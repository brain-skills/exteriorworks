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

    session_start();
    function changeCurrency($newCurrency, $config) {
        if (array_key_exists($newCurrency, $config['modules']['products']['currencies'])) {
            $_SESSION['current_currency'] = $newCurrency;
        }
    }
    function getCurrentCurrency() {
        return isset($_SESSION['current_currency']) ? $_SESSION['current_currency'] : getDefaultCurrency();
    }
    function getDefaultCurrency() {
        global $config;
        return $config['modules']['products']['default_currency'];
    }
    function convertPrice($price, $baseCurrency, $currentCurrency, $baseRate, $currentRate) {
        return round($price * ($currentRate / $baseRate), 2);
    }
    function countProducts() {
        global $db_connect;
        $result = $db_connect->query('SELECT COUNT(*) as total FROM products');
        $count = $result->fetch_assoc()['total'];
        return $count;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'change_currency' && isset($_POST['currency'])) {
        $newCurrency = $_POST['currency'];
        changeCurrency($newCurrency, $config);
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }