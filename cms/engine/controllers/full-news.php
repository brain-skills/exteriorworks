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
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] == 'change_currency' && isset($_POST['currency'])) {
            require_once(ENGINE_DIR . '/modules/currency.php');
        } elseif ($_POST['action'] == 'add_comment' && isset($_POST['news_id']) && isset($_POST['author']) && isset($_POST['content'])) {
    
            // Получаем максимальное значение id из таблицы комментариев
            $sql = "SELECT MAX(id) AS max_id FROM news_comments";
            $result_max_id = $db_connect->query($sql);
    
            if ($result_max_id->num_rows > 0) {
                while($row = $result_max_id->fetch_assoc()) {
                    $max_id = $row["max_id"];
                }
            } else {
                $max_id = 0;
            }
    
            // Сбрасываем счетчик автоинкремента к максимальному значению id комментариев
            $sql_reset_auto_increment = "ALTER TABLE news_comments AUTO_INCREMENT = " . ($max_id + 1);
            $db_connect->query($sql_reset_auto_increment);
            
            // Обработка добавления комментария
            $news_id = intval($_POST['news_id']);
            $author = trim($_POST['author']);
            $content = trim($_POST['content']);
            $parent_id = isset($_POST['parent_id']) ? intval($_POST['parent_id']) : NULL;
    
            // Вставляем комментарий в базу данных
            $stmt = $db_connect->prepare('INSERT INTO news_comments (news_id, author, date, content, parent_id) VALUES (?, ?, NOW(), ?, ?)');
            $stmt->bind_param('issi', $news_id, $author, $content, $parent_id);
            $stmt->execute();
            $stmt->close();
    
            // После успешного добавления комментария выполним перенаправление
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
    }
    
    function newsController($news) {
        global $db_connect, $smarty, $config;
    
        // Получаем данные из базы данных
        $stmt = $db_connect->prepare('SELECT * FROM news WHERE alt_name = ?');
        $stmt->bind_param('s', $news);
        $stmt->execute();
        $result = $stmt->get_result();
        $news = $result->fetch_assoc();
        $stmt->close();
    
        if (!$news) {
            $smarty->assign('error_message', 'Новость не найдена');
            $smarty->display(TEMPLATES_DIR . '/main/error.tpl');
        } else {
            $news['short_desc'] = html_entity_decode($news['short_desc'], ENT_QUOTES, 'UTF-8');
            $news['full_desc'] = html_entity_decode($news['full_desc'], ENT_QUOTES, 'UTF-8');
    
            // Получаем категории и их alt_name для данной новости
            $categories = explode(',', $news['categories']);
            $altNames = [];
            foreach ($categories as $category) {
                $category = trim($category);
                $altNameQuery = $db_connect->prepare('SELECT alt_name FROM news_categories WHERE name = ?');
                $altNameQuery->bind_param('s', $category);
                $altNameQuery->execute();
                $altNameResult = $altNameQuery->get_result();
                $altName = $altNameResult->fetch_assoc();
                $altNames[] = $altName ? $altName['alt_name'] : '';
            }
            $news['category_alt_names'] = implode(',', $altNames);
    
            // Получаем комментарии для данной новости, включая вложенные комментарии
            $stmt = $db_connect->prepare('SELECT c.*, p.author AS parent_author FROM news_comments c LEFT JOIN news_comments p ON c.parent_id = p.id WHERE c.news_id = ? ORDER BY c.date ASC');
            $stmt->bind_param('i', $news['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $news_comments = [];
            while ($comment = $result->fetch_assoc()) {
                if (!$comment['parent_id']) {
                    $comment['replies'] = [];
                    $news_comments[$comment['id']] = $comment;
                } else {
                    if (!isset($news_comments[$comment['parent_id']]['replies'])) {
                        $news_comments[$comment['parent_id']]['replies'] = [];
                    }
                    $news_comments[$comment['parent_id']]['replies'][] = $comment;
                }
            }
            $stmt->close();
    
            // Устанавливаем массив переменных в Smarty
            $smarty->assign('title', $news['title'] . ' - Skills Engine');
            $smarty->assign('page_name', '
                <li class="breadcrumb-item"><a href="/news">Новости</a></li>
                <li class="breadcrumb-item active">' . $news['title'] . '</li>
            ');
            $smarty->assign('category_alt_names', $news['category_alt_names']);
            $smarty->assign('categories', $categories);
            $smarty->assign('news', $news);
            $smarty->assign('comments', array_values($news_comments));
            // Передаем данные в Smarty
            $smarty->assign('content', $smarty->fetch(TEMPLATES_DIR . '/main/' . $config['modules']['news']['news_full_tpl'], ['news' => $news]));
            // Проверяем, выключен ли сайт
            require_once(ENGINE_DIR . '/modules/offline.php');
        }
    }
    
    $smarty->assign($config);