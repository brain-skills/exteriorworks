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
    function universalController() {
        global $smarty, $config, $db_connect;

        // Получаем категории новостей
        $newsQuery = "SELECT * FROM news_categories";
        $newsResult = mysqli_query($db_connect, $newsQuery);
        $newsCategories = [];
        while ($row = mysqli_fetch_assoc($newsResult)) {
            $newsCategories[] = $row;
        }

        // Передаем данные в Smarty
        $smarty->assign('news_categories', $newsCategories);

        // Проверка нажатия кнопки с name submit_feedback
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_feedback'])) {
            // Устанавливаем форму обратной связи в глобальное пространство
            require_once(ENGINE_DIR . '/modules/submit_feedback.php');
        }
    }
    $smarty->assign('config', $config);