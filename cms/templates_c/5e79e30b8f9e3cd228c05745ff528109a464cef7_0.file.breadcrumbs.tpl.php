<?php
/* Smarty version 4.3.4, created on 2024-07-04 23:32:59
  from 'C:\Server\domains\Github\exteriorworks\cms\templates\main\modules\breadcrumbs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_668706fb1ddff3_50086483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e79e30b8f9e3cd228c05745ff528109a464cef7' => 
    array (
      0 => 'C:\\Server\\domains\\Github\\exteriorworks\\cms\\templates\\main\\modules\\breadcrumbs.tpl',
      1 => 1713478242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_668706fb1ddff3_50086483 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="px-md-4 px-2 py-2 page-header" data-bs-theme="none">
    <div class="d-flex align-items-center">
        <button class="btn d-none d-xl-inline-flex me-3 px-0 sidebar-toggle" type="button">
            <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                <path d="M9 4v16"></path>
                <path d="M15 10l-2 2l2 2"></path>
            </svg>
        </button>
        <ol class="breadcrumb mb-0 bg-transparent d-md-flex">
            <li class="breadcrumb-item"><a href="/" title="Главная"><img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/svg/home.svg" alt=""></a></li>
            <?php echo $_smarty_tpl->tpl_vars['page_name']->value;?>

        </ol>
    </div>
    <ul class="list-unstyled action d-flex align-items-center mb-0">
        <li class="d-xxl-inline-flex">
            <a class="btn px-0" type="button" href="?cart">
                <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                    <path fill="#9399a1" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607L1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4a2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4a2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2a1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2a1 1 0 0 1 0-2"/>
                </svg>
            </a>
        </li>
    </ul>
</div><?php }
}
