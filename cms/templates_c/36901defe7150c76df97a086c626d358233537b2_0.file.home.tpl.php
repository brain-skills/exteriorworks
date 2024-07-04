<?php
/* Smarty version 4.3.4, created on 2024-07-04 23:26:49
  from 'C:\Server\domains\Github\exteriorworks\cms\templates\main\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66870589a47f52_76690414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36901defe7150c76df97a086c626d358233537b2' => 
    array (
      0 => 'C:\\Server\\domains\\Github\\exteriorworks\\cms\\templates\\main\\home.tpl',
      1 => 1713478242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66870589a47f52_76690414 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Server\\domains\\Github\\exteriorworks\\cms\\engine\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\Server\\domains\\Github\\exteriorworks\\cms\\engine\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<h1>Добро пожаловать на главную страницу!</h1>
<p>Здесь вы можете добавить свое содержимое для главной страницы.</p>

<div class="row mt-3">
    <div class="col-12">
        <h4 class="mb-2">Список 10 последних новостей</h4>
        <!-- Вывод последних новостей -->
        <div class="swiper-container" id="latestNewsSwiper">
            <div class="swiper-wrapper">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['latestNews']->value, 'news');
$_smarty_tpl->tpl_vars['news']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->do_else = false;
?>
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-5">
                                <a href="/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['alt_name'];?>
">
                                    <span class="position-absolute float-start badge rounded-pill bg-dark m-1"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value['date'],"%d-%m-%Y");?>
</span>
                                    <img class="img-responsive max-wpx-250" src="../<?php echo $_smarty_tpl->tpl_vars['news']->value['image'];?>
" alt="">
                                </a>
                            </div>
                            <div class="col-7">
                                <a href="/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['alt_name'];?>
"><h6 class="text-primary"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['title'],55,"...");?>
</h6></a>
                                <p class="fs-7 mb-0"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['short_desc'],110,"...");?>
</p>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="manage-buttons mb-5">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <h4 class="mb-2">Список 10 самых популярных новостей</h4>
        <!-- Вывод популярных новостей -->
        <div class="swiper-container" id="popularNewsSwiper">
            <div class="swiper-wrapper">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['popularNews']->value, 'news');
$_smarty_tpl->tpl_vars['news']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->do_else = false;
?>
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-5">
                                <a href="/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['alt_name'];?>
">
                                    <span class="position-absolute float-start badge rounded-pill bg-dark m-1"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value['date'],"%d-%m-%Y");?>
</span>
                                    <img class="img-responsive max-wpx-250" src="../<?php echo $_smarty_tpl->tpl_vars['news']->value['image'];?>
" alt="">
                                </a>
                            </div>
                            <div class="col-7">
                                <a href="/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['alt_name'];?>
"><h6 class="text-primary"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['title'],55,"...");?>
</h6></a>
                                <p class="fs-7 mb-0"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['short_desc'],110,"...");?>
</p>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="manage-buttons mb-5">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <h4 class="mb-2">Список 10 самых просматриваемых новостей</h4>
        <!-- Вывод самых просматриваемых новостей -->
        <div class="swiper-container mb-5" id="mostViewedNewsSwiper">
            <div class="swiper-wrapper">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mostViewedNews']->value, 'news');
$_smarty_tpl->tpl_vars['news']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->do_else = false;
?>
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-5">
                                <a href="/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['alt_name'];?>
">
                                    <span class="position-absolute float-start badge rounded-pill bg-dark m-1"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value['date'],"%d-%m-%Y");?>
</span>
                                    <img class="img-responsive max-wpx-250" src="../<?php echo $_smarty_tpl->tpl_vars['news']->value['image'];?>
" alt="">
                                </a>
                            </div>
                            <div class="col-7">
                                <a href="/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['alt_name'];?>
"><h6 class="text-primary"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['title'],55,"...");?>
</h6></a>
                                <p class="fs-7 mb-0"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['news']->value['short_desc'],110,"...");?>
</p>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <div class="manage-buttons mb-5">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div><?php }
}
