/**
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
})(jQuery);