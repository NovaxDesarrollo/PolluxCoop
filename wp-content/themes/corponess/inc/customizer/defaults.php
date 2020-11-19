<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 * @return array An array of default values
 */

function corponess_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$corponess_default_options = array(
		// Color Options
		'header_title_color'			=> '#2e2e36',
		'header_tagline_color'			=> '#5c5f6b',
		'header_txt_logo_extra'			=> 'show-all',

		
		// loader
		'loader_icon'         			=> 'default',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'menu_sticky'					=> true,
		'social_nav_enable'				=> true,

		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'corponess' ), '[the-year]', '[site-link]' ),
		'footer_social_enable'			=> true,
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'slider,service,about,testimonial,blog',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'corponess' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,
		'hide_author'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		'nav_search_enable'				=> true,

		// slider search
		'slider_section_enable'			=> false,
		'slider_btn_label'				=> esc_html__( 'Learn More', 'corponess' ),

		//service 
		'service_section_enable'		=> false,
		'service_title'					=> esc_html__( 'Simple & Easy Services', 'corponess' ),
		'service_content_icon_1'		=> esc_html__( 'fa-mortar-board', 'corponess' ),
		'service_content_icon_2'		=> esc_html__( 'fa-user', 'corponess' ),
		'service_content_icon_3'		=> esc_html__( 'fa-book', 'corponess' ),

		//about 
		'about_content_type'		=> 'page',
		'about_section_enable'		=> false,
		'about_title'				=> esc_html__( 'About Us', 'corponess' ),
		'about_description'			=> esc_html__( 'Get know about us', 'corponess' ),
		'about_btn_title'			=> esc_html__( 'Learn More', 'corponess' ),


		// blog
		'blog_section_enable'			=> false,
		'blog_content_type'				=> 'recent',
		'blog_title'					=> esc_html__( 'Latest News', 'corponess' ),
		'blog_btn_title'				=> esc_html__( 'View All Articles', 'corponess' ),

		// testimonial
		'testimonial_section_enable'	=> false,
		'testimonial_title'				=> esc_html__( 'Clients Testimonials', 'corponess' ),
		
	);

	$output = apply_filters( 'corponess_default_theme_options', $corponess_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}