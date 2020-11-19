<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage corponess
	 * @since corponess 1.0.0
	 */

	/**
	 * corponess_doctype hook
	 *
	 * @hooked corponess_doctype -  10
	 *
	 */
	do_action( 'corponess_doctype' );

?>
<head>
<?php
	/**
	 * corponess_before_wp_head hook
	 *
	 * @hooked corponess_head -  10
	 *
	 */
	do_action( 'corponess_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * corponess_page_start_action hook
	 *
	 * @hooked corponess_page_start -  10
	 *
	 */
	do_action( 'corponess_page_start_action' ); 

	/**
	 * corponess_header_action hook
	 *
	 * @hooked corponess_header_start -  10
	 * @hooked corponess_site_branding -  20
	 * @hooked corponess_site_navigation -  30
	 * @hooked corponess_header_end -  50
	 *
	 */
	do_action( 'corponess_header_action' );

	/**
	 * corponess_content_start_action hook
	 *
	 * @hooked corponess_content_start -  10
	 *
	 */
	do_action( 'corponess_content_start_action' );

	/**
	 * corponess_header_image_action hook
	 *
	 * @hooked corponess_header_image -  10
	 *
	 */
	do_action( 'corponess_header_image_action' );

    if ( corponess_is_frontpage() ) {
    	$options = corponess_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'corponess_primary_content', 'corponess_add_'. $section .'_section' );
		}
		do_action( 'corponess_primary_content' );
	}