<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'corponess_single_post_section', array(
	'title'             => esc_html__( 'Single Post','corponess' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'corponess' ),
	'panel'             => 'corponess_theme_options_panel',
) );

// Tourableve date meta setting and control.
$wp_customize->add_setting( 'corponess_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'corponess' ),
	'section'           => 'corponess_single_post_section',
	'on_off_label' 		=> corponess_hide_options(),
) ) );

// Tourableve author meta setting and control.
$wp_customize->add_setting( 'corponess_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'corponess' ),
	'section'           => 'corponess_single_post_section',
	'on_off_label' 		=> corponess_hide_options(),
) ) );

// Tourableve author category setting and control.
$wp_customize->add_setting( 'corponess_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'corponess' ),
	'section'           => 'corponess_single_post_section',
	'on_off_label' 		=> corponess_hide_options(),
) ) );

// Tourableve tag category setting and control.
$wp_customize->add_setting( 'corponess_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'corponess' ),
	'section'           => 'corponess_single_post_section',
	'on_off_label' 		=> corponess_hide_options(),
) ) );
