<?php
/**
 * blog Section options
 *
 * @package Theme Palace
 * @subpackage Travel Master Pro
 * @since Travel Master Pro 1.0.0
 */

// Add blog section
$wp_customize->add_section( 'corponess_blog_section', array(
	'title'             => esc_html__( 'Blog','corponess' ),
	'description'       => esc_html__( 'Blog Section options.', 'corponess' ),
	'panel'             => 'corponess_front_page_panel',
) );

// blog content enable control and setting
$wp_customize->add_setting( 'corponess_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'corponess_sanitize_switch_control',
) );

$wp_customize->add_control( new Corponess_Switch_Control( $wp_customize, 'corponess_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'corponess' ),
	'section'           => 'corponess_blog_section',
	'on_off_label' 		=> corponess_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'corponess_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponess_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'corponess' ),
	'section'        	=> 'corponess_blog_section',
	'active_callback' 	=> 'corponess_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'corponess_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2',
		'settings'            => 'corponess_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'corponess_blog_title_partial',
    ) );
}


// blog content type control and setting
$wp_customize->add_setting( 'corponess_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'corponess_sanitize_select',
) );

$wp_customize->add_control( 'corponess_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponess' ),
	'section'           => 'corponess_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'corponess_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'corponess' ),
		'recent' 	=> esc_html__( 'Recent', 'corponess' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'corponess_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'corponess_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Corponess_Dropdown_Taxonomies_Control( $wp_customize,'corponess_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'corponess' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'corponess' ),
	'section'           => 'corponess_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'corponess_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'corponess_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'corponess_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Corponess_Dropdown_Category_Control( $wp_customize,'corponess_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'corponess' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'corponess' ),
	'section'           => 'corponess_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'corponess_is_blog_section_content_recent_enable'
) ) );