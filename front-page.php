<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sargent Ave
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( is_home() ) { ?>
		<?php if ( have_posts() ) : ?>

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

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?> 
		<?php } else { ?>
			<?php 
			/* 
			 * If this isn't a front page blog
			 * then lets show our page content in the header
			 *
			 */
			while ( have_posts() ) : the_post(); ?>

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
												<?php the_content(); ?>
											</div><!-- wrapper -->
										</div><!-- div div-->
									</div><!-- div -->
							</div><!-- article wrapper-->
				</header><!-- .entry-header -->
			</article><!-- #post-## -->
			<?php endwhile; // end of the loop. 
		// end of else
		} ?>
			
			<!-- Child Page Section -->
			<?php $whats_the_page_id = get_queried_object_id();		  
			$children = get_pages(array(
				'child_of' 		=> $whats_the_page_id,
				'parent'		=> $whats_the_page_id,
				'sort_order' 	=> 'ASC',
				'sort_column' 	=> 'menu_order'
			));
			if ($children) {
			
			?>
			<section class="featured">
				<div class="wrapper">
					<?php 
					foreach ( $children as $child ) { 
						$content = $child->post_excerpt;
						if ( ! $content ) 
							$content = $child->post_content;
						$content = apply_filters( 'the_excerpt',  get_post_field( 'post_excerpt', $child->ID ) );
						?>
						<article class="hentry">
							<div class="featured-wrapper">
								<?php echo get_the_post_thumbnail( $child->ID, 'st_related_image' ); ?>
								<header class="entry-header">
									<h1 class="entry-title">
										<a href="<?php echo get_page_link( $child->ID ); ?>"><?php echo $child->post_title; ?></a>
									</h1>
								</header><!-- entry-title -->
								<div class="entry-content">
									<?php echo $content; ?>
									<a href="<?php echo get_permalink($child->ID); ?>" class="button">
										Read More
									</a>
								</div>

							</div>
						</article>
					<?php } /* end of foreach */ ?>
				</div><!-- wrapper -->
			</section>
			<?php 	//children
			} ?> 
			<!-- Mission Statement Section -->
			<?php if ( get_theme_mod('sargent_mission_statement') ) : ?>
			<section class="small-feature">
				<article class="wrapper">
					<p><?php echo get_theme_mod('sargent_mission_statement'); ?></p>
					<h1><?php echo get_theme_mod('sargent_mission_statement_heading'); ?></h1>
				</article>
			</section>
			<?php endif; ?>
			
			<!-- Book Now Section and Form -->
			<section id="book-now" class="book-form">
				<div class="wrapper">
					<article class="clear">
						<h1 class="entry-title">Book Now</h1>
						<p>Bookings are by appointment and can be arranged by filling out the following form or calling/texting  Don Derksen at <a href="tel:204ß7822084">(204)782-2084</a></p>
						<?php echo do_shortcode('[contact-form-7 id="1424" title="Book an Appointment"]'); ?>
					</article>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
