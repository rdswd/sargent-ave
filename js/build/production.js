/**
 * Specific javascript for this theme
 *
 * Comments to follow as needed
 */

( function( $ ) {
	$('a[href^="#"]').on('click', function(event) {

		var target = $( $(this).attr('href') );

		if( target.length ) {
			event.preventDefault();
			$('html, body').animate({
				scrollTop: target.offset().top -65
			}, 1000);
		}

	});
} )( jQuery );
;/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */

(function ($) {
 /*** 
  * Run this code when the menu-toggle link has been tapped
  * or clicked
  */
	$('.menu-toggle').on('touchstart click', function (e) {
		e.preventDefault();
		var $menu = $('.menu').first(),
			
		/* Cross browser support for CSS "transition end" event */
			transitionEnd = 'transitionend webkitTransitionEnd otransitionend MSTransitionEnd';
		
		/* When the toggle menu link is clicked, animation starts */
		$menu.addClass('left');
		/***
		* Determine the direction of the animation and
		* add the correct direction class depending
		* on whether the menu was already visible.
		*/
		if ($menu.hasClass('menu-visible')) {
			$menu.addClass('right');
		} else {
			$menu.addClass('left');
		}
  
		/**
		* When the animation (technically a CSS transition)
		* has finished, remove all animating classes and
		* either add or remove the "menu-visible" class 
		* depending whether it was visible or not previously.
		*/
		$menu.on(transitionEnd, function () {
			$menu
				.removeClass('left right')
				.toggleClass('menu-visible');
			$menu.off(transitionEnd);
		});
 
	});
})(jQuery);;( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();
