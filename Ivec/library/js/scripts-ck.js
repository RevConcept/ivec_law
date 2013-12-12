/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
	window.getComputedStyle = function(el, pseudo) {
		this.el = el;
		this.getPropertyValue = function(prop) {
			var re = /(\-([a-z]){1})/g;
			if (prop == 'float') prop = 'styleFloat';
			if (re.test(prop)) {
				prop = prop.replace(re, function () {
					return arguments[2].toUpperCase();
				});
			}
			return el.currentStyle[prop] ? el.currentStyle[prop] : null;
		}
		return this;
	}
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {

	/*
	Responsive jQuery is a tricky thing.
	There's a bunch of different ways to handle
	it, so be sure to research and find the one
	that works for you best.
	*/
	
	/* getting viewport width */
	var responsive_viewport = $(window).width();
	
	/* if is below 481px */
	if (responsive_viewport < 481) {
	
	} /* end smallest screen */
	
	/* if is larger than 481px */
	if (responsive_viewport > 481) {
	
	} /* end larger than 481px */

	/* if is less than to 768px */
	if (responsive_viewport < 768) {

		//mobile menu
		var ivec_menu = {
			nav_wrap: $('#nav-wrap'),
			header_nav: $('#nav-wrap'),
			header_height: $('.header .nav').outerHeight(),
			track_drawer: 'open',
			set_close: function() {
				if(this.track_drawer != 'closed') {
					this.header_nav.removeClass('open');
					this.header_nav.animate({ height: 0, opacity: 0}, 200, 'swing');
					
					this.header_nav.addClass('closed');
					this.track_drawer = 'closed';
				}
			},
			set_open: function() {
				if(this.track_drawer != 'open') {
					this.header_nav.removeClass('closed');
					
					this.header_nav.animate({ height: this.header_height, opacity: 1}, 200, 'swing');
					this.header_nav.addClass('open');
					this.track_drawer = 'open';
				}
			},
			init: function() {
				if(this.track_drawer == 'closed') {
					this.set_open();
				} else {
					this.set_close();
				}
			}
		};

		window.ivec_menu = ivec_menu;
		ivec_menu.init();
		console.log(ivec_menu);

		$('.menu-btn', '#mobile-menu').click( function() {
			ivec_menu.init();
		});
	}

	
	/* if is above or equal to 768px */
	if (responsive_viewport >= 768) {

		//we have a special sidebar that has three states: regular position, fixed at bottom, and sticky at bottom 
		//make our sidebar with properties and functions
		var ivec_sidebar = {
			window_scroll: $(window).scrollTop(),
			track_position: 'scrolling',
			main_height: $('#main').height(),
			logo_wrap_height: $('#logo-wrapper').outerHeight(true),
			tsml_top: $('#tsml-sidebar').position().top,
			tsml_sidebar: $('#tsml-sidebar'),
			sideb