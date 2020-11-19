<?php

if (!defined('ABSPATH')) {
    die();
}

global $avia_config;
global $post;

// get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
 get_header();

$title = __('Blog - Latest News', 'avia_framework'); //default blog title
$t_link = home_url('/');
$t_sub = '';

if (avia_get_option('frontpage') && $new = avia_get_option('blogpage')) {
    $title = get_the_title($new); //if the blog is attached to a page use this title
    $t_link = get_permalink($new);
    $t_sub = avia_post_meta($new, 'subtitle');
}

if ('no' != get_post_meta(get_the_ID(), 'header', true)) {
    echo avia_title(['heading' => 'strong', 'title' => $title, 'link' => $t_link, 'subtitle' => $t_sub]);
}

do_action('ava_after_main_title');

?>

<div
    class='container_wrap container_wrap_first main_color <?php avia_layout_class('main'); ?>'>

    <div class='container template-blog template-single-blog '>

        <main
            class='content units <?php avia_layout_class('content'); ?> <?php echo avia_blog_class_string(); ?>'
            <?php avia_markup_helper(['context' => 'content', 'post_type' => 'post']); ?>>

            <?php

            //Get post meta data
            $postMetadata = get_post_custom($post->ID);
            $title = $post->post_title;
            $description = $postMetadata['description'][0];
            $availability = $postMetadata['availability'][0];
            $requiredKnowledge = $postMetadata['required-knowledge'][0];
            $preferentKnowledge = $postMetadata['preferent-knowledge'][0];
            $modalityLocation = $postMetadata['modality-location'][0];
            $location = $postMetadata['location'][0];
            $applyFormLink = '/work-with-us?applier_profile='.$title;

        ?>

            <div class='main_color container_wrap_first container_wrap fullsize' style=' '>
                <div class='container'>
                    <main role="main" itemprop="mainContentOfPage"
                        class='template-page content  av-content-full alpha units'>
                        <div class='post-entry post-entry-type-page post-entry-758'>
                            <div class='entry-content-wrapper clearfix'>
                                <div class="flex_column av_three_fifth  flex_column_div av-zero-column-padding first  avia-builder-el-0  el_before_av_two_fifth  avia-builder-el-first  "
                                    style='border-radius:0px; '>
                                    <section class="av_textblock_section " itemscope="itemscope"
                                        itemtype="https://schema.org/CreativeWork">
                                        <div class='avia_textblock  ' itemprop="text">
                                            <h1><?php echo $title; ?>
                                            </h1>
                                        </div>
                                    </section>
                                    <div class='single-job-icons'>
                                        <article
                                            class="iconbox iconbox_left    avia-builder-el-2  el_after_av_textblock  el_before_av_icon_box   "
                                            itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
                                            <div class="iconbox_content">
                                                <header class="entry-content-header">
                                                    <div class="iconbox_icon heading-color " aria-hidden='true'
                                                        data-av_icon='' data-av_iconfont='entypo-fontello'></div>
                                                </header>
                                                <div class='iconbox_content_container  ' itemprop="text">
                                                    <p><?php echo $availability; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <footer class="entry-footer"></footer>
                                        </article>
                                        <article
                                            class="iconbox iconbox_left    avia-builder-el-3  el_after_av_icon_box  el_before_av_icon_box   "
                                            itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
                                            <div class="iconbox_content">
                                                <header class="entry-content-header">
                                                    <div class="iconbox_icon heading-color " aria-hidden="true"
                                                        data-av_icon="" data-av_iconfont="entypo-fontello"></div>
                                                </header>
                                                <div class='iconbox_content_container  ' itemprop="text">
                                                    <p> <?php echo $modalityLocation; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <footer class="entry-footer"></footer>
                                        </article>
                                        <article
                                            class="iconbox iconbox_left    avia-builder-el-4  el_after_av_icon_box  avia-builder-el-last   "
                                            itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
                                            <div id="iconbox-location" class="iconbox_content">
                                                <header class="entry-content-header">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </header>
                                                <div class='iconbox_content_container  ' itemprop="text">
                                                    <p><?php echo $location; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <footer class="entry-footer"></footer>
                                        </article>
                                    </div>
                                </div>
                                <div class="flex_column av_two_fifth  flex_column_div av-zero-column-padding   avia-builder-el-5  el_after_av_three_fifth  el_before_av_one_full  "
                                    style='border-radius:0px; '>
                                    <div
                                        class='avia-button-wrap avia-button-center  avia-builder-el-6  avia-builder-el-no-sibling '>
                                        <button id='single-job-apply-button' class='gform_button button'
                                            onclick="window.location.href = '<?php echo $applyFormLink; ?>';">Apply</button>
                                        </body>
                                    </div>
                                </div>
                                <div class="flex_column av_one_full  flex_column_div av-zero-column-padding first  avia-builder-el-7  el_after_av_two_fifth  avia-builder-el-last  "
                                    style='border-radius:0px; '>
                                    <section class="av_textblock_section " itemscope="itemscope"
                                        itemtype="https://schema.org/CreativeWork">
                                        <div class='avia_textblock  ' itemprop="text">
                                            <h2>Description</h2>
                                        </div>
                                    </section>
                                    <section class="av_textblock_section " itemscope="itemscope"
                                        itemtype="https://schema.org/CreativeWork">
                                        <div class='avia_textblock  ' itemprop="text">
                                            <p><?php echo $description; ?>
                                            </p>
                                        </div>
                                    </section>
                                    <section class="av_textblock_section " itemscope="itemscope"
                                        itemtype="https://schema.org/CreativeWork">
                                        <div class='avia_textblock  ' itemprop="text">
                                            <h2>Required Knowledge</h2>
                                        </div>
                                    </section>
                                    <section class="av_textblock_section " itemscope="itemscope"
                                        itemtype="https://schema.org/CreativeWork">
                                        <div class='avia_textblock  ' itemprop="text">
                                            <p><?php echo $requiredKnowledge; ?>
                                            </p>
                                        </div>
                                    </section>
                                    <section class="av_textblock_section " itemscope="itemscope"
                                        itemtype="https://schema.org/CreativeWork">
                                        <div class='avia_textblock  ' itemprop="text">
                                            <h2>Preferent Knowledge</h2>
                                        </div>
                                    </section>
                                    <section class="av_textblock_section " itemscope="itemscope"
                                        itemtype="https://schema.org/CreativeWork">
                                        <div class='avia_textblock  ' itemprop="text">
                                            <p><?php echo $preferentKnowledge; ?>
                                            </p>
                                        </div>
                                    </section>
                                </div>
                                </p>
                            </div>
                        </div>
                    </main><!-- close content main element -->
                    <!-- section close by builder template -->
                </div>
                <!--end builder template-->
            </div><!-- close default .container_wrap element -->


            <!--end content-->
        </main>

        <?php
    $avia_config['currently_viewing'] = 'blog';
    //get the sidebar
    get_sidebar();

    ?>


    </div>
    <!--end container-->

</div><!-- close default .container_wrap element -->


<?php
get_footer();
