<?php
/**
 * The template used for displaying page content in page.php
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
			<div id="q-and-a-repeatables">
				<ul>
				<?php $q_and_a_s = get_post_meta( $post->ID, 'q-and-a-repeatables', true ); ?>
				<?php if ( ! empty( $q_and_a_s ) ) { 
					$no=1;
					foreach ( $q_and_a_s as $q_and_a ) { ?>
							<li target="<?php echo $no; ?>">
								<h2><?php echo esc_attr( $q_and_a['question'] ); ?></h2>
								<span>
									<?php echo esc_attr( $q_and_a['answer'] ); ?>
								</span>
							</li>
				<?php $no++;  } ?>

				<?php } ?>
				</ul>
			</div><!-- #q-and-a-repeatables -->  
		</div><!-- .entry-content -->
	</div><!-- .wrapper -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'sargent' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
