<?php
/**
 * service Section options
 *
 * @package Theme Palace
 * @subpackage Travel Master Pro
 * @since Travel Master Pro 1.0.0
 */

// Add service section
$wp_customize->add_section( 'corponess_service_section', array(
	'title'             => esc_html__( 'Service','corponess' ),
	'description'       => esc_html__( 'Service Section options.', 'corponess' ),
	'panel'             => 'corponess_front_page_panel',
) );

// service content enable control and setting
$wp_customize->add_setting( 'corponess_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'corponess' ),
	'section'           => 'corponess_service_section',
	'on_off_label' 		=> corponess_switch_options(),
) ) );

// service title setting and control
$wp_customize->add_setting( 'corponess_theme_options[service_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponess_theme_options[service_title]', array(
	'label'           	=> esc_html__( 'Title', 'corponess' ),
	'section'        	=> 'corponess_service_section',
	'active_callback' 	=> 'corponess_is_service_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corponess_theme_options[service_title]', array(
		'selector'            => '#our-services .section-header h2',
		'settings'            => 'corponess_theme_options[service_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corponess_service_title_partial',
    ) );
}


for ( $i = 1; $i <= 3; $i++ ) :
	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponess_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponess_sanitize_page',
	) );

	$wp_customize->add_control( new Corponess_Dropdown_Chooser( $wp_customize, 'corponess_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponess' ), $i ),
		'section'           => 'corponess_service_section',
		'choices'			=> corponess_page_choices(),
		'active_callback'	=> 'corponess_is_service_section_enable',
	) ) );

	$wp_customize->add_setting( 'corponess_theme_options[service_content_icon_' . $i . ']', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'			=> $options['service_content_icon_'.$i ],
    ) );

    $wp_customize->add_control( new Corponess_Icon_Picker( $wp_customize, 'corponess_theme_options[service_content_icon_' . $i . ']', array(
        'label'             => sprintf( esc_html__( 'Select Icon %d', 'corponess' ), $i ),
        'section'           => 'corponess_service_section',
        'active_callback'   => 'corponess_is_service_section_enable',
    ) ) );

    $wp_customize->add_setting( 'corponess_theme_options[service_hr_'. $i .']', array(
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new Corponess_Customize_Horizontal_Line( $wp_customize, 'corponess_theme_options[service_hr_'. $i .']',
        array(
            'section'           => 'corponess_service_section',
            'active_callback'   => 'corponess_is_service_section_enable',
            'type'            => 'hr'
    ) ) );
endfor;
