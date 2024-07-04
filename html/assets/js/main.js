(function ($) {
	"use strict";

/*=============================================
	=    		 Preloader			      =
=============================================*/
function preloader() {
	$('#preloader').delay(0).fadeOut();
};

$(window).on('load', function () {
	preloader();
	mainSlider();
	wowAnimation();
	tg_title_animation();
});

/*=============================================
	=    		 Main Slider		      =
=============================================*/
function mainSlider() {
	var BasicSlider = $('.slider-active');
	BasicSlider.on('init', function (e, slick) {
		var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	BasicSlider.slick({
		autoplay: false,
		autoplaySpeed: 10000,
		dots: false,
		fade: true,
		arrows: false,
		responsive: [
			{ breakpoint: 767, settings: { dots: false, arrows: false } }
		]
	});

	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}
}

/*=============================================
	=    		Mobile Menu			      =
=============================================*/
//SubMenu Dropdown Toggle
if ($('.menu-area li.menu-item-has-children ul').length) {
	$('.menu-area .navigation li.menu-item-has-children').append('<div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>');

}

//Mobile Nav Hide Show
if ($('.mobile-menu').length) {

	var mobileMenuContent = $('.menu-area .main-menu').html();
	$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);

	//Dropdown Button
	$('.mobile-menu li.menu-item-has-children .dropdown-btn').on('click', function () {
		$(this).toggleClass('open');
		$(this).prev('ul').slideToggle(300);
	});
	//Menu Toggle Btn
	$('.mobile-nav-toggler').on('click', function () {
		$('body').addClass('mobile-menu-visible');
	});

	//Menu Toggle Btn
	$('.menu-backdrop, .mobile-menu .close-btn').on('click', function () {
		$('body').removeClass('mobile-menu-visible');
	});
}



/*=============================================
	=     Menu sticky & Scroll to top      =
=============================================*/
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 245) {
		$("#sticky-header").removeClass("sticky-menu");
        $('.scroll-to-target').removeClass('open');
		$("#header-fixed-height").removeClass("active-height");

	} else {
		$("#sticky-header").addClass("sticky-menu");
        $('.scroll-to-target').addClass('open');
		$("#header-fixed-height").addClass("active-height");
	}
});


/*=============================================
	=    		 Scroll Up  	         =
=============================================*/
if ($('.scroll-to-target').length) {
  $(".scroll-to-target").on('click', function () {
    var target = $(this).attr('data-target');
    // animate
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1000);

  });
}

/*=============================================
	=           Data Background             =
=============================================*/
$("[data-background]").each(function () {
	$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
})


/*=============================================
	=        Team Social Active 	       =
=============================================*/
$('.tooltip-btn').on('click', function () {
	$(this).parent().toggleClass('active');
	return true;
});


/*=============================================
	=    		Brand Active		      =
=============================================*/
$('.brand-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: false,
	slidesToShow: 6,
	slidesToScroll: 2,
	responsive: [
		{
			breakpoint: 1400,
			settings: {
				slidesToShow: 5,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=    		Brand Active		      =
=============================================*/
$('.brand-active-two').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: false,
	slidesToShow: 4,
	slidesToScroll: 1,
	responsive: [
		{
			breakpoint: 1400,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});

/*=============================================
	=    		Brand Active		      =
=============================================*/
$('.brand-active-three').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: false,
	slidesToShow: 5,
	slidesToScroll: 1,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=          services Active               =
=============================================*/
$('.services-item').hover(function () {
	$(this).find('.services-overlay-content').slideToggle(300);
	return false;
});
$('.services-item').hover(function () {
	$(this).find('.services-content .title').slideToggle(300);
	return true;
});
$('.services-item').hover(function () {
	$(this).find('.services-icon').slideToggle(300);
	return true;
});


/*=============================================
	=          project Active               =
=============================================*/
$('.project-item').hover(function () {
	$(this).find('.project-content p').slideToggle(300);
	return false;
});
$('.project-item').hover(function () {
	$(this).find('.project-content .title').slideToggle(300);
	return true;
});
$('.project-item').hover(function () {
	$(this).find('.project-thumb').slideToggle(400);
	return false;
});



/*=============================================
	=        parallaxMouse Active          =
=============================================*/
function parallaxMouse() {
	if ($('.parallax').length) {
		var scene = document.querySelectorAll('.parallax');
		for (var i = 0; i < scene.length; i++) {
			var parallaxInstance = new Parallax(scene[i], {
				relativeInput: true,
				hoverOnly: true,
				selector: '.layer',
				pointerEvents: true,
			});
		}
	};
};
parallaxMouse();

/*=============================================
	=    		 Jarallax Active  	         =
=============================================*/
$('.jarallax').jarallax({
	speed: 0.2,
});


/*=============================================
	=    		Odometer Active  	       =
=============================================*/
$('.odometer').appear(function (e) {
	var odo = $(".odometer");
	odo.each(function () {
		var countNumber = $(this).attr("data-count");
		$(this).html(countNumber);
	});
});


/*=============================================
	=    		Magnific Popup		      =
=============================================*/
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
		enabled: true
	}
});

/* magnificPopup video view */
$('.popup-video').magnificPopup({
	type: 'iframe'
});



/*=============================================
	=    		 Wow Active  	         =
=============================================*/
function wowAnimation() {
	var wow = new WOW({
		boxClass: 'wow',
		animateClass: 'animated',
		offset: 0,
		mobile: false,
		live: true
	});
	wow.init();
}


})(jQuery);

// Получаем все элементы с классом 'item'
const items = document.querySelectorAll('.tooltip-item');

// Функция для удаления класса 'active' у всех элементов
function removeActiveClass() {
    items.forEach(item => {
        item.classList.remove('active');
    });
}

// Добавляем обработчик событий для каждого элемента
items.forEach(item => {
    item.addEventListener('click', (event) => {
        // Удаляем класс 'active' у всех элементов
        removeActiveClass();
        // Добавляем класс 'active' к текущему элементу
        item.classList.add('active');
        // Останавливаем распространение события, чтобы клик не попал на документ
        event.stopPropagation();
    });
});

// Добавляем обработчик событий для документа
document.addEventListener('click', () => {
    // Удаляем класс 'active' у всех элементов при клике за пределами элементов
    removeActiveClass();
});