<?php

get_header();

?>
<div class="main_color container_wrap_first container_wrap fullsize" style=" ">
    <!--Slider beggining -->
    <div id="carrers-title"
        class="avia-section main_color avia-section-default avia-no-border-styling av-parallax-section avia-bg-style-parallax  avia-builder-el-0  el_before_av_section  avia-builder-el-first    container_wrap fullsize"
        style=" " data-section-bg-repeat="no-repeat">
        <div class="av-parallax active-parallax enabled-parallax " data-avia-parallax-ratio="0.3"
            style="top: auto; transform: translate3d(0px, 127px, 0px); height: 356px;">
            <div class="av-parallax-inner main_color  avia-full-stretch"
                style="background-repeat: no-repeat; background-image: url(<?php echo get_option('siteurl'); ?>/wp-content/uploads/2019/07/prayer-x-AAxYvBisZ_E-unsplash.jpg);background-attachment: scroll; background-position: top left; ">
            </div>
        </div>
        <div class="container">
            <main role="main" itemprop="mainContentOfPage" class="template-page content  av-content-full alpha units">
                <div class="post-entry post-entry-type-page post-entry-743">
                    <div class="entry-content-wrapper clearfix">
                        <div class="flex_column av_three_fourth  flex_column_div av-zero-column-padding first  avia-builder-el-1  el_before_av_one_fourth  avia-builder-el-first  "
                            style="border-radius:0px; ">
                            <div style="padding-bottom:10px; color:#ffffff;font-size:65px;"
                                class="av-special-heading av-special-heading-h1 custom-color-heading blockquote modern-quote  avia-builder-el-2  avia-builder-el-no-sibling   av-inherit-size ">
                                <h2 class="av-special-heading-tag " itemprop="headline">Hot Job Openings</h2>
                                <div class="special-heading-border">
                                    <div class="special-heading-inner-border" style="border-color:#ffffff">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex_column av_one_fourth  flex_column_div av-zero-column-padding   avia-builder-el-3  el_after_av_three_fourth  avia-builder-el-last  "
                            style="border-radius:0px; ">
                            <section class="av_textblock_section " itemscope="itemscope"
                                itemtype="https://schema.org/CreativeWork">
                                
                            </section>
                        </div>
                    </div>
                </div>
            </main><!-- close content main element -->
        </div>
    </div>
    <!--Slider end -->
    <div class='container template-blog '>
        <main role="main" itemprop="mainContentOfPage" class='template-page content  av-content-full alpha units'>
            <div class='post-entry post-entry-type-page '>
                <div id='carrers-container' class='entry-content-wrapper clearfix'>

                    <?php
                        $args = ['post_type' => 'job',
                            'post_status' => 'publish', ];

                        $post_types = new WP_Query($args);
                        $posts = $post_types->get_posts();

                        //$position value represent the position of the column in the row
                        // 1 means left , 2 center and 3 right
                        $position = 1;
                        foreach ($posts as $post) {
                            $postLink = $post->guid;
                            $postTitle = $post->post_title;
                            $postMetadata = get_post_custom($post->ID);
                            $description = $postMetadata['description'][0];
                            $description = (strlen($description) > 200) ? implode(' ', array_slice(explode(' ', $description), 0, 40)).' ...' : $description;
                            $availability = $postMetadata['availability'][0];
                            $modalityLocation = $postMetadata['modality-location'][0];
                            $location = $postMetadata['location'][0];
                            if (1 == $position) { ?>
                    <div class="job-column flex_column av_one_third  flex_column_div av-zero-column-padding first  avia-builder-el-0  el_before_av_one_third  avia-builder-el-first   "
                        style='border-radius:0px; '>
                        <?php }
                            if (2 == $position) { ?>
                        <div class="job-column flex_column av_one_third  flex_column_div av-zero-column-padding   avia-builder-el-5  el_after_av_one_third  el_before_av_one_third     "
                            style='border-radius:0px; '>
                            <?php }
                            if (3 == $position) { ?>
                            <div class="job-column flex_column av_one_third  flex_column_div av-zero-column-padding   avia-builder-el-10  el_after_av_one_third  avia-builder-el-last     "
                                style='border-radius:0px; '>
                                <?php } ?>
                                <section class="av_textblock_section " itemscope="itemscope"
                                    itemtype="https://schema.org/CreativeWork">
                                    <div class='avia_textblock ' itemprop="text">
                                        <a
                                            href='<?php echo $postLink; ?>'>
                                            <h2 class='carrer-title'><?php echo $postTitle; ?>
                                            </h2>
                                        </a>
                                    </div>
                                </section>
                                <article
                                    class="iconbox iconbox-job-archive iconbox_left    avia-builder-el-2  el_after_av_textblock  el_before_av_hr   "
                                    itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
                                    <div class="iconbox_content iconbox-availability ">
                                        <div class="iconbox_icon heading-color " aria-hidden="true" data-av_icon=""
                                            data-av_iconfont="entypo-fontello"></div>
                                        <p><?php echo $availability; ?>
                                        </p>
                                    </div>
                                    <div class="iconbox_content iconbox-modalitylocation">
                                        <div class="iconbox_icon heading-color " aria-hidden="true" data-av_icon=""
                                            data-av_iconfont="entypo-fontello">
                                        </div>
                                        <p> <?php echo $modalityLocation; ?>
                                        </p>
                                    </div>
                                    <div class="iconbox_content iconbox-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p><?php echo $location; ?>
                                        </p>
                                    </div>
                                    <footer class="entry-footer"></footer>
                                </article>
                                <div
                                    class="hr hr-default   avia-builder-el-3  el_after_av_icon_box  el_before_av_textblock ">
                                    <span class="hr-inner "><span class="hr-inner-style"></span></span></div>
                                <section class="av_textblock_section " itemscope="itemscope"
                                    itemtype="https://schema.org/CreativeWork">
                                    <div class="avia_textblock  " itemprop="text">
                                        <p><?php echo wp_strip_all_tags($description); ?>
                                            <a
                                                href='<?php echo $postLink; ?>'>
                                                Read more
                                            </a>
                                        </p>
                                    </div>
                                </section>

                            </div>
                            <?php
                        if (3 == $position) {
                            $position = 1;
                        } else {
                            ++$position;
                        }
                        } ?>
                        </div>
                    </div>
        </main>

    </div>
</div>
<?php

get_footer();
