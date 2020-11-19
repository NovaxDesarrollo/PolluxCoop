<?php

$sb = Seofy_Theme_Helper::render_sidebars();
$row_class = $sb['row_class'];
$column = $sb['column'];

get_header ();

$defaults = array(
    'title' => '',
    'posts_per_line' => '4',
    'grid_gap' => '30',
    'info_align' => 'center',
    'single_link_wrapper' => false,
    'single_link_heading' => true,
    'hide_title' => false,
    'hide_department' => false,
    'hide_soc_icons' => false,
    'add_member' => false,
    'member_image' => '',
    'member_link' => '',
);
extract($defaults);
$team_image_dims = array('width' => '940', 'height' => '940');
?>

<div class="wgl-container">
	<div class="row<?php echo esc_attr($row_class); ?>">
		<div id='main-content' class="wgl_col-<?php echo (int)$column; ?>">
			<?php
				while ( have_posts() ):
					the_post();
					?>
						<div class="row single_team_page">
							<div class="wgl_col-12">
								<?php echo render_wgl_team_item(true, $defaults, $team_image_dims); ?>
							</div>
							<div class="wgl_col-12">
								<!-- <div class="team_title"><h2><?php echo get_the_title(); ?></h2></div> -->
								<?php the_content(esc_html__('Read more!', 'seofy')); ?>
							</div>
						</div>
					<?php
				endwhile;
				wp_reset_postdata();
			?>
		</div>
		<?php
	    	echo (isset($sb['content']) && !empty($sb['content']) ) ? $sb['content'] : '';
	    ?>
	</div>
	
</div>

<?php
get_footer();
?>