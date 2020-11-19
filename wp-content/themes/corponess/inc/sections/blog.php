<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */
if ( ! function_exists( 'corponess_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since corponess 1.0.0
    */
    function corponess_add_blog_section() {
    	$options = corponess_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'corponess_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'corponess_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        corponess_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponess_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since corponess 1.0.0
    * @param array $input blog section details.
    */
    function corponess_get_blog_section_details( $input ) {
        $options = corponess_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];     
        $blog_count = ! empty( $options['blog_count'] ) ? $options['blog_count'] : 3;
        
        $content = array();

        switch ( $blog_content_type ) {
        
            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $blog_count ),
                    'cat'               => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['auth_id']   = get_the_author_meta('ID');
                $page_post['excerpt']   = corponess_trim_content( 30 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id() ) : '';

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
// blog section content details.
add_filter( 'corponess_filter_blog_section_details', 'corponess_get_blog_section_details' );


if ( ! function_exists( 'corponess_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since corponess 1.0.0
   *
   */
   function corponess_render_blog_section( $content_details = array() ) {
        $options = corponess_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="latest-posts" class="relative page-section same-background">
                <div class="wrapper">
                    <div class="section-header">
                        <?php if ( ! empty( $options['blog_title'] ) ): ?>
                            <h2 class="section-title">
                                <?php echo esc_html( $options['blog_title'] ) ; ?>
                            </h2>
                        <?php endif ?>
                    </div><!-- .section-header -->

                    <div class="archive-blog-wrapper col-3 clear">
                        <?php foreach ( $content_details as $content ): ?>
                            <article>
                                <div class="post-item-wrapper">
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ) ; ?>">
                                            <img src="<?php echo esc_url( $content['image'] ) ; ?>" alt="<?php echo esc_attr( $content['title'] ) ; ?>">
                                        </a>
                                    </div><!-- .featured-image -->

                                    <div class="entry-container">
                                        <div class="entry-meta">
                                            <?php  
                                                
                                                echo corponess_author( $content['auth_id'] );
                                                corponess_posted_on( $content['id'] );

                                            ?>
                                        </div><!-- .entry-meta -->

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
                                    </div><!-- .entry-container -->
                                </div>
                            </article>
                        <?php endforeach ?>
                    </div><!-- .archive-blog-wrapper -->             
                </div><!-- .wrapper -->
            </div><!-- #latest-posts -->
    <?php }
endif;