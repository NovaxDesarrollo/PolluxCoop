<?php
if(!class_exists('Seofy_Theme_Helper')){
    return;
}
$theme_color = Seofy_Theme_Helper::get_option('theme-custom-color');
$theme_color_second = Seofy_Theme_Helper::get_option('theme-secondary-color');
$header_font = Seofy_Theme_Helper::get_option('header-font');
$main_font = Seofy_Theme_Helper::get_option('main-font');
$theme_gradient = Seofy_Theme_Helper::get_option('theme-gradient');

if (function_exists('vc_map')) {
    vc_map( array(
        "name" => esc_html__("Portfolio List", 'seofy-core'),
        "base" => $this->shortcodeName,
        "class" => 'seofy_portfolio_list',
        "category" => esc_html__('WGL Modules', 'seofy-core'),
        "icon" => 'wgl_icon_portfolio_module',
        "content_element" => true,
        "description" => esc_html__("Portfolio List",'seofy-core'),
        "params" => array(
            array(
                'type' => 'seofy_radio_image',
                'heading' => esc_html__('Layout', 'seofy-core'),
                'param_name' => 'portfolio_layout',
                'fields' => array(
                    'grid' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_grid.png',
                        'label' => esc_html__('Grid', 'seofy-core')),
                    'carousel' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_carousel.png',
                        'label' => esc_html__('Carousel', 'seofy-core')),
                    'masonry' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_masonry.png',
                        'label' => esc_html__('Masonry', 'seofy-core')),
                    'masonry2' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_masonry.png',
                        'label' => esc_html__('Masonry 2', 'seofy-core')),
                    'masonry3' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_masonry.png',
                        'label' => esc_html__('Masonry 3', 'seofy-core')),
                    'masonry4' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_masonry.png',
                        'label' => esc_html__('Masonry 4', 'seofy-core')),
                ),
                'value' => 'grid',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Column', 'seofy-core'),
                'param_name' => 'posts_per_row',
                'admin_label' => true,
                'value' => array(
                    esc_html__("1", 'seofy-core') => '1',
                    esc_html__("2", 'seofy-core') => '2',
                    esc_html__("3", 'seofy-core') => '3',
                    esc_html__("4", 'seofy-core') => '4',
                    esc_html__("5", 'seofy-core') => '5',
                ),
                'std' => '3',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => array('grid', 'masonry', 'carousel')
                ),
            ),            
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Show Filter', 'seofy-core' ),
                'param_name' => 'show_filter',
                'value' => array( esc_html__( 'Yes', 'seofy-core' ) => 'yes' ),
                'std' => '',
                'save_always' => true,
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => array('grid', 'masonry', 'masonry2', 'masonry3')
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Filter Style', 'seofy-core'),
                'param_name' => 'filter_style',
                'admin_label' => true,
                'value' => array(
                    esc_html__("Default", 'seofy-core') => 'def',
                    esc_html__("With Background", 'seofy-core') => 'with_bg',
                ),
                'dependency' => array(
                    'element' => 'show_filter',
                    "value" => "yes"
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ),   
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Filter Align', 'seofy-core'),
                'param_name' => 'filter_align',
                'value' => array(
                    esc_html__("Left", 'seofy-core') => 'left',
                    esc_html__("Right", 'seofy-core') => 'right',
                    esc_html__("Center", 'seofy-core') => 'center',
                ),
                'std' => 'center',
                'dependency' => array(
                    'element' => 'show_filter',
                    "value" => "yes"
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ), 
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Crop Images', 'seofy-core' ),
                'param_name' => 'crop_images',
                'value' => array( esc_html__( 'Yes', 'seofy-core' ) => 'yes' ),
                'std' => 'yes',
                'save_always' => true,
            ),            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Pagination', 'seofy-core'),
                'param_name' => 'view_style',
                'admin_label' => true,
                'save_always' => true,
                'value' => array(
                    esc_html__('Static', 'seofy-core') => "standard",
                    esc_html__('Ajax load', 'seofy-core') => "ajax",
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Show Pagination', 'seofy-core' ),
                'param_name' => 'show_pagination',
                'value' => array( esc_html__( 'Yes', 'seofy-core' ) => 'yes' ),
                'std' => 'not',
                'dependency' => array(
                    'element' => 'view_style',
                    "value" => "standard"
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Navigation\'s Alignment', 'seofy-core' ),
                'param_name' => 'portfolio_navigation_align',
                'value'         => array(
                    esc_html__( 'Center', 'seofy-core' ) => 'center',
                    esc_html__( 'Left', 'seofy-core' ) => 'left',
                    esc_html__( 'Right', 'seofy-core' ) => 'right'
                ),
                'description' => esc_html__('Select Navigation\'s Alignment.', 'seofy-core'),
                'std' => 'left',
                'dependency' => array(
                    'element' => 'show_pagination',
                    'value' => 'yes',
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Show Load More Button', 'seofy-core' ),
                'param_name' => 'show_loadmore',
                'value' => array( esc_html__( 'Yes', 'seofy-core' ) => 'yes' ),
                'std' => 'not',
                'dependency' => array(
                    'element' => 'view_style',
                    "value" => "ajax"
                )
            ),                    
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Items on load', 'seofy-core'),
                'param_name' => 'items_load',
                'value' => '4',
                'save_always' => true,
                'description' => esc_html__( 'Items load by load more button.', 'seofy-core' ),
                'dependency' => array(
                    'element' => 'show_loadmore',
                    "value" => "yes"
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Grid Gap', 'seofy-core'),
                'param_name' => 'grid_gap',
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'value' => array(
                    esc_html__("0", 'seofy-core') => '0px',
                    esc_html__("1", 'seofy-core') => '1px',
                    esc_html__("2", 'seofy-core') => '2px',
                    esc_html__("3", 'seofy-core') => '3px',
                    esc_html__("4", 'seofy-core') => '4px',
                    esc_html__("5", 'seofy-core') => '5px',
                    esc_html__("10", 'seofy-core') => '10px',
                    esc_html__("15", 'seofy-core') => '15px',
                    esc_html__("20", 'seofy-core') => '20px',
                    esc_html__("25", 'seofy-core') => '25px',
                    esc_html__("30", 'seofy-core') => '30px',
                    esc_html__("35", 'seofy-core') => '35px',
                ),
                'std' => '30px',
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'seofy-core'),
                'param_name' => 'item_el_class',
                'description' => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'seofy-core')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Click Item', 'seofy-core'),
                'param_name' => 'click_area',
                'admin_label' => true,
                'group' => esc_html__( 'Content', 'seofy-core' ),
                'value' => array(
                    esc_html__("Single", 'seofy-core') => 'single',
                    esc_html__("Popup", 'seofy-core') => 'popup',
                    esc_html__("Custom Link", 'seofy-core') => 'custom_link',
                    esc_html__("Default", 'seofy-core') => 'none',
                ),
                'std' => 'popup',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Show Info Position', 'seofy-core'),
                'param_name' => 'info_position',
                'admin_label' => true,
                'value' => array(
                    esc_html__('Inside Image', 'seofy-core') => 'inside_image',
                    esc_html__('Under Image', 'seofy-core') => 'under_image',
                ),
                'std' => 'inside_image',
                'group' => esc_html__( 'Content', 'seofy-core' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Inside Image Animation', 'seofy-core'),
                'param_name' => 'image_anim',
                'value' => array(
                    esc_html__('Default', 'seofy-core') => 'default',
                    esc_html__('Always Show Info', 'seofy-core') => 'always_info',
                ),
                'group' => esc_html__( 'Content', 'seofy-core' ),
                'dependency' => array(
                    'element' => 'info_position',
                    'value' => array('inside_image')
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Horizontal Align', 'seofy-core'),
                'param_name' => 'horizontal_align',
                'admin_label' => true,
                'value' => array(
                    esc_html__('Left', 'seofy-core') => 'Left',
                    esc_html__('Center', 'seofy-core') => 'center',
                    esc_html__('Right', 'seofy-core') => 'right'
                ),
                'group' => esc_html__( 'Content', 'seofy-core' ),
                'dependency' => array(
                    'element' => 'info_position',
                    'value' => array('under_image')
                )
            ),
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Content Elements', 'seofy-core'),
                'param_name' => 'h_content_elements',
                'group' => esc_html__( 'Icon', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Content', 'seofy-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show Title?', 'seofy-core' ),
                'param_name' => 'show_portfolio_title',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'seofy-core' ),
                'std' => 'true',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show Content?', 'seofy-core' ),
                'param_name' => 'show_content',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'seofy-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show author?', 'seofy-core' ),
                'param_name' => 'show_meta_author',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'seofy-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show categories?', 'seofy-core' ),
                'param_name' => 'show_meta_categories',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'seofy-core' ),
                'std' => 'true',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show date?', 'seofy-core' ),
                'param_name' => 'show_meta_date',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'seofy-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show Likes?', 'seofy-core' ),
                'param_name' => 'show_likes',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'seofy-core' ),
            ),            
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show Comments?', 'seofy-core' ),
                'param_name' => 'show_comments',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'seofy-core' ),
            ),            
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show Icons?', 'seofy-core' ),
                'param_name' => 'show_icons',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'seofy-core' ),
            ),
            // Content Letter Count
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Letter Count', 'seofy-core'),
                'param_name' => 'content_letter_count',
                'value' => '85',
                'description' => esc_html__( 'Enter content letter count.', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Content', 'seofy-core' ),
            ),
            // Portfolio Headings Font
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for Portfolio Headings', 'seofy-core' ),
                'param_name' => 'custom_fonts_portfolio_headings',
                'group' => esc_html__( 'Font', 'seofy-core' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_portfolio_headings',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'seofy-core' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'seofy-core' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'custom_fonts_portfolio_headings',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
            ),

            // --- CAROUSEL GROUP --- //
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Carousel Options', 'seofy-core'),
                'param_name' => 'h_portfolio_carousel',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
            ),
            array(
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Autoplay', 'seofy-core' ),
                "param_name"    => "autoplay",
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Autoplay Speed', 'seofy-core' ),
                "param_name"    => "autoplay_speed",
                "dependency"    => array(
                    "element"   => "autoplay",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-4',
                "value"         => "3000",
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Multiple Items', 'seofy-core' ),
                'param_name' => 'multiple_items',
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
            ),
            // carousel pagination heading
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Pagination Controls', 'seofy-core'),
                'param_name' => 'h_pag_controls',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Pagination control', 'seofy-core' ),
                'param_name' => 'use_pagination',
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
                'std' => 'true'
            ),
            array(
                'type' => 'seofy_radio_image',
                'heading' => esc_html__('Pagination Type', 'seofy-core'),
                'param_name' => 'pag_type',
                'fields' => array(
                    'circle' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_circle.png',
                        'label' => esc_html__('Circle', 'seofy-core')),
                    'circle_border' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_circle_border.png',
                        'label' => esc_html__('Empty Circle', 'seofy-core')),
                    'square' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_square.png',
                        'label' => esc_html__('Square', 'seofy-core')),
                    'line' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_line.png',
                        'label' => esc_html__('Line', 'seofy-core')),
                    'line_circle' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_line_circle.png',
                        'label' => esc_html__('Line - Circle', 'seofy-core')),
                ),
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
                'value' => 'circle',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Pagination Top Offset', 'seofy-core' ),
                'param_name' => 'pag_offset',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-4',
                'description' => esc_html__( 'Enter pagination top offset in pixels.', 'seofy-core' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Pagination Color', 'seofy-core' ),
                'param_name' => 'custom_pag_color',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Pagination Color', 'seofy-core'),
                'param_name' => 'pag_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_pag_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // carousel pagination heading
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Responsive', 'seofy-core'),
                'param_name' => 'h_resp',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Customize Responsive', 'seofy-core' ),
                'param_name' => 'custom_resp',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
            ),
            // medium desktop
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Medium Desktop', 'seofy-core'),
                'param_name' => 'h_resp_medium',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'seofy-core' ),
                'param_name' => 'resp_medium',
                'value' => '1025',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'seofy-core' ),
                'param_name' => 'resp_medium_slides',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            
            // tablets
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Tablets', 'seofy-core'),
                'param_name' => 'h_resp_tablets',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'seofy-core' ),
                'param_name' => 'resp_tablets',
                'value' => '800',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'seofy-core' ),
                'param_name' => 'resp_tablets_slides',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            // mobile phones
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Mobile Phones', 'seofy-core'),
                'param_name' => 'h_resp_mobile',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'seofy-core' ),
                'param_name' => 'resp_mobile',
                'value' => '480',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'seofy-core' ),
                'param_name' => 'resp_mobile_slides',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),

            // --- CUSTOM GROUP --- //
            // Portfolio Font
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for Portfolio Content', 'seofy-core' ),
                'param_name' => 'custom_fonts_portfolio_content',
                'group' => esc_html__( 'Font', 'seofy-core' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_portfolio',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'seofy-core' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'seofy-core' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'custom_fonts_portfolio_content',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom styles for Portfolio', 'seofy-core' ),
                'param_name' => 'custom_portfolio_style',
                'description' => esc_html__( 'Custom portfolio font size and font color.', 'seofy-core' ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
            ),
            // Custom portfolio style
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Custom Main Color', 'seofy-core'),
                'param_name' => 'custom_main_color',
                'value' => esc_attr(Seofy_Theme_Helper::get_option('theme-custom-color')),
                'description' => esc_html__('Select custom main color.', 'seofy-core'),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),            
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Custom Filter Color', 'seofy-core'),
                'param_name' => 'custom_filter_color',
                'value' => esc_attr(Seofy_Theme_Helper::get_option('theme-custom-color')),
                'description' => esc_html__('Select custom filter color.', 'seofy-core'),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Custom Headings Color', 'seofy-core'),
                'param_name' => 'custom_headings_color',
                'value' => esc_attr($header_font['color']),
                'description' => esc_html__('Select custom headings color.', 'seofy-core'),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Custom Content Color', 'seofy-core'),
                'param_name' => 'custom_content_color',
                'value' => esc_attr($main_font['color']),
                'description' => esc_html__('Select custom content color.', 'seofy-core'),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Heading Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Heading Font Size', 'seofy-core'),
                'param_name' => 'heading_font_size',
                'value' => '30',
                'description' => esc_html__( 'Enter heading font-size in pixels.', 'seofy-core' ),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Heading Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Font Size', 'seofy-core'),
                'param_name' => 'content_font_size',
                'value' => '16',
                'description' => esc_html__( 'Enter content font-size in pixels.', 'seofy-core' ),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
           array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('Overlay settings', 'seofy-core'),
                'param_name' => 'h_content_overlay',
                'group' => esc_html__( 'Font', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Font', 'seofy-core' ),
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Background Customize Colors', 'seofy-core' ),
                'param_name'    => 'bg_color_type',
                'value'         => array(
                    esc_html__( 'None', 'seofy-core' )      => 'none',
                    esc_html__( 'Color', 'seofy-core' )      => 'color',
                    esc_html__( 'Gradient', 'seofy-core' )     => 'gradient',
                ),
                'std' => 'color',
                'group' => esc_html__( 'Font', 'seofy-core' ),
            ),
            // background color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'seofy-core'),
                'param_name' => 'background_color',
                'value' => 'rgba(255, 255, 255, 0.95)',
                'description' => esc_html__('Select background color', 'seofy-core'),
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // background Gradient start
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Start Color', 'seofy-core'),
                'param_name' => 'background_gradient_start',
                'value' => 'rgba('.Seofy_Theme_Helper::HexToRGB($theme_gradient['from']).', 0.85)',
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'gradient'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // background Gradient end
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background End Color', 'seofy-core'),
                'param_name' => 'background_gradient_end',
                'value' => 'rgba('.Seofy_Theme_Helper::HexToRGB($theme_gradient['to']).', 0.85)',
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'gradient'
                ),
                'group' => esc_html__( 'Font', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'seofy_param_heading',
                'heading' => esc_html__('First Item', 'seofy-core'),
                'param_name' => 'h_content_overlay',
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'group' => esc_html__( 'First Item', 'seofy-core' ),
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => array('masonry4')
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Custom First Item', 'seofy-core' ),
                'param_name' => 'add_first_item',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => array('masonry4')
                ),
                'group' => esc_html__( 'First Item', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'seofy-core'),
                'param_name' => 'title',
                'dependency' => array(
                    'element' => 'add_first_item',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'seofy-core' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle', 'seofy-core'),
                'param_name' => 'subtitle',
                'dependency' => array(
                    'element' => 'add_first_item',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'seofy-core' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Background Title', 'seofy-core'),
                'param_name' => 'bgtitle',
                'dependency' => array(
                    'element' => 'add_first_item',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'seofy-core' ),
            ),
            array(
                'type' => 'textarea_html',
                'holder' => 'div',
                'heading' => esc_html__('Content.', 'seofy-core') ,
                'param_name' => 'content',
                'dependency' => array(
                    'element' => 'add_first_item',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'seofy-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Button', 'seofy-core' ),
                'param_name' => 'add_button',
                'dependency' => array(
                    'element' => 'add_first_item',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
				'type' => 'textfield',
				'heading' => esc_html__('Button Text', 'seofy-core'),
				'param_name' => 'button_title',
				'group' => esc_html__( 'First Item', 'seofy-core' ),
                'dependency' => array(
                    'element' => 'add_button',
                    'value' => 'true'
                ),
			),
			// Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Button Link', 'seofy-core' ),
				'param_name' => 'link',
				'group' => esc_html__( 'First Item', 'seofy-core' ),
                'dependency' => array(
                    'element' => 'add_button',
                    'value' => 'true'
                ),
				'description' => esc_html__('Add link to button.', 'seofy-core')
			),
			array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Button Colors', 'seofy-core' ),
                'param_name' => 'custom_button',
                'dependency' => array(
                    'element' => 'add_button',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'seofy-core' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
			// Button text-color header
			array(
				'type' => 'seofy_param_heading',
				'heading' => esc_html__('Text Color', 'seofy-core'),
				'param_name' => 'h_text_color',
				'group' => esc_html__( 'First Item', 'seofy-core' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'color'
				),
			),
			// Button text-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Text Color', 'seofy-core'),
				'param_name' => 'button_text_color',
				'value' => '#313131',
				'description' => esc_html__('Select custom text color for button.', 'seofy-core'),
				'save_always' => true,
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
				'group' => esc_html__( 'First Item', 'seofy-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Hover text-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Text Color', 'seofy-core'),
				'param_name' => 'button_text_color_hover',
				'value' => '#ffffff',
				'description' => esc_html__('Select custom text color for hover button.', 'seofy-core'),
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true',
				),
				'group' => esc_html__( 'First Item', 'seofy-core' ),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Bg header
			array(
				'type' => 'seofy_param_heading',
				'heading' => esc_html__('Background Color', 'seofy-core'),
				'param_name' => 'h_background_color',
				'group' => esc_html__( 'First Item', 'seofy-core' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
			),
			// Button Bg
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Background', 'seofy-core'),
				'param_name' => 'button_bg_color',
				'value' => '#ffffff',
				'description' => esc_html__('Select custom background for button.', 'seofy-core'),
				'save_always' => true,
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
				'group' => esc_html__( 'First Item', 'seofy-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Hover Bg
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Background', 'seofy-core'),
				'param_name' => 'button_bg_color_hover',
				'value' => $theme_color_second,
				'description' => esc_html__('Select custom background for hover button.', 'seofy-core'),
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
				'group' => esc_html__( 'First Item', 'seofy-core' ),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
				'type' => 'seofy_param_heading',
				'heading' => esc_html__('Border Color', 'seofy-core'),
				'param_name' => 'h_border_color',
				'group' => esc_html__( 'First Item', 'seofy-core' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
			),
			// Button border-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Border Color', 'seofy-core'),
				'param_name' => 'button_border_color',
				'value' => $theme_color_second,
				'description' => esc_html__('Select custom border color for button.', 'seofy-core'),
				'save_always' => true,
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
				'group' => esc_html__( 'First Item', 'seofy-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Hover border-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Border Color', 'seofy-core'),
				'param_name' => 'button_border_color_hover',
				'value' => $theme_color_second,
				'description' => esc_html__('Select custom border color for hover button.', 'seofy-core'),
				'group' => esc_html__( 'First Item', 'seofy-core' ),
				'save_always' => true,
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
        )
));
    Seofy_Loop_Settings::init($this->shortcodeName, array( 'hide_cats' => true,
                    'hide_tags' => true));
}
?>