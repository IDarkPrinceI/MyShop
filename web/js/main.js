

jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var MqL = 1170;
	//move nav element position according to window width
	moveNavigation();
	$(window).on('resize', function(){
		(!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
	});

	$(window).load(function(){
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 9000,
			values: [ 1000, 7000 ],
			slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

	});

	//mobile - open lateral menu clicking on the menu icon
	$('.cd-nav-trigger').on('click', function(event){
		event.preventDefault();
		if( $('.cd-main-content').hasClass('nav-is-visible') ) {
			closeNav();
			$('.cd-overlay').removeClass('is-visible');
		} else {
			$(this).addClass('nav-is-visible');
			$('.cd-main-header').addClass('nav-is-visible');
			$('.cd-main-content').addClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').addClass('overflow-hidden');
			});
			toggleSearch('close');
			$('.cd-overlay').addClass('is-visible');
		}
	});

	//open search form
	$('.cd-search-trigger').on('click', function(event){
		event.preventDefault();
		toggleSearch();
		closeNav();
	});




	//submenu items - go back link
	$('.go-back').on('click', function(){
		$(this).parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('moves-out');
	});

	function closeNav() {
		$('.cd-nav-trigger').removeClass('nav-is-visible');
		$('.cd-main-header').removeClass('nav-is-visible');
		$('.cd-primary-nav').removeClass('nav-is-visible');
		$('.has-children ul').addClass('is-hidden');
		$('.has-children a').removeClass('selected');
		$('.moves-out').removeClass('moves-out');
		$('.cd-main-content').removeClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$('body').removeClass('overflow-hidden');
		});
	}

	function toggleSearch(type) {
		if(type=="close") {
			//close serach
			$('.cd-search').removeClass('is-visible');
			$('.cd-search-trigger').removeClass('search-is-visible');
			$('.cd-overlay').removeClass('search-is-visible');
		} else {
			//toggle search visibility
			$('.cd-search').toggleClass('is-visible');
			$('.cd-search-trigger').toggleClass('search-is-visible');
			$('.cd-overlay').toggleClass('search-is-visible');
			if($(window).width() > MqL && $('.cd-search').hasClass('is-visible')) $('.cd-search').find('input[type="search"]').focus();
			($('.cd-search').hasClass('is-visible')) ? $('.cd-overlay').addClass('is-visible') : $('.cd-overlay').removeClass('is-visible') ;
		}
	}

	function checkWindowWidth() {
		//check window width (scrollbar included)
		var e = window, 
            a = 'inner';
        if (!('innerWidth' in window )) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        if ( e[ a+'Width' ] >= MqL ) {
			return true;
		} else {
			return false;
		}
	}

	function moveNavigation(){
		var navigation = $('.cd-nav');
  		var desktop = checkWindowWidth();
        if ( desktop ) {
			navigation.detach();
			navigation.insertBefore('.cd-header-buttons');
		} else {
			navigation.detach();
			navigation.insertAfter('.cd-main-content');
		}
	}


	$(function () {
		$("#slider").responsiveSlides({
			auto: true,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			pager: true,
		});
	});

	jQuery(function() {
		jQuery('.starbox').each(function() {
			var starbox = jQuery(this);
			starbox.starbox({
				average: starbox.attr('data-start-value'),
				changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
				ghosting: starbox.hasClass('ghosting'),
				autoUpdateAverage: starbox.hasClass('autoupdate'),
				buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
				stars: starbox.attr('data-star-count') || 5
			}).bind('starbox-value-changed', function(event, value) {
				if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
				}
			})
		});
	});

	// $('.sort').on('click', function(){
	// var file = $('select[@name=sort] option:selected').val();
	// $('.content').load(file);
	// });


	$('#example1').coreSlider({
		// Пауза при наведении мыши
		pauseOnHover: false,
		interval: 4000,
		controlNavEnabled: true
	});

	// quantity
	$('.value-plus1').on('click', function(){
		var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
		divUpd.text(newVal);
	});

	$('.value-minus1').on('click', function(){
		var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
		if(newVal>=1) divUpd.text(newVal);
	});

	if ($(document).height() <= $(window).height())
		$("my_footer").addClass("navbar-fixed-bottom");
	});

/* Cart */

$('.add-to-cart').on('click', function () {
	let id = $(this).data('id');
	$.ajax({
		url: '/cart/add',
		data: {id: id},
		type: 'GET',
		success: function (res) {
			if(!res) alert('Ошибка добавления товара');
			showCart(res);
		},
		error: function () {
			alert('Error');
		}
	});
	return false;
});

$('.add-to-cart-single').on('click', function () {
	let id = $(this).data('id'),
		qty = document.getElementById("rez").innerText;
	$.ajax({
		url: '/cart/add',
		data: {id: id, qty: qty},
		type: 'GET',
		success: function (res) {
			if(!res) alert('Ошибка добавления товара');
			document.getElementById("rez").textContent="1";
			showCart(res);
		},
		error: function () {
			alert('Error');
		}
	});
	return false;
});

function showCart(cart) {
	$('#modal-cart .modal-body').html(cart);
	$('#modal-cart').modal();
	let cartSum = $('#cart-sum').text() ? $('#cart-sum').text() : '0 руб';
	if(cartSum) {
		$('.cart-sum').text(cartSum);
	}
	let cartQty = $('#cart-qty').text() ? $('#cart-qty').text() : '0';
	if(cartQty) {
		$('.cart-qty').text(cartQty);
	}
}


function getCart() {
	$.ajax({
		url: '/cart/show',
		type: 'GET',
		success: function (res) {
			if(!res) alert('Ошибка добавления товара');
			showCart(res);
		},
		error: function () {
			alert('Error');
		}
	});
}

function clearCart() {
	$.ajax({
		url: '/cart/clear',
		type: 'GET',
		success: function (res) {
			if(!res) alert('Ошибка удаления товара');
			showCart(res);
		},
		error: function () {
			alert('Error');
		}
	});
}

$('#modal-cart .modal-body').on('click', '.del-item', function () {
	let id = $(this).data('id');
	$.ajax({
		url: '/cart/del-item',
		data: {id: id},
		type: 'GET',
		success: function (res) {
			if (!res) alert('Ошибка удаления товара');
			let now_location = document.location.pathname;
			if(now_location == '/cart/checkout') {
				location = '/cart/checkout';
			}
			showCart(res);
		},
		error: function () {
			alert('Error');
		}
	});
});

$('#plus, #minus').on('click', function () {
	let id = $(this).data('id'),
		qty = $(this).data('qty');
	$('.cart-table .overlay').fadeIn();
	$.ajax({
		url: '/cart/change-cart',
		data: {id: id, qty: qty},
		type: 'GET',
		success: function (res) {
			if(!res) alert('Ошибка изменения количества товара!');
			location = '/cart/checkout';
		},
		error: function () {
			alert('Error!');
		}
	});
});

// $('#product_plus').on('click', function () {
// 	var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
// 	divUpd.text(newVal);
// });
// $('#product_minus').on('click', function(){
// 	var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
// 	if(newVal>=1) divUpd.text(newVal);
// });

// $('.value-plus1').on('click', function(){
// 	var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 0)+1;
// 	divUpd.text(newVal);
// });
//
// $('.value-minus1').on('click', function(){
// 	var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 0)-1;
// 	if(newVal>=1) divUpd.text(newVal);
// });
/* Cart */
// $(document).ready(function(c) {
// 	$('.close3').on('click', function(c){
// 		$('.cart-header3').fadeOut('slow', function(c){
// 			$('.cart-header3').remove();
// 		});
// 	});
// });




