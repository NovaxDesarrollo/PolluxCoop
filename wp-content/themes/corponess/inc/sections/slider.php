<?php
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */
if ( ! function_exists( 'corponess_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since corponess 1.0.0
    */
    function corponess_add_slider_section() {
    	$options = corponess_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'corponess_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'corponess_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        corponess_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponess_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since corponess 1.0.0
    * @param array $input slider section details.
    */
    function corponess_get_slider_section_details( $input ) {
        $options = corponess_get_theme_options();
        
        $content = array();
  
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['slider_content_page_' . $i] ) )
                $page_ids[] = $options['slider_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    



            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = corponess_trim_content( 30 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// slider section content details.
add_filter( 'corponess_filter_slider_section_details', 'corponess_get_slider_section_details' );


if ( ! function_exists( 'corponess_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since corponess 1.0.0
   *
   */
   function corponess_render_slider_section( $content_details = array() ) {
        $options = corponess_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": true, "arrows": false, "autoplay": false, "draggable": true, "fade": true }'>
            <?php foreach ( $content_details as $content ): ?>
                <article style="background-image:url('<?php echo esc_url( $content['image'] ) ; ?>');">
                    <div class="overlay"></div>
                    <div class="wrapper">
                        <div class="featured-content-wrapper">
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
                            </div><!-- .entry-content-->

                            <div class="read-more">
                                <?php if ( ! empty( $options['slider_btn_label'] ) ): ?>
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn">
                                        <?php echo esc_html( $options['slider_btn_label'] ) ; ?>
                                    </a>
                                <?php endif; ?>
                                <?php if ( ! empty( $options['slider_alt_btn_label'] ) && ! empty( $options['slider_alt_btn_url'] ) ): ?>
                                    <a href="<?php echo esc_url( $options['slider_alt_btn_url'] ) ; ?>" class="btn">
                                        <?php echo esc_html( $options['slider_alt_btn_label'] ) ; ?>
                                    </a>                       
                                <?php endif; ?>                                
                                
                            </div><!-- .read-more -->
                        </div><!-- .featured-content-wrapper -->
                    </div><!-- .wrapper -->
                </article>
            <?php endforeach; ?>
        </div><!-- #featured-slider -->
                       
    <?php }
endif;