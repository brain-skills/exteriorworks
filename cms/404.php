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

    define('ENGINE_DIR', 'engine');
    define('TEMPLATES_DIR', 'templates');
    // Загрузка конфигурации
    require_once(ENGINE_DIR . '/data/config.php');

    require_once(ENGINE_DIR . '/libs/Smarty.class.php');
    $smarty = new Smarty();

    $smarty->assign('error_message', 'Страница не найдена');
	$smarty->assign($config);
    $smarty->display(TEMPLATES_DIR . '/' . $config['skin'] . '/error.tpl');