<?php
if(!class_exists('Seofy_Theme_Helper')){
    return;
}

$theme_color = esc_attr(Seofy_Theme_Helper::get_option("theme-custom-color"));
$header_font = Seofy_Theme_Helper::get_option('header-font');

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'wgl_team',
        'name' => esc_html__('Team List', 'seofy'),
        'description' => esc_html__('Show Team Grid', 'seofy'),
        'icon' => 'wgl_icon_team',
        'category' => esc_html__('WGL Modules', 'seofy'),
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Columns in Row', 'seofy'),
                'param_name' => 'posts_per_line',
                'edit_field_class' => 'vc_col-sm-4',
                'admin_label' => true,
                'value' => array(
                    esc_html__('One', 'seofy') => '1',
                    esc_html__('Two', 'seofy') => '2',
                    esc_html__('Three', 'seofy') => '3',
                    esc_html__('Four', 'seofy') => '4',
                    esc_html__('Five', 'seofy') => '5',
                ),
                'std' => '3'
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Team Info Alignment', 'seofy'),
                'param_name' => 'info_align',
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-4 no-top-padding',
                'value' => array(
                    esc_html__('Left', 'seofy') => 'left',
                    esc_html__('Right', 'seofy') => 'right',
                    esc_html__('Center', 'seofy') => 'center',
                ),
                'std' => 'center',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Gap Between Items', 'seofy'),
                'param_name' => 'grid_gap',
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-4 no-top-padding',
                'value' => array(
                    esc_html__('0', 'seofy') => '0',
                    esc_html__('2', 'seofy') => '2',
                    esc_html__('4', 'seofy') => '4',
                    esc_html__('6', 'seofy') => '6',
                    esc_html__('10', 'seofy') => '10',
                    esc_html__('20', 'seofy') => '20',
                    esc_html__('30', 'seofy') => '30',
                ),
                'std' => '30',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Link for Image', 'seofy' ),
                'param_name' => 'single_link_wrapper',
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Link for Heading', 'seofy' ),
                'param_name' => 'single_link_heading',
                'edit_field_class' => 'vc_col-sm-4',
                'std' => 'true',
            ),
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Hide Meta', 'seofy'),
                'param_name' => 'h_hide_meta',
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Title', 'seofy' ),
                'param_name' => 'hide_title',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Department', 'seofy' ),
                'param_name' => 'hide_department',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Social Icons', 'seofy' ),
                'param_name' => 'hide_soc_icons',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Content', 'seofy' ),
                'param_name' => 'hide_content',
                'edit_field_class' => 'vc_col-sm-3',
                'std' => 'true'
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Letters Count', 'seofy'),
                'param_name' => 'letter_count',
                'value' => '110',
                "dependency"    => array(
                    "element"   => "hide_content",
                    'value_not_equal_to' => 'true'
                ),
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'seofy'),
                'param_name' => 'item_el_class',
                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'seofy')
            ),
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Add Carousel for Team Items', 'seofy'),
                'param_name' => 'h_add_carousel',
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                "group" => esc_html__( "Carousel", 'seofy' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Carousel', 'seofy' ),
                'param_name' => 'use_carousel',
                'edit_field_class' => 'vc_col-sm-4',
                "group" => esc_html__( "Carousel", 'seofy' ),
            ),
            array(
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Autoplay', 'seofy' ),
                "param_name"    => "autoplay",
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'seofy' ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Autoplay Speed', 'seofy' ),
                "param_name"    => "autoplay_speed",
                "dependency"    => array(
                    "element"   => "autoplay",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-4',
                "value"         => "3000",
                'group' => esc_html__( 'Carousel', 'seofy' ),
            ),
            array(
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Multiple Items', 'seofy' ),
                "param_name"    => "multiple_items",
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Carousel', 'seofy' ),
            ),
            array(
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Scroll Items', 'seofy' ),
                "param_name"    => "scroll_items",
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Carousel', 'seofy' ),
            ),
            // carousel pagination heading
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Pagination Controls', 'seofy'),
                'param_name' => 'h_pag_controls',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12',
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Pagination control', 'seofy' ),
                'param_name' => 'use_pagination',
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
            ),
            array(
                'type' => 'seofy_radio_image',
                'heading' => esc_html__('Pagination Type', 'seofy'),
                'param_name' => 'pag_type',
                'fields' => array(
                    'circle' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_circle.png',
                        'label' => esc_html__('Circle', 'seofy')),
                    'circle_border' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_circle_border.png',
                        'label' => esc_html__('Empty Circle', 'seofy')),
                    'square' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_square.png',
                        'label' => esc_html__('Square', 'seofy')),
                    'line' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_line.png',
                        'label' => esc_html__('Line', 'seofy')),
                    'line_circle' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_line_circle.png',
                        'label' => esc_html__('Line - Circle', 'seofy')),
                ),
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
                'value' => 'circle',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Pagination Top Offset', 'seofy' ),
                'param_name' => 'pag_offset',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
                'description' => esc_html__( 'Enter pagination top offset in pixels.', 'seofy' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Pagination Color', 'seofy' ),
                'param_name' => 'custom_pag_color',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Pagination Color', 'seofy'),
                'param_name' => 'pag_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_pag_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // carousel arrows heading
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Arrows Controls', 'seofy'),
                'param_name' => 'h_arrow_control',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12',
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Arrows control', 'seofy' ),
                'param_name' => 'use_prev_next',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Arrows Color', 'seofy' ),
                'param_name' => 'custom_buttons_color',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'dependency' => array(
                    'element' => 'use_prev_next',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Arrows Color', 'seofy'),
                'param_name' => 'buttons_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_buttons_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // carousel responsive heading
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Responsive', 'seofy'),
                'param_name' => 'h_resp',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12',
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Customize Responsive', 'seofy' ),
                'param_name' => 'custom_resp',
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'group' => esc_html__( 'Carousel', 'seofy' ),
            ),
            // medium desktop
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Medium Desktop', 'seofy'),
                'param_name' => 'h_resp_medium',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'seofy' ),
                'param_name' => 'resp_medium',
                'value' => '1025',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'seofy' ),
                'param_name' => 'resp_medium_slides',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            
            // tablets
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Tablets', 'seofy'),
                'param_name' => 'h_resp_tablets',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'seofy' ),
                'param_name' => 'resp_tablets',
                'value' => '800',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'seofy' ),
                'param_name' => 'resp_tablets_slides',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            // mobile phones
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Mobile Phones', 'seofy'),
                'param_name' => 'h_resp_mobile',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'seofy' ),
                'param_name' => 'resp_mobile',
                'value' => '480',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'seofy' ),
                'param_name' => 'resp_mobile_slides',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Background Styles', 'seofy'),
                'param_name' => 'h_bg_styles',
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            // Background color
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Background Customize Colors', 'seofy' ),
                'param_name'    => 'bg_color_type',
                'value'         => array(
                    esc_html__( 'Default', 'seofy' )      => 'def',
                    esc_html__( 'Color', 'seofy' )      => 'color',
                ),
                'group' => esc_html__( 'Colors', 'seofy' ),
            ),
            // background hover color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'seofy'),
                'param_name' => 'background_color',
                'value' => '#ffffff',
                'description' => esc_html__('Select background color', 'seofy'),
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Hover Color', 'seofy'),
                'param_name' => 'background_hover_color',
                'value' => '#ffffff',
                'description' => esc_html__('Select background hover color', 'seofy'),
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // title styles heading
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Title Colors', 'seofy'),
                'param_name' => 'h_title_styles',
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            // title color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Title Color', 'seofy' ),
                'param_name' => 'custom_title_color',
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Color', 'seofy'),
                'param_name' => 'title_color',
                'value' => $header_font['color'],
                'dependency' => array(
                    'element' => 'custom_title_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Hover Color', 'seofy'),
                'param_name' => 'title_hover_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_title_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title styles heading
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Department Colors', 'seofy'),
                'param_name' => 'h_depart_styles',
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            // title color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Color', 'seofy' ),
                'param_name' => 'custom_depart_color',
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Department Color', 'seofy'),
                'param_name' => 'depart_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_depart_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title styles heading
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Social Icons Colors', 'seofy'),
                'param_name' => 'h_soc_styles',
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            // title color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Color', 'seofy' ),
                'param_name' => 'custom_soc_color',
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Social Icons Color', 'seofy'),
                'param_name' => 'soc_color',
                'value' => '#cfd1df',
                'dependency' => array(
                    'element' => 'custom_soc_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Social Icons Hover Color', 'seofy'),
                'param_name' => 'soc_hover_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_soc_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title styles heading
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Background Social Icons Colors', 'seofy'),
                'param_name' => 'h_bg_soc_styles',
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            // title color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Color', 'seofy' ),
                'param_name' => 'custom_soc_bg_color',
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Social Icons Color', 'seofy'),
                'param_name' => 'soc_bg_color',
                'value' => '#f3f3f3',
                'dependency' => array(
                    'element' => 'custom_soc_bg_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Social Icons Hover Color', 'seofy'),
                'param_name' => 'soc_bg_hover_color',
                'value' => '#f3f3f3',
                'dependency' => array(
                    'element' => 'custom_soc_bg_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'seofy' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
        )
    ));
    Seofy_Loop_Settings::init('wgl_team', array( 'hide_cats' => true,
                    'hide_tags' => true));
    class WPBakeryShortCode_wgl_Team extends WPBakeryShortCode{}
}