<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sargent Ave
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
	<div class="wrapper">
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'sargent' ) );
					if ( $categories_list && sargent_categorized_blog() ) :
				?>
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', 'sargent' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'sargent' ) );
					if ( $tags_list ) :
				?>
				<span class="tags-links">
					<?php printf( __( 'Tagged %1$s', 'sargent' ), $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'sargent' ), __( '1 Comment', 'sargent' ), __( '% Comments', 'sargent' ) ); ?></span>
			<?php endif; ?>

			<?php edit_post_link( __( 'Edit', 'sargent' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .wrapper -->
</article><!-- #post-## -->