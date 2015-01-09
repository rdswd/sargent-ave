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
