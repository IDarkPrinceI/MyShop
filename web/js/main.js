$('.cd-search-trigger').on('click', function() {
	$('#content').toggleClass('move')
	$('#cd-search').toggleClass('is-visible')
	$('.cd-search-trigger').toggleClass('search-is-visible')
	// $('.cd-overlay').toggleClass('search-is-visible');
});

$('#example1').coreSlider({
	// Пауза при наведении мыши
	pauseOnHover: false,
	startOnHover: true,
	interval: 4000,
	controlNavEnabled: true,
	controlNavSelector : '.core-slider_control-nav',
	clone: true
	// interval: 5000,                                         // Interval of time between slide changes
	// loop: true,                                             // When slider finish, should it loop again from first slide?
	// slideshow: true,                                        // Enable/Disable automatic slideshow
	// resize: true,                                           // Should be slider responsive on screen resize
	// pauseOnHover: true,                                     // Pause the slideshow when hovering over slider
	// startOnHover: false,                                    // Start the slideshow when hovering over slider
	// sliderSelector: '.core-slider_list',                    // List selector (all items are inside this container)
	// viewportSelector: '.core-slider_viewport',              // Viewport selector
	// itemSelector: '.core-slider_item',                      // Slider items selector
	// navEnabled: true,                                       // Enable/Disable navigation arrows
	// navSelector: '.core-slider_nav',                        // Selector for navigation arrows container
	// navItemNextSelector: '.core-slider_arrow__right',       // 'Next' arrow selector
	// navItemPrevSelector: '.core-slider_arrow__left',        // 'Prev' arrow selector
	// controlNavEnabled: false,                               // Enable/Disable control navigation (dots)
	// controlNavSelector: '.core-slider_control-nav',         // Control navigation container selector (inside will be created dots items)
	// controlNavItemSelector: 'core-slider_control-nav-item', // Single control nav dot (created dynamically. Write without dot. If you need more that one class - add them with space separator)
	// loadedClass: 'is-loaded',                               // Classname, that will be added when slider is fully loaded
	// clonedClass: 'is-cloned',                               // Classname, that will be added to cloned slides (see option 'clone')
	// hiddenClass: 'is-hidden',                               // Classname, indicates hidden things
	// disabledClass: 'is-disabled',                           // Classname, that will be added it item is disabled (in most of cases - item will be display: noned)
	// activeClass: 'is-active',                               // Classname, that will be added to active items (for example control navs, etc.)
	// reloadGif: false,                                       // Reload gif's on slide change for replaying cycled animation inside current slide
	// clone: false,                                           // Indicates, that at begin and at end of slider carousel items will be cloned to create 'infitite' carousel illusion
	// items: 1,                                               // How mutch items will be placed inside viewport. Leave 1 if this is slider, 2 ot more - it will look like a carousel
	// itemsPerSlide: 1,                                       // How many items must be slided by one action (NOTE: Must be less than 'items' option)
	// cloneItems: 0                                           // How mutch items will be cloned at begin and at end of slider
});

//submenu items - go back link
// $('.go-back').on('click', function(){
// 	$(this).parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('moves-out');
// });

// jQuery(document).ready(function($){
// 	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
// 	var MqL = 1170;
// 	//move nav element position according to window width
// 	moveNavigation();
// 	$(window).on('resize', function(){
// 		(!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
// 	});

	// $(window).load(function(){
	// 	$( "#slider-range" ).slider({
	// 		range: true,
	// 		min: 0,
	// 		max: 9000,
	// 		values: [ 1000, 7000 ],
	// 		slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
	// 		}
	// 	});
	// 	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	//
	// });


	// function checkWindowWidth() {
	// 	//check window width (scrollbar included)
	// 	var e = window,
    //         a = 'inner';
    //     if (!('innerWidth' in window )) {
    //         a = 'client';
    //         e = document.documentElement || document.body;
    //     }
    //     if ( e[ a+'Width' ] >= MqL ) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }
	//
	// function moveNavigation(){
	// 	var navigation = $('.cd-nav');
  	// 	var desktop = checkWindowWidth();
    //     if ( desktop ) {
	// 		navigation.detach();
	// 		navigation.insertBefore('.cd-header-buttons');
	// 	} else {
	// 		navigation.detach();
	// 		navigation.insertAfter('.cd-main-content');
	// 	}
	// }


	// $(function () {
	// 	$("#slider").responsiveSlides({
	// 		auto: true,
	// 		nav: true,
	// 		speed: 500,
	// 		namespace: "callbacks",
	// 		pager: true,
	// 	});
	// });

	// jQuery(function() {
	// 	jQuery('.starbox').each(function() {
	// 		var starbox = jQuery(this);
	// 		starbox.starbox({
	// 			average: starbox.attr('data-start-value'),
	// 			changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
	// 			ghosting: starbox.hasClass('ghosting'),
	// 			autoUpdateAverage: starbox.hasClass('autoupdate'),
	// 			buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
	// 			stars: starbox.attr('data-star-count') || 5
	// 		}).bind('starbox-value-changed', function(event, value) {
	// 			if(starbox.hasClass('random')) {
	// 				var val = Math.random();
	// 				starbox.next().text(' '+val);
	// 				return val;
	// 			}
	// 		})
	// 	});
	// });

	// $('.sort').on('click', function(){
	// var file = $('select[@name=sort] option:selected').val();
	// $('.content').load(file);
	// });



	// if ($(document).height() <= $(window).height())
	// 	$("my_footer").addClass("navbar-fixed-bottom");
	// });

/* Cart */
$('.value-plus1').on('click', itemPlus)
$('.value-minus1').on('click', itemMinus)

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
		qty = document.querySelector('#rez').innerText;
	$.ajax({
		url: '/cart/add',
		data: {id: id, qty: qty},
		type: 'GET',
		success: function (res) {
			if(!res) alert('Ошибка добавления товара');
			document.querySelector('#rez').textContent="1";
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
	let cartSum = $('#cart-sum').text() ? $('#cart-sum').text() : '0';
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

//modalProduct
$('body').on('click', '.get-modal-product', function () {
	let id = $(this).data('id');
	$.ajax({
		url: '/product/show',
		type: 'GET',
		data: {id: id},
		cache: false,
		success:
			function (res) {
				if(!res) alert('Ошибка модального окна');
				showProduct(res);
			},
		error: function () {
			alert('Ошибочка!')
		}
	})
});

function showProduct(product) {
	$('#myModalSingle .modal-body').html(product);
	$('#myModalSingle').modal();
}

$('#myModalSingle .modal-body').on('click', '.add-to-cart-single', function () {
	let id = $(this).data('id'),
		qty = document.getElementById("rez").innerText;
	$.ajax({
		url: '/cart/add',
		data: {id: id, qty: qty},
		type: 'GET',
		success: function (res) {
			if(!res) alert('Ошибка добавления товара');
			$('#myModalSingle').modal('hide');
			showCart(res);
		},
		error: function () {
			alert('Error');
		}
	});
	return false;
});
//itemPlus & minus
function itemPlus() {
	let result = document.querySelector('#rez'),
		newResult = parseInt(result.textContent, 10) + 1
	if( newResult >= 1) {
		result.textContent = newResult.toString()
	}
}

function itemMinus() {
	let result = document.querySelector('#rez'),
		newResult = parseInt(result.textContent, 10) - 1
	if( newResult >= 1) {
		result.textContent = newResult.toString()
	}
}
//itemPlus & minus
//modalProduct

//productFilter

$('#filterForm').on('click', function (event) {
	let target = event.target,
		filterButton = document.querySelector('#filterButton'),
		allFilterFormTarget = document.querySelectorAll('.brandName')
		allFilterFormTarget.forEach(function (elem) {
			elem.classList.remove('brandNamePointer')
		})
	if (target.tagName === 'UL') {
		target.classList.add('brandNamePointer')
		filterButton.classList.add('readyButton')
	}
});

$('#filterButton').on('click', function () {
	let target = document.querySelector('#filterButton'),
		rangePrice = document.querySelector('#my_range').value,
		categoryId = target.value,
		params = {
			url: '/category/filter',
			type: 'GET',
			success: function (res) {
				if (!res) alert('Ошибка фильтра')
				$('#myIncludeProductList').html(res);
			},
			error: function () {
				alert('Error!')
			}
		}

	if (!target.classList.contains('readyButton') && rangePrice === '') {
		return alert('Выберите параметры фильтрации')

	} else if (target.classList.contains('readyButton') && rangePrice !== '') {
		let brandId = document.querySelector('.brandNamePointer').getAttribute('data-id')
		params.data = {categoryId: categoryId,
			           range: rangePrice,
					   brandId: brandId}
	} else if (!target.classList.contains('readyButton')) {
		params.data = {categoryId: categoryId,
					   range: rangePrice}
	} else {
		let brandId = document.querySelector('.brandNamePointer').getAttribute('data-id')
		params.data = {brandId: brandId,
					   categoryId: categoryId}
			// rangePrice = document.querySelector('#my_range').value

	}
	$.ajax(params);
	return false;
});

//productFilter


// $('#filterButton').on('click', function () {
// 	let target = document.querySelector('#filterButton')
// 	rangePrice = document.querySelector('#my_range').value
// 	if (!target.classList.contains('readyButton') && rangePrice === '') {
// 		return alert('Выберите параметры фильтрации')
// 	} else {
// 		let brandId = document.querySelector('.brandNamePointer').getAttribute('data-id'),
// 			categoryId = target.value
// 		rangePrice = document.querySelector('#my_range').value
// 		$.ajax({
// 			url: '/category/filter',
// 			data: {brandId: brandId,
// 				categoryId: categoryId,
// 				range: rangePrice},
// 			type: 'GET',
// 			success: function (res) {
// 				if (!res) alert('Ошибка фильтра')
// 				$('#myIncludeProductList').html(res);
// 			},
// 			error: function () {
// 				alert('Error!')
// 			}
// 		});
// 		return false;
// 	}
// });




