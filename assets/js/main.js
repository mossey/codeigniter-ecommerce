/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

function createCookie(name, value, days) {
	var expires;

	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toGMTString();
	} else {
		expires = "";
	}
	document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}

function readCookie(name) {
	var nameEQ = encodeURIComponent(name) + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) === ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name, "", -1);
}

$(document).ready(function(){

	var frm = $('.products-form');
	frm.submit(function (ev) {
		$('.products-inside').css('opacity', 0.2);
		$('.loader10').hide().fadeIn();
		$.ajax({
			type: frm.attr('method'),
			url: frm.attr('action'),
			data: frm.serialize(),
			success: function (data) {
				setTimeout(function(){
					$('.loader10').fadeOut();
					$('.products-inside').html(data).css('opacity', 1);
				}, 500);
			}
		});

		ev.preventDefault();
		return false;
	});

	$('.filters input').change(function(){
		$(this).parents('form').submit();
	});

	$('.filter-selects select').change(function(){
		$(this).parents('form').submit();
	});

	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});

	Array.prototype.contains = function (v) {
		for (var i = 0; i < this.length; i++) {
			if (this[i] === v) return true;
		}
		return false;
	};

	Array.prototype.unique = function () {
		var arr = [];
		for (var i = 0; i < this.length; i++) {
			if (!arr.contains(this[i])) {
				arr.push(this[i]);
			}
		}
		return arr;
	};

	function remove_messages() {
		setTimeout(function () {
			$('.message:visible').fadeOut();
		}, 4000);
	}

	$('.add-to-cart').click(function () {
		var $button = $(this),
			id = $button.data('id').toString(),
			$product_information = $button.parents('.product-information'),
			quantity = "1";

		var products = $.cookie('products');
		products = products ? products.split(',') : [];

		if ($product_information.length) {
			quantity = $product_information.find('input.quantity').val().toString();
		}

		products.push(id + '-' + quantity);

		products = products.unique();

		$('.cart-items').text('(' + products.length + ')');

		$.cookie('products', products);

		$('.added-to-cart').fadeIn();

		remove_messages();

		return false;
	});

	remove_messages();

	function total() {
		var total = 0,
			delivery_free_from = $('.cart-info table').data('delivery-free-from');

		$('tr').find('.cart_total_price').each(function () {
			total += parseInt($(this).data('price'));
		});



		$('.total_area').find('.total').html(total + ' '+$('form.form-with-data').data('currency'));
	}

	$('.cart_quantity_up').click(function () {
		var $up = $(this),
			$input = $up.parents('.cart_quantity_button').find('input'),
			current_quantity = parseInt($input.val()),
			$tr = $input.parents('tr'),
			price = parseInt($tr.data('price')),
			new_quantity = current_quantity + 1,
			product_total = price * new_quantity;

		$input.val(new_quantity);
		$tr.find('.cart_total_price').data('price', product_total).html(product_total + ' '+$('form.form-with-data').data('currency'));

		total();
	});
	$('.cart_quantity_down').click(function () {
		var $up = $(this),
			$input = $up.parents('.cart_quantity_button').find('input'),
			current_quantity = parseInt($input.val()),
			$tr = $input.parents('tr'),
			price = parseInt($tr.data('price')),
			new_quantity = current_quantity - 1,
			product_total = price * new_quantity;

		if (new_quantity >= 1) {
			$input.val(current_quantity - 1);
			$tr.find('.cart_total_price').data('price', product_total).html(product_total + ' '+$('form.form-with-data').data('currency'));
		}

		total();
	});
	$('.cart_quantity_delete').click(function () {
		$(this).parents('tr').remove();
		$('.removed-from-cart').fadeIn();

		remove_messages();
	});
	total();
});
