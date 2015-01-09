<?php
/**
 * Sargent Ave Theme Customizer
 *
 * @package Sargent Ave
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sargent_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Add section for Header */
	$wp_customize->add_section( 'sargent_header_customizer', array (
		'title'				=> __( 'Header', 'sargent' ),
		'priority'			=> 100,
	) );
		/* Header Settings and Controls */
		$wp_customize->add_setting( 'sargent_banner_image_heading', array( 'transport' => 'refresh', 'sanitize_callback' => 'esc_html' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sargent_banner_image_heading', array(
			'label'    			=> __( 'Use an Image to Replace Site Title ', 'sargent' ),
			'section'  			=> 'sargent_header_customizer',
			'settings' 			=> 'sargent_banner_image_heading',
			'priority'			=> 1
		) ) );
		$wp_customize->add_setting( 'sargent_title_vert_alignment', array( 'transport' => 'refresh', 'sanitize_callback' => 'esc_html'  ) );
		$wp_customize->add_control( 'sargent_title_vert_alignment', array(
			'type'				=> 'select',
			'label'				=> __( 'Title Vertical Alignment', 'sargent' ),
			'section'			=> 'sargent_header_customizer',
			'choices' 			=> array(
				'cell-top' 		=> 'Top',
				'cell-middle'	=> 'Middle',
				'cell-bottom'	=> 'Bottom',
			),
			'priority'			=> 2
		) );

		$wp_customize->add_setting( 'sargent_title_horz_alignment', array( 'transport' => 'refresh', 'sanitize_callback' => 'esc_html'  ) );
		$wp_customize->add_control( 'sargent_title_horz_alignment', array(
			'type'				=> 'select',
			'label'				=> __( 'Title Horizontal Alignment', 'sargent' ),
			'section'			=> 'sargent_header_customizer',
			'choices' 			=> array(
				'cell-left' 	=> 'Left',
				'cell-center'	=> 'Center',
				'cell-right'	=> 'Right',
			),
			'priority'			=> 3
		) );

	/* Add section for Front Page */
	$wp_customize->add_section( 'sargent_frontpage_customizer', array (
		'title'				=> __( 'Frontpage Customization', 'sargent' ),
		'priority'			=> 100,
	) );
		$wp_customize->add_setting( 'sargent_mission_statement', array( 'transport' => 'refresh', 'sanitize_callback' => 'esc_html'  ) );
		$wp_customize->add_control( 'sargent_mission_statement', array(
			'type'				=> 'text',
			'label'				=> __( 'Front Page Message', 'sargent' ),
			'section'			=> 'sargent_frontpage_customizer',
			'priority'			=> 2
		) );
		$wp_customize->add_setting( 'sargent_mission_statement_heading', array( 'transport' => 'refresh', 'sanitize_callback' => 'esc_html'  ) );
		$wp_customize->add_control( 'sargent_mission_statement_heading', array(
			'type'				=> 'text',
			'label'				=> __( 'Front Page Message Heading', 'sargent' ),
			'section'			=> 'sargent_frontpage_customizer',
			'priority'			=> 1
		) );
	
	/* Add section for Footer */
	$wp_customize->add_section( 'sargent_footer_customizer', array (
		'title'					=> __( 'Footer Customization', 'sargent' ),
		'priority'				=> 200,
	) );
		$wp_customize->add_setting( 'sargent_footer_logo', array( 'transport' => 'refresh', 'sanitize_callback' => 'esc_html' ) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sargent_footer_logo', array(
			'label'    			=> __( 'Use an Image to put your logo in the footer ', 'sargent' ),
			'section'  			=> 'sargent_footer_customizer',
			'settings' 			=> 'sargent_footer_logo',
			'priority'			=> 1
		) ) );
		$wp_customize->add_setting( 'sargent_show_theme_info', array( 'transport' => 'refresh', 'sanitize_callback' => 'sargent_sanitize_checkbox' ) );
		$wp_customize->add_control( 'sargent_show_theme_info', array(
			'type'				=> 'checkbox',
			'label'				=> __('Show WordPress & Theme info', 'sargent'),
			'section'			=> 'sargent_footer_customizer',
			'priority'			=> 2
		) );
		$wp_customize->add_setting( 'sargent_footer_copyright', array( 'transport' => 'refresh', 'sanitize_callback' => 'esc_html' ) );
		$wp_customize->add_control( 'sargent_footer_copyright', array(
			'type'				=> 'text',
			'label'				=> __('Add your copyright here', 'sargent'),
			'section'			=> 'sargent_footer_customizer',
			'priority'			=> 3
		) );
}
add_action( 'customize_register', 'sargent_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sargent_customize_preview_js() {
	wp_enqueue_script( 'sargent_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'sargent_customize_preview_js' );
																	  
function sargent_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}