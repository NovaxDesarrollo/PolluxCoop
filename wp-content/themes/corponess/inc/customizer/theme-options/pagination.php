<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'corponess_pagination', array(
	'title'               => esc_html__('Pagination','corponess'),
	'description'         => esc_html__( 'Pagination section options.', 'corponess' ),
	'panel'               => 'corponess_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'corponess_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'corponess_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'corponess' ),
	'section'             => 'corponess_pagination',
	'on_off_label' 		=> corponess_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'corponess_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'corponess_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'corponess_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'corponess' ),
	'section'             => 'corponess_pagination',
	'type'                => 'select',
	'choices'			  => corponess_pagination_options(),
	'active_callback'	  => 'corponess_is_pagination_enable',
) );
