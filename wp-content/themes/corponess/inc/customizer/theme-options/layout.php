<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'corponess_layout', array(
	'title'               => esc_html__('Layout','corponess'),
	'description'         => esc_html__( 'Layout section options.', 'corponess' ),
	'panel'               => 'corponess_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'corponess_theme_options[site_layout]', array(
	'sanitize_callback'   => 'corponess_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Corponess_Custom_Radio_Image_Control ( $wp_customize, 'corponess_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'corponess' ),
	'section'             => 'corponess_layout',
	'choices'			  => corponess_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'corponess_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'corponess_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Corponess_Custom_Radio_Image_Control ( $wp_customize, 'corponess_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'corponess' ),
	'section'             => 'corponess_layout',
	'choices'			  => corponess_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'corponess_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'corponess_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Corponess_Custom_Radio_Image_Control ( $wp_customize, 'corponess_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'corponess' ),
	'section'             => 'corponess_layout',
	'choices'			  => corponess_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'corponess_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'corponess_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Corponess_Custom_Radio_Image_Control( $wp_customize, 'corponess_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'corponess' ),
	'section'             => 'corponess_layout',
	'choices'			  => corponess_sidebar_position(),
) ) );