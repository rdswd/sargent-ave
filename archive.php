<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sargent Ave
 */

get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
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
									<h1 class="page-title">
										<?php
											if ( is_category() ) :
												single_cat_title();

											elseif ( is_tag() ) :
												single_tag_title();

											elseif ( is_author() ) :
												printf( __( 'Author: %s', 'sargent' ), '<span class="vcard">' . get_the_author() . '</span>' );

											elseif ( is_day() ) :
												printf( __( 'Day: %s', 'sargent' ), '<span>' . get_the_date() . '</span>' );

											elseif ( is_month() ) :
												printf( __( 'Month: %s', 'sargent' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'sargent' ) ) . '</span>' );

											elseif ( is_year() ) :
												printf( __( 'Year: %s', 'sargent' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'sargent' ) ) . '</span>' );

											elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
												_e( 'Asides', 'sargent' );

											elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
												_e( 'Galleries', 'sargent' );

											elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
												_e( 'Images', 'sargent' );

											elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
												_e( 'Videos', 'sargent' );

											elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
												_e( 'Quotes', 'sargent' );

											elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
												_e( 'Links', 'sargent' );

											elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
												_e( 'Statuses', 'sargent' );

											elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
												_e( 'Audios', 'sargent' );

											elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
												_e( 'Chats', 'sargent' );

											else :
												_e( 'Archives', 'sargent' );

											endif;
										?>
									</h1>
								</div><!-- wrapper -->
							</div><!-- div div-->
						</div><!-- div -->
				</div><!-- article wrapper-->
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
			<div class="wrapper">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php sargent_paging_nav(); ?>
			</div><!--wrapper -->
			<?php else : ?>
				<div class="wrapper">
				<?php get_template_part( 'content', 'none' ); ?>
				</div><!--wrapper-->
			<?php endif; ?>
			
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
