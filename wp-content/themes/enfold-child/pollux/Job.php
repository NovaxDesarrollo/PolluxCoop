<?php

namespace Pollux;

//Definition of the Jobs Class for CPT

class Job
{
    private $customFields = [
        'description' => [
            'type' => 'wp_editor',
            'options' => [
                'textarea_name' => 'description', //Job Description
            ],
        ],
        'required-knowledge' => [
            'type' => 'wp_editor',
            'options' => [
                'textarea_name' => 'required-knowledge', //Job Required Knowledge
            ],
        ],
        'preferent-knowledge' => [
            'type' => 'wp_editor',
            'options' => [
                'textarea_name' => 'preferent-knowledge', //Job Preferent Knowledge
            ],
        ],
        'modality-location' => [
            'type' => 'radio',
            'options' => [
                'Remote', //Remote
                'In Place',  //In place
            ],
        ],
        'availability' => [
            'type' => 'radio',
            'options' => [
                'Full Time', //Full time
                'Part Time',  //Part time
            ],
        ],
        'location' => [
            'type' => 'text',
            'options' => [
                'text_name' => 'location', //Location
            ],
        ],
    ];

    public function __construct()
    {
        add_action('init', [$this, 'registerPostType']);

        add_action('add_meta_boxes', [$this, 'postTypeRegisterMetabox']);

        add_action('save_post', [$this, 'postTypeMetaboxSave']);
    }

    //Start Custom Post Type Jobs
    public function registerPostType()
    {
        $supports = [
            'title', // post title
            'thumbnail', // featured images
            'revisions', // post revisions
        ];

        $plural = 'Jobs';
        $singular = 'Job';

        $labels = [
            'name' => _x($plural, 'plural'),
            'singular_name' => _x($singular, 'singular'),
            'menu_name' => _x($plural, 'admin menu'),
            'name_admin_bar' => _x($plural, 'admin bar'),
            'add_new' => _x('Add new', 'add new'),
            'add_new_item' => __('Add new'.$singular),
            'new_item' => __('New '.$singular),
            'edit_item' => __('Edit '.$singular),
            'view_item' => __('View '.$singular),
            'all_items' => __('All '.$plural),
            'search_items' => __('Search'.$plural),
            'not_found' => __($plural.' not found'),
        ];

        $args = [
            'supports' => $supports,
            'labels' => $labels,
            'public' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'jobs'],
            'has_archive' => 'jobs',
            'hierarchical' => false,
            'menu_icon' => 'dashicons-universal-access',
        ];

        register_post_type('job', $args);
    }

    public function postTypeRegisterMetabox()
    {
        add_meta_box(
            'pollux-jobs-meta-box',
            __('Job data'),
            [$this, 'render'],
            'job',
            'normal'
        );
    }

    public function render($post)
    {
        $values = get_post_custom($post->ID);

        wp_nonce_field('post_type_jobs_metabox', 'pollux_post_type_beneficios_meta_box_nonce');

        foreach ($this->customFields as $name => $field) {
            $dbValue = $values[$name][0] ?? '';
            $this->showField($name, $field['type'], $field['options'], $dbValue);
        }
    }

    //Save Meta Box Data
    public function postTypeMetaboxSave($post_id)
    {
        // Bail if we're doing an auto save
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        // if our nonce isn't there, or we can't verify it, bail
        if (!isset($_POST['pollux_post_type_beneficios_meta_box_nonce']) || !wp_verify_nonce($_POST['pollux_post_type_beneficios_meta_box_nonce'], 'post_type_jobs_metabox')) {
            return;
        }
        // if our current user can't edit this post, bail
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $this->save($post_id);
    }

    private function showField($name, $type, $options, $content)
    {
        $words = explode('-', $name);
        $formattedName = array_reduce($words, function ($parcialName, $word) {
            $parcialName .= ucfirst($word).' ';

            return $parcialName;
        });

        $label = "<br><label for='{$name}'>{$formattedName}</label><br/>";
        echo $label;

        if ('wp_editor' == $type) {
            $default_editor_parameters = [
                'media_buttons' => false,
                'textarea_rows' => 10,
                'teeny' => false,
                'dfw' => false,
                '_content_editor_dfw' => false,
                'tinymce' => false,
                'quicktags' => false, ];
            $settings = array_merge($default_editor_parameters, $options);

            wp_editor($content, $name, $settings);
        }

        if ('radio' == $type) {
            foreach ($options as $option) {
                echo " <input type='radio' name='{$name}' value='{$option}' ".checked($content, $option, false).">{$option}<br/>";
            }
        }

        if ('text' == $type) {
            echo "<input type='text' name='{$name}' id='{$name}' value='{$content}' />";
        }
    }

    private function save($post_id)
    {
        foreach ($this->customFields as $name => $value) {
            if (isset($_POST[$name])) {
                update_post_meta($post_id, $name, $_POST[$name]);
            }
        }
    }
}
