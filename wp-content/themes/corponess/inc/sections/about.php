<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */
if ( ! function_exists( 'corponess_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since corponess 1.0.0
    */
    function corponess_add_about_section() {
    	$options = corponess_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'corponess_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'corponess_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        corponess_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponess_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since corponess 1.0.0
    * @param array $input about section details.
    */
    function corponess_get_about_section_details( $input ) {
        $options = corponess_get_theme_options();

        // Content type.
        $about_content_type  = $options['about_content_type'];
        $content = array();

        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
        $args = array(
        'post_type'         => 'page',
        'page_id'           => $page_id,
        'posts_per_page'    => 1,
        );                    


        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = corponess_trim_content( 50 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// about section content details.
add_filter( 'corponess_filter_about_section_details', 'corponess_get_about_section_details' );


if ( ! function_exists( 'corponess_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since corponess 1.0.0
   *
   */
   function corponess_render_about_section( $content_details = array() ) {
        $options = corponess_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
         <div id="about-us" class="relative page-section same-background">
                <div class="wrapper">
                    <?php foreach( $content_details as $content ):?>
                        <article class="<?php echo ! empty( $content['image'] ) ? 'has' : 'no' ; ?>-post-thumbnail">
                            <?php if ( ! empty( $content['image'] ) ): ?>
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ) ; ?>');">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="post-thumbnail-link"></a>
                                </div><!-- .featured-image -->
                            <?php endif ?>
                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php echo esc_url( $content['url'] ) ; ?>">
                                            <?php echo esc_html( $content['title'] ) ; ?>
                                        </a>
                                    </h2>
                                </header>

                                <div class="entry-content">
                                    <p>
                                        <?php echo wp_kses_post( $content['excerpt'] ) ; ?>
                                    </p>
                                </div><!-- .entry-content -->
                                <?php if ( ! empty( $options['about_btn_title'] )): ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn">
                                            <?php echo esc_html( $options['about_btn_title'] ) ; ?>
                                        </a>
                                    </div><!-- .read-more -->
                                <?php endif ?>                               
                            </div><!-- .entry-container -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .wrapper -->
            </div><!-- #about-us -->

        <?php 
    }
endif;