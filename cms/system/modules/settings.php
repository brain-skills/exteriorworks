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

// Путь к config.php относительно текущего файла
$configFilePath = ENGINE_DIR . '/data/config.php';
require_once($configFilePath);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обновление массива конфигурации значениями из формы
    $config['title'] = $_POST['title'];
    $config['feedback_mail'] = $_POST['feedback_mail'];
    $config['date_adjust'] = $_POST['date_adjust'];
    $config['skin'] = $_POST['skin'];
    $config['cms_lang'] = $_POST['cms_lang'];
    $config['site_offline'] = $_POST['site_offline'];
    $config['description'] = $_POST['description'];
    $config['keywords'] = $_POST['keywords'];
    // Обновление конфигурации оптимизации
    
    // Обновление конфигурации объявлений
    $config['modules']['ads']['ads_per_page'] = $_POST['ads_per_page'];
    $config['modules']['ads']['ads_fromcats_per_page'] = $_POST['ads_fromcats_per_page'];
    $config['modules']['ads']['comments_limit'] = $_POST['ads_comments_limit'];
    $config['modules']['ads']['ads_short_tpl'] = $_POST['ads_short_tpl'];
    $config['modules']['ads']['ads_full_tpl'] = $_POST['ads_full_tpl'];
    // Обновление конфигурации файлов
    $config['modules']['files']['files_per_page'] = $_POST['files_per_page'];
    $config['modules']['files']['files_fromcats_per_page'] = $_POST['files_fromcats_per_page'];
    $config['modules']['files']['comments_limit'] = $_POST['files_comments_limit'];
    $config['modules']['files']['files_short_tpl'] = $_POST['files_short_tpl'];
    $config['modules']['files']['files_full_tpl'] = $_POST['files_full_tpl'];
    // Обновление конфигурации фильмов
    $config['modules']['movies']['movies_per_page'] = $_POST['movies_per_page'];
    $config['modules']['movies']['movies_fromcats_per_page'] = $_POST['movies_fromcats_per_page'];
    $config['modules']['movies']['comments_limit'] = $_POST['movies_comments_limit'];
    $config['modules']['movies']['movies_short_tpl'] = $_POST['movies_short_tpl'];
    $config['modules']['movies']['movies_full_tpl'] = $_POST['movies_full_tpl'];
    // Обновление конфигурации новостей
    $config['modules']['news']['news_per_page'] = $_POST['news_per_page'];
    $config['modules']['news']['news_fromcats_per_page'] = $_POST['news_fromcats_per_page'];
    $config['modules']['news']['comments_limit'] = $_POST['news_comments_limit'];
    $config['modules']['news']['news_short_tpl'] = $_POST['news_short_tpl'];
    $config['modules']['news']['news_full_tpl'] = $_POST['news_full_tpl'];
    // Обновление конфигурации товаров
    $config['modules']['products']['products_per_page'] = $_POST['products_per_page'];
    $config['modules']['products']['products_fromcats_per_page'] = $_POST['products_fromcats_per_page'];
    $config['modules']['products']['comments_limit'] = $_POST['products_comments_limit'];
    $config['modules']['products']['products_short_tpl'] = $_POST['products_short_tpl'];
    $config['modules']['products']['products_full_tpl'] = $_POST['products_full_tpl'];
    $config['modules']['products']['default_currency'] = $_POST['default_currency'];

    // Сохранение данных в $config
    $configContent = '<?php $config = ' . var_export($config, true) . ';';

    // Добавление пробела между => и array
    $configContent = preg_replace("/=>\s*array/", "=> array", $configContent);

    // Запись в файл $config
    file_put_contents($configFilePath, $configContent, LOCK_EX);
    
    exit();
}

$langValue = $config['cms_lang'];

// Проверка наличия файла языка и подключение
switch ($langValue) {
    case 'Русский':
        $langFile = ENGINE_DIR . '/lang/russian/admin.lng';
        break;
    case 'English':
        $langFile = ENGINE_DIR . '/lang/english/admin.lng';
        break;
    case 'ქართული':
        $langFile = ENGINE_DIR . '/lang/georgian/admin.lng';
        break;
    default:
        $langFile = ENGINE_DIR . '/lang/english/admin.lng';
}

$lang = require_once($langFile);

// Получение списка всех папок в директории templates/
$templateDir = 'templates/';
$skins = array_filter(glob($templateDir . '*'), 'is_dir');
$skins = array_map('basename', $skins);

// Устанавливаем массив переменных в Smarty
$yourData = array('title' => $lang['nav']['commonsettings'] . ' - Skills Energy');
$smarty->assign('data', $yourData);
$smarty->assign('page_name', '
    <li class="breadcrumb-item active">' . $lang['nav']['commonsettings'] . '</li>
');
$smarty->assign('theme', SYSTEM_DIR);
$smarty->assign('config', $config);
$smarty->assign('skins', $skins);