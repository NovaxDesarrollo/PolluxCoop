<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function corponess_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'corponess' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function corponess_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'corponess' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}


if ( ! function_exists( 'corponess_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function corponess_selected_sidebar() {
        $corponess_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'corponess' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'corponess' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'corponess' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'corponess' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'corponess' ),
        );

        $output = apply_filters( 'corponess_selected_sidebar', $corponess_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'corponess_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function corponess_site_layout() {
        $corponess_site_layout = array(
            'wide-layout'  => esc_url(get_template_directory_uri() . '/assets/images/full.png'),
            'boxed-layout' => esc_url(get_template_directory_uri() . '/assets/images/boxed.png'),
        );

        $output = apply_filters( 'corponess_site_layout', $corponess_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'corponess_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function corponess_global_sidebar_position() {
        $corponess_global_sidebar_position = array(
            'right-sidebar' => esc_url(get_template_directory_uri() . '/assets/images/right.png'),
            'no-sidebar'    => esc_url(get_template_directory_uri() . '/assets/images/full.png'),
        );

        $output = apply_filters( 'corponess_global_sidebar_position', $corponess_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'corponess_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function corponess_sidebar_position() {
        $corponess_sidebar_position = array(
            'right-sidebar' => esc_url(get_template_directory_uri() . '/assets/images/right.png'),
            'no-sidebar'    => esc_url(get_template_directory_uri() . '/assets/images/full.png'),
        );

        $output = apply_filters( 'corponess_sidebar_position', $corponess_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'corponess_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function corponess_pagination_options() {
        $corponess_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'corponess' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'corponess' ),
        );

        $output = apply_filters( 'corponess_pagination_options', $corponess_pagination_options );

        return $output;
    }
endif;


if ( ! function_exists( 'corponess_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function corponess_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'corponess' ),
            'off'       => esc_html__( 'Disable', 'corponess' )
        );
        return apply_filters( 'corponess_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'corponess_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function corponess_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'corponess' ),
            'off'       => esc_html__( 'No', 'corponess' )
        );
        return apply_filters( 'corponess_hide_options', $arr );
    }
endif;



