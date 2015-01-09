<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sargent Ave
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<?php if ( get_theme_mod('sargent_footer_logo') ) : ?>
			<div class="logo">
					<img src="<?php echo get_theme_mod('sargent_footer_logo'); ?>" />
			</div>
			<?php endif; ?>
			<div class="site-info">
				<?php if ( get_theme_mod('sargent_show_theme_info') ) : ?>
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'sargent' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'sargent' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'sargent' ), 'Sargent Ave', '<a href="http://rdswebdesign.com" rel="designer">RDS Web Design</a>' ); ?>
				<?php endif; ?>
			</div><!-- .site-info -->
		</div><!-- .wrapper -->
		<?php if ( get_theme_mod('sargent_footer_copyright') ) : ?>
		<div class="copyright">
			<?php echo get_theme_mod('sargent_footer_copyright'); ?>
		</div>
		<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
