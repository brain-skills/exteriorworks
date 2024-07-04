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

    // Подключаем определитель локации
    require_once(ENGINE_DIR . '/modules/location.php');

    // Инициализация переменной для сообщений
    $message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_feedback'])) {
	
        // Получаем максимальное значение id из таблицы товаров
        $sql = "SELECT MAX(id) AS max_id FROM feedback_orders";
        $feedback_orders_result = $db_connect->query($sql);

        if ($feedback_orders_result->num_rows > 0) {
            while($row = $feedback_orders_result->fetch_assoc()) {
                $max_id = $row["max_id"];
            }
        } else {
            $max_id = 0;
        }
    
        // Сбрасываем счетчик автоинкремента к максимальному значению id товаров
        $sql_reset_auto_increment = "ALTER TABLE feedback_orders AUTO_INCREMENT = " . ($max_id + 1);
        $db_connect->query($sql_reset_auto_increment);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $ip = $externalIp;
        $city = $location['city'];
        $message_content = $_POST['message'];

        // Запись данных в таблицу feedback_orders
        $insert_feedback_orders = "INSERT INTO feedback_orders (name, email, phone, subject, ip, city, message) VALUES ('$name', '$email', '$phone', '$subject', '$ip', '$city', '$message_content')";

        // Выполнение запроса для записи данных в таблицу feedback_orders
        $result = $db_connect->query($insert_feedback_orders);
    
        // Отправка письма
        $to = $config['feedback_mail'];
        $subject_mail = "Новая заявка на обратную связь: " . $subject;
        $body = "Имя: $name\nЭлектронная почта: $email\nТема: $subject\nСообщение:\n$message_content";
        $headers = "From: $email";
    
        if (mail($to, $subject_mail, $body, $headers)) {
            $message = "Thank you for your request!<br>We appreciate your interest in our services.";
            echo '
                <div class="fullscreen-box" id="fullScreenBox">
                    <div class="alertnotify" id="alertNotify">
                        <div class="alert alert-success" role="alert">
                            <p>' . $message . '</p>
                            <span id="countdown">3</span>
                        </div>
                    </div>
                </div>
            ';
        } else {
            $message = "Ошибка при отправке сообщения.";
            echo '
                <div class="fullscreen-box" id="fullScreenBox">
                    <div class="alertnotify" id="alertNotify">
                        <div class="alert alert-danger" role="alert">
                            <p>' . $message . '</p>
                            <span id="countdown">3</span>
                        </div>
                    </div>
                </div>
            ';
        }
    
        // JavaScript для обратного отсчета и переадресации
        echo '
            <script>
                // Функция для обратного отсчета
                function countdown() {
                    var countdownElement = document.getElementById("countdown");
                    var count = parseInt(countdownElement.textContent);
                    if (count > 0) {
                        countdownElement.textContent = count - 1;
                        setTimeout(countdown, 1000); // Запускаем функцию через 1 секунду
                    } else {
                        window.location.href = window.location.href; // Переадресация на текущую страницу
                    }
                }
    
                // Запускаем обратный отсчет при загрузке страницы
                document.addEventListener("DOMContentLoaded", function() {
                    setTimeout(countdown, 500); // Начинаем обратный отсчет через 0.5 секунд
                });
            </script>
        ';
    }

    // Передача данных в шаблон
    $smarty->assign('message', $message);