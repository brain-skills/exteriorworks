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

    // Функция для получения внешнего IP-адреса
    function getExternalIp() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.ipify.org?format=json");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        
        $data = json_decode($response);
        return $data->ip;
    }

    // Получите внешний IP-адрес
    $externalIp = getExternalIp();
    $smarty->assign('externalIp', $externalIp);

    // Функция для получения данных о местоположении
    function getLocation($ip) {
        $url = "http://ip-api.com/json/{$ip}";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($response, true);
    }

    // Получите данные о местоположении
    $location = getLocation($externalIp);
    $smarty->assign('city', $location['city']);