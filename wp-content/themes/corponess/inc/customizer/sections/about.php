<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

// Add About section
$wp_customize->add_section( 'corponess_about_section', array(
	'title'             => esc_html__( 'About Us','corponess' ),
	'description'       => esc_html__( 'About Us Section options.', 'corponess' ),
	'panel'             => 'corponess_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'corponess_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'corponess' ),
	'section'           => 'corponess_about_section',
	'on_off_label' 		=> corponess_switch_options(),
) ) );

// About content type control and setting
$wp_customize->add_setting( 'corponess_theme_options[about_content_type]', array(
	'default'          	=> $options['about_content_type'],
	'sanitize_callback' => 'corponess_sanitize_select',
) );

$wp_customize->add_control( 'corponess_theme_options[about_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponess' ),
	'section'           => 'corponess_about_section',
	'type'				=> 'select',
	'active_callback' 	=> 'corponess_is_about_section_enable',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponess' ),
	),
) );


// about pages drop down chooser control and setting
$wp_customize->add_setting( 'corponess_theme_options[about_content_page]', array(
	'sanitize_callback' => 'corponess_sanitize_page',
) );

$wp_customize->add_control( new Corponess_Dropdown_Chooser( $wp_customize, 'corponess_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'corponess' ),
	'section'           => 'corponess_about_section',
	'choices'			=> corponess_page_choices(),
	'active_callback'	=> 'corponess_is_about_section_content_page_enable',
) ) );



// about btn title setting and control
$wp_customize->add_setting( 'corponess_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponess_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'corponess' ),
	'section'        	=> 'corponess_about_section',
	'active_callback' 	=> 'corponess_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corponess_theme_options[about_btn_title]', array(
		'selector'            => '#about-us a.btn',
		'settings'            => 'corponess_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corponess_about_btn_title_partial',
    ) );
}
