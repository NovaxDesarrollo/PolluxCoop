<?php

require_once 'vendor/autoload.php';

use Pollux\Job as Job;

$init = new Job();

function enqueue_parent_style()
{
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}

add_action('wp_enqueue_scripts', 'enqueue_parent_style');

//[applierProfile] shortcode
function applierProfile_func($atts)
{
    if (isset($_GET['applier_profile'])) {
        $output = '<h3 class="applier-title">You are applying for '.$_GET['applier_profile'].'</h3>';
    } else {
        $output = '';
    }

    return $output;
}
add_shortcode('applierProfile', 'applierProfile_func');

//Font-Awesome implementation

add_action('wp_enqueue_scripts', 'enqueue_fontawesome');
function enqueue_fontawesome()
{
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri().'/icon/font-awesome/css/all.css');
}

//Debug mode on
add_action('avia_builder_mode', 'builder_set_debug');
function builder_set_debug()
{
    return 'debug';
}
