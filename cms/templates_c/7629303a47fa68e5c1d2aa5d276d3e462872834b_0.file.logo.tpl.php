<?php
/* Smarty version 4.3.4, created on 2024-07-04 23:32:58
  from 'C:\Server\domains\Github\exteriorworks\cms\templates\main\modules\logo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_668706fa9dd1f1_64352410',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7629303a47fa68e5c1d2aa5d276d3e462872834b' => 
    array (
      0 => 'C:\\Server\\domains\\Github\\exteriorworks\\cms\\templates\\main\\modules\\logo.tpl',
      1 => 1713478242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_668706fa9dd1f1_64352410 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="px-md-4 px-2 pt-2 pb-2 brand" data-bs-theme="none">
	<div>
		<div class="d-flex align-items-center pt-2">
			<button class="btn d-inline-flex d-xl-none border-0 p-0 pe-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_Navbar">
				<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
					<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
					<path d="M4 6l16 0"></path>
					<path d="M4 12l16 0"></path>
					<path d="M4 18l16 0"></path>
				</svg>
			</button>
			<!--[ Start:: Brand Logo icon ]-->
			<a href="/" class="brand-icon d-flex align-items-center" title="">
				<img src="<?php echo $_smarty_tpl->tpl_vars['stheme']->value;?>
/images/logo.svg" class="d-none d-xl-inline-flex px-2" alt="">
				<span class="d-xl-none fs-3 ms-2">SE</span>
			</a>
		</div>
		<ul class="nav nav-tabs border border-1 rounded-1 d-none d-xl-inline-flex" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="btn border-0 bg-transparent rounded-1 text-muted fs-7" data-bs-toggle="dropdown" aria-expanded="false">Content Management System</a>
			</li>
		</ul>
	</div>
</div><?php }
}
