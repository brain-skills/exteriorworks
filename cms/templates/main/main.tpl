<!doctype html>
<html lang="en">
{include file="./modules/head.tpl"}

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
		{include file="./modules/logo.tpl"}

		<!-- start: page header -->
		<header class="px-md-4 px-2" data-bs-theme="none">
			<div class="d-flex justify-content-between align-items-center py-2 w-100">
				{include file="./search.tpl"}
			
				<ul class="header-menu flex-grow-1">
					<!--[ Start:: notification ]-->
					{if $user_authenticated}
					{include file="./modules/notifications.tpl"}
					<li class="nav-item px-md-1">
						<div class="vr d-none d-sm-flex h-100 mx-sm-2"></div>
					</li>
					{/if}
					<!--[ Start:: theme light/dark ]-->
					{include file="./modules/theme.tpl"}
					<li class="nav-item px-md-1">
						<div class="vr d-none d-sm-flex h-100 mx-sm-2"></div>
					</li>
					<!--[ Start:: user detail ]-->
					{$login}
				</ul>
			</div>
		</header>

		<!-- start: page menu link -->
		{include file="./modules/leftside.tpl"}

		<!-- start: breadcrumbs -->
		{include file="./modules/breadcrumbs.tpl"}

		<!-- start: page body area -->
		<div class="ps-md-4 pe-md-3 px-3 py-3 page-body">
			{$content}
		</div>

		<!-- start: page footer -->
		{include file="./modules/footer.tpl"}
	</main>

	<!-- start: bodyend scripts -->
	{include file="./modules/bodyendscripts.tpl"}
</body>
</html>