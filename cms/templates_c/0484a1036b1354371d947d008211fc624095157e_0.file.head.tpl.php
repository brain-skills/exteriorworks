<?php
/* Smarty version 4.3.4, created on 2024-07-04 23:32:58
  from 'C:\Server\domains\Github\exteriorworks\cms\templates\main\modules\head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_668706fa7e3831_65586158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0484a1036b1354371d947d008211fc624095157e' => 
    array (
      0 => 'C:\\Server\\domains\\Github\\exteriorworks\\cms\\templates\\main\\modules\\head.tpl',
      1 => 1718481812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_668706fa7e3831_65586158 (Smarty_Internal_Template $_smarty_tpl) {
?><head>
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <?php echo $_smarty_tpl->tpl_vars['charset']->value;?>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="<?php echo $_smarty_tpl->tpl_vars['generator']->value;?>
">
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
">
	<!--[ Favicon]-->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/images/favicons/apple-touch-icon.png">
	<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/images/favicons/64.png" sizes="64x64" type="image/png">
	<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/images/favicons/32.png" sizes="32x32" type="image/png">
	<link rel="icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/images/favicons/favicon.ico">
	<!--[ Template main css file ]-->
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/css/style.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/css/font-awesome.css">
	<!-- Template page js -->
	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/js/theme.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/js/main.js"><?php echo '</script'; ?>
>
	<?php if ((isset($_smarty_tpl->tpl_vars['homepage']->value))) {?>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/bundles/swiper/swiper.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/bundles/swiper/swiper-bundle.css">
		<style>
			.swiper-button-prev, .swiper-button-next {
				margin-top: 10px;
				position: absolute;
				z-index: 15;
			}
			.swiper-button-prev svg, .swiper-button-next svg {
				width: 10px;
			}
			.manage-buttons{
				position: relative !important;
			}
		</style>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/bundles/swiper/swiper.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/bundles/swiper/swiper-bundle.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/bundles/swiper/swiper-element.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
			document.addEventListener('DOMContentLoaded', function () {
				var mySwiper = new Swiper('.swiper-container', {
					slidesPerView: 1,
					spaceBetween: 10,
					loop: false,
					loopedSlides: 2,
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
					},
					breakpoints: {
						768: {
							slidesPerView: 2,
							spaceBetween: 10,
						},
						576: {
							slidesPerView: 1,
							spaceBetween: 10,
						},
					},
				});
			});
		<?php echo '</script'; ?>
>
	<?php }?>
</head><?php }
}
