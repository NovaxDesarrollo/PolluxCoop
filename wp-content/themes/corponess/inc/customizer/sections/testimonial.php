<?php
/**
 * testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Travel Master Pro
 * @since Travel Master Pro 1.0.0
 */

// Add testimonial section
$wp_customize->add_section( 'corponess_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','corponess' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'corponess' ),
	'panel'             => 'corponess_front_page_panel',
) );

// testimonial content enable control and setting
$wp_customize->add_setting( 'corponess_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'corponess' ),
	'section'           => 'corponess_testimonial_section',
	'on_off_label' 		=> corponess_switch_options(),
) ) );

// testimonial title setting and control
$wp_customize->add_setting( 'corponess_theme_options[testimonial_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponess_theme_options[testimonial_title]', array(
	'label'           	=> esc_html__( 'Title', 'corponess' ),
	'section'        	=> 'corponess_testimonial_section',
	'active_callback' 	=> 'corponess_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corponess_theme_options[testimonial_title]', array(
		'selector'            => '#testimonial-section .section-header h2',
		'settings'            => 'corponess_theme_options[testimonial_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corponess_testimonial_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :
	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponess_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponess_sanitize_page',
	) );

	$wp_customize->add_control( new Corponess_Dropdown_Chooser( $wp_customize, 'corponess_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponess' ), $i ),
		'section'           => 'corponess_testimonial_section',
		'choices'			=> corponess_page_choices(),
		'active_callback'	=> 'corponess_is_testimonial_section_enable',
	) ) );
endfor;
