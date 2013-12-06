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
			scrollbtm: $('.sidebar-scroll').offset().top,
			sidebar: $('.sidebar-scroll'),
			window_scroll: $(window).scrollTop(),
			track_position: 'reg-position',
			sidebar_height: $('#sidebar1').height() + $('.footer').height(),
			check_main_height: function() {
				if($('#main').height() < this.sidebar_height) {
					$('#sidebar1').css('height', this.sidebar_height);
				}
			},
			set_reg_position: function() {
				if (this.track_position != 'reg-position') {
		    		this.sidebar.removeClass('fixed-at-bottom sticky-at-bottom');
		    		this.sidebar.addClass('reg-position');
		    		this.track_position = 'reg-position';
		    	}
			},
			set_fixed_bottom: function() {
				if (this.track_position != 'fixed-at-bottom') {
			    	this.sidebar.removeClass('sticky-at-bottom reg-position');
			    	this.sidebar.addClass('fixed-at-bottom');
			    	this.track_position = 'fixed-at-bottom';
			    }
			},
			set_sticky_bottom: function() {
				if (this.track_position != 'sticky-at-bottom') {
		    		this.sidebar.removeClass('fixed-at-bottom reg-position');
		    		$('#sidebar1').css({'height': $('#sidebar-bg').height()})
		    		this.sidebar.addClass('sticky-at-bottom');
		    		this.track_position = 'sticky-at-bottom';
		    	}
			},
			isTopInView: function(elem) {
			    docViewTop = $(window).scrollTop();
			    docViewBottom = docViewTop + $(window).height();
			    elemTop = $(elem).offset().top;
			    return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
			},
			init: function(y) {
				this.check_main_height();
				if(!y) {
					window_scroll = this.window_scroll;
				} else {
					window_scroll = y;
				}

				if(window_scroll >= -1 && window_scroll <= this.scrollbtm ) {
					this.set_reg_position();
			    } else if(window_scroll > this.scrollbtm && !this.isTopInView($('.footer')) ) {
			    	this.set_fixed_bottom();
			    } else if( this.isTopInView($('.footer')) ) {
			    	this.set_sticky_bottom();
			    } else {
			    	this.set_reg_position();
			    }
			}
		}

		window.ivec_sidebar = ivec_sidebar;
		ivec_sidebar.init();
		
		$(window).scroll(function (event) {
		    console.log($(window).height() + " " + $(window).width());
		    var y = $(this).scrollTop();
		    ivec_sidebar.init(y);
		   
	 	});

	
		/* load gravatars */
		$('.comment img[data-gravatar]').each(function(){
			$(this).attr('src',$(this).attr('data-gravatar'));
		});
		
	}
	
	/* off the bat large screen actions */
	if (responsive_viewport > 1030) {
	
	}
	
	
	// add all your scripts here

		//testimonials page isotope script
		var $container = $('.tsml-container');
		if($container.isotope) {
			$container.isotope({		
			  masonry: {
			    columnWidth: 33
			  }
			});

			$('.tsml-filters a').click(function(){
			  var selector = $(this).attr('data-filter');
			  $container.isotope({ filter: selector });
			  return false;
			});
		}

		//nivo slider
		if($('#slider').length) {
			$(window).load(function() {				
		        $('#slider').nivoSlider();		    	
		    });
		}
		
 
}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
	var doc = w.document;
	if( !doc.querySelector ){ return; }
	var meta = doc.querySelector( "meta[name=viewport]" ),
		initialContent = meta && meta.getAttribute( "content" ),
		disabledZoom = initialContent + ",maximum-scale=1",
		enabledZoom = initialContent + ",maximum-scale=10",
		enabled = true,
		x, y, z, aig;
	if( !meta ){ return; }
	function restoreZoom(){
		meta.setAttribute( "content", enabledZoom );
		enabled = true; }
	function disableZoom(){
		meta.setAttribute( "content", disabledZoom );
		enabled = false; }
	function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
		if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );