<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */


if ( ! function_exists( 'corponess_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since corponess 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponess_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'corponess_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corponess_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since corponess 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponess_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'corponess_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'corponess_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since corponess 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponess_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Travel Master Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function corponess_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'corponess_theme_options[slider_section_enable]' )->value() );
}


/**
 * Check if service section is enabled.
 *
 * @since Travel Master Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function corponess_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'corponess_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since Travel Master Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function corponess_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'corponess_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if about section content type is custom.
 *
 * @since Travel Master Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function corponess_is_about_section_content_custom_enable( $control ) {
	$content_type = $control->manager->get_setting( 'corponess_theme_options[about_content_type]' )->value();
	return corponess_is_about_section_enable( $control ) && ( 'custom' == $content_type );
}

/**
 * Check if about section content type is page.
 *
 * @since Travel Master Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function corponess_is_about_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'corponess_theme_options[about_content_type]' )->value();
	return corponess_is_about_section_enable( $control ) && ( 'page' == $content_type );
}


/**
 * Check if testimonial section is enabled.
 *
 * @since Travel Master Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function corponess_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'corponess_theme_options[testimonial_section_enable]' )->value() );
}


/**
 * Check if blog section is enabled.
 *
 * @since Travel Master Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function corponess_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'corponess_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Travel Master Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function corponess_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'corponess_theme_options[blog_content_type]' )->value();
	return corponess_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is post.
 *
 * @since Travel Master Pro 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function corponess_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'corponess_theme_options[blog_content_type]' )->value();
	return corponess_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

function corponess_is_blog_section_hr_enable( $control ) {
	$content_type = $control->manager->get_setting( 'corponess_theme_options[blog_content_type]' )->value();
	return corponess_is_blog_section_enable( $control ) && ( in_array( $content_type, array('post', 'page') ) );
}







