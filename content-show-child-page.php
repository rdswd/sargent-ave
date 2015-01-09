<?php
/**
 * The custom template used for displaying page content in child-page-template.php
 *
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
					if ( get_theme_mod('sargent_title_horz_alignment')) : echo ' ' . get_theme_mod('sargent_title_horz_alignment') ; endif;?>">
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
		<?php edit_post_link( __( 'Edit', 'sargent' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
			<!-- Child Page Section -->
			<?php 
			$whats_the_page_id = get_queried_object_id();		  
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
					?>
						<article class="hentry">
							<div class="featured-wrapper">
								<?php 
								$no_postthumbnail = 0;
								if ( has_post_thumbnail( $child->ID ) ) :
									echo get_the_post_thumbnail( $child->ID, 'st_related_image' );
								else :
									$no_postthumbnail = 1;
								endif;
								?>
								<header class="entry-header <?php if ( $no_postthumbnail ) : echo 'no-thumbnail'; endif;?>">
									<h1 class="entry-title">
										<a href="<?php echo get_page_link( $child->ID ); ?>"><?php echo $child->post_title; ?></a>
									</h1>
								</header><!-- entry-title -->
								<div class="entry-content">
									<p>
										<?php echo $content; ?>
									</p>
									<a href="<?php echo get_permalink($child->ID); ?>" class="button">
										Read More
									</a>
								</div>

							</div>
						</article>
					<?php } /* end of foreach */ ?>
				</div><!-- wrapper -->
			</section>
			<?php } ?><!-- children -->
</article><!-- #post-## -->

