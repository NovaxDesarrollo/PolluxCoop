<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'corponess_menu', array(
	'title'             => esc_html__('Header Menu','corponess'),
	'description'       => esc_html__( 'Header Menu options.', 'corponess' ),
	'panel'             => 'nav_menus',
) );

// Menu sticky setting and control.
$wp_customize->add_setting( 'corponess_theme_options[menu_sticky]', array(
	'sanitize_callback' => 'corponess_sanitize_switch_control',
	'default'           => $options['menu_sticky'],
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[menu_sticky]', array(
	'label'             => esc_html__( 'Make Menu Sticky', 'corponess' ),
	'section'           => 'corponess_menu',
	'on_off_label' 		=> corponess_switch_options(),
) ) );

// search enable setting and control.
$wp_customize->add_setting( 'corponess_theme_options[social_nav_enable]', array(
	'sanitize_callback' => 'corponess_sanitize_switch_control',
	'default'           => $options['social_nav_enable'],
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[social_nav_enable]', array(
	'label'             => esc_html__( 'Enable Social Links', 'corponess' ),
	'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show social menu.', 'corponess' ), esc_html__( 'Click Here', 'corponess' ), esc_html__( 'to create menu', 'corponess' ) ),
	'section'           => 'corponess_menu',
	'on_off_label' 		=> corponess_switch_options(),
) ) );
