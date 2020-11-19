<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage corponess
* @since corponess 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'corponess_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'corponess_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'corponess_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'corponess' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'corponess' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
	'active_callback' => 'corponess_is_static_homepage_enable',
) );