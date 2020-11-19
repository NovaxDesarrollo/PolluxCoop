<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'corponess_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','corponess' ),
	'description'       => esc_html__( 'Excerpt section options.', 'corponess' ),
	'panel'             => 'corponess_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'corponess_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'corponess_sanitize_number_range',
	'validate_callback' => 'corponess_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'corponess_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'corponess' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'corponess' ),
	'section'     		=> 'corponess_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );
