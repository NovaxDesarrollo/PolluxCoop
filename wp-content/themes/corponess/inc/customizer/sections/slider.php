<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Travel Master Pro
 * @since Travel Master Pro 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'corponess_slider_section', array(
	'title'             => esc_html__( 'Main Slider','corponess' ),
	'description'       => esc_html__( 'Slider Section options.', 'corponess' ),
	'panel'             => 'corponess_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'corponess_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'corponess' ),
	'section'           => 'corponess_slider_section',
	'on_off_label' 		=> corponess_switch_options(),
) ) );


// Slider btn label setting and control
$wp_customize->add_setting( 'corponess_theme_options[slider_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_btn_label'],
) );

$wp_customize->add_control( 'corponess_theme_options[slider_btn_label]', array(
	'label'           	=> esc_html__( 'Slider Button Label', 'corponess' ),
	'section'        	=> 'corponess_slider_section',
	'active_callback' 	=> 'corponess_is_slider_section_enable',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 3; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponess_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponess_sanitize_page',
	) );

	$wp_customize->add_control( new Corponess_Dropdown_Chooser( $wp_customize, 'corponess_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponess' ), $i ),
		'section'           => 'corponess_slider_section',
		'choices'			=> corponess_page_choices(),
		'active_callback'	=> 'corponess_is_slider_section_enable',
	) ) );

endfor;
