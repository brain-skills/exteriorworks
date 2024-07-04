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
    
    function pagesController($pages) {
        global $db_connect, $smarty, $config;
        // Получаем данные из базы данных
        $stmt = $db_connect->prepare('SELECT * FROM static_pages WHERE alt_name = ?');
        if (!$stmt) {
            die('Ошибка подготовки запроса (' . $db_connect->errno . ') ' . $db_connect->error);
        }
        $stmt->bind_param('s', $pages);
        $stmt->execute();
        if ($stmt->error) {
            die('Ошибка выполнения запроса (' . $stmt->errno . ') ' . $stmt->error);
        }
        $result = $stmt->get_result();
        $stmt->close(); // Закрываем результаты запроса
        $page = $result->fetch_assoc();
        if (!$page) {
            // Страница не существует
            $smarty->assign('error_message', 'Страница не существует');
            $smarty->display(TEMPLATES_DIR . '/' . $config['skin'] . '/error.tpl');
        } else {
			$page['full_desc'] = html_entity_decode($page['full_desc'], ENT_QUOTES, 'UTF-8');
		
            // Устанавливаем массив переменных в Smarty
            $smarty->assign('title', $page['title'] . ' - Skills Engine');
            $smarty->assign('page_name', '
                <li class="breadcrumb-item active">' . $page['title'] . '</li>
            ');
            // Передаем данные в Smarty
            $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/' . $config['skin'] . '/pages.tpl', ['page' => $page]));
            // Проверяем, выключен ли сайт
            require_once(ENGINE_DIR . '/modules/offline.php');
        }
    }
    $currentUrl = $_SERVER['REQUEST_URI'];
    $smarty->assign('currentUrl', $currentUrl);
    $smarty->assign($config);