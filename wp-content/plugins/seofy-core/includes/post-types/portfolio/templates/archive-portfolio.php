<?php
if(!class_exists('Seofy_Theme_Helper')){
    return;
}
get_header();


$term_id = isset(get_queried_object()->term_id) ? get_queried_object()->term_id : '';
$term_id = !empty($term_id) ? $term_id : '';

//Show Filter Options
$show_filter = Seofy_Theme_Helper::get_option('portfolio_list_show_filter');
$list_terms =  Seofy_Theme_Helper::get_option('portfolio_list_filter_cats');

if(!empty($term_slug)){
    $show_filter = '';
}

if(!empty($show_filter) && !empty($list_terms)){
    $term_id = $list_terms;
}

$term_slug = $cat_title = $cat_descr = '';
if(!empty($term_id)){
    $return = '';
    if(is_array($term_id)){
        $count = count($term_id);
        $i = 0;
        foreach ($term_id as $key => $value) {
            $item = get_term_by( 'id', (int) $value, 'portfolio-category' ); 
            $i++;
            $return .= 'portfolio-category:'. $item->slug . ($i !== $count ? ', ' : '');
        }
    }else{
        $return = get_term_by( 'id', $term_id, 'portfolio-category' ); 
        $return = "portfolio-category:".$return->slug;
    }
    $term_slug = $return;
    $cat = get_term_by( 'id', (int) $term_id, 'portfolio-category' );
    $cat_title = $cat->name;
    $cat_descr = $cat->description;
}

$defaults = array(
    'title' => '',
    'subtitle' => '',
    'view_all_link' => '',
    'show_view_all' => 'no',
    'click_area' => 'single',
    'posts_per_row' => Seofy_Theme_Helper::get_option('portfolio_list_columns'),
    'item_el_class' => '', 
    'css' => '',
    'show_portfolio_title' => Seofy_Theme_Helper::get_option('portfolio_list_show_title'),
    'show_content' => Seofy_Theme_Helper::get_option('portfolio_list_show_content'),
    'show_meta_categories' => Seofy_Theme_Helper::get_option('portfolio_list_show_cat'),
    'view_style' => 'ajax',
    'show_filter' => $show_filter,
    'crop_images' => 'yes',
    'items_load' => '4',
    'grid_gap' => '30px',
    'add_overlay' => 'true',
    'portfolio_layout' => 'masonry',
    'custom_overlay_color' => 'rgba(34,35,40,.7)',
    'number_of_posts' => '12',
    'order_by' => 'menu_order',
    'order' => 'ASC',
    'post_type' => 'portfolio',
    'taxonomies' => $term_slug,
);
extract($defaults);
$layout = Seofy_Theme_Helper::get_option('portfolio_list_sidebar_layout');
$sidebar = Seofy_Theme_Helper::get_option('portfolio_list_sidebar_def');
$column = 12;

if ( $layout == 'left' || $layout == 'right' ) {
    $column = 9;
}else{
    $sidebar = '';
}
$row_class = $layout != 'none' ? ' sidebar_'.esc_attr($layout) : '';
?>
    <div class="wgl-container">
        <div class="row<?php echo esc_attr($row_class); ?>">
            <div id='main-content' class="wgl_col-<?php echo (int)$column; ?>">
                <?php
                if(!empty($term_id)){
                    echo '<div class="portfolio_archive-cat">';
                        echo '<h4 class="portfolio_archive-cat_title">'.esc_html__('Category:','seofy-core').' '.esc_html($cat_title).'</h4>';
                        echo '<div class="portfolio_archive-cat_descr">'.esc_html($cat_descr).'</div>';
                    echo '</div>';
                }
                $portfolio_render = new WglPortfolio();
                echo $portfolio_render->render($defaults);
                ?>
            </div>
            <?php
            if ($layout == 'left' || $layout == 'right') {
                echo '<div class="sidebar-container wgl_col-'.(12 - (int)esc_attr($column)).'">';
                if (is_active_sidebar( $sidebar )) {
                    echo "<aside class='sidebar'>";
                    dynamic_sidebar( $sidebar );
                    echo "</aside>";
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>
    
<?php get_footer(); ?>
