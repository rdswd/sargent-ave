<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Sargent Ave
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<div class="wrapper">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .wrapper -->
</div><!-- #secondary -->
