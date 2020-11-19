<?php 
get_header();
$defaults = array(
    'title' => '',
    'posts_per_line' => '3',
    'bg_color_type' => 'def',
    'grid_gap' => '30',
    'info_align' => 'center',
    'hide_content' => false,
);
$defaults['number_of_posts'] = 'all';
$defaults['order_by']        = 'date';
$defaults['order']           = 'ASC';
$defaults['post_type']       = 'team';
extract($defaults);

$compile = $team_classes = '';

$style_gap = ($grid_gap != '0px') ? ' style="margin-right:-'.esc_attr($grid_gap/2).'px; margin-left:-'.esc_attr($grid_gap/2).'px;"' : '';

$team_classes .= 'team-col_'.$posts_per_line;
$team_classes .= ' a'.$info_align;

?>
<div class="wgl-container">
    <div id='main-content'>
        <div class="wgl_module_team <?php echo esc_attr($team_classes); ?>">
            <div class="team-items_wrap clearfix" <?php echo Seofy_Theme_Helper::render_html($style_gap);?> >
                <?php
                echo render_wgl_team($defaults);
                ?>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer();
?>