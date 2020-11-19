<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

$wp_customize->add_section( 'corponess_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','corponess' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'corponess' ),
	'panel'             => 'corponess_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'corponess_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'corponess_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'corponess' ),
	'section'          	=> 'corponess_breadcrumb',
	'on_off_label' 		=> corponess_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'corponess_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'corponess_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'corponess' ),
	'active_callback' 	=> 'corponess_is_breadcrumb_enable',
	'section'          	=> 'corponess_breadcrumb',
) );
