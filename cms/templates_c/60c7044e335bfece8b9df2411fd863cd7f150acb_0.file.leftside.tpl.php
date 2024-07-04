<?php
/* Smarty version 4.3.4, created on 2024-07-04 23:34:16
  from 'C:\Server\domains\Github\exteriorworks\cms\templates\main\modules\leftside.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66870748082068_92956594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60c7044e335bfece8b9df2411fd863cd7f150acb' => 
    array (
      0 => 'C:\\Server\\domains\\Github\\exteriorworks\\cms\\templates\\main\\modules\\leftside.tpl',
      1 => 1720125253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66870748082068_92956594 (Smarty_Internal_Template $_smarty_tpl) {
?><aside class="ps-3 pe-2 py-4 sidebar" data-bs-theme="none">
    <nav class="navbar navbar-expand-xl py-0">
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvas_Navbar">
            <div class="offcanvas-header">
                <div class="d-flex">
                    <a href="/se-cms/" class="brand-icon mx-3" title="">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/images/logo.svg" class="d-xl-inline-flex mt-3" alt="">
                    </a>
                </div>
                <button type="button" class="btn-close btn-close-white me-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-column custom_scroll ps-4 ps-xl-0">
                <!-- start: Workspace -->
                <h6 class="fl-title title-font ps-2 small text-uppercase text-muted" style="--text-color: var(--accent-color)">Все разделы</h6>
                <ul class="list-unstyled menu-list">
                    <li>
                        <a href="/" class="border-success" id="settingsLink">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/svg/home.svg" alt="">
                            <span class="mx-2">Главная страница</span>
                        </a>
                    </li>
                    <li>
                        <a href="/news" class="border-success" id="settingsLink">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/svg/news.svg" alt="">
                            <span class="mx-2">Новости / Обновления</span>
                        </a>
                    </li>
                    <li>
                        <a href="#allSectionsBlock" id="allSectionsList" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/svg/modules.svg" alt="">
                            <span class="mx-2">Демонстрация модулей</span>
                        </a>
                        <ul class="collapse list-unstyled" id="allSectionsBlock">
                            <li>
                                <a href="#news" id="newsList" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle fl5">Новости</a>
                                <ul class="collapse list-unstyled" id="news">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['news_categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                        <?php $_smarty_tpl->_assignInScope('translit_name', $_smarty_tpl->tpl_vars['category']->value['name']);?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['config']->value['translit_converter'], 'to', false, 'from');
$_smarty_tpl->tpl_vars['to']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['from']->value => $_smarty_tpl->tpl_vars['to']->value) {
$_smarty_tpl->tpl_vars['to']->do_else = false;
?>
                                            <?php $_smarty_tpl->_assignInScope('translit_name', str_replace($_smarty_tpl->tpl_vars['from']->value,$_smarty_tpl->tpl_vars['to']->value,$_smarty_tpl->tpl_vars['translit_name']->value));?>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        <?php $_smarty_tpl->_assignInScope('translit_name', str_replace(' ','_',$_smarty_tpl->tpl_vars['translit_name']->value));?>                                         <li><a href="/nc/<?php echo $_smarty_tpl->tpl_vars['category']->value['alt_name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['translit_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</a></li>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#info" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/svg/info.svg" alt="">
                            <span class="mx-2">Информация</span>
                        </a>
                        <ul class="collapse list-unstyled" id="info">
                            <li><a href="/license">Лицензионное соглашение</a></li>
                            <li><a href="#">Системные требования</a></li>
                            <li><a href="#">Возможности Smart Engine</a></li>
                            <li><a href="#">Видеоинструкции</a></li>
                            <li><a href="#">Техническая поддержка</a></li>
                            <li><a href="https://docs.skills.energy/">Онлайн документация</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/demonstration" class="border-success" id="demonstration">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/svg/download.svg" alt="">
                            <span class="mx-2">Демо</span>
                        </a>
                    </li>
                    <li>
                        <a href="/license_buy" class="border-success" id="license_buy">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/svg/buy.svg" alt="">
                            <span class="mx-2">Купить</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://forum.skills.energy" class="border-success" id="settingsLink">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/svg/forum.svg" alt="">
                            <span class="mx-2">Форум</span>
                        </a>
                    </li>
                    <li>
                        <a href="/contacts" class="border-success" id="contacts">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/svg/mail.svg" alt="">
                            <span class="mx-2">Наши контакты</span>
                        </a>
                    </li>
                </ul>
                <div class="bg-gradient rounded-3 p-4 text-white promo">
                    <a href="#" class="btn btn-sm w-100 btn-dark" id="docsLink" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="bottom" data-bs-content="Текущая актуальная версия CMS Skills Energy.">
                        Актуальная версия: <b>1.0</b>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</aside>

<?php echo '<script'; ?>
>
    document.addEventListener('DOMContentLoaded', function() {
        // Получить текущий путь страницы
        var currentPath = window.location.pathname;
        // Найти ссылку с соответствующим атрибутом href
        var activeLink = document.querySelector('a[href="' + currentPath + '"]');
        // Проверить, найден ли элемент
        if (activeLink) {
            activeLink.classList.add('active');
        }
    });
<?php echo '</script'; ?>
><?php }
}
