// *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
// *   © 2016-2022; BuslikDrev - Усе правы захаваныя.

var busLoadingLazy = {
	'validate':!('loading' in HTMLImageElement.prototype && 'loading' in HTMLIFrameElement.prototype) && 'onscroll' in window,
	'setting':{
		start: 0,
		quantity: 10,
		exception: {}
	},
	'status':false,
	'start':function(start, quantity) {
		busLoadingLazy.status = true;
		var elements = document.querySelectorAll('img[loading="lazy"][data-src], iframe[loading="lazy"][data-src]');

		if (elements) {
			for (var i = (!isNaN(start) ? start : 0); i < (!isNaN(quantity) ? quantity : elements.length); i++) {
				if (elements[i] && busLoadingLazy.setting['exception'][elements[i].getAttribute('data-src')] != true && (elements[i].getBoundingClientRect().top <= window.innerHeight && elements[i].getBoundingClientRect().bottom >= 0) && getComputedStyle(elements[i]).display != 'none') {
					elements[i].setAttribute('src', elements[i].getAttribute('data-src'));
					console.log(elements[i]);
					elements[i].style['opacity'] = 1;
					elements[i].removeAttribute('data-src');
				}
			}
		}
	}
};

if (typeof window.CustomEvent !== 'function') {
	window.CustomEvent = function(event, params) {
		params = params || {bubbles:false, cancelable:false, detail:null};

		var evt = document.createEvent('CustomEvent');
		evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);

		return evt;
	};
}

document.addEventListener('DOMContentLoaded', function() {
	if (busLoadingLazy.status == false) {
		document.dispatchEvent(new CustomEvent('busLoadingLazy', {bubbles: true}));
		busLoadingLazy.start(busLoadingLazy.setting['start'], busLoadingLazy.setting['quantity']);
		busLoadingLazy.setting['exception'] = {};
	}
});
window.addEventListener('load', function() {
	if (busLoadingLazy.status == false) {
		document.dispatchEvent(new CustomEvent('busLoadingLazy', {bubbles: true}));
		busLoadingLazy.start(busLoadingLazy.setting['start'], busLoadingLazy.setting['quantity']);
		busLoadingLazy.setting['exception'] = {};
	}
});
window.addEventListener('mouseover', busLoadingLazy.start, {once:true, passive:true});
window.addEventListener('touchstart', busLoadingLazy.start, {once:true, passive:true});
window.addEventListener('scroll', busLoadingLazy.start);
window.addEventListener('resize', busLoadingLazy.start);
window.addEventListener('click', busLoadingLazy.start);
window.addEventListener('orientationchange', busLoadingLazy.start);