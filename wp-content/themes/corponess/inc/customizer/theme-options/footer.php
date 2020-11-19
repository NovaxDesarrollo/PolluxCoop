<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'corponess_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'corponess' ),
		'priority'   			=> 900,
		'panel'      			=> 'corponess_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'corponess_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'corponess_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'corponess_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'corponess' ),
		'section'    			=> 'corponess_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corponess_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'corponess_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corponess_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'corponess_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'corponess_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'corponess' ),
		'section'    			=> 'corponess_section_footer',
		'on_off_label' 		=> corponess_switch_options(),
    )
) );
