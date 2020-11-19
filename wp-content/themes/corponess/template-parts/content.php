<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage corponess
 * @since corponess 1.0.0
 */
$class = has_post_thumbnail() ? 'has-post-thumbnail' : '';
$options = corponess_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
        <div class="post-item-wrapper">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="featured-image" >
                    <a href="<?php the_permalink(); ?>" >
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ; ?>">
                    </a>
                </div><!-- .featured-image -->
            <?php endif; ?>

        <div class="entry-container">
            <div class="entry-meta">
                <?php 
                if ( $options['hide_author'] == false ) {
                    echo corponess_author( get_the_author_meta( 'ID' ) );
                }
                
                if ( $options['hide_date'] == false ) {
                    corponess_posted_on( get_the_id() ); 
                }
                    
                ?>
            </div><!-- .entry-meta -->

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->
        </div><!-- .entry-container -->

        

        
    </div><!-- .post-item-wrapper -->

</article><!-- #post-## -->
