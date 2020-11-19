<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'corponess_reset_section', array(
	'title'             => esc_html__('Reset all settings','corponess'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'corponess' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'corponess_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'corponess_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'corponess_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'corponess' ),
	'section'           => 'corponess_reset_section',
	'type'              => 'checkbox',
) );
