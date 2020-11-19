<?php
class WglThemeHelper{

    protected static $instance = null;

    /**
     * @var \WP_Post
     */
    private $post_id;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    } 

    private function __construct () {
        $this->post_id = get_the_ID();
    }

    public function render_post_share ($show_share) {
        $img_url = wp_get_attachment_image_src(get_post_thumbnail_id($this->post_id), 'single-post-thumbnail');

        if ($show_share == "1" || $show_share == "yes") :
        ?>
            <!-- post share block -->
            <div class="share_social-wpapper">					
                <a class="share_link share_twitter" target="_blank" href="<?php echo esc_url('https://twitter.com/intent/tweet?text='. get_the_title() .'&amp;url='. get_permalink()); ?>"><span class="fa fa-twitter"></span></a>
                <a class="share_link share_facebook" target="_blank" href="<?php echo  esc_url('https://www.facebook.com/share.php?u='. get_permalink()); ?>"><span class="fa fa-facebook"></span></a>
                <?php
                    if (strlen($img_url[0]) > 0) {
                        echo '<a class="share_link share_pinterest" target="_blank" href="'. esc_url('https://pinterest.com/pin/create/button/?url='. get_permalink() .'&media='. $img_url[0]) .'"><span class="fa fa-pinterest"></span></a>';
                    }
                ?>
                <a class="share_link share_linkedin" href="<?php echo esc_url('http://www.linkedin.com/shareArticle?mini=true&url='.substr(urlencode( get_permalink() ),0,1024));?>&title=<?php echo esc_attr(substr(urlencode(html_entity_decode(get_the_title())),0,200));?>" target="_blank" ><span class="fa fa-linkedin"></span></a>
            </div>
            <!-- //post share block -->
        <?php
        endif;
    }

    public function render_post_list_share(){
        ?>
        <div class="share_post-container">
            <a href="#"></a>
            <div class="share_social-wpapper">
                <ul>
                    <li>
                        <a class="share_post share_twitter" target="_blank" href="<?php echo esc_url('https://twitter.com/intent/tweet?text='. get_the_title() .'&amp;url='. get_permalink()); ?>"><span class="fa fa-twitter"></span></a>                
                    </li>
                    <li>
                        <a class="share_post share_facebook" target="_blank" href="<?php echo  esc_url('https://www.facebook.com/share.php?u='. get_permalink()); ?>"><span class="fa fa-facebook"></span></a>            
                    </li>
                    <?php
                    $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
                    if (strlen($img_url[0]) > 0) {
                        echo '<li>';
                        echo '<a class="share_post share_pinterest" target="_blank" href="'. esc_url('https://pinterest.com/pin/create/button/?url='. get_permalink() .'&media='. $img_url[0]) .'"><span class="fa fa-pinterest"></span></a>';
                        echo '</li>';
                    }
                    ?>
                    <li>
                        <a class="share_post share_linkedin" target="_blank" href="<?php echo esc_url('http://www.linkedin.com/shareArticle?mini=true&url='.substr(urlencode( get_permalink() ),0,1024));?>&title=<?php echo esc_attr(substr(urlencode(html_entity_decode(get_the_title())),0,200));?>"><span class="fa fa-linkedin"></span></a>                                    
                    </li>
                </ul>
            </div>
        </div>	    
        <?php
    }

}

function wgl_theme_helper() {
	return WglThemeHelper::instance();
}
?>