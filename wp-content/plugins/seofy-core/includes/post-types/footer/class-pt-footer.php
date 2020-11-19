<?php
if(!class_exists('Seofy_Theme_Helper')){
    return;
}
/**
 * Class Team
 * @package PostType
 */
class Footer {
    /**
     * @var string
     *
     * Set post type params
     */
    private $type = 'footer';
    private $slug;
    private $name;
    private $plural_name;

    /**
     * Team constructor.
     *
     * When class is instantiated
     */
    public function __construct() {
        // Register the post type
        $this->name = __( 'Footer', 'wgl-core' );
        $this->slug = 'footer';
        $this->plural_name = __( 'Footers', 'wgl-core' );

        add_action('init', array($this, 'register'));
    }

    /**
     * Register post type
     */
    public function register() {
        $labels = array(
            'name'                  => $this->name,
            'singular_name'         => $this->name,
            'add_new'               => sprintf( __('Add New %s', 'wgl-core' ), $this->name ),
            'add_new_item'          => sprintf( __('Add New %s', 'wgl-core' ), $this->name ),
            'edit_item'             => sprintf( __('Edit %s', 'wgl-core'), $this->name ),
            'new_item'              => sprintf( __('New %s', 'wgl-core'), $this->name ),
            'all_items'             => sprintf( __('All %s', 'wgl-core'), $this->plural_name ),
            'view_item'             => sprintf( __('View %s', 'wgl-core'), $this->name ),
            'search_items'          => sprintf( __('Search %s', 'wgl-core'), $this->name ),
            'not_found'             => sprintf( __('No %s found' , 'wgl-core'), strtolower($this->name) ),
            'not_found_in_trash'    => sprintf( __('No %s found in Trash', 'wgl-core'), strtolower($this->name) ),
            'parent_item_colon'     => '',
            'menu_name'             => $this->name
        );
        $args = array(
            'labels'                => $labels,
            'public'                => true,
            'exclude_from_search'   => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'rewrite'               => array( 'slug' => $this->slug ),
            'menu_position' =>  5,
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'menu_icon'  =>  'dashicons-admin-page',
        );
        register_post_type( $this->type, $args );
    }
}