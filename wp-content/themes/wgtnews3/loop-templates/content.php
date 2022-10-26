<?php

/**

 * Post rendering content according to caller of get_template_part

 *

 * @package Understrap

 */

global $jnews;



// Exit if accessed directly.

defined('ABSPATH') || exit; ?>

<?php if (!is_front_page()) { ?>
    <div class="banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="banner_left_down cate-section">
                        <h2 class="catename">
                            <?php
                            $current_category = get_category(get_query_var('cat'), false);
                            echo $current_category->name;
                            ?>
                        </h2>
                        <div class="sectionSep cat-sec">
                            <?php
                            $current_category = get_category(get_query_var('cat'), false);

                            $lastposts = get_posts(array(
                                'posts_per_page' => 4,
                                'category_name'  => $current_category->name,
                            ));

                            if ($lastposts) {
                                foreach ($lastposts as $post) :
                                    setup_postdata($post); ?>
                                    <div class="inner-cat category-post-section">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top cate-post-img', 'title' => 'Feature image']); ?></a>
                                        <div class="cat-content cate-content">
                                            <h3 class='cate-heading'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <p class='cate-name'><?php echo $current_category->name; ?> | <i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></p>
                                            <p class='cate-para'><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, '...'); ?></p>
                                        </div>
                                    </div>
                            <?php
                                endforeach;
                                wp_reset_postdata();
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>


    <!-- Highlight section start here -->
    <?php

    $high = array(

        'meta_key' => 'post_views_count',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby'  => 'meta_value_num',
        'order' => 'DESC',

    );
    $hightlight = new WP_Query($high);
    if ($hightlight->have_posts() > 0) :
    ?>
        <div class="hightlight_section">
            <div class="container">
                <div class="header_content">
                    <h2>HIGHLIGHT</h2>
                </div>
                <div class="row">

                    <?php while ($hightlight->have_posts()) : $hightlight->the_post(); ?>

                        <div class="col-md-4 col-sm-12">
                            <div class="hightlgt_cotn">
                                <div class="hightlgt_image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?>
                                    </a>
                                    <span><?php the_category(', '); ?></span>
                                </div>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 250); ?></p>
                                <ul class="list-inline admin_date">
                                    <li>By <span><?php the_author(); ?></span></li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></li>
                                </ul>
                            </div>
                        </div>

                    <?php endwhile;
                    ?>
                </div>
            </div>

        </div>

    <?php
    endif;
    wp_reset_postdata();
    ?>
    <!-- Highlight section end here -->

    <!-- breaking news start here -->

    <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'orderby' => 'rand',
        'show_count'   => true,
        'order' => 'ASC',
    );
    $breakloop = new WP_Query($args);
    if ($breakloop->have_posts() > 0) :
    ?>

        <div class="breaking_news">
            <div class="container">
                <div class="header_content">
                    <h2>BREAKING NEWS</h2>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="breaking_left">
                            <div class="row">
                                <?php
                                $count = 1;
                                while ($breakloop->have_posts()) : $breakloop->the_post(); ?>

                                    <?php if ($count == 1) {
                                        //show left one big image post  
                                    ?>

                                        <div class="col-md-12 breaking_bottom">
                                            <div class="breaking_lft_up">
                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'w-100', 'title' => 'Feature image']); ?></a>
                                                <div class="breaking_lft_up_span">
                                                    <h4 class="breaknws"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <ul class="list-inline admin_date">
                                                        <li>By <span><?php the_author(); ?></span></li>
                                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    <?php } elseif ($count <= 3) {
                                        //show left two big image pos
                                    ?>

                                        <div class="col-md-6  img-2-col">
                                            <div class="hightlgt_cotn">
                                                <div class="hightlgt_image">
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'w-100', 'title' => 'Feature image']); ?></a>
                                                </div>
                                                <h6><?php the_category(', '); ?></h6>
                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                                                <ul class="list-inline admin_date">
                                                    <li>By <span><?php the_author(); ?></span></li>
                                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <?php
                                    } else {
                                        // Right secton for Three post 
                                        if ($count == 4) { ?>

                            </div>
                            <!-- close row-->
                        </div>
                        <!-- close breaking_left-->
                    </div>
                    <!-- close col-sm-12 col-md-6-->

                    <!-- start col-sm-12 col-md-6-->
                    <div class="col-sm-12 col-md-5">
                        <div class="breaking_right">

                        <?php } ?>


                        <div class="breaking_right_inner break-nws-threeright">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?></a>
                            <div class="breakng_cntn_rgt">
                                <h5 class="news-side-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <ul class="list-inline admin_date">
                                    <li>By <span><?php the_author(); ?></span></li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></li>
                                </ul>
                                <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 55); ?></p>
                            </div>
                        </div>


                    <?php } ?>

                <?php $count++;
                                endwhile; // breaking while loop close
                ?>

                        </div>
                        <!--breaking_right close-->
                    </div>
                    <!-- close col-sm-12 col-md-6-->

                </div>
            </div>
        </div>


    <?php
    endif;
    wp_reset_postdata();
    ?>

    <!-- breaking news end here -->

    <!-- feature news section start here -->
    <?php
    $args = array(

        'meta_key' => 'meta-checkbox',
        'meta_value' => 'yes',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'ignore_sticky_posts' => 1,
        'orderby' => 'rand'
    );
    $newsbreakloop = new WP_Query($args);
    if ($newsbreakloop->have_posts() > 0) :
    ?>

        <div class="feature_news">
            <div class="container-fluid">
                <div class="row">
                    <?php while ($newsbreakloop->have_posts()) : $newsbreakloop->the_post(); ?>

                        <div class="col-md-4 col-sm-4">
                            <div class="row">
                                <div class="feature_news_inner">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'img-feature', 'title' => 'Feature image']); ?></a>
                                    <div class="feature_cntn_down">
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <ul class="list-inline admin_date">
                                            <li>By <span><?php the_author(); ?></span></li>
                                            <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>

                </div>
            </div>
        </div>

    <?php
    endif;
    wp_reset_postdata();
    ?>
    <!-- feature news section end here -->


    <!-- latest news section css start here -->

    <?php
    $args = array(
        'post_type' => 'post', /* your post type name */
        'post_status' => 'publish',
        'posts_per_page' => 6, /* how many post you need to display */
        'ignore_sticky_posts' => 1,
        'offset' => 0,
        'orderby' => 'post_date',
        'order' => 'DSEC'

    );
    $latestnewsloop = new WP_Query($args);
    if ($latestnewsloop->have_posts() > 0) :
    ?>

        <div class="latest_news">
            <div class="container">
                <div class="header_content">
                    <h2>LATEST NEWS</h2>
                </div>
                <div class="latest_news_nctn">

                    <?php while ($latestnewsloop->have_posts()) : $latestnewsloop->the_post(); ?>

                        <div class="latest_news_inner">
                            <div class="trending_bl_iner_cnt">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?></a>
                                <div class="trending_bl_iner_right">
                                    <h4 class="lstnwshd"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></p>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>

                </div>
            </div>
        </div>

    <?php
    endif;
    wp_reset_postdata();
    ?>

    <!-- latest news section css end here -->

    <!-- index news start here -->
    <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 7,
        'ignore_sticky_posts' => 1,
        'orderby' => 'rand',
        'show_count'   => true,
        'order' => 'DESC',
    );
    $breakloop = new WP_Query($args);
    if ($breakloop->have_posts() > 0) :
    ?>

        <div class="index_news">
            <div class="container">
                <div class="header_content">
                    <h2>INDEX NEWS</h2>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="breaking_left">
                            <div class="row">

                                <?php
                                $loopcondition = 1;
                                while ($breakloop->have_posts()) : $breakloop->the_post(); ?>

                                    <?php if ($loopcondition == 1) { ?>

                                        <div class="col-md-12 breaking_bottom">
                                            <div class="breaking_lft_up">
                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?></a>
                                                <div class="breaking_lft_up_span">
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <ul class="list-inline admin_date">
                                                        <li>By <span><?php the_author(); ?></span></li>
                                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">

                                        <?php  } elseif ($loopcondition <= 3) {
                                        //show left two big image pos 
                                        ?>

                                            <div class="breaking_right_inner">
                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?></a>
                                                <div class="breakng_cntn_rgt">
                                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                    <ul class="list-inline admin_date">
                                                        <li>By <span><?php the_author(); ?></span></li>
                                                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></li>
                                                    </ul>
                                                    <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 55); ?></p>
                                                </div>
                                            </div>


                                            <?php
                                            if ($loopcondition == 3) { ?>

                                        </div>
                            </div>
                        </div>
                    </div>

                <?php }
                                        } else {

                                            if ($loopcondition == 4) { ?>

                    <div class="col-sm-12 col-md-5">
                        <div class="breaking_right">

                        <?php   }

                        ?>

                        <div class="breaking_right_inner right-indexnews-sec">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => '', 'title' => 'Feature image']); ?></a>
                            <div class="breakng_cntn_rgt">
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h5>
                                <ul class="list-inline admin_date">
                                    <li>By <span><?php the_author(); ?></span></li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></li>
                                </ul>
                                <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 55); ?></p>
                            </div>
                        </div>


                    <?php } ?>

                <?php $loopcondition++;
                                endwhile; // breaking while loop close 
                ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    <?php
    endif;
    wp_reset_postdata();
    ?>

    <!-- index news end here -->

<?php } ?>