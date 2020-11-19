<?php
/**
 * corponess Customizer.
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */


//load upgrade-to-pro section
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corponess_customize_register( $wp_customize ) {
	$options = corponess_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load partial callback functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Header title color setting and control.
	$wp_customize->add_setting( 'corponess_theme_options[header_title_color]', array(
		'default'           => $options['header_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'corponess_theme_options[header_title_color]', array(
		'priority'			=> 5,
		'label'             => esc_html__( 'Header Title Color', 'corponess' ),
		'section'           => 'colors',
	) ) );

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'corponess_theme_options[header_tagline_color]', array(
		'default'           => $options['header_tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'corponess_theme_options[header_tagline_color]', array(
		'priority'			=> 6,
		'label'             => esc_html__( 'Header Tagline Color', 'corponess' ),
		'section'           => 'colors',
	) ) );

	// Site identity extra options.
	$wp_customize->add_setting( 'corponess_theme_options[header_txt_logo_extra]', array(
		'default'           => $options['header_txt_logo_extra'],
		'sanitize_callback' => 'corponess_sanitize_select',
		'transport'			=> 'refresh'
	) );

	$wp_customize->add_control( 'corponess_theme_options[header_txt_logo_extra]', array(
		'priority'			=> 50,
		'type'				=> 'radio',
		'label'             => esc_html__( 'Site Identity Extra Options', 'corponess' ),
		'section'           => 'title_tagline',
		'choices'				=> array( 
			'hide-all'     => esc_html__( 'Hide All', 'corponess' ),
			'show-all'     => esc_html__( 'Show All', 'corponess' ),
			'title-only'   => esc_html__( 'Title Only', 'corponess' ),
			'tagline-only' => esc_html__( 'Tagline Only', 'corponess' ),
			'logo-title'   => esc_html__( 'Logo + Title', 'corponess' ),
			'logo-tagline' => esc_html__( 'Logo + Tagline', 'corponess' ),
			)
	) );




	// Add panel for common theme options
	$wp_customize->add_panel( 'corponess_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','corponess' ),
	    'description'=> esc_html__( 'corponess Theme Options.', 'corponess' ),
	    'priority'   => 150,
	) );

	// breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load menu
	require get_template_directory() . '/inc/customizer/theme-options/menu.php';

	// load static homepage option
	require get_template_directory() . '/inc/customizer/theme-options/homepage-static.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	
	// load single post option
	require get_template_directory() . '/inc/customizer/theme-options/single-posts.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	// Add panel for front page theme options.
	$wp_customize->add_panel( 'corponess_front_page_panel' , array(
	    'title'      => esc_html__( 'Front Page','corponess' ),
	    'description'=> esc_html__( 'Front Page Theme Options.', 'corponess' ),
	    'priority'   => 140,
	) );

	// load slider option
	require get_template_directory() . '/inc/customizer/sections/slider.php';

	// load service option
	require get_template_directory() . '/inc/customizer/sections/service.php';

	// load about option
	require get_template_directory() . '/inc/customizer/sections/about.php';

	// load testimonial option
	require get_template_directory() . '/inc/customizer/sections/testimonial.php';

	// load blog option
	require get_template_directory() . '/inc/customizer/sections/blog.php';


}
add_action( 'customize_register', 'corponess_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corponess_customize_preview_js() {
	wp_enqueue_script( 'corponess-customizer', get_template_directory_uri() . '/assets/js/customizer' . corponess_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'corponess_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function corponess_customize_control_js() {
	// fontawesome
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome' . corponess_min() . '.css' );
	
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . corponess_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . corponess_min() . '.js', array( 'jquery' ), '1.4.2', true );

	// simple icon picker
	wp_enqueue_style( 'simple-iconpicker-css', get_template_directory_uri() . '/assets/css/simple-iconpicker' . corponess_min() . '.css' );
	wp_enqueue_script( 'jquery-simple-iconpicker', get_template_directory_uri() . '/assets/js/simple-iconpicker' . corponess_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_style( 'corponess-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls' . corponess_min() . '.css' );
	wp_enqueue_script( 'corponess-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . corponess_min() . '.js', array(), '1.0', true );
	$corponess_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'corponess' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'corponess-customize-controls', 'corponess_reset_data', $corponess_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'corponess_customize_control_js' );

if ( !function_exists( 'corponess_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since corponess 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function corponess_reset_options() {
		$options = corponess_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'corponess_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'corponess_reset_options' );
