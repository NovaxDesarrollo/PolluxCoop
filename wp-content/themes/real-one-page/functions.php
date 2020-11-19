<?php
// child style enqueue
function realonepage_styles() {
    $themeVersion = wp_get_theme()->get('Version');
    // Enqueue our style.css with our own version
    wp_enqueue_style('realonepage-style', get_template_directory_uri() . '/style.css',array(), $themeVersion);
}
add_action('wp_enqueue_scripts', 'realonepage_styles');

// svg design

if (!function_exists('oneline_lite_svg_enable')) {
  function oneline_lite_svg_enable(){
    $svg_disable= get_theme_mod('oneline-lite_svg_disable');
    if($svg_disable =='' || $svg_disable =='0'){
        $return = '<div class="svg-top-container elementor-shape">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"  preserveAspectRatio="none">
    <path class="elementor-shape-fill" d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z"></path>
        </svg>
    </div>';
    return $return;
     } else {
    return false;
     }
  }
}

if (!function_exists('oneline_lite_svg_bottom_enable')){
  function oneline_lite_svg_bottom_enable(){
    $svg_btm_disable= get_theme_mod('oneline-lite_svg_disable');
    if($svg_btm_disable =='' || $svg_btm_disable =='0'){
        $return = '<div class="svg-bottom-container elementor-shape">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"  preserveAspectRatio="none">
        <path class="elementor-shape-fill" d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z"></path>
        </svg>
    </div>';
    return $return;
     } else {
    return false;
     }
  }
}

if (!function_exists('oneline_lite_page_svg_top_enable')) {
  function oneline_lite_page_svg_top_enable(){
    $custom_background_color = get_background_color();
    $svg_top_disable= get_theme_mod('oneline-lite_svg_disable');
    if($svg_top_disable =='' || $svg_top_disable =='0'){
        $return = '<div style="fill:#'.$custom_background_color.'" class="svg-bottom-container">  
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"  preserveAspectRatio="none">
       <path class="elementor-shape-fill" d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z"></path>
        </svg>
    </div>';
    return $return;
     } else {
    return false;
     }
  }
}

if (!function_exists('oneline_lite_page_svg_bottom_enable')){
  function oneline_lite_page_svg_bottom_enable(){
    $custom_background_color = get_background_color();    
    $svg_bottom_disable= get_theme_mod('oneline-lite_svg_disable');
    if($svg_bottom_disable =='' || $svg_bottom_disable =='0'){
        $return = '<div style="fill:#'.$custom_background_color.'" class="svg-top-container">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"  preserveAspectRatio="none">
        <path class="elementor-shape-fill" d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z"></path>
        </svg>
    </div>';
    return $return;
     } else {
    return false;
     }
  }

}
?>