"use strict";

jQuery(document).ready(function($) {
	jQuery( '.swipebox' ).swipebox();
})

//smoothscroll
jQuery(document).ready(function () {
	jQuery(document).on("scroll", onScroll);
	
	jQuery('a[href^="#"]').on('click', function (e) {
		e.preventDefault();
		jQuery(document).off("scroll");
		jQuery('a').each( function () {
			jQuery(this).removeClass('active');
		});
		jQuery(this).addClass('active');
		
		let target = this.hash;
		jQuery('html, body').stop().animate({
			'scrollTop': jQuery(target).offset().top+2
		}, 500, 'swing', function () {
			window.location.hash = target;
			jQuery(document).on("scroll", onScroll);
		});
	});
});

function onScroll(event) {
	let scrollPos = jQuery(document).scrollTop();
	jQuery('.nav a').each(function () {
		let currLink = jQuery(this),
			refElement = jQuery(currLink.attr("href"));
		if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
			jQuery('sidebar a').removeClass("active");
			currLink.addClass("active");
		}
		else{
			currLink.removeClass("active");
		}
	});
}