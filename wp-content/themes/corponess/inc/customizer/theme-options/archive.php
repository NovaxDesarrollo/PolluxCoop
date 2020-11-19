<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'corponess_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','corponess' ),
	'description'       => esc_html__( 'Archive section options.', 'corponess' ),
	'panel'             => 'corponess_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'corponess_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponess_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'corponess' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'corponess' ),
	'section'           => 'corponess_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'corponess_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'corponess_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'corponess' ),
	'section'           => 'corponess_archive_section',
	'on_off_label' 		=> corponess_hide_options(),
) ) );

// Tourableve author meta setting and control.
$wp_customize->add_setting( 'corponess_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'corponess' ),
	'section'           => 'corponess_archive_section',
	'on_off_label' 		=> corponess_hide_options(),
) ) );