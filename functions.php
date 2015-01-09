<?php
/**
 * Sargent Ave functions and definitions
 *
 * @package Sargent Ave
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}
/**
 * This theme uses post-thumbnails
 * We're going to add two image sizes
 * st_featured_image && st_related_image
 */
add_theme_support( 'post-thumbnails' ); 
add_image_size('st_featured_image', 2650, 600, true );
add_image_size('st_related_image', 540, 300, true );


if ( ! function_exists( 'sargent_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sargent_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sargent Ave, use a find and replace
	 * to change 'sargent' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sargent', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sargent' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sargent_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // sargent_setup
add_action( 'after_setup_theme', 'sargent_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sargent_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sargent' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'sargent_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sargent_scripts() {
	wp_enqueue_style( 'sargent-style', get_stylesheet_uri() );

	wp_enqueue_script( 'sargent-js', get_template_directory_uri() . '/js/build/production.min.js', array( 'jquery' ), '20140820', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sargent_scripts' );
/**
 * Enqueue Typekit & Keep Header Clean
 */
function sargent_typekit() {
	wp_enqueue_script( 'sargent_typekit', '//use.typekit.net/nxp1pet.js');
}
add_action( 'wp_enqueue_scripts', 'sargent_typekit' );
function sargent_typekit_inline() {
	if ( wp_script_is( 'sargent_typekit', 'done' ) ) { ?>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }
}
add_action( 'wp_head', 'sargent_typekit_inline' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom header function to first check for Featured Image then fallback to customizer image
 */
function sargent_featured_image_fallback(){
	if ( has_post_thumbnail() ) {
		the_post_thumbnail('st_featured_image');
	} elseif ( get_header_image() ) {
	?>
	<div class="banner">
		<figure>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
			</a>
		</figure>
	</div>
	<?php 
	} else {
		return null;	
	}
}
/**
 * Simple test to see if have header image or a featured image
 * @returns true or false
 */
function sargent_featured_image_test(){
	$we_have_a_thumbnail = (bool) get_post_thumbnail_id();
	$we_have_a_backup_image = (bool) get_header_image();
	
	if ( $we_have_a_thumbnail ) :
		return true;
	elseif ( $we_have_a_backup_image ) :
		return true;
	else :
		return false;
	endif;
}

function sargent_add_excerpt_to_post() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'sargent_add_excerpt_to_post');

function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );