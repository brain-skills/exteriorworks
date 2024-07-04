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

    // Проверяем, выключен ли сайт
    if ($config['site_offline'] == 1) {
        $smarty->display(TEMPLATES_DIR . '/' . $config['skin'] . '/offline.tpl');
        exit; // Останавливаем дальнейшую обработку
    } else {
        // Отображаем шаблон
        $smarty->display(TEMPLATES_DIR . '/' . $config['skin'] . '/main.tpl');
    }