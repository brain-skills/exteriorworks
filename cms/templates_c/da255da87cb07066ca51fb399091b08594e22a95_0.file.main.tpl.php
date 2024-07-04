<?php
/* Smarty version 4.3.4, created on 2024-07-04 23:32:58
  from 'C:\Server\domains\Github\exteriorworks\cms\templates\main\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_668706fa634e91_94901655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da255da87cb07066ca51fb399091b08594e22a95' => 
    array (
      0 => 'C:\\Server\\domains\\Github\\exteriorworks\\cms\\templates\\main\\main.tpl',
      1 => 1720125177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./modules/head.tpl' => 1,
    'file:./modules/logo.tpl' => 1,
    'file:./search.tpl' => 1,
    'file:./modules/notifications.tpl' => 1,
    'file:./modules/theme.tpl' => 1,
    'file:./modules/leftside.tpl' => 1,
    'file:./modules/breadcrumbs.tpl' => 1,
    'file:./modules/footer.tpl' => 1,
    'file:./modules/bodyendscripts.tpl' => 1,
  ),
),false)) {
function content_668706fa634e91_94901655 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<?php $_smarty_tpl->_subTemplateRender("file:./modules/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body data-bvite="theme-CeruleanBlue" class="layout-border svgstroke-a layout-default box-layout rightbar-hide">
    <div id="iconBgAnimation">
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
        <div class="row"><div><div class="icon-container"></div></div></div>
    </div>
	<!-- start: main grid layout -->
	<main class="container px-0">

		<!-- start: project logo -->
		<?php $_smarty_tpl->_subTemplateRender("file:./modules/logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<!-- start: page header -->
		<header class="px-md-4 px-2" data-bs-theme="none">
			<div class="d-flex justify-content-between align-items-center py-2 w-100">
				<?php $_smarty_tpl->_subTemplateRender("file:./search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
			
				<ul class="header-menu flex-grow-1">
					<!--[ Start:: notification ]-->
					<?php if ($_smarty_tpl->tpl_vars['user_authenticated']->value) {?>
					<?php $_smarty_tpl->_subTemplateRender("file:./modules/notifications.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
					<li class="nav-item px-md-1">
						<div class="vr d-none d-sm-flex h-100 mx-sm-2"></div>
					</li>
					<?php }?>
					<!--[ Start:: theme light/dark ]-->
					<?php $_smarty_tpl->_subTemplateRender("file:./modules/theme.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
					<li class="nav-item px-md-1">
						<div class="vr d-none d-sm-flex h-100 mx-sm-2"></div>
					</li>
					<!--[ Start:: user detail ]-->
					<?php echo $_smarty_tpl->tpl_vars['login']->value;?>

				</ul>
			</div>
		</header>

		<!-- start: page menu link -->
		<?php $_smarty_tpl->_subTemplateRender("file:./modules/leftside.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<!-- start: breadcrumbs -->
		<?php $_smarty_tpl->_subTemplateRender("file:./modules/breadcrumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<!-- start: page body area -->
		<div class="ps-md-4 pe-md-3 px-3 py-3 page-body">
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		</div>

		<!-- start: page footer -->
		<?php $_smarty_tpl->_subTemplateRender("file:./modules/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	</main>

	<!-- start: bodyend scripts -->
	<?php $_smarty_tpl->_subTemplateRender("file:./modules/bodyendscripts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
