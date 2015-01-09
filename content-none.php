<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sargent Ave
 */
?>

<section class="no-results not-found">
	<header class="entry-header">
			<?php if ( get_header_image() ) : ?>
				<div class="banner">
					<figure>
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</figure>
				</div><!-- banner -->
				<?php endif; // End header image check. ?>	
				<div class="banner-text">
						<div>
							<div class="<?php if(get_theme_mod('sargent_title_vert_alignment')) : echo get_theme_mod('sargent_title_vert_alignment') ; endif; 
									if(get_theme_mod('sargent_title_horz_alignment')) : echo ' ' . get_theme_mod('sargent_title_horz_alignment') ; endif;?>">
								<div class="wrapper">
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
								</div><!-- wrapper -->
							</div><!-- div div-->
						</div><!-- div -->
				</article><!-- article wrapper-->
	</header><!-- .entry-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'sargent' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sargent' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sargent' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
