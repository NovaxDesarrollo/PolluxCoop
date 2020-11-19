<?php
/**
 * Testimonial section
 *
 * This is the template for the content of testimonial section
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */
if ( ! function_exists( 'corponess_add_testimonial_section' ) ) :
    /**
    * Add testimonial section
    *
    *@since corponess 1.0.0
    */
    function corponess_add_testimonial_section() {
        $options = corponess_get_theme_options();
        // Check if testimonial is enabled on frontpage
        $testimonial_enable = apply_filters( 'corponess_section_status', true, 'testimonial_section_enable' );

        if ( true !== $testimonial_enable ) {
            return false;
        }
        // Get testimonial section details
        $section_details = array();
        $section_details = apply_filters( 'corponess_filter_testimonial_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render testimonial section now.
        corponess_render_testimonial_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponess_get_testimonial_section_details' ) ) :
    /**
    * testimonial section details.
    *
    * @since corponess 1.0.0
    * @param array $input testimonial section details.
    */
    function corponess_get_testimonial_section_details( $input ) {
        $options = corponess_get_theme_options();
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['testimonial_content_page_' . $i] ) ) :
                $page_ids[] = $options['testimonial_content_page_' . $i];
            endif;
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    

        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = corponess_trim_content( 50 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id() ) : '';

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
// testimonial section content details.
add_filter( 'corponess_filter_testimonial_section_details', 'corponess_get_testimonial_section_details' );


if ( ! function_exists( 'corponess_render_testimonial_section' ) ) :
  /**
   * Start testimonial section
   *
   * @return string testimonial content
   * @since corponess 1.0.0
   *
   */
   function corponess_render_testimonial_section( $content_details = array() ) {
        $options = corponess_get_theme_options();
        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="testimonial-section" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['testimonial_title'] ) ): ?>
                        <h2 class="section-title">
                            <?php echo esc_html( $options['testimonial_title'] ) ; ?>
                        </h2>
                    <?php endif ?>
                </div><!-- .section-header -->

                <div class="testimonial-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": false, "speed": 1500, "dots": false, "arrows": true, "autoplay": false, "draggable": true, 
                    "fade": false }'>
                    <?php foreach ( $content_details as $content ): ?>
                        <article>
                            <div class="testimonial-item-wrapper">
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ) ;  ?>">
                                        <img src="<?php echo esc_url( $content['image'] ) ;  ?>" alt="<?php echo esc_attr( $content['title'] ) ; ?>">
                                    </a>
                                </div><!-- .featured-image -->

                                <div class="entry-container">
                                    <div class="entry-content">
                                        <p>
                                            <?php echo wp_kses_post( $content['excerpt'] ) ; ?>
                                        </p>
                                    </div><!-- .entry-content -->

                                    <div class="separator"></div>

                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="<?php echo esc_url( $content['url'] ) ; ?>">
                                                <?php echo esc_html( $content['title'] ) ; ?>
                                            </a>
                                        </h2>                                       
                                    </header>
                                </div><!-- .entry-container -->
                            </div><!-- .testimonial-item-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .testimonial-slider -->
            </div><!-- .wrapper -->
        </div><!-- #testimonial-section -->
    <?php }
endif;
