<head>
    <title>{$title}</title>
    {$charset}
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="{$generator}">
    <meta name="keywords" content="{$keywords}">
    <meta name="description" content="{$description}">
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
	{if isset($homepage)}
		<link rel="stylesheet" href="{$stheme}/bundles/swiper/swiper.css">
		<link rel="stylesheet" href="{$stheme}/bundles/swiper/swiper-bundle.css">
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
		<script src="{$stheme}/bundles/swiper/swiper.js"></script>
		<script src="{$stheme}/bundles/swiper/swiper-bundle.js"></script>
		<script src="{$stheme}/bundles/swiper/swiper-element.js"></script>
		<script>
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
		</script>
	{/if}
</head>