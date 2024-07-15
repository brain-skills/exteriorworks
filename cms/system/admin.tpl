<!doctype html>
<html lang="en">
<head>
	<title>{$data.title}</title>
	{$charset}
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{$description}">
	<meta name="keyword" content="{$keywords}">
	<!--[ Favicon]-->
	<link rel="apple-touch-icon" sizes="180x180" href="{$stheme}/images/favicons/apple-touch-icon.png">
	<link rel="icon" href="{$stheme}/images/favicons/64.png" sizes="64x64" type="image/png">
	<link rel="icon" href="{$stheme}/images/favicons/32.png" sizes="32x32" type="image/png">
	<link rel="icon" type="image/x-icon" href="{$stheme}/images/favicons/favicon.ico">
	<!--[ Template main css file ]-->
	<link rel="stylesheet" href="{$stheme}/css/bootstrap.css">
	<link rel="stylesheet" href="{$stheme}/css/style.css">
	<link rel="stylesheet" href="{$stheme}/css/font-awesome.css">
	<!-- Template page js -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="{$stheme}/js/bootstrap.bundle.min.js"></script>
	<script src="{$stheme}/js/theme.js"></script>
	<script src="{$stheme}/js/main.js"></script>
	<style>
        .modal {
            display: none;
        }
    </style>
</head>

<body data-bvite="theme-CeruleanBlue" class="layout-border svgstroke-a layout-default box-layout app-chat rightbar-hide">
	<!-- start: main grid layout -->
	<main class="container-fluid px-0">
		<!-- start: project logo -->
		<div class="px-md-4 px-3 pt-2 pb-2 brand" data-bs-theme="none">
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
					<a href="{$currentDir}" class="brand-icon d-flex align-items-center" title="">
						<img src="{$stheme}/images/logo.svg" class="d-none d-xl-inline-flex px-2" alt="">
						<span class="d-xl-none fs-3 ms-2">{$lang.cms.shortname}</span>
					</a>
				</div>
				<ul class="nav nav-tabs border border-1 rounded-1 d-none d-xl-inline-flex" role="tablist">
					<li class="nav-item" role="presentation">
						<a type="button" class="btn border-0 bg-transparent rounded-1 dropdown-toggle text-muted fs-7" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-linode"></i> Content Management System</a>
						<ul class="dropdown-menu p-2 shadow rounded-1">
							<li><a class="dropdown-item px-2 rounded-1 active" href="#"><i class="fa fa-linode"></i> Content Management System</a></li>
							<li><a class="dropdown-item px-2 rounded-1 text-muted"><i class="fa fa-comment-o"></i> CPT chat (coming soon)</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="d-none layout-a-action">
				<div class="mb-2">
					<a class="d-flex align-items-center lh-sm p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="User">
						<img class="avatar rounded-circle border border-3 shadow" src="{$avatar}" alt="avatar">
					</a>
					<div class="dropdown-menu dropdown-menu-end shadow p-2 p-xl-3 rounded-2">
						<div class="bg-body p-3 rounded-3">
							<h4 class="mb-1 title-font text-gradient">{$name}</h4>
							<p class="small text-muted mb-2"><b>{$lang.header.email}:</b> {$user_email}</p>
							<p class="small text-muted mb-0"><b>{$lang.header.group}:</b> {$group_name}</p>
						</div>
						<ul class="list-unstyled mt-2">
							<li>
								<a class="dropdown-item rounded-1" aria-label="my wallet" href="{$currentDir}?action=balance">
									<span class="align-middle">{$lang.header.balance}: <span class="fw-bold text-success"><span data-purecounter-start="0" data-purecounter-separator="," data-purecounter-currency="$" data-purecounter-end="{$balance}" class="purecounter">0</span></span></span>
								</a>
							</li>
							<a class="dropdown-item rounded-1" href="{$currentDir}?action=profile">{$lang.header.psettings}</a>
							<li class="dropdown-divider"></li>
						</ul>
						<a class="btn py-2 btn-primary w-100 mt-2 rounded-1" href="engine/logout.php">
							<img src="{$stheme}/svg/logout.svg" alt="">
							<span style="top: 1.5px; left:3px; position: relative;">{$lang.header.logout}</span>
						</a>
						<div class="mt-2 text-center small">
							<a class="text-muted me-1" href="#!">{$lang.header.policy}</a>•<a class="text-muted mx-1" href="#!">{$lang.header.terms}</a>•<a class="text-muted ms-1" href="#!">{$lang.header.cookies}</a>
						</div>
					</div>
				</div>
				<a href="#" class="btn p-1" title="Sign out">
					<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						<path d="M7 6a7.75 7.75 0 1 0 10 0"></path>
						<path d="M12 4l0 8"></path>
					</svg>
				</a>
			</div>
		</div>

		<!-- start: page header -->
		<header class="px-md-4 px-3" data-bs-theme="none">
			<div class="d-flex justify-content-between align-items-center py-2 w-100">
				<button type="button" class="btn text-accent btn-link p-0 me-3 d-none d-md-inline-flex" data-bs-toggle="modal" data-bs-target="#FullscreenMenu">
					<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
						<path d="M5 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
						<path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
						<path d="M19 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
						<path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
						<path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
						<path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
						<path d="M5 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
						<path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
						<path d="M19 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
					</svg>
				</button>
				<!--[ Start:: Full screen modal popup menu ]-->
				<div class="modal fade" id="FullscreenMenu" tabindex="-1" aria-labelledby="FullscreenMenu" aria-hidden="true" data-bs-theme="dark">
					<div class="modal-dialog modal-fullscreen">
						<div class="modal-content border-4 border border-primary">
							<div class="modal-header border-0">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body custom_scroll">
								<div class="container-xxl">
									<h5 class="text-light fw-light">Application</h5>
									123
								</div>
							</div>
						</div>
					</div>
				</div>

				<form class="dropdown main-search me-md-4 w-50 d-none d-md-inline-flex">
					<div class="w-100" data-bs-toggle="dropdown" data-bs-auto-close="outside">
						<svg class="svg-stroke search-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
							<path d="M21 21l-6 -6"></path>
						</svg>
						<input type="text" class="form-control" placeholder="{$lang.header.search}">
					</div>
					<div class="dropdown-menu shadow rounded-2 p-3 px-4 pt-4 w-100">
						<h6 class="fl-title" style="--text-color: var(--theme-color1)">Последние запросы</h6>
						<div class="tagcloud mb-4">
							<a href="#" class="tag-link rounded-1 border px-3" style="--hover-color: var(--theme-color1)">Главная</a>
							<a href="#" class="tag-link rounded-1 border px-3" style="--hover-color: var(--theme-color2)">О нас</a>
							<a href="#" class="tag-link rounded-1 border px-3" style="--hover-color: var(--theme-color1)">Контакты</a>
						</div>
						<h6 class="fl-title" style="--text-color: var(--theme-color2)">Прикреплённые разделы</h6>
						<div class="tagcloud mb-0">
							<a href="#" class="tag-link rounded-1 border px-3 mb-2" style="--hover-color: var(--theme-color1)">Главная</a>
							<a href="#" class="tag-link rounded-1 border px-3 mb-2" style="--hover-color: var(--theme-color2)">О нас</a>
							<a href="#" class="tag-link rounded-1 border px-3 mb-2" style="--hover-color: var(--theme-color3)">Услуги</a>
							<a href="#" class="tag-link rounded-1 border px-3 mb-2" style="--hover-color: var(--theme-color4)">Новости</a>
							<a href="#" class="tag-link rounded-1 border px-3 mb-2" style="--hover-color: var(--theme-color5)">Товары</a>
							<a href="#" class="tag-link rounded-1 border px-3 mb-2" style="--hover-color: var(--theme-color6)">Контакты</a>
						</div>
					</div>
				</form>
			
				<ul class="header-menu flex-grow-1">
					<!--[ Start:: notification ]-->
					<li class="nav-item dropdown px-md-1 d-none d-md-inline-flex">
						<a class="dropdown-toggle gray-6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="{$lang.header.notifications}">
							<span class="bullet-dot bg-primary animation-blink"></span>
							<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
								<path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
								<path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
								<path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
							 </svg>
						</a>
						<div class="dropdown-menu shadow rounded-2 notification" id="NotificationsDiv">
							<div class="card border-0">
								<div class="card-header d-flex justify-content-between align-items-center py-2">
									<h4 class="mb-0 text-gradient title-font">{$lang.header.notifications}</h4>
									<a href="#" class="btn btn-link" title="view all">{$lang.header.all}</a>
								</div>
								<ul class="card-body p-0 list-unstyled mb-0 custom_scroll ps-2" style="height: 400px;">
									<li class="pe-2">
										<a class="d-flex p-lg-3 p-2 rounded-3" href="javascript:void(0);">
											<div class="avatar sm">
												<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3"></path>
												</svg>
											</div>
											<div class="flex-fill ms-3">
												<span class="d-flex justify-content-between"><small class="text-primary">Holiday Sale</small><small class="text-muted">11:30 AM Today</small></span>
												<p class="mb-0 mt-1">Your New Campaign sale live on themeforest and our store is approved.</p>
											</div>
										</a>
									</li>
									<li class="pe-2">
										<a class="d-flex p-lg-3 p-2 rounded-3" href="javascript:void(0);">
											<div class="avatar sm">
												<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
													<path d="M18 14v4h4"></path>
													<path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
													<path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
													<path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
													<path d="M8 11h4"></path>
													<path d="M8 15h3"></path>
												</svg>
											</div>
											<div class="flex-fill ms-3">
												<span class="d-flex justify-content-between"><small class="text-info">Reports</small><small class="text-muted">04:00 PM Today</small></span>
												<p class="mb-0 mt-1">Website visits from Twitter is 27% higher than last week.</p>
											</div>
										</a>
									</li>
									<li class="pe-2">
										<a class="d-flex p-lg-3 p-2 rounded-3 align-items-start" href="javascript:void(0);">
											<div class="avatar sm">
												<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
													<path d="M12 8v4"></path>
													<path d="M12 16h.01"></path>
												</svg>
											</div>
											<div class="flex-fill ms-3">
												<span class="d-flex justify-content-between"><small class="text-warning">HTML Code</small><small class="text-muted">1day</small></span>
												<p class="mb-0 mt-1">Update new code in github and share deteail</p>
											</div>
										</a>
									</li>
									<li class="pe-2">
										<a class="d-flex p-lg-3 p-2 rounded-3" href="javascript:void(0);">
											<div class="avatar sm">
												<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
													<path d="M12 8v4"></path>
													<path d="M12 16h.01"></path>
												</svg>
											</div>
											<div class="flex-fill ms-3">
												<span class="d-flex justify-content-between"><small class="text-danger">Error 404</small><small class="text-muted">Yesterday</small></span>
												<p class="mb-0 mt-1">SE admin template on website analytics configurations</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class="nav-item dropdown px-md-1 d-none d-md-inline-flex">
						<a class="dropdown-toggle gray-6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="{$lang.header.messages}">
							<span class="bullet-dot bg-primary animation-blink"></span>
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
								<path fill="currentColor" d="M3 20.077V4.615q0-.69.463-1.152Q3.925 3 4.615 3h14.77q.69 0 1.152.463q.463.462.463 1.152v10.77q0 .69-.462 1.153q-.463.462-1.153.462H6.077zM5.65 16h13.735q.23 0 .423-.192q.192-.193.192-.423V4.615q0-.23-.192-.423Q19.615 4 19.385 4H4.615q-.23 0-.423.192Q4 4.385 4 4.615v13.03zM4 16V4z"/>
							</svg>
						</a>
						<div class="dropdown-menu shadow rounded-2 notification" id="NotificationsDiv">
							<div class="card border-0">
								<div class="card-header d-flex justify-content-between align-items-center py-2">
									<h4 class="mb-0 text-gradient title-font">{$lang.header.messages}</h4>
									<a href="#" class="btn btn-link" title="view all">{$lang.header.all}</a>
								</div>
								<ul class="card-body p-0 list-unstyled mb-0 custom_scroll ps-2" style="height: 400px;">
									<li class="pe-2">
										<a class="d-flex p-lg-3 p-2 rounded-3" href="javascript:void(0);">
											<div class="avatar sm">
												<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3"></path>
												</svg>
											</div>
											<div class="flex-fill ms-3">
												<span class="d-flex justify-content-between"><small class="text-primary">Holiday Sale</small><small class="text-muted">11:30 AM Today</small></span>
												<p class="mb-0 mt-1">Your New Campaign sale live on themeforest and our store is approved.</p>
											</div>
										</a>
									</li>
									<li class="pe-2">
										<a class="d-flex p-lg-3 p-2 rounded-3" href="javascript:void(0);">
											<div class="avatar sm">
												<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
													<path d="M18 14v4h4"></path>
													<path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
													<path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
													<path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
													<path d="M8 11h4"></path>
													<path d="M8 15h3"></path>
												</svg>
											</div>
											<div class="flex-fill ms-3">
												<span class="d-flex justify-content-between"><small class="text-info">Reports</small><small class="text-muted">04:00 PM Today</small></span>
												<p class="mb-0 mt-1">Website visits from Twitter is 27% higher than last week.</p>
											</div>
										</a>
									</li>
									<li class="pe-2">
										<a class="d-flex p-lg-3 p-2 rounded-3 align-items-start" href="javascript:void(0);">
											<div class="avatar sm">
												<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
													<path d="M12 8v4"></path>
													<path d="M12 16h.01"></path>
												</svg>
											</div>
											<div class="flex-fill ms-3">
												<span class="d-flex justify-content-between"><small class="text-warning">HTML Code</small><small class="text-muted">1day</small></span>
												<p class="mb-0 mt-1">Update new code in github and share deteail</p>
											</div>
										</a>
									</li>
									<li class="pe-2">
										<a class="d-flex p-lg-3 p-2 rounded-3" href="javascript:void(0);">
											<div class="avatar sm">
												<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
													<path d="M12 8v4"></path>
													<path d="M12 16h.01"></path>
												</svg>
											</div>
											<div class="flex-fill ms-3">
												<span class="d-flex justify-content-between"><small class="text-danger">Error 404</small><small class="text-muted">Yesterday</small></span>
												<p class="mb-0 mt-1">SE admin template on website analytics configurations</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class="nav-item py-2 py-md-1 col-auto">
						<div class="vr d-none d-sm-flex h-100 mx-sm-2"></div>
					</li>
					<!--[ Start:: site url ]-->
					<li class="nav-item px-md-1">
						<a class="gray-6" href="/" target="_blank" title="Site">
							<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
								<path d="M3.6 9h16.8"></path>
								<path d="M3.6 15h16.8"></path>
								<path d="M11.5 3a17 17 0 0 0 0 18"></path>
								<path d="M12.5 3a17 17 0 0 1 0 18"></path>
							</svg>
						</a>
					</li>
					<!--[ Start:: theme light/dark ]-->
					<li class="nav-item dropdown px-md-1 d-md-inline-flex">
						<a class="dropdown-toggle gray-6" href="#" id="bd-theme" data-bs-toggle="dropdown" aria-expanded="false">
							<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" class="theme-icon-active"><use href="#sun-fill"></use></svg>
						</a>
						<ul class="dropdown-menu dropdown-menu-end p-2 p-xl-3 shadow rounded-2" aria-labelledby="bd-theme">
							<li class="mb-1"><a class="themelink dropdown-item rounded-1" href="#" data-bs-theme-value="light"><svg class="avatar xs me-2 opacity-50 theme-icon" fill="currentColor"><use href="#sun-fill"></use></svg> Light</a></li>
							<li class="mb-1"><a class="themelink dropdown-item rounded-1" href="#" data-bs-theme-value="dark"><svg class="avatar xs me-2 opacity-50 theme-icon" fill="currentColor"><use href="#moon-stars-fill"></use></svg> Dark</a></li>
							<li class="mb-1"><a class="themelink dropdown-item rounded-1" href="#" data-bs-theme-value="auto"><svg class="avatar xs me-2 opacity-50 theme-icon" fill="currentColor"><use href="#circle-half"></use></svg> Auto (AM|PM)</a></li>
						</ul>						
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="display: none;">
							<symbol id="sun-fill" viewBox="0 0 16 16">
								<path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
							</symbol>
							<symbol id="moon-stars-fill" viewBox="0 0 16 16">
								<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
								<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
							</symbol>
							<symbol id="circle-half" viewBox="0 0 16 16">
								<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
							</symbol>
						</svg>
					</li>
					<li class="nav-item py-2 py-md-1 col-auto">
						<div class="vr d-none d-sm-flex h-100 mx-sm-2"></div>
					</li>
					<!--[ Start:: user detail ]-->
					<li class="nav-item user ms-3">
						<a class="dropdown-toggle gray-6 d-flex text-decoration-none align-items-center lh-sm p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="User" data-bs-auto-close="outside">
							<img class="avatar rounded-1 border border-3" src="{$avatar}" alt="avatar">
							<span class="ms-2 fs-6 d-none d-sm-inline-flex">{$name}</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end shadow p-2 p-xl-3 rounded-2">
							<div class="bg-body p-3 rounded-3">
								<h4 class="mb-1 title-font text-gradient">{$name}</h4>
								<p class="small text-muted mb-2"><b>{$lang.header.email}:</b> {$user_email}</p>
								<p class="small text-muted mb-0"><b>{$lang.header.group}:</b> {$group_name}</p>
							</div>
							<ul class="list-unstyled mt-2">
								<li>
									<a class="dropdown-item rounded-1" aria-label="my wallet" href="my-wallet.html">
										<span class="align-middle">{$lang.header.balance}: <span class="fw-bold text-success"><span data-purecounter-start="0" data-purecounter-separator="," data-purecounter-currency="$" data-purecounter-end="{$balance}" class="purecounter">0</span></span></span>
									</a>
								</li>
								<a class="dropdown-item rounded-1" href="{$currentDir}?action=profile">{$lang.header.psettings}</a>
								<li class="dropdown-divider"></li>
							</ul>
							<a class="btn py-2 btn-primary w-100 mt-2 rounded-1" href="#" onclick="logout(event)">
								<img src="{$stheme}/svg/logout.svg" alt="">
								<span style="top: 1.5px; left:3px; position: relative;">{$lang.header.logout}</span>
							</a>
							<script>
								function logout(event) {
									var xhr = new XMLHttpRequest();
									xhr.open('GET', 'engine/logout.php', true);
									xhr.onload = function () {
										location.reload();
									};
									xhr.send();
									event.preventDefault();
								}
							</script>
							<div class="mt-2 text-center small">
								<a class="text-muted me-1" href="#!">{$lang.header.policy}</a>•<a class="text-muted mx-1" href="#!">{$lang.header.terms}</a>•<a class="text-muted ms-1" href="#!">{$lang.header.cookies}</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</header>

		<!-- start: page menu link -->
		<aside class="ps-3 pe-2 py-3 sidebar" data-bs-theme="none">
			<nav class="navbar navbar-expand-xl py-0">
				<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvas_Navbar">
					<div class="offcanvas-header">
						<div class="d-flex">
							<a href="{$currentDir}" class="brand-icon me-2" title="">
								<img src="{$stheme}/images/logo.svg" class="d-xl-inline-flex" alt="">
							</a>
						</div>
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body flex-column custom_scroll ps-4 ps-xl-0">
						<ul class="list-unstyled mb-4 menu-list">
							<li>
								<a href="#chartsBlock" id="chartsSection" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-label="charts">
									<img src="{$stheme}/svg/category.svg" alt="">
									<span class="mx-2">{$lang.nav.chartssection}</span>
								</a>
								<ul class="collapse list-unstyled" id="chartsBlock">
									<li><a href="{$currentDir}" class="fl1" id="commonCharts">{$lang.nav.commoncharts}</a></li>
									<li><a href="{$currentDir}?action=ads-charts" class="fl2" id="adsCharts">{$lang.nav.adscharts}</a></li>
									<li><a href="{$currentDir}?action=files-charts" class="fl3" id="filesCharts">{$lang.nav.filescharts}</a></li>
									<li><a href="{$currentDir}?action=movies-charts" class="fl4" id="moviesCharts">{$lang.nav.moviescharts}</a></li>
									<li><a href="{$currentDir}?action=news-charts" class="fl5" id="newsCharts">{$lang.nav.newscharts}</a></li>
									<li><a href="{$currentDir}?action=products-charts" class="fl6" id="productsCharts">{$lang.nav.productscharts}</a></li>
								</ul>
							</li>
							<li>
								<a href="#settingsBlock" id="settingsSection" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-label="settings">
									<img src="{$stheme}/svg/settings.svg" alt="">
									<span class="mx-2">{$lang.nav.settingssection}</span>
								</a>
								<ul class="collapse list-unstyled" id="settingsBlock">
									<li><a href="{$currentDir}?action=settings" id="commonSettings">{$lang.nav.commonsettings}</a></li>
									<li><a href="{$currentDir}?action=payment-systems" id="paymentSystems">{$lang.nav.paymentsystems}</a></li>
									<li><a href="{$currentDir}?action=alert-settings" id="alertSettings">{$lang.nav.alertsettings}</a></li>
									<li><a href="{$currentDir}?action=language-settings" id="languageSettings">{$lang.nav.languagesettings}</a></li>
								</ul>
							</li>
							<li>
								<a href="#usersBlock" id="usersSection" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-label="users">
									<img src="{$stheme}/svg/users.svg" alt="">
									<span class="mx-2">{$lang.nav.userssection}</span>
								</a>
								<ul class="collapse list-unstyled" id="usersBlock">
									<li><a href="{$currentDir}?action=users" id="userManagement">{$lang.nav.usermanagement}</a></li>
									<li><a href="{$currentDir}?action=roles-and-rights" id="rolesAndRights">{$lang.nav.rolesandrights}</a></li>
									<li><a href="{$currentDir}?action=message-distribution-managing" id="messageDistributionManaging">{$lang.nav.messagedistributionmanaging}</a></li>
									<li><a href="{$currentDir}?action=surveys" id="userSurveys">{$lang.nav.usersurveys}</a></li>
								</ul>
							</li>
							<li>
								<a href="#categoriesBlock" id="categoriesSection" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-label="categories">
									<img src="{$stheme}/svg/category.svg" alt="">
									<span class="mx-2">{$lang.nav.categoriessection}</span>
								</a>
								<ul class="collapse list-unstyled" id="categoriesBlock">
									<li><a href="{$currentDir}?action=ads-categories" class="fl2" id="adsCategoriesList">{$lang.nav.adscategorieslist}</a></li>
									<li><a href="{$currentDir}?action=files-categories" class="fl3" id="filesCategoriesList">{$lang.nav.filescategorieslist}</a></li>
									<li><a href="{$currentDir}?action=movies-categories" class="fl4" id="moviesCategoriesList">{$lang.nav.moviescategorieslist}</a></li>
									<li><a href="{$currentDir}?action=news-categories" class="fl5" id="newsCategoriesList">{$lang.nav.newscategorieslist}</a></li>
									<li><a href="{$currentDir}?action=products-categories" class="fl6" id="productsCategoriesList">{$lang.nav.productscategorieslist}</a></li>
								</ul>
							</li>
							<li>
								<a href="#contentBlock" id="contentSection" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-label="content">
									<img src="{$stheme}/svg/category.svg" alt="">
									<span class="mx-2">{$lang.nav.contentsection}</span>
								</a>
								<ul class="collapse list-unstyled" id="contentBlock">
									<li><a href="/admin?action=add-pages" class="float-end" id="addPages"><i class="fa fa-plus color1 mt-1"></i></a></li>
									<li><a href="{$currentDir}?action=pages" class="fl1" id="pagesList">{$lang.nav.pageslist}</a></li>
									<li><a href="/admin?action=add-ads" class="float-end" id="addAds"><i class="fa fa-plus color2 mt-1"></i></a></li>
									<li><a href="{$currentDir}?action=ads" class="fl2" id="adsList">{$lang.nav.adslist}</a></li>
									<li><a href="/admin?action=add-files" class="float-end" id="addFiles"><i class="fa fa-plus color3 mt-1"></i></a></li>
									<li><a href="{$currentDir}?action=files" class="fl3" id="filesList">{$lang.nav.fileslist}</a></li>
									<li><a href="/admin?action=add-movies" class="float-end" id="addMovies"><i class="fa fa-plus color4 mt-1"></i></a></li>
									<li><a href="{$currentDir}?action=movies" class="fl4" id="moviesList">{$lang.nav.movieslist}</a></li>
									<li><a href="/admin?action=add-news" class="float-end" id="addNews"><i class="fa fa-plus color5 mt-1"></i></a></li>
									<li><a href="{$currentDir}?action=news" class="fl5" id="newsList">{$lang.nav.newslist}</a></li>
									<li><a href="/admin?action=add-products" class="float-end" id="addProducts"><i class="fa fa-plus color6 mt-1"></i></a></li>
									<li><a href="{$currentDir}?action=products" class="fl6" id="productsList">{$lang.nav.productslist}</a></li>
								</ul>
							</li>
							<li>
								<a href="#filesAndTemplates" id="fatSection" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-label="fat">
									<img src="{$stheme}/svg/edit.svg" alt="">
									<span class="mx-2">{$lang.nav.fatsection}</span>
								</a>
								<ul class="collapse list-unstyled" id="filesAndTemplates">
									<li><a href="{$currentDir}?action=file-management" id="fileManagement">{$lang.nav.filemanagement}</a></li>
									<li><a href="{$currentDir}?action=website-templates" id="websiteTemplates">{$lang.nav.websitetemplates}</a></li>
									<li><a href="{$currentDir}?action=email-templates" id="emailTemplates">{$lang.nav.emailtemplates}</a></li>
								</ul>
							</li>
							<li>
								<a href="#ordersAndApplications" id="oaaSection" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-label="oaa">
									<img src="{$stheme}/svg/edit.svg" alt="">
									<span class="mx-2">{$lang.nav.oaasection}</span>
								</a>
								<ul class="collapse list-unstyled" id="ordersAndApplications">
									<li><a href="{$currentDir}?action=orders" id="allOrders">{$lang.nav.allorders}</a></li>
									<li><a href="{$currentDir}?action=promocodes" id="allPromocodes">{$lang.nav.allpromocodes}</a></li>
									<li><a href="{$currentDir}?action=payment-history" id="paymentHistory">{$lang.nav.paymenthistory}</a></li>
									<li><a href="{$currentDir}?action=feedback-requests" id="feedbackRequests">{$lang.nav.feedbackrequests}</a></li>
									<li><a href="{$currentDir}?action=support-requests" id="supportRequests">{$lang.nav.supportrequests}</a></li>
									<li><a href="{$currentDir}?action=complaints" id="allComplaints">{$lang.nav.allcomplaints}</a></li>
								</ul>
							</li>
							<li>
								<a href="#seoOptimization" id="seoSection" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-label="seo">
									<img src="{$stheme}/svg/edit.svg" alt="">
									<span class="mx-2">{$lang.nav.seosection}</span>
								</a>
								<ul class="collapse list-unstyled" id="seoOptimization">
									<li><a href="{$currentDir}?action=seo-settings" id="seoSettings">{$lang.nav.seosettings}</a></li>
									<li><a href="{$currentDir}?action=sitemaps" id="siteMaps">{$lang.nav.sitemaps}</a></li>
									<li><a href="{$currentDir}?action=website-promotion" id="websitePromotion">{$lang.nav.websitepromotion}</a></li>
								</ul>
							</li>
							<li>
								<a href="#widgetsAndBanners" id="wabSection" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-label="wab">
									<img src="{$stheme}/svg/edit.svg" alt="">
									<span class="mx-2">{$lang.nav.wabsection}</span>
								</a>
								<ul class="collapse list-unstyled" id="widgetsAndBanners">
									<li><a href="{$currentDir}?action=payment-widgets" id="paymentWidgets">{$lang.nav.paymentwidgets}</a></li>
									<li><a href="{$currentDir}?action=advertising-widgets" id="advertisingWidgets">{$lang.nav.advertisingwidgets}</a></li>
									<li><a href="{$currentDir}?action=informers" id="allInformers">{$lang.nav.allinformers}</a></li>
								</ul>
							</li>
							<li>
								<a href="#tools" id="toolsSection" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle" aria-label="tools">
									<img src="{$stheme}/svg/join.svg" alt="">
									<span class="mx-2">{$lang.nav.toolssection}</span>
								</a>
								<ul class="collapse list-unstyled" id="tools">
									<li><a href="{$currentDir}?action=modules" id="modulesLink">{$lang.nav.moduleslink}</a></li>
									<li><a href="{$currentDir}?action=data-api" id="dataApi">{$lang.nav.dataapi}</a></li>
									<li><a href="{$currentDir}?action=integrations" id="allIntegrations">{$lang.nav.allintegrations}</a></li>
									<li><a href="{$currentDir}?action=import-export" id="importExport">{$lang.nav.importexport}</a></li>
									<li><a href="{$currentDir}?action=event-log" id="eventLog">{$lang.nav.eventlog}</a></li>
									<li><a href="{$currentDir}?action=rss-settings" id="rssSettings">{$lang.nav.rsssettings}</a></li>
									<li><a href="{$currentDir}?action=policy-terms-cookies" id="policyTermsCookies">{$lang.nav.policytermscookies}</a></li>
								</ul>
							</li>
						</ul>
						<div class="bg-gradient rounded-3 p-4 text-white promo">
							<button class="btn btn-sm w-100 btn-dark" onclick="openModal('license')">
								{$lang.nav.licensed}
							</button>
						</div>
					</div>
				</div>
			</nav>
		</aside>

		<!-- start: page icon link -->
		<aside class="ps-4 pe-3 py-3 rightbar" data-bs-theme="none">
			<div class="navbar navbar-expand-xxl px-3 px-xl-0 py-0">
				<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvas_rightbar" aria-labelledby="offcanvas_rightbar">
					<div class="offcanvas-header" style="background: var(--body-color);">
						<h5 class="offcanvas-title">{$lang.rsbar.title}</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body flex-column custom_scroll" style="background: var(--body-color);">
						<ul class="nav nav-tabs tab-card justify-content-between px-0" role="tablist">
							<li class="nav-item" role="presentation"><button class="nav-link pt-0 active" data-bs-toggle="pill" data-bs-target="#pills_wallet" type="button" role="tab">{$lang.rsbar.report}</button></li>
							<li class="nav-item" role="presentation"><button class="nav-link pt-0" data-bs-toggle="pill" data-bs-target="#pills_tasks" type="button" role="tab">{$lang.rsbar.tasks}</button></li>
						</ul>
						<div class="tab-content mt-3">
							<!--[ Start:: tab pane Wallet ]-->
							<div class="tab-pane fade show active" id="pills_wallet" role="tabpane1">
								<ul class="row list-unstyled li_animate">
									<li class="col-12">
										<div class="card border-0 mb-3">
											<div class="card-body">
												<div class="mb-2">
													<label class="d-flex justify-content-between">Состояние сайта:<span>Включен</span></label>
												</div>
												<div class="mb-2">
													<label class="d-flex justify-content-between">Ваш IP:<span>{$externalIp}</span></label>
												</div>
												<div class="mb-2">
													<label class="d-flex justify-content-between">Город по IP:<span>{$city}</span></label>
												</div>
												<div class="mb-2">
													<label class="d-flex justify-content-between">Cookies:<span class="text-muted">{if $cookieConsent == 'accepted'}<p class="mb-0">Принял соглашение</p>{else}<p class="mb-0">Не приняты соглашения</p>{/if}</span></label>
												</div>
												<div class="mb-2">
													<label class="d-flex justify-content-between">Размер базы данных:<span>{$databaseSize} {$databaseSizeUnit}</span></label>
													<div class="progress mt-1" style="height: 1px;">
														<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{$databaseSize}*10" aria-valuemin="0" aria-valuemax="100" {$progressdatabaseSize}></div>
													</div>
												</div>
												<div class="mb-2">
													<label class="d-flex justify-content-between">Размер кэша Smarty:
														<span>{$cacheSize} MB</span>
														<form method="post">
															<input type="hidden" name="redirect" value="{$smarty.server.REQUEST_URI}">
															<button type="submit" class="text-danger" style="background:none;border:none;padding:0;" onclick="return confirm('Вы уверены, что хотите очистить кэш?');">
																<i class="fa fa-times"></i>
															</button>
														</form>
													</label>
													<div class="progress mt-1" style="height: 1px;">
														<div class="progress-bar bg-primary" role="progressbar" aria-valuenow="{$cacheSize}*10" aria-valuemin="0" aria-valuemax="100" {$progresscacheSize}></div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li class="col-12">
										<div class="card border-0 mb-3">
											<div class="card-body">
												<div class="mb-2">
													<label class="d-flex justify-content-between">Колличество реферальщиков:<span class="text-muted">0</span></label>
												</div>
												<div class="mb-2">
													<label class="d-flex justify-content-between">Заявок на обратную связь:<span class="text-muted">0</span></label>
												</div>
												<div class="mb-2">
													<label class="d-flex justify-content-between">Заявок на тех.поддержку:<span class="text-muted">0</span></label>
												</div>
												<div class="mb-2">
													<label class="d-flex justify-content-between">Поступившихся заказов:<span class="text-muted">0</span></label>
												</div>
												<div class="mb-2">
													<label class="d-flex justify-content-between">Поступившие жалобы:<span class="text-muted">0</span></label>
												</div>
												<div class="mb-2">
													<label class="d-flex justify-content-between">Выполненных заказов:<span class="text-muted">0</span></label>
												</div>
											</div>
										</div>
									</li>
									<li class="col-4">
										<a href="#" class="card border-0 text-center small text-decoration-none mb-3" aria-label="Cards">
											<div class="card-body px-2">
												<svg class="svg-stroke mb-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"></path>
													<path d="M3 10l18 0"></path>
													<path d="M7 15l.01 0"></path>
													<path d="M11 15l2 0"></path>
												</svg>
												<p class="mb-0">Cards</p>
											</div>
										</a>
									</li>
									<li class="col-4">
										<a href="#" class="card border-0 text-center small text-decoration-none mb-3" aria-label="Transfer">
											<div class="card-body px-2">
												<svg class="svg-stroke mb-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M3 6a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
													<path d="M21 11v-3a2 2 0 0 0 -2 -2h-6l3 3m0 -6l-3 3"></path>
													<path d="M3 13v3a2 2 0 0 0 2 2h6l-3 -3m0 6l3 -3"></path>
													<path d="M15 18a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
												</svg>
												<p class="mb-0">Transfer</p>
											</div>
										</a>
									</li>
									<li class="col-4">
										<a href="#" class="card border-0 text-center small text-decoration-none mb-3" aria-label="Withdraw">
											<div class="card-body px-2">
												<svg class="svg-stroke mb-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12"></path>
													<path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
												</svg>
												<p class="mb-0">Withdraw</p>
											</div>
										</a>
									</li>
									<li class="col-4">
										<a href="#" class="card border-0 text-center small text-decoration-none mb-3" aria-label="Bill payments">
											<div class="card-body px-2">
												<svg class="svg-stroke mb-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2"></path>
													<path d="M14 8h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5m2 0v1.5m0 -9v1.5"></path>
												</svg>
												<p class="mb-0">Payments</p>
											</div>
										</a>
									</li>
									<li class="col-4">
										<a href="#" class="card border-0 text-center small text-decoration-none mb-3" aria-label="Add Payee">
											<div class="card-body px-2">
												<svg class="svg-stroke mb-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
													<path d="M16 19h6"></path>
													<path d="M19 16v6"></path>
													<path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
												</svg>
												<p class="mb-0">Referral</p>
											</div>
										</a>
									</li>
									<li class="col-4">
										<a href="#" class="card border-0 text-center small text-decoration-none mb-3" aria-label="Scan & Pay">
											<div class="card-body px-2">
												<svg class="svg-stroke mb-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
													<path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
													<path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
													<path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
													<path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
													<path d="M5 12l14 0"></path>
												</svg>
												<p class="mb-0">Scan & Pay</p>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<!--[ Start:: tab pane Tasks ]-->
							<div class="tab-pane fade" id="pills_tasks" role="tabpane2">
								<ul class="row list-unstyled li_animate">
									<li class="col-12">
										<div class="card border-0 mb-3">
											<div class="card-body">
												<label class="d-flex justify-content-between">Краткое название задания # 1
													<span class="text-success"><i class="fa fa-check"></i></span>
													<span class="text-danger"><i class="fa fa-times"></i></span>
												</label>
												<p class="pt-2 mt-2 mb-0 border-top">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa harum nulla explicabo dolore, fugit nisi at dignissimos officia. Similique, nemo!</p>
											</div>
										</div>
									</li>
									<li class="col-12">
										<div class="card border-0 mb-3">
											<div class="card-body">
												<label class="d-flex justify-content-between">Краткое название задания # 2
													<span class="text-muted"><i class="fa fa-clock-o"></i></span>
													<span class="text-danger"><i class="fa fa-times"></i></span>
												</label>
												<p class="pt-2 mt-2 mb-0 border-top">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa harum nulla explicabo dolore, fugit nisi at dignissimos officia. Similique, nemo!</p>
											</div>
										</div>
									</li>
								</ul>
								<form method="post" class="pt-4 border-top">
									<div class="row">
										<div class="col-12 mb-2">
											<fieldset class="form-icon-group left-icon position-relative">
												<input type="text" class="form-control" name="title" placeholder="Заголовок задания">
												<div class="form-icon position-absolute">
													<img src="{$stheme}/images/svg/option.svg" alt="">
												</div>
											</fieldset>
										</div>
										<div class="col-12">
											<textarea class="form-control mt-2 mb-2" rows="3" name="description" spellcheck="false" placeholder="Текст задания"></textarea>
										</div>
									</div>
									<button type="submit" class="btn btn-primary w-100">Добавить задание</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</aside>

		<!-- start: page header area -->
		<div class="px-md-4 px-3 py-2 page-header" data-bs-theme="none">

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
					<li class="breadcrumb-item"><a href="{$currentDir}" title="{$lang.topmenu.homepage}"><img src="{$stheme}/svg/home.svg" alt=""></a></li>
					{$page_name}
				</ol>
			</div>
			<ul class="list-unstyled action d-flex align-items-center mb-0">
				<li class="dropdown mx-3">
					<a href="#" data-bs-toggle="dropdown" aria-expanded="false">
						<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="22" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
							<path d="M9 12l6 0"></path>
							<path d="M12 9l0 6"></path>
						</svg>
					</a>
					<div class="dropdown-menu dropdown-menu-end px-2 shadow">
						<table class="table mb-0">
							<tbody>
								<tr>
									<td class="border-end text-center"><a href="{$currentDir}?action=add-pages" style="color: var(--theme-color1);"><i class="fa fa-plus mt-1"></i></a></td>
									<td class=""><a href="{$currentDir}?action=pages" style="color: var(--theme-color1);">{$lang.topmenu.pages}</a></td>
								</tr>
								<tr>
									<td class="border-end text-center"><a href="{$currentDir}?action=add-ads" style="color: var(--theme-color2);"><i class="fa fa-plus mt-1"></i></a></td>
									<td class=""><a href="{$currentDir}?action=ads" style="color: var(--theme-color2);">{$lang.topmenu.ads}</a></td>
								</tr>
								<tr>
									<td class="border-end text-center"><a href="{$currentDir}?action=add-files" style="color: var(--theme-color3);"><i class="fa fa-plus mt-1"></i></a></td>
									<td class=""><a href="{$currentDir}?action=files" style="color: var(--theme-color3);">{$lang.topmenu.files}</a></td>
								</tr>
								<tr>
									<td class="border-end text-center"><a href="{$currentDir}?action=add-movies" style="color: var(--theme-color4);"><i class="fa fa-plus mt-1"></i></a></td>
									<td class=""><a href="{$currentDir}?action=movies" style="color: var(--theme-color4);">{$lang.topmenu.movies}</a></td>
								</tr>
								<tr>
									<td class="border-end text-center"><a href="{$currentDir}?action=add-news" style="color: var(--theme-color5);"><i class="fa fa-plus mt-1"></i></a></td>
									<td class=""><a href="{$currentDir}?action=news" style="color: var(--theme-color5);">{$lang.topmenu.news}</a></td>
								</tr>
								<tr>
									<td class="border-end text-center"><a href="{$currentDir}?action=add-products" style="color: var(--theme-color6);"><i class="fa fa-plus mt-1"></i></a></td>
									<td class=""><a href="{$currentDir}?action=products" style="color: var(--theme-color6);">{$lang.topmenu.products}</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</li>
				<li class="d-none d-xxl-inline-flex">
					<button class="btn px-0 rightbar-toggle" type="button">
						<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 256 256"><path fill="currentColor" d="M34 64a6 6 0 0 1 6-6h176a6 6 0 0 1 0 12H40a6 6 0 0 1-6-6m6 70h176a6 6 0 0 0 0-12H40a6 6 0 0 0 0 12m104 52H40a6 6 0 0 0 0 12h104a6 6 0 0 0 0-12m88 0h-18v-18a6 6 0 0 0-12 0v18h-18a6 6 0 0 0 0 12h18v18a6 6 0 0 0 12 0v-18h18a6 6 0 0 0 0-12"/></svg>
					</button>
				</li>
				<li class="d-inline-flex d-xxl-none">
					<button class="btn border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_rightbar">
						<svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 256 256"><path fill="currentColor" d="M34 64a6 6 0 0 1 6-6h176a6 6 0 0 1 0 12H40a6 6 0 0 1-6-6m6 70h176a6 6 0 0 0 0-12H40a6 6 0 0 0 0 12m104 52H40a6 6 0 0 0 0 12h104a6 6 0 0 0 0-12m88 0h-18v-18a6 6 0 0 0-12 0v18h-18a6 6 0 0 0 0 12h18v18a6 6 0 0 0 12 0v-18h18a6 6 0 0 0 0-12"/></svg>
					</button>
				</li>
			</ul>

		</div>

		<!-- start: page body area -->
		<div class="ps-md-4 pe-md-3 px-3 py-3 page-body">
			{$content}
		</div>

		<!-- start: page footer -->
		<footer class="px-md-4 px-3">
			<p class="mb-0 text-muted">© 2023 <a href="https://skills.energy/" target="_blank" title="Skills.Energy">Skills.Energy</a>, All Rights Reserved.</p>
		</footer>
	</main>

	<div class="modal" id="exampleModalCenter">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body" id="modalBodyContent">
					<!-- Content will be dynamically loaded here -->
				</div>
			</div>
		</div>
	</div>
	<div id="license" style="display: none;">
		<div class="col-12 mb-3">
			<div class="card">
				<div class="card-body rounded-1" style="border: 1px solid var(--theme-color1)">
					<div>
						<h4>{$lang.nav.licensed}</h4>
					</div>
					<p class="mb-0">{$lang.nav.licensekey}:</p>
					<fieldset class="form-icon-group left-icon position-relative">
						<div class="col-12 btn-group mb-3">
							<input type="text" class="form-control rounded-0" id="license_key" value="{$config.license}" style="border-color: var(--theme-color1)">
							<div class="form-icon position-absolute">
								<img src="{$stheme}/images/svg/lock-key.svg" alt="">
							</div>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
	<script>
		function openModal(contentId) {
			var contentElement = document.getElementById(contentId);
			document.getElementById('modalBodyContent').innerHTML = contentElement.innerHTML;
			$('#exampleModalCenter').modal('show');
		}
	</script>
	{if isset($add_page)}
		{if $add_page == 'add_page'}
		<!-- Подключение стилей Summernote -->
		<link rel="stylesheet" href="{$stheme}/css/summernote.min.css">
		<link href="engine/editor/summernote/summernote-bs4.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/popper.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script src="engine/editor/summernote/summernote-bs4.min.js"></script>
		<!-- Подключение библиотек Summernote -->
		<script>
			$(document).ready(function(){
				$('#short_desc').summernote({
    				lang: 'ru-RU',
					placeholder: '',
					height: 280,
					callbacks: {
						onImageUpload: function(files) {
							// Создаем объект FormData
							var formData = new FormData();
							formData.append('image', files[0]);
							// Отправляем изображение на сервер
							$.ajax({
								url: './engine/modules/summernote_image.php?folder=' + $('#folder').val() + '&p_id=' + $('#p_id').val(),
								type: 'POST',
								data: formData,
								processData: false,
								contentType: false,
								success: function(imageUrl) {
									// Вставляем ссылку на загруженное изображение в редактор
									$('#short_desc').summernote('insertImage', imageUrl);
								},
								error: function(xhr, status, error) {
									console.error(xhr.responseText);
								}
							});
						}
					}
				});
				
				$('#full_desc').summernote({
    				lang: 'ru-RU',
					placeholder: '',
					height: 280,
					callbacks: {
						onImageUpload: function(files) {
							// Создаем объект FormData
							var formData = new FormData();
							formData.append('image', files[0]);
							// Отправляем изображение на сервер
							$.ajax({
								url: './engine/modules/summernote_image.php?folder=' + $('#folder').val() + '&p_id=' + $('#p_id').val(),
								type: 'POST',
								data: formData,
								processData: false,
								contentType: false,
								success: function(imageUrl) {
									// Вставляем ссылку на загруженное изображение в редактор
									$('#full_desc').summernote('insertImage', imageUrl);
								},
								error: function(xhr, status, error) {
									console.error(xhr.responseText);
								}
							});
						}
					}
				});
			});
		</script>
		<script src="engine/editor/summernote/summernote.js"></script>
		{/if}
	{/if}
</body>
</html>