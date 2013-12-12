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
			header_nav: $('#nav-wrap'),
			nav_ul: $('.header .nav'),
			header_height: $('.header .nav').outerHeight(),
			track_drawer: 'open',
			set_close: function() {
				if(this.track_drawer != 'closed') {
					this.header_nav.removeClass('open');
					this.header_nav.animate({ height: 0, opacity: 0}, 200, 'swing');
					this.nav_ul.hide();
					this.header_nav.addClass('closed');
					this.track_drawer = 'closed';
				}
			},
			set_open: function() {
				if(this.track_drawer != 'open') {
					this.header_nav.removeClass('closed');
					this.header_nav.animate({ height: this.header_height, opacity: 1}, 200, 'swing');
					this.nav_ul.show()
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
			tsml_top: $('#tsml-sidebar').position().top - 40,
			tsml_sidebar: $('#tsml-sidebar'),
			sidebar_scroll_outer: $('.sidebar-scroll').outerHeight(true),
			tsml_height: $('#tsml-sidebar').height(),
			set_scrolling_tsml: function() {
				if (this.track_position != 'scrolling') {
		    		this.tsml_sidebar.removeClass('fixed-tsml');
		    		this.tsml_sidebar.css({top:''});
		    		this.track_position = 'scrolling';
		    	}
			},
			set_fixed_tsml: function() {
				if (this.track_position != 'fixed') {
			    	this.tsml_sidebar.css({top: this.logo_wrap_height - 40});
			    	this.tsml_sidebar.addClass('fixed-tsml');
			    	this.track_position = 'fixed';
			    }
			},
			init: function(y) {
				
				if(!y) {
					window_scroll = this.window_scroll;
				} else {
					window_scroll = y;
				}

				if(window_scroll >= 0 && this.tsml_top > window_scroll) {
					this.set_scrolling_tsml();
				} else if(this.tsml_top <= window_scroll && window_scroll != 0) {
					this.set_fixed_tsml();
			    } else {
			    	this.set_scrolling_tsml();
			    }
			},
			set_sidebar_height: function() {
				if(this.main_height < this.sidebar_scroll_outer) {
					console.log(this.main_height + " sidebar " + this.sidebar_scroll_outer);
					$('#sidebar1').css('height', this.sidebar_scroll_outer + 150);
				}
			}
		}

		window.ivec_sidebar = ivec_sidebar;
		ivec_sidebar.set_sidebar_height();
		ivec_sidebar.init();
		
		$(window).scroll(function () {
		    y = $(window).scrollTop();
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
		 $.Isotope.prototype._getCenteredMasonryColumns = function() {
		    this.width = this.element.width();
		    
		    var parentWidth = this.element.parent().width();
		    
		                  // i.e. options.masonry && options.masonry.columnWidth
		    var colW = this.options.masonry && this.options.masonry.columnWidth ||
		                  // or use the size of the first item
		                  this.$filteredAtoms.outerWidth(true) ||
		                  // if there's no items, use size of container
		                  parentWidth;
		    
		    var cols = Math.floor( parentWidth / colW );
		    cols = Math.max( cols, 1 );

		    // i.e. this.masonry.cols = ....
		    this.masonry.cols = cols;
		    // i.e. this.masonry.columnWidth = ...
		    this.masonry.columnWidth = colW;
		  };
		  
		  $.Isotope.prototype._masonryReset = function() {
		    // layout-specific props
		    this.masonry = {};
		    // FIXME shouldn't have to call this again
		    this._getCenteredMasonryColumns();
		    var i = this.masonry.cols;
		    this.masonry.colYs = [];
		    while (i--) {
		      this.masonry.colYs.push( 0 );
		    }
		  };

		  $.Isotope.prototype._masonryResizeChanged = function() {
		    var prevColCount = this.masonry.cols;
		    // get updated colCount
		    this._getCenteredMasonryColumns();
		    return ( this.masonry.cols !== prevColCount );
		  };
		  
		  $.Isotope.prototype._masonryGetContainerSize = function() {
		    var unusedCols = 0,
		        i = this.masonry.cols;
		    // count unused columns
		    while ( --i ) {
		      if ( this.masonry.colYs[i] !== 0 ) {
		        break;
		      }
		      unusedCols++;
		    }
		    
		    return {
		          height : Math.max.apply( Math, this.masonry.colYs ),
		          // fit container to columns that have been used;
		          width : (this.masonry.cols - unusedCols) * this.masonry.columnWidth
		        };
		  };
		var $container = $('.tsml-container');
		if($container.isotope) {
			$container.isotope({		
			  masonry: {
			    gutterWidth: 10
			  }
			});

			$('.tsml-filters a').click(function(){
			  var selector = $(this).attr('data-filter');
			  $container.isotope({ filter: selector });
			  return false;
			});
		}

		//sidebar testimonial fade in/out
		$('.tsml-wrap').cycle();


 
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