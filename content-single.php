<?php
/**
 * @package Sargent Ave
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header"> 
		<?php if ( sargent_featured_image_test() ) { ?>
		<div class="banner">
			<figure>
				<?php sargent_featured_image_fallback(); ?>
			</figure>
		</div><!-- banner -->
		<?php } ?>
		<div class="banner-text">
			<div>
				<div class="<?php if(get_theme_mod('sargent_title_vert_alignment')) : echo get_theme_mod('sargent_title_vert_alignment') ; endif; 
					if(get_theme_mod('sargent_title_horz_alignment')) : echo ' ' . get_theme_mod('sargent_title_horz_alignment') ; endif;?>">
						<div class="wrapper">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</div><!-- wrapper -->
				</div><!-- div div-->
			</div><!-- div -->
		</div><!-- article wrapper-->
	</header><!-- .entry-header -->
	<div class="wrapper">
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'sargent' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .wrapper -->
	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'sargent' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'sargent' ) );

			if ( ! sargent_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'sargent' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'sargent' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'sargent' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'sargent' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'sargent' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
