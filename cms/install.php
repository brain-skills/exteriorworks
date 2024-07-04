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

	// Хешированные пароли
	$hashPass = password_hash('demo2024', PASSWORD_DEFAULT);

	// Флаг для отслеживания успешности выполнения запросов
	$successFlag = true;

	// Массив с запросами на создание таблиц
	$createTables = [
		'CREATE TABLE IF NOT EXISTS `ads` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`autor` VARCHAR(40) DEFAULT NULL,
			`date` DATE DEFAULT NULL,
			`categories` VARCHAR(190) DEFAULT NULL,
			`title` VARCHAR(255) DEFAULT NULL,
			`image` VARCHAR(255) DEFAULT NULL,
			`alt_name` VARCHAR(190) DEFAULT NULL,
			`short_desc` MEDIUMTEXT DEFAULT NULL,
			`full_desc` MEDIUMTEXT DEFAULT NULL,
			`price` VARCHAR(50) DEFAULT NULL,
			`authority` VARCHAR(50) DEFAULT NULL,
			`phone` VARCHAR(255) DEFAULT NULL,
			`email` VARCHAR(255) DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`views` INT DEFAULT 0,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `ads_categories` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`parentid` INT(11) DEFAULT NULL,
			`position` INT(11) DEFAULT NULL,
			`name` VARCHAR(50) DEFAULT NULL,
			`alt_name` VARCHAR(50) DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`short_tpl` VARCHAR(40) DEFAULT NULL,
			`full_tpl` VARCHAR(40) DEFAULT NULL,
			`comments` TINYINT(1) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `ads_comments` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`user_id` INT(11) NOT NULL,
			`entity_id` INT(11) NOT NULL,
			`entity_type` VARCHAR(50) NOT NULL,
			`comment_text` TEXT NOT NULL,
			`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			INDEX (`user_id`),
			INDEX (`entity_id`,`entity_type`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `feedback_orders` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(255) NOT NULL,
			`email` VARCHAR(255) NOT NULL,
			`subject` VARCHAR(255) DEFAULT NULL,
			`message` TEXT NOT NULL,
			`ip` VARCHAR(45) NOT NULL,
			`city` VARCHAR(255) NOT NULL,
			`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `files` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`autor` VARCHAR(40) DEFAULT NULL,
			`date` DATE DEFAULT NULL,
			`categories` VARCHAR(190) DEFAULT NULL,
			`title` VARCHAR(255) DEFAULT NULL,
			`file_path` VARCHAR(255) DEFAULT NULL,
			`image` VARCHAR(255) DEFAULT NULL,
			`alt_name` VARCHAR(190) DEFAULT NULL,
			`short_desc` MEDIUMTEXT DEFAULT NULL,
			`full_desc` MEDIUMTEXT DEFAULT NULL,
			`price` DECIMAL(10, 2) DEFAULT 0.00,
			`version` VARCHAR(50) DEFAULT NULL,
			`license` VARCHAR(255) DEFAULT NULL,
			`contact_info` VARCHAR(255) DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`views` INT DEFAULT 0,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `files_categories` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`parentid` INT(11) DEFAULT NULL,
			`position` INT(11) DEFAULT NULL,
			`name` VARCHAR(50) DEFAULT NULL,
			`alt_name` VARCHAR(50) DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`short_tpl` VARCHAR(40) DEFAULT NULL,
			`full_tpl` VARCHAR(40) DEFAULT NULL,
			`comments` TINYINT(1) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `files_comments` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`user_id` INT(11) NOT NULL,
			`entity_id` INT(11) NOT NULL,
			`entity_type` VARCHAR(50) NOT NULL,
			`comment_text` TEXT NOT NULL,
			`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			INDEX (`user_id`),
			INDEX (`entity_id`,`entity_type`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `groups` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(50) DEFAULT NULL,
			`create` TINYINT(1) DEFAULT NULL,
			`read` TINYINT(1) DEFAULT NULL,
			`update` TINYINT(1) DEFAULT NULL,
			`del` TINYINT(1) DEFAULT NULL,
			`vote` TINYINT(1) DEFAULT NULL,
			`download` TINYINT(1) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `movies` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`autor` VARCHAR(40) DEFAULT NULL,
			`date` DATE DEFAULT NULL,
			`categories` VARCHAR(255) DEFAULT NULL,
			`title` VARCHAR(255) DEFAULT NULL,
			`image` VARCHAR(255) DEFAULT NULL,
			`alt_name` VARCHAR(190) DEFAULT NULL,
			`search_id` VARCHAR(190) DEFAULT NULL,
			`year` VARCHAR(40) DEFAULT NULL,
			`quality` VARCHAR(50) DEFAULT NULL,
			`director` VARCHAR(100) DEFAULT NULL,
			`actors` VARCHAR(255) DEFAULT NULL,
			`short_desc` MEDIUMTEXT DEFAULT NULL,
			`full_desc` MEDIUMTEXT DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`allow_comments` TINYINT(1) DEFAULT NULL,
			`tags` VARCHAR(255) DEFAULT NULL,
			`rating` TINYINT DEFAULT NULL,
			`views` INT DEFAULT 0,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `movies_categories` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`parentid` INT(11) DEFAULT NULL,
			`position` INT(11) DEFAULT NULL,
			`name` VARCHAR(50) DEFAULT NULL,
			`alt_name` VARCHAR(50) DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`short_tpl` VARCHAR(40) DEFAULT NULL,
			`full_tpl` VARCHAR(40) DEFAULT NULL,
			`comments` TINYINT(1) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `movies_comments` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`user_id` INT(11) NOT NULL,
			`entity_id` INT(11) NOT NULL,
			`entity_type` VARCHAR(50) NOT NULL,
			`comment_text` TEXT NOT NULL,
			`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			INDEX (`user_id`),
			INDEX (`entity_id`,`entity_type`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `news` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`autor` VARCHAR(40) DEFAULT NULL,
			`date` DATE DEFAULT NULL,
			`categories` VARCHAR(255) DEFAULT NULL,
			`title` VARCHAR(255) DEFAULT NULL,
			`image` VARCHAR(255) DEFAULT NULL,
			`alt_name` VARCHAR(190) DEFAULT NULL,
			`short_desc` MEDIUMTEXT DEFAULT NULL,
			`full_desc` MEDIUMTEXT DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`allow_comments` TINYINT(1) DEFAULT NULL,
			`fixed` TINYINT(1) DEFAULT NULL,
			`allow_br` TINYINT(1) DEFAULT NULL,
			`tags` VARCHAR(255) DEFAULT NULL,
			`rating` TINYINT DEFAULT NULL,
			`views` INT DEFAULT 0,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `news_categories` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`parentid` INT(11) DEFAULT NULL,
			`position` INT(11) DEFAULT NULL,
			`name` VARCHAR(50) DEFAULT NULL,
			`alt_name` VARCHAR(50) DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`short_tpl` VARCHAR(40) DEFAULT NULL,
			`full_tpl` VARCHAR(40) DEFAULT NULL,
			`comments` TINYINT(1) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `news_comments` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`news_id` INT(11) NOT NULL,
			`author` VARCHAR(40) DEFAULT NULL,
			`date` DATETIME DEFAULT CURRENT_TIMESTAMP,
			`content` TEXT NOT NULL,
			`parent_id` INT(11) DEFAULT NULL,
			PRIMARY KEY (`id`),
			FOREIGN KEY (`news_id`) REFERENCES `news`(`id`) ON DELETE CASCADE
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `products` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`autor` VARCHAR(40) DEFAULT NULL,
			`date` DATE DEFAULT NULL,
			`categories` VARCHAR(190) DEFAULT NULL,
			`title` VARCHAR(255) DEFAULT NULL,
			`image` VARCHAR(255) DEFAULT NULL,
			`alt_name` VARCHAR(190) DEFAULT NULL,
			`short_desc` MEDIUMTEXT DEFAULT NULL,
			`full_desc` MEDIUMTEXT DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`price` DECIMAL(10, 2) NOT NULL,
			`stock_quantity` INT NOT NULL,
			`measure_unit` VARCHAR(50) DEFAULT NULL,
			`brand` VARCHAR(100) DEFAULT NULL,
			`model` VARCHAR(100) DEFAULT NULL,
			`sku` VARCHAR(100) DEFAULT NULL,
			`mass` DECIMAL(10, 2) DEFAULT NULL,
			`dimensions` VARCHAR(100) DEFAULT NULL,
			`color` VARCHAR(50) DEFAULT NULL,
			`material` VARCHAR(100) DEFAULT NULL,
			`warranty` VARCHAR(100) DEFAULT NULL,
			`discount` DECIMAL(5, 2) DEFAULT NULL,
			`promotion` VARCHAR(255) DEFAULT NULL,
			`min_order` INT DEFAULT NULL,
			`reviews_numb` INT DEFAULT NULL,
			`views` INT DEFAULT 0,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `products_categories` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`parentid` INT(11) DEFAULT NULL,
			`position` INT(11) DEFAULT NULL,
			`name` VARCHAR(50) DEFAULT NULL,
			`alt_name` VARCHAR(50) DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`short_tpl` VARCHAR(40) DEFAULT NULL,
			`full_tpl` VARCHAR(40) DEFAULT NULL,
			`reviews` TINYINT(1) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE product_colors (
			id INT AUTO_INCREMENT PRIMARY KEY,
			product_id INT NOT NULL,
			color_name VARCHAR(50) NOT NULL,
			color_hex VARCHAR(7) NOT NULL,
			image_url VARCHAR(255) NOT NULL,
			FOREIGN KEY (product_id) REFERENCES products(id)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `products_reviews` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`user_id` INT(11) NOT NULL,
			`entity_id` INT(11) NOT NULL,
			`entity_type` VARCHAR(50) NOT NULL,
			`comment_text` TEXT NOT NULL,
			`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			INDEX (`user_id`),
			INDEX (`entity_id`,`entity_type`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `promocodes` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`code` VARCHAR(20) NOT NULL,
			`discount_percent` DECIMAL(5, 2) NOT NULL,
			`valid_from` DATE NOT NULL,
			`valid_to` DATE NOT NULL,
			`usage_limit` INT NOT NULL,
			`used_count` INT NOT NULL DEFAULT 0,
			PRIMARY KEY (`id`),
			UNIQUE KEY (`code`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `static_pages` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`date` DATE DEFAULT NULL,
			`title` VARCHAR(100) DEFAULT NULL,
			`alt_name` VARCHAR(190) DEFAULT NULL,
			`full_desc` MEDIUMTEXT DEFAULT NULL,
			`meta_desc` VARCHAR(300) DEFAULT NULL,
			`meta_keys` TEXT DEFAULT NULL,
			`views` INT DEFAULT 0,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `users` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`email` VARCHAR(50) DEFAULT NULL,
			`password` VARCHAR(255) DEFAULT NULL,
			`group` INT(11) DEFAULT NULL,
			`name` VARCHAR(50) DEFAULT NULL,
			`age` SMALLINT(6) DEFAULT NULL,
			`phone` VARCHAR(50) DEFAULT NULL,
			`city` VARCHAR(190) DEFAULT NULL,
			`gender` VARCHAR(20) DEFAULT NULL,
			`balance` DECIMAL(10,2) DEFAULT NULL,
			`avatar` VARCHAR(255) DEFAULT NULL,
			`bg_image` VARCHAR(255) DEFAULT NULL,
			`followers` INT(11) DEFAULT 0,
			`likes` INT(11) DEFAULT 0,
			`views` INT(11) DEFAULT 0,
			`bio` TEXT,
			`pay_methods` TEXT,
			`purchases` INT(11) DEFAULT 0,
			`sales` INT(11) DEFAULT 0,
			`income` DECIMAL(10,2) DEFAULT 0.00,
			`ads_posted` INT(11) DEFAULT 0,
			`news_posted` INT(11) DEFAULT 0,
			`products_posted` INT(11) DEFAULT 0,
			PRIMARY KEY (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',

		'CREATE TABLE IF NOT EXISTS `sales` (
			`id` INT(11) NOT NULL AUTO_INCREMENT,
			`product_id` INT(11) NOT NULL,
			`user_id` INT(11) NOT NULL,
			`quantity` INT NOT NULL,
			`sale_date` DATE NOT NULL,
			PRIMARY KEY (`id`),
			FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
			FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
		) ENGINE=INNODB DEFAULT CHARSET=utf8',
	];

	// Выполняем запросы на создание таблиц
	foreach ($createTables as $sql) {
		if ($db_connect->query($sql) !== TRUE) {
			echo "Ошибка при добавлении данных: " . $db_connect->error . "\n";
			$successFlag = false;
		}
	}

	// Массив с запросами на добавление данных в таблицы
	$addData = [
		// Добавление данных в таблицу `groups`
		"INSERT INTO `groups` (`id`,`name`,`create`,`read`,`update`,`del`,`vote`,`download`) VALUES (1, 'Администратор', 1, 1, 1, 1, 1, 1)",
		"INSERT INTO `groups` (`id`,`name`,`create`,`read`,`update`,`del`,`vote`,`download`) VALUES (2, 'Модератор', 0, 1, 1, 1, 1, 1)",
		"INSERT INTO `groups` (`id`,`name`,`create`,`read`,`update`,`del`,`vote`,`download`) VALUES (3, 'Автор', 0, 1, 1, 0, 1, 1)",
		"INSERT INTO `groups` (`id`,`name`,`create`,`read`,`update`,`del`,`vote`,`download`) VALUES (4, 'Редактор', 0, 1, 0, 0, 1, 1)",
		"INSERT INTO `groups` (`id`,`name`,`create`,`read`,`update`,`del`,`vote`,`download`) VALUES (5, 'Тех-Поддержка', 0, 1, 0, 0, 1, 1)",
		"INSERT INTO `groups` (`id`,`name`,`create`,`read`,`update`,`del`,`vote`,`download`) VALUES (6, 'Бета-тестер', 0, 1, 0, 0, 1, 1)",
		"INSERT INTO `groups` (`id`,`name`,`create`,`read`,`update`,`del`,`vote`,`download`) VALUES (7, 'Премиум-пользователь', 0, 1, 0, 0, 1, 1)",
		"INSERT INTO `groups` (`id`,`name`,`create`,`read`,`update`,`del`,`vote`,`download`) VALUES (8, 'Пользователь', 0, 1, 0, 0, 1, 1)",
		"INSERT INTO `groups` (`id`,`name`,`create`,`read`,`update`,`del`,`vote`,`download`) VALUES (9, 'Гость', 0, 1, 0, 0, 0, 0)",

		// Добавление данных в таблицу `news_categories`
		"INSERT INTO `news_categories` (`id`,`parentid`,`position`,`name`,`alt_name`,`meta_desc`,`meta_keys`,`short_tpl`,`full_tpl`,`comments`) VALUES (1, 0, 1, 'ew', 'science', '', '', 'short_news.tpl', 'full_news.tpl', 1)",
		"INSERT INTO `news_categories` (`id`,`parentid`,`position`,`name`,`alt_name`,`meta_desc`,`meta_keys`,`short_tpl`,`full_tpl`,`comments`) VALUES (2, 1, 2, 'Roofing', 'roofing', '', '', 'short_news.tpl', 'full_news.tpl', 1)",
		"INSERT INTO `news_categories` (`id`,`parentid`,`position`,`name`,`alt_name`,`meta_desc`,`meta_keys`,`short_tpl`,`full_tpl`,`comments`) VALUES (3, 1, 3, 'Siding', 'siding', '', '', 'short_news.tpl', 'full_news.tpl', 1)",
		"INSERT INTO `news_categories` (`id`,`parentid`,`position`,`name`,`alt_name`,`meta_desc`,`meta_keys`,`short_tpl`,`full_tpl`,`comments`) VALUES (4, 1, 4, 'Gutters', 'gutters', '', '', 'short_news.tpl', 'full_news.tpl', 1)",

		// Добавление данных в таблицу `static_pages`
		"INSERT INTO `static_pages` (`id`,`date`,`title`,`alt_name`,`full_desc`,`meta_desc`,`meta_keys`,`views`) VALUES (1, NOW(), 'Демонстрационная версия Skills.Energy', 'demonstration', 'Демонстрационная версия Skills.Energy', '', '', 0)",
		"INSERT INTO `static_pages` (`id`,`date`,`title`,`alt_name`,`full_desc`,`meta_desc`,`meta_keys`,`views`) VALUES (2, NOW(), 'Купить Skills Energy', 'license_buy', 'Купить Skills Energy', '', '', 0)",
		"INSERT INTO `static_pages` (`id`,`date`,`title`,`alt_name`,`full_desc`,`meta_desc`,`meta_keys`,`views`) VALUES (3, NOW(), 'Контакты', 'contacts', '<h5>Наши контакты:</h5>\n<div class=\"row\">\n <div class=\"col-12 col-md-6\">\n <p class=\"mb-0\">Github: <a href=\"https://github.com/brain-skills\" target=\"_blank\">https://github.com/brain-skills</a></p>\n </div>\n <div class=\"col-12 col-md-6\">\n <p class=\"mb-0\">E-mail: <a href=\"mailto:brain@skills.energy\" target=\"_blank\">brain@skills.energy</a></p>\n </div>\n <div class=\"col-12 col-md-6\">\n <p class=\"mb-0\">Discord: <a href=\"https://discord.gg/ZUNJMqxC9f\" target=\"_blank\">https://discord.gg/ZUNJMqxC9f</a></p>\n </div>\n <div class=\"col-12 col-md-6\">\n <p class=\"mb-0\">Telegram: <a href=\"https://t.me/gaga_usa\" target=\"_blank\">https://t.me/gaga_usa</a></p>\n </div>\n</div>\n\n<hr>\n\n<h5 class=\"mt-3\">Форма обратной связи:</h5>', '', '', 0)",
		"INSERT INTO `static_pages` (`id`,`date`,`title`,`alt_name`,`full_desc`,`meta_desc`,`meta_keys`,`views`) VALUES (4, NOW(), 'Лицензионное соглашение', 'license', '&lt;div style=&quot;font-size: 14px; line-height: 19px;&quot;&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: rgb(86, 156, 214); font-weight: bold;&quot;&gt;**Лицензионное соглашение для Skills Energy CMS**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;ВНИМАНИЕ: Это лицензионное соглашение (далее - &quot;Соглашение&quot;) между вами (физическим или юридическим лицом) и владельцем проекта Skills Energy CMS (далее - &quot;Владелец&quot;). Пожалуйста, внимательно ознакомьтесь с условиями данного Соглашения перед использованием данного программного продукта.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**1. Лицензионные ключи**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;1.1 Владелец предоставляет два типа лицензионных ключей для использования Skills Energy CMS: временный (на 1 год) и постоянный (навсегда).&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;1.2 Вам предоставляется право использовать Skills Energy CMS с лицензионным ключом в соответствии с условиями данного Соглашения.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**2. Коммерческое использование**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;2.1 Коммерческое использование Skills Energy CMS разрешено только при наличии соответствующего лицензионного ключа для конкретного домена.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;2.2 Если у вас нет действующего лицензионного ключа для указанного домена, коммерческое использование Skills Energy CMS запрещено.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**3. Временный лицензионный ключ**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;3.1 Временный лицензионный ключ предоставляет вам право использовать Skills Energy CMS в коммерческих целях только на указанном домене в течение одного года с момента активации ключа.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;3.2 По истечении срока действия временного лицензионного ключа, необходимо приобрести новый ключ или перейти на постоянный ключ для продолжения коммерческого использования на том же домене.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**4. Постоянный лицензионный ключ**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;4.1 Постоянный лицензионный ключ предоставляет вам бессрочное право на коммерческое использование Skills Energy CMS только на указанном домене.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;4.2 Владелец оставляет за собой все права к данной Skills Energy CMS, и пользователь не получает прав на воспроизводство, распространение, продажу, взлом, модификации, или создание производных продуктов на основе Skills Energy CMS.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**5. Ограничения и обязанности пользователя**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;5.1 Вы обязуетесь не распространять, не изменять и не создавать производные продукты на основе Skills Energy CMS без письменного разрешения Владельца.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;5.2 Запрещается продажа, взлом, модификации или попытки обхода лицензионных мер без письменного разрешения Владельца.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;5.3 Нарушение условий данного Соглашения может привести к прекращению лицензии и предъявлению юридических претензий.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**6. Завершающие положения**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;6.1 Данное Соглашение считается заключенным и действительным с момента начала использования Skills Energy CMS.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;6.2 Владелец оставляет за собой право в любой момент изменить условия данного Соглашения с предварительным уведомлением пользователя.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;font-style: italic;&quot;&gt;*© 2024 Skills Energy CMS. Все права защищены. Посетите официальный веб-сайт: [&lt;/span&gt;&lt;span style=&quot;color: #ce9178;font-style: italic;&quot;&gt;skills.energy&lt;/span&gt;&lt;span style=&quot;font-style: italic;&quot;&gt;](&lt;/span&gt;&lt;span style=&quot;text-decoration-line: underline;&quot;&gt;https://skills.energy&lt;/span&gt;&lt;span style=&quot;font-style: italic;&quot;&gt;).*&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;---------------------------------------------------------------&lt;/div&gt;&lt;div style=&quot;&quot;&gt;---------------------------------------------------------------&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**Skills Energy CMS License Agreement**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;ATTENTION: This is a license agreement (hereinafter referred to as the &quot;Agreement&quot;) between you (an individual or legal entity) and the owner of the Skills Energy CMS project (hereinafter referred to as the &quot;Owner&quot;). Please carefully read the terms of this Agreement before using this software product.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**1. License Keys**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;1.1 The Owner provides two types of license keys for using Skills Energy CMS: temporary (for 1 year) and permanent (forever).&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;1.2 You are granted the right to use Skills Energy CMS with a license key in accordance with the terms of this Agreement.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**2. Commercial Use**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;2.1 Commercial use of Skills Energy CMS is allowed only with the corresponding license key for a specific domain.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;2.2 If you do not have a valid license key for the specified domain, commercial use of Skills Energy CMS is prohibited.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**3. Temporary License Key**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;3.1 The temporary license key gives you the right to use Skills Energy CMS for commercial purposes only on the specified domain for one year from the activation date.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;3.2 Upon expiration of the temporary license key, you must purchase a new key or switch to a permanent key to continue commercial use on the same domain.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**4. Permanent License Key**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;4.1 The permanent license key grants you a perpetual right to use Skills Energy CMS only on the specified domain.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;4.2 The Owner retains all rights to Skills Energy CMS, and the user does not have the right to reproduce, distribute, sell, hack, modify, or create derivative products based on Skills Energy CMS.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**5. Restrictions and User Responsibilities**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;5.1 You agree not to distribute, modify, or create derivative products based on Skills Energy CMS without the written permission of the Owner.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;5.2 Sale, hacking, modification, or attempts to bypass license measures without the written permission of the Owner are strictly prohibited.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;5.3 Violation of the terms of this Agreement may result in license termination and legal action.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;color: #569cd6;font-weight: bold;&quot;&gt;**6. Concluding Provisions**&lt;/span&gt;&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;6.1 This Agreement is considered concluded and valid from the moment of starting to use Skills Energy CMS.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;6.2 The Owner reserves the right to change the terms of this Agreement at any time with prior notice to the user.&lt;/div&gt;&lt;br&gt;&lt;div style=&quot;&quot;&gt;&lt;span style=&quot;font-style: italic;&quot;&gt;*© 2024 Skills Energy CMS. All rights reserved. Visit the official website at [&lt;/span&gt;&lt;span style=&quot;color: rgb(206, 145, 120); font-style: italic;&quot;&gt;skills.energy&lt;/span&gt;&lt;span style=&quot;font-style: italic;&quot;&gt;](&lt;/span&gt;&lt;span style=&quot;text-decoration-line: underline;&quot;&gt;https://skills.energy&lt;/span&gt;&lt;span style=&quot;font-style: italic;&quot;&gt;).*&lt;/span&gt;&lt;/div&gt;&lt;/div&gt;', 'Лицензионное соглашение', 'Лицензионное соглашение', 0)",

		// Добавление данных в таблицу `users`
		"INSERT INTO `users` (`id`,`email`,`password`,`group`,`name`,`age`,`gender`,`phone`,`city`,`balance`,`avatar`,`bg_image`,`followers`,`likes`,`views`,`bio`,`pay_methods`,`purchases`,`sales`,`income`,`ads_posted`,`news_posted`,`products_posted`) VALUES (1,'web.pr@mail.ru','$hashPass',1,'Admin',33,'Мужчина','+995571911137','Minneapolis','100.00',CONCAT('uploads/profiles/2024/1/1/avatar.jpg'), 'uploads/profiles/2024/1/1/bg.jpg', 0, 0, 0, 'Админ - профессиональный администратор сайта из Америки. С опытом в обеспечении безопасности онлайн-платформ, Admin создал надежную среду для пользователей. Любит новые технологии и старается делать интернет простым и безопасным местом для всех.', 'Credit Card, PayPal', 0, 0, '0.00', 0, 0, 0)",
		"INSERT INTO `users` (`id`,`email`,`password`,`group`,`name`,`age`,`gender`,`phone`,`city`,`balance`,`avatar`,`bg_image`,`followers`,`likes`,`views`,`bio`,`pay_methods`,`purchases`,`sales`,`income`,`ads_posted`,`news_posted`,`products_posted`) VALUES (2,'geor.ka@mail.ru','$hashPass',2,'Giorgi',33,'Мужчина','+995571911137','Los Angeles','200.00',CONCAT('uploads/profiles/2024/1/2/avatar.jpg'), 'uploads/profiles/2024/1/2/bg.jpg', 0, 0, 0, 'Георгий - талантливый веб-разработчик из Америки. Специализируется на создании инновационных и интерактивных веб-приложений. Он вдохновляется идеей делиться знаниями и активно участвует в сообществе разработчиков для создания лучших веб-решений.', 'Bank Transfer, Bitcoin', 0, 0, '0.00', 0, 0, 0)",
		"INSERT INTO `users` (`id`,`email`,`password`,`group`,`name`,`age`,`gender`,`phone`,`city`,`balance`,`avatar`,`bg_image`,`followers`,`likes`,`views`,`bio`,`pay_methods`,`purchases`,`sales`,`income`,`ads_posted`,`news_posted`,`products_posted`) VALUES (3,'marixurtcidze93@mail.ru','$hashPass',2,'Mariami',30,'Женщина','+995571011137','New York City','400.00',CONCAT('uploads/profiles/2024/1/3/avatar.jpg'), 'uploads/profiles/2024/1/3/bg.jpg', 0, 0, 0, 'Мариами - творческий веб-разработчик из Америки. Её работы отличаются креативным дизайном и интуитивной навигацией. Она стремится создавать веб-проекты, которые не только функциональны, но и вдохновляют пользователей.', 'Cash, Apple Pay', 0, 0, '0.00', 0, 0, 0)",
		"INSERT INTO `users` (`id`,`email`,`password`,`group`,`name`,`age`,`gender`,`phone`,`city`,`balance`,`avatar`,`bg_image`,`followers`,`likes`,`views`,`bio`,`pay_methods`,`purchases`,`sales`,`income`,`ads_posted`,`news_posted`,`products_posted`) VALUES (4,'user@mail.ru','$hashPass',8,'User',30,'','+995571011137','','0.00','', '', 0, 0, 0, 'Тестовый пользователь сайта', 'Paytm, Venmo', 0, 0, '0.00', 0, 0, 0)",
	];

	// Выполнение запросов
	foreach ($addData as $sql) {
		if ($db_connect->query($sql) !== TRUE) {
			echo "Ошибка при добавлении данных: " . $db_connect->error . "\n";
			$successFlag = false;
		}
	}

	// Проверяем флаг и выводим сообщение
	if ($successFlag) {
		echo "Данные успешно добавлены\n";
	}