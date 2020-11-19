<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */

/**
 * corponess_footer_primary_content hook
 *
 * @hooked corponess_add_contact_section -  10
 *
 */
do_action( 'corponess_footer_primary_content' );

/**
 * corponess_content_end_action hook
 *
 * @hooked corponess_content_end -  10
 *
 */
do_action( 'corponess_content_end_action' );

/**
 * corponess_content_end_action hook
 *
 * @hooked corponess_footer_start -  10
 * @hooked corponess_Footer_Widgets->add_footer_widgets -  20
 * @hooked corponess_footer_site_info -  40
 * @hooked corponess_footer_end -  100
 *
 */
do_action( 'corponess_footer' );

/**
 * corponess_page_end_action hook
 *
 * @hooked corponess_page_end -  10
 *
 */
do_action( 'corponess_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
