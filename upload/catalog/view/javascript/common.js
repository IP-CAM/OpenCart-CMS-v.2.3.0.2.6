/* Element.prototype.hasClassDisco = function(c) {
	var e = this;
    var RE;
    try {
        RE = new RegExp('^(.*\\s)?' + c + '\\s.*$');
    } catch (e) {
        return -1;
    }
    if (RE && e && e.className) {
        return RE.test(e.className);
    } else {
        return -2;
    }
}

Element.prototype.addClassDisco = function(c) {
	var e = this;
    if (e && e.hasClassDisco(c) !== true) {
        e.className += (e.className.length == 0 ? '' : ' ') + c;
    }
}

Element.prototype.removeClassDisco = function(c) {
	var e = this;
    if (e && e.className) {
        var A = e.className.split(' ');
        for (var i = 0; i < A.length; i++) {
             if (A[i] == c) {
                 A.splice(i, 1);
             }
        }
        e.className = A.join(' ');
    }
}

Element.prototype.disco_toggleClassDisco = function(c) {
	var e = this;
	if (e && e.className && e.hasClassDisco(c) === true) {
		e.removeClassDisco(c);
	} else {
		e.addClassDisco(c);
	}
}

Element.prototype.hideDisco = function(t) {
	var e = this;
	if (typeof t === 'undefined') {
		t = 1000;
	}
	setTimeout(function() {
		return e.hidden = true;
	}, t);
};

Element.prototype.showDisco = function(t) {
	var e = this;
	if (typeof t === 'undefined') {
		t = 1000;
	}
	setTimeout(function() {
		return e.hidden = false;
	}, t);
}; */

var disco = {
	'scroll_status':{},
	'getURLVar':function(key) {
		var value = [];

		var query = String(document.location.href).split('?');

		if (query[1]) {
			var part = query[1].split('&');

			for (i = 0; i < part.length; i++) {
				var data = part[i].split('=');

				if (data[0] && data[1]) {
					value[data[0]] = data[1];
				}
			}

			if (value[key]) {
				return value[key];
			} else {
				return '';
			}
		}
	},
	'cart':{
		'add': function(product_id, quantity) {
			$.ajax({
				url: 'index.php?route=checkout/cart/add',
				type: 'post',
				data: 'product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
				dataType: 'json',
				beforeSend: function() {
					$('#cart > button').button('loading');
				},
				complete: function() {
					$('#cart > button').button('reset');
				},
				success: function(json) {
					$('.alert-success, .text-danger').remove();

					if (json['redirect']) {
						window.location.href = json['redirect'];
					}

					if (json['success']) {
						$('.top-block').before('<div class="success-info"><div class="success-content"><span class="icon"><i class="fa fa-check-circle"></i></span>' + '<span class="text">' + json['success'] + '</span>' + '</div>' + '</div>');

						// Need to set timeout otherwise it wont update the total
						setTimeout(function () {
							$('#cart > a > .counters').html(json['cart_counter']);
							$('#cart > a > .tooltips_text').html(json['total']);
						}, 100);

						$('#cart > .cart-block').load('index.php?route=common/cart/info .cart-block');
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		},
		'update': function(key, quantity) {
			$.ajax({
				url: 'index.php?route=checkout/cart/edit',
				type: 'post',
				data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
				dataType: 'json',
				beforeSend: function() {
					$('#cart > button').button('loading');
				},
				complete: function() {
					$('#cart > button').button('reset');
				},
				success: function(json) {
					// Need to set timeout otherwise it wont update the total
					setTimeout(function () {
						$('#cart > a > .counters').html(json['cart_counter']);
						$('#cart > a > .tooltips_text').html(json['total']);
					}, 100);

					if (disco.getURLVar('route') == 'checkout/cart' || disco.getURLVar('route') == 'checkout/checkout') {
						window.location.href = 'index.php?route=checkout/cart';
					} else {
						$('#cart > .cart-block').load('index.php?route=common/cart/info .cart-block');
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		},
		'remove': function(key) {
			$.ajax({
				url: 'index.php?route=checkout/cart/remove',
				type: 'post',
				data: 'key=' + key,
				dataType: 'json',
				beforeSend: function() {
					$('#cart > button').button('loading');
				},
				complete: function() {
					$('#cart > button').button('reset');
				},
				success: function(json) {
					// Need to set timeout otherwise it wont update the total
					setTimeout(function () {
						$('#cart > a > .counters').html(json['cart_counter']);
						$('#cart > a > .tooltips_text').html(json['total']);
					}, 100);
					
					var now_location = String(document.location.pathname);

					if ((now_location == '/cart/') || (now_location == '/checkout/') || (disco.getURLVar('route') == 'checkout/cart') || (disco.getURLVar('route') == 'checkout/checkout')) {
						window.location.href = 'index.php?route=checkout/cart';
					} else {
						$('#cart > .cart-block').load('index.php?route=common/cart/info .cart-block');
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	},
	'voucher':{
		'add': function() {

		},
		'remove': function(key) {
			$.ajax({
				url: 'index.php?route=checkout/cart/remove',
				type: 'post',
				data: 'key=' + key,
				dataType: 'json',
				beforeSend: function() {
					$('#cart > button').button('loading');
				},
				complete: function() {
					$('#cart > button').button('reset');
				},
				success: function(json) {
					// Need to set timeout otherwise it wont update the total
					setTimeout(function () {
						$('#cart > a > .counters').html(json['cart_counter']);
						$('#cart > a > .tooltips_text').html(json['total']);
					}, 100);

					if (disco.getURLVar('route') == 'checkout/cart' || disco.getURLVar('route') == 'checkout/checkout') {
						window.location.href = 'index.php?route=checkout/cart';
					} else {
						$('#cart > .cart-block').load('index.php?route=common/cart/info .cart-block');
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	},
	'wishlist':{
		'add': function(product_id) {
			$.ajax({
				url: 'index.php?route=account/wishlist/add',
				type: 'post',
				data: 'product_id=' + product_id,
				dataType: 'json',
				success: function(json) {
					$('.alert-success').remove();

					if (json['redirect']) {
						window.location.href = json['redirect'];
					}

					if (json['success']) {
						$('.top-block').before('<div class="success-info"><div class="success-content"><span class="icon"><i class="fa fa-check-circle"></i></span>' + '<span class="text">' + json['success'] + '</span>' + '</div>' + '</div>');
					}

					$('#wishlist-total > .wishlist-text').html(json['total']);

				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		},
		'remove': function() {

		}
	},
	'compare':{
		'add': function(product_id) {
			$.ajax({
				url: 'index.php?route=product/compare/add',
				type: 'post',
				data: 'product_id=' + product_id,
				dataType: 'json',
				success: function(json) {
					$('.alert-success').remove();

					if (json['success']) {
						$('.top-block').before('<div class="success-info"><div class="success-content"><span class="icon"><i class="fa fa-check-circle"></i></span>' + '<span class="text">' + json['success'] + '</span>' + '</div>' + '</div>');

						$('#compare-total > .compare-text').html(json['total']).parent().attr('title', json['total']);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		},
		'remove': function() {

		}
	},
	'ajax':function(url, setting) {
		if (typeof url == 'object') {
			setting = url;
			if (typeof setting['url'] === 'undefined') {
				return false;
			} else {
				url = setting['url'];
			}
		}
		if (typeof setting['type'] !== 'undefined') {
			setting['metod'] = setting['type'];
		}
		if (typeof setting['metod'] === 'undefined') {
			setting['metod'] = 'GET';
		}
		if (typeof setting['responseType'] === 'undefined') {
			setting['responseType'] = 'json';
		}
		if (typeof setting['dataType'] === 'undefined') {
			setting['dataType'] = 'text';
		}
		if (typeof setting['data'] === 'undefined') {
			setting['data'] = '';
		}
		if (typeof setting['async'] === 'undefined') {
			setting['async'] = true;
		}
		if (typeof setting['user'] === 'undefined') {
			setting['user'] = null;
		}
		if (typeof setting['password'] === 'undefined') {
			setting['password'] = null;
		}
		if (typeof setting['beforeSend'] === 'undefined') {
			setting['beforeSend'] = function() {};
		}
		if (typeof setting['success'] === 'undefined') {
			setting['success'] = function(json) {};
		}
		if (typeof setting['error'] === 'undefined') {
			setting['error'] = function(error) {};
		}
		if (typeof setting['complete'] === 'undefined') {
			setting['complete'] = function(json) {};
		}
		if (typeof setting['debug'] === 'undefined') {
			setting['debug'] = false;
		}
		setting['beforeSend']();
		var datanew = null;
		if (setting['data']) {
			var i, i2, i3;
			if (typeof setting['data'] == 'object' && ('val' in setting['data'] || 'values' in setting['data'])) {
				datanew = {};
				for (i in setting['data']) {
					if (isNaN(i) == false) {
						datanew[setting['data'][i]['name']] = setting['data'][i]['value'];
					}
				}
				setting['data'] = datanew;
				setting['dataType'] = 'text';
			}

			if (setting['dataType'] == 'json') {
				datanew = JSON.stringify(setting['data']);
			} else {
				if (typeof FormData !== 'undefined') {
					datanew = new FormData();
					if (typeof setting['data'] == 'object') {
						for (i in setting['data']) {
							if (typeof setting['data'][i] == 'object') {
								for (i2 in setting['data'][i]) {
									if (typeof setting['data'][i][i2] == 'object') {
										for (i3 in setting['data'][i][i2]) {
											datanew.append(i + '[' + i2 + ']' + '[' + i3 + ']', setting['data'][i][i2][i3]);
										}
									} else {
										datanew.append(i + '[' + i2 + ']', setting['data'][i][i2]);
									}
								}
							} else {
								datanew.append(i, setting['data'][i]);
							}
						}
					} else {
						datanew = setting['data'];
					}
				} else {
					datanew = [];
					if (typeof setting['data'] == 'object') {
						for (i in setting['data']) {
							if (typeof setting['data'][i] == 'object') {
								for (i2 in setting['data'][i]) {
									if (typeof setting['data'][i][i2] == 'object') {
										for (i3 in setting['data'][i][i2]) {
											datanew.push(encodeURIComponent(i) + '[' + encodeURIComponent(i2) + ']' + '[' + encodeURIComponent(i3) + ']=' + encodeURIComponent(setting['data'][i][i2][i3]));
										}
									} else {
										datanew.push(encodeURIComponent(i) + '[' + encodeURIComponent(i2) + ']=' + encodeURIComponent(setting['data'][i][i2]));
									}
								}
							} else {
								datanew.push(encodeURIComponent(i) + '=' + encodeURIComponent(setting['data'][i]));
							}
						}
					} else {
						datanew = setting['data'];
					}

					datanew = datanew.join('&').replace(/%20/g, '+');
				}
			}
		}

		var xhr = new XMLHttpRequest();
		xhr.open(setting['metod'], url, setting['async'], setting['user'], setting['password']);
		xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		if (typeof FormData === 'undefined') {
			if (setting['dataType'] == 'json') {
				xhr.setRequestHeader('Content-type', 'application/json;charset=UTF-8');
			} else if (setting['dataType'] == 'text') {
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
			}
		}
		if (setting['responseType']) {
			xhr.responseType = setting['responseType']; //\"text\" – строка,\"arraybuffer\", \"blob\", \"document\", \"json\" – JSON (парсится автоматически).
		}
		if (setting['debug']) {
			console.log('xhr data: ', datanew);
		}
		xhr.send(datanew);
		xhr.onload = function(oEvent) {
			if (xhr.status == 200) {
				setting['success'](xhr.response, xhr);
				setting['complete'](xhr.response, xhr);
				return xhr;
			} else {
				var ajaxOptions = setting;
				var thrownError = false;
				setting['error'](xhr, ajaxOptions, thrownError);
				setting['complete'](xhr, ajaxOptions, thrownError);
				return xhr;
			}
		};

		return true;
	},
	'scrollHistory':function(e, x, y) {
		if (typeof x === 'undefined') {
			x = window.scrollX;
		}
		if (typeof y === 'undefined') {
			y = window.scrollY;
		}

		//console.log({'ele':e,'x':x, 'y':y}, e);
		window.window.localStorage.setItem('scrollHistory', JSON.stringify({'x':x, 'y':y}));
	},
	'scrollTo':function(p) {
		var setting = {}
		setting[p] = 0;
		setting['behavior'] = 'smooth';
		window.scrollTo(setting);
	}
};

window.$.ajax = disco.ajax;
window.busAjax = disco.ajax;

if (!window.$.ajax) {
	$.ajax = disco.ajax;
}

/* Agree to Terms */
$(document).delegate('.agree', 'click', function(e) {
	e.preventDefault();

	$('#modal-agree').remove();

	var element = this;

	$.ajax({
		url: $(element).attr('href'),
		type: 'GET',
		dataType: 'html',
		success: function(data) {
			html  = '<div id="modal-agree" class="modal">';
			html += '  <div class="modal-dialog">';
			html += '    <div class="modal-content">';
			html += '      <div class="modal-header">';
			html += '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			html += '        <h4 class="modal-title">' + $(element).text() + '</h4>';
			html += '      </div>';
			html += '      <div class="modal-body">' + data + '</div>';
			html += '    </div>';
			html += '  </div>';
			html += '</div>';

			$('body').append(html);

			$('#modal-agree').modal('show');
		}
	});
});

// Autocomplete */
+(function($) {
	$.fn.autocomplete = function(option) {
		return this.each(function() {
			this.timer = null;
			this.items = new Array();

			$.extend(this, option);

			$(this).attr('autocomplete', 'off');

			// Focus
			$(this).on('focus', function() {
				this.request();
			});

			// Blur
			$(this).on('blur', function() {
				setTimeout(function(object) {
					object.hide();
				}, 200, this);
			});

			// Keydown
			$(this).on('keydown', function(event) {
				switch(event.keyCode) {
					case 27: // escape
						this.hide();
						break;
					default:
						this.request();
						break;
				}
			});

			// Click
			this.click = function(event) {
				event.preventDefault();

				value = $(event.target).parent().attr('data-value');

				if (value && this.items[value]) {
					this.select(this.items[value]);
				}
			};

			// Show
			this.show = function() {
				var pos = $(this).position();

				$(this).siblings('ul.dropdown-menu').css({
					top: pos.top + $(this).outerHeight(),
					left: pos.left
				});

				$(this).siblings('ul.dropdown-menu').show();
			};

			// Hide
			this.hide = function() {
				$(this).siblings('ul.dropdown-menu').hide();
			};

			// Request
			this.request = function() {
				clearTimeout(this.timer);

				this.timer = setTimeout(function(object) {
					object.source($(object).val(), $.proxy(object.response, object));
				}, 200, this);
			};

			// Response
			this.response = function(json) {
				html = '';

				if (json.length) {
					for (i = 0; i < json.length; i++) {
						this.items[json[i]['value']] = json[i];
					}

					for (i = 0; i < json.length; i++) {
						if (!json[i]['category']) {
							html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
						}
					}

					// Get all the ones with a categories
					var category = new Array();

					for (i = 0; i < json.length; i++) {
						if (json[i]['category']) {
							if (!category[json[i]['category']]) {
								category[json[i]['category']] = new Array();
								category[json[i]['category']]['name'] = json[i]['category'];
								category[json[i]['category']]['item'] = new Array();
							}

							category[json[i]['category']]['item'].push(json[i]);
						}
					}

					for (i in category) {
						html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';

						for (j = 0; j < category[i]['item'].length; j++) {
							html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
						}
					}
				}

				if (html) {
					this.show();
				} else {
					this.hide();
				}

				$(this).siblings('ul.dropdown-menu').html(html);
			};

			$(this).after('<ul class="dropdown-menu"></ul>');
			$(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this.click, this));

		});
	};

	disco.scroll_status['go-top'] = {};
	disco.scroll_status['go-top']['yes'] = true;
	disco.scroll_status['go-top']['no'] = true;
	$(document).on('scroll', function() {
		if ($(window).scrollTop() > 250) {
			if (disco.scroll_status['go-top']['yes']) {
				disco.scroll_status['go-top']['no'] = true;
				disco.scroll_status['go-top']['yes'] = false;
				$('#go-top').addClass('show');//.show();
			}
		} else {
			if (disco.scroll_status['go-top']['no']) {
				disco.scroll_status['go-top']['no'] = false;
				disco.scroll_status['go-top']['yes'] = true;
				$('#go-top').removeClass('show');//.hide();
			}
		}
	});
})(window.jQuery);

/* disco.scroll_status['go-top'] = {};
disco.scroll_status['go-top']['yes'] = true;
disco.scroll_status['go-top']['no'] = true;
document.addEventListener('scroll', function(e) {
	if (document.documentElement.scrollTop > 250) {
		if (disco.scroll_status['go-top']['yes']) {
			disco.scroll_status['go-top']['no'] = true;
			disco.scroll_status['go-top']['yes'] = false;
			console.log(disco.scroll_status['go-top']['yes']);
			var element = document.getElementById('go-top');
			if (element) {
				element.hidden = false;
				setTimeout(function() {
					element.addClassDisco('show'); //.ClassList.add('show');
				}, 300);
			}
		}
	} else {
		if (disco.scroll_status['go-top']['no']) {
			disco.scroll_status['go-top']['no'] = false;
			disco.scroll_status['go-top']['yes'] = true;
			console.log(disco.scroll_status['go-top']['no']);
			var element = document.getElementById('go-top');
			if (element) {
				element.removeClassDisco('show'); //.ClassList.remove('show');
				setTimeout(function() {
					element.hidden = true;
				}, 300);
			}
		}
	}
}); */

document.addEventListener('DOMContentLoaded', function() {
	// Highlight any found errors
	$('.text-danger').each(function() {
		var element = $(this).parent().parent();

		if (element.hasClass('form-group')) {
			element.addClass('has-error');
		}
	});

	// Currency
	$('#form-currency .currency-select').on('click', function(e) {
		e.preventDefault();

		$('#form-currency input[name=\'code\']').val($(this).attr('name'));

		$('#form-currency').submit();
	});

	// Language
	$('#form-language .language-select').on('click', function(e) {
		e.preventDefault();

		$('#form-language input[name=\'code\']').val($(this).attr('name'));

		$('#form-language').submit();
	});

	/* Search */
	$('#search input[name=\'search\']').parent().find('button').on('click', function() {
		var url = $('base').attr('href') + 'index.php?route=product/search';

		var value = $('header #search input[name=\'search\']').val();

		if (value) {
			url += '&search=' + encodeURIComponent(value);
		}

		window.location.href = url;
	});

	$('#search input[name=\'search\']').on('keydown', function(e) {
		if (e.keyCode == 13) {
			$('header #search input[name=\'search\']').parent().find('button').trigger('click');
		}
	});

	// Menu
	$('#menu .dropdown-menu').each(function() {
		var menu = $('#menu').offset();
		var dropdown = $(this).parent().offset();

		var i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#menu').outerWidth());

		if (i > 0) {
			$(this).css('margin-left', '-' + (i + 10) + 'px');
		}
	});

	// Product Grid
	$('#grid-view').click(function() {
		var cols = $('#column-right, #column-left').length;

		if (cols == 2) {
			$('#content .product-list, #content .product-compact').attr('class', 'product-layout product-grid col-lg-6 col-md-6 col-sm-12 col-xs-12');
		} else if (cols == 1) {
			$('#content .product-list, #content .product-compact').attr('class', 'product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12');
		} else {
			$('#content .product-list, #content .product-compact').attr('class', 'product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12');
		}

		$('#grid-view').addClass('active');
		$('#list-view').removeClass('active');
		$('#compact-view').removeClass('active');

		window.localStorage.setItem('display', 'grid');
	});

	// Product List
	$('#list-view').click(function() {
		$('#content .product-grid, #content .product-compact').attr('class', 'product-layout product-list col-xs-12');

		$('#grid-view').removeClass('active');
		$('#list-view').addClass('active');
		$('#compact-view').removeClass('active');

		window.localStorage.setItem('display', 'list');
	});

	// Product Compact
	$('#compact-view').click(function() {
		$('#content .product-grid, #content .product-list').attr('class', 'product-layout product-compact col-xs-12');

		$('#grid-view').removeClass('active');
		$('#list-view').removeClass('active');
		$('#compact-view').addClass('active');

		window.localStorage.setItem('display', 'compact');
	});

	if (window.localStorage.getItem('display') == 'list') {
		$('#list-view').trigger('click');
	} else if (window.localStorage.getItem('display') == 'compact') {
		$('#compact-view').trigger('click');
	} else {
		$('#grid-view').trigger('click');
	}

	//Module-container layout fix
	cols = $('#column-right, #column-left').length;
	productSet =  $('#content .product-layout:not(.product-list,.product-grid,.product-compact)');
	if (cols == 2) {
		productSet.attr('class', 'product-layout col-lg-6 col-md-6 col-sm-12 col-xs-12');
	} else if (cols == 1) {
		productSet.attr('class', 'product-layout col-lg-4 col-md-4 col-sm-12 col-xs-12');
	} else {
		productSet.attr('class', 'product-layout col-lg-3 col-md-3 col-sm-12 col-xs-12');
	}

	// Checkout
	$(document).on('keydown', '#collapse-checkout-option input[name=\'email\'], #collapse-checkout-option input[name=\'password\']', function(e) {
		if (e.keyCode == 13) {
			$('#collapse-checkout-option #button-login').trigger('click');
		}
	});

	// tooltips on hover
	$('[data-toggle=\'tooltip\']').tooltip({container: 'body',trigger: 'hover'});

	// Makes tooltips work on ajax generated content
	$(document).ajaxStop(function() {
		$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
	});

	var scroll = window.localStorage.getItem('scrollHistory');

	if (scroll) {
		scroll = JSON.parse(scroll);
		if (typeof scroll.x === 'undefined') {
			scroll.x = 0;
		}
		if (typeof scroll.y === 'undefined') {
			scroll.y = 0;
		}
		if ('scrollRestoration' in window.history) {
			if (window.history.scrollRestoration == 'auto') {
				//html.style['scroll-behavior'] = 'auto';
				window.history.scrollRestoration = 'manual'; //manual, auto
			}
		}
		//location.href = location.href + '#input-sort';
		//console.log(window.scrollY)
		//console.log(scroll);
		window.scrollTo({
			left: scroll.x,
			top: scroll.y,
			behavior: 'auto' //smooth, auto
		});
		//console.log(window.scrollY);
		//console.log(window);
		//console.log(window.scrollY);

		window.window.localStorage.removeItem('scrollHistory');
	} else {
		if ('scrollRestoration' in window.history) {
			//html.style['scroll-behavior'] = 'smooth';
			window.history.scrollRestoration = 'auto'; //manual, auto
		}
	}

	/* $(document).on("click.bs.dropdown.data-api", ".account-menu,.search-block,.cart-block", function (e) {
		e.stopPropagation();
	}); */

	$('.minus').click(function() {
		var $input = $(this).parent().parent().find('input[name="quantity"]');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();

		return false;
	});

	$('.plus').click(function() {
		var $input = $(this).parent().parent().find('input[name="quantity"]');
		$input.val(parseInt($input.val()) + 1);
		$input.change();

		return false;
	});

	if (window.innerWidth < 1025) {
		$(document).mouseup(function (e) {
			var div = $(".menu"); 
			if (!div.is(e.target) && div.has(e.target).length === 0) { 
				div.removeClass('menu-open'); 
			}
		});

		$(".toggler").click(function() {
			$(".menu").toggleClass("menu-open");
		});

		$(".close-btns").click(function() {
			$(".menu").removeClass("menu-open");
		});

		$('.menu ul li > .carets').on('click', function(){
			//$(this).removeAttr('href');
			var element = $(this).parent('li');
			if (element.hasClass('open')) {
				element.removeClass('open');
				element.find('li').removeClass('open');
				element.find('ul').slideUp();
			} else {
				element.addClass('open');
				element.children('ul').slideDown();
				element.siblings('li').children('ul').slideUp();
				element.siblings('li').removeClass('open');
				element.siblings('li').find('li').removeClass('open');
				element.siblings('li').find('ul').slideUp();
			}
		});

		$('.menu ul li > .carets').append('<span class="holder"></span>');
	}

	/* $('[data-toggle=\'tooltip\']').tooltip({
		trigger : 'hover',
		container: 'body'
	}); */
});
