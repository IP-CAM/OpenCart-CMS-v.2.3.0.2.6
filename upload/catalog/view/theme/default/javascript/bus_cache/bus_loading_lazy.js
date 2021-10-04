// *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
// *   © 2016-2021; BuslikDrev - Усе правы захаваныя.

	var busLoadingLazy = {
		'validate':!('bus-loading' in HTMLImageElement.prototype && 'bus-loading' in HTMLIFrameElement.prototype) && 'onscroll' in window,
		'status':false,
		'start':function(quantity) {
			busLoadingLazy.status = true;
			//var images = document.querySelectorAll('img[bus-loading="lazy"]');
			//var images = document.images;
			var images = document.querySelectorAll('img[bus-loading="lazy"][data-src*="."]');

			if (images) {
				for (var i = 0; i < (!isNaN(quantity) ? quantity : images.length); i++) {
					if (images[i] && (images[i].getBoundingClientRect().top <= window.innerHeight && images[i].getBoundingClientRect().bottom >= 0) && getComputedStyle(images[i]).display != 'none') {
						images[i].setAttribute('src', images[i].getAttribute('data-src'));
						images[i].style['opacity'] = 1;
						images[i].removeAttribute('data-src');
					}
				}
			}
		}
	};
	if (busLoadingLazy.validate) {
		//window.addEventListener('load', busLoadingLazy.start);
		document.addEventListener('DOMContentLoaded', function() {
			if (busLoadingLazy.status == false) {
				busLoadingLazy.start(10);
			}
		});
		window.addEventListener('load', function() {
			if (busLoadingLazy.status == false) {
				busLoadingLazy.start(10);
			}
		});
		window.onload = function() {
			if (busLoadingLazy.status == false) {
				busLoadingLazy.start(10);
			}
		};
		window.addEventListener('scroll', busLoadingLazy.start);
		window.addEventListener('resize', busLoadingLazy.start);
		window.addEventListener('orientationchange', busLoadingLazy.start);
	}