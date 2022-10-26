<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */
global $jnews;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

    <?php if(!is_front_page()){ ?>
        <h2>    
            <?php
                $current_category = get_category( get_query_var( 'cat' ), false );
                echo $current_category->name;
            ?>                
        </h2>



        <section class="travel_bottom_part">
            <div class="container">
                <div class="row">
                    <?php
	                $current_category = get_category( get_query_var( 'cat' ), false );

	                $lastposts = get_posts( array(
	                    'posts_per_page' => 2,
	                    'category_name'  => $current_category->name,
	                ) );
	                 
	                if ( $lastposts ) {
                    foreach ( $lastposts as $post ) :
                        setup_postdata( $post ); ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="travel_bottomp_left">
                                <div class="travel_bottomp_image">
                                    <p class="img-fluid"><?php the_post_thumbnail('large');?></p>
                                </div>
                                <div class="travelbottomptext">
                                    <h2><?php the_title(); ?></h2>
                                    <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 80, '...'); ?></p>
                                    <div class="travel_bottom_dateee">
                                        <img src="<?php get_stylesheet_directory_uri() . '/images/clock.png' ?>"> <?php the_time( 'F jS, Y' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  endforeach; 
                        wp_reset_postdata(); 
                    } ?>
                </div>
            </div>
        </section>
        
    <?php } else { ?>
        <section class="travel_part">
            <div class="container">
                <div class="row">
                    <?php
                        $i=0;
                        $count=1; 
                        $args = array(  
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'category_name'  => 'travel',
                            'posts_per_page' => 4, 
                            'order' => 'ASC', 
                        );

                        $loop = new WP_Query( $args ); 
                                    
                        while ( $loop->have_posts() ) : $loop->the_post();
                            if($count==1) { ?>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="travel_left">
                        
                            <div class="travel_top_image">
                                <p class="img-fluid"><?php the_post_thumbnail('large');?></p> 
                            </div>
                            <div class="travel_bottom">
                                <div class="travel_heading">
                                    <div class="theading_left"><?php the_category(); ?></div>
                                    <div class="theading_right"> <?php the_time( 'F jS, Y' ); ?></div>
                                </div>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 80, '...'); ?></p>
                            </div>
                            
                        </div>
                    </div>
                    <?php } 
                    else if($i==1) { ?>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    <?php } 
                    else if($count>1) { ?>
                        <div class="travel_right">
                            <div class="world_part">
                                <div class="world_text">
                                    <div class="theading_left"><?php the_category(); ?></div>
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="world_date"><?php the_time( 'F jS, Y' ); ?></div>
                                </div>
                                <div class="world_image">
                                    <?php the_post_thumbnail('medium');?>
                                </div>
                                
                            </div>
                        </div>

                    <?php } ?>
                    <?php $i++; $count++; endwhile; 
                    echo "</div>";
                     wp_reset_postdata(); ?>
                </div>
            </div>
        </section>


        <section class="travel_bottom_part">
            <div class="container">
                <div class="row">
                    <?php
                        $args = array(  
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'category_name'  => 'travel',
                            'posts_per_page' => 2,
                            'order' => 'DESC', 
                        );

                        $loop = new WP_Query( $args );                             
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="travel_bottomp_left">
                                <div class="travel_bottomp_image">
                                    <p class="img-fluid"><?php the_post_thumbnail('large');?></p>
                                </div>
                                <div class="travelbottomptext">
                                    <div class="travelp_heading"><?php the_category(); ?></div>
                                    <h2><?php the_title(); ?></h2>
                                    <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 80, '...'); ?></p>
                                    <div class="travel_bottom_dateee">
                                        <img src="<?php get_stylesheet_directory_uri() . '/images/clock.png' ?>"> <?php the_time( 'F jS, Y' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  endwhile; 
                        wp_reset_postdata(); ?>
                </div>
            </div>
        </section>


        <section class="business_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="business_left">
                            <div class="busienss_heading">
                                <h2>Highlights</h2>
                            </div>
                            <div class="business_bottom">
                                <div class="row">
                                    <?php
                                    $args = array(  
                                        'meta_key' => 'post_views_count',
                                        'orderby'  => 'meta_value_num',
                                        'posts_per_page' => 4 , 
                                        'order'    => 'DESC',
                                    );

                                    $loop = new WP_Query( $args );                             
                                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="business_bottom_col">
                                            <div class="business_imagee">
                                                <p class="img-fluid"><?php the_post_thumbnail('medium');?></p>
                                            </div>
                                            <div class="market_text">
                                                <div class="travelp_heading"><?php the_category(); ?></div>
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <div class="travel_bottom_dateee">
                                                    <img src="<?php get_stylesheet_directory_uri() . '/images/clock.png' ?>"> <?php the_time( 'F jS, Y' ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; 
                                    wp_reset_postdata(); ?>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="business_right">
                            <div class="popular_posts">
                                <div class="posts_heading">
                                    <img src="<?php get_stylesheet_directory_uri() . '/images/post_heading.png' ?>">
                                    <h3>Popular Posts</h3>
                                </div>
                                <div class="post_partttsss">
                                    <?php
                                    $args = array(  
                                        'post_type' => 'post',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 6,
                                        'order' => 'DESC', 
                                    );

                                    $loop = new WP_Query( $args );                             
                                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <a href="<?php the_permalink(); ?>" class="posttss">
                                        <div class="inner_post">
                                            <div class="post_left">
                                                <h4><?php the_author(); ?> - <?php the_time( 'F jS, Y' ); ?></h4>
                                                <h5><?php the_title(); ?></h5>
                                            </div>
                                            <div class="post_right">
                                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php endwhile; 
                                wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="hot_news">
            <div class="container">
                <h2>Hot news</h2>
                <div id="news_slider">
                    <?php $args = array(  
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 6, 
                    'order' => 'DESC', 
                );

                    $loop = new WP_Query( $args );
                    $i = 0;                       
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="news_item">
                        <div class="news_image"><?php the_post_thumbnail('medium'); ?>
                        <div class="news_item_heading"><?php the_category(); ?></div>
                        </div>
                        <div class="news_item_text">
                            <h4><a href="#"><?php the_title(); ?></a></h4>
                            <div class="travel_bottom_dateee">
                                <img src="images/clock1.png"> <?php the_time( 'F jS, Y' ); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
                <div class="inbtns2">
                </div>
            </div>
        </section>


        <section class="recent_news">
            <div class="container">
                <h2>Recent News</h2>
                   <div class="row">
                    <div class="col-lg-8 col-md-8">
                <?php
                $args = array(  
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 4, 
                    'order' => 'DESC',
                );
                $loop = new WP_Query( $args ); 
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                
                        <div class="recent_news_topic">
                            <div class="recent_news_inner">
                                <div class="rnews_inner_left"> 
                                    <div class="travelp_heading"><?php the_category(); ?></div>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 80, '...'); ?></p>
                                    <div class="news_user">
                                        <div class="news_name">
                                            <?php the_author();?>
                                        </div>
                                        <div class="news_dot">.</div>
                                        <div class="news_date"><?php the_time( 'F jS, Y' ); ?></div>
                                    </div>
                                </div>
                                <div class="rnews_inner_right">
                                    <?php the_post_thumbnail('medium');?>
                                </div>
                            </div>
                        </div>
                    
                
                <?php endwhile; ?>
                </div>
                <div class="col-lg-4 col-md-4">
                        <div class="dont_miss">
                            <div class="trend_heading">
                                <h2>Don’t Miss</h2>
                            </div>
                            <div class="miss_inner">
                                <div class="miss_text">
                                    <?php if(is_active_sidebar('right-sidebar')) {
                                        dynamic_sidebar( 'right-sidebar' ); 
                                    } ?>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </section>

<?php }  ?>

    


