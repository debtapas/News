<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */
global $jnews;
// echo "<pre>";
// print_r($jnews);
// die();


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

    <div class="sectionSep mb-5">
        <div class="headingTab d-flex mb-5">
            <div class="htItem"><i class="fa fa-volume-down" aria-hidden="true"></i> LIVE UPDATES</div>
        </div>
            <?php
                $args = array(  
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 1, 
                    'orderby'        => 'modified',
                );
                $loop = new WP_Query( $args );                    
                while ( $loop->have_posts() ) : $loop->the_post();?>

            <div class="card card-large">
                <div class="top-post">
                    <?php
                      if (!empty( get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) ))) {
                        echo get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) );
                      }else{ ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy.jpg" width="" height="" alt="" />
                    <?php } ?>
                </div>
                <div class="card-body">                    
                    <div class="post-meta d-flex mb-3">
                    <div class="authore">By : <?php the_author(); ?></div>
                    <!-- <p>Modified: <?php //the_modified_date(); ?> at <?php //the_modified_time(); ?></p> -->
                    <div class="post__date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time( 'F jS, Y' ); ?></div>
                    </div>
                    <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p class="card-text"><?php echo mb_strimwidth(get_the_excerpt(), 0, 200, '...'); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-default">Read More</a>                         
                        
                    <?php endwhile;
                    wp_reset_postdata(); 
            ?>
            <hr>
            <ul class="row post-list">
                <?php
                    $args = array(  
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'orderby' => 'rand', 
                        'order' => 'ASC', 
                    );

                    $loop = new WP_Query( $args ); 
                        
                    while ( $loop->have_posts() ) : $loop->the_post();?>
                        <li class="col-md-6"><a href="<?php the_permalink(); ?>"><i class="fa fa-caret-right" aria-hidden="true"></i><?php the_title(); ?></a></li>
                    <?php endwhile;
                    wp_reset_postdata(); 
                ?>
            </ul>
          </div>
        </div>
    </div>

    <div class="sectionSep mb-5">
        <div class="headingBordered d-flex align-items-center mb-4">
            <h3 class="mb-0 text-uppercase">HighLight</h3>
            <span></span>
        </div>
        <div class="row">
            <?php
                $args = array(  
                    'post_type'     => 'post',
                    'post_status'   => 'publish',
                    'posts_per_page' => $jnews['highLight_posts_count'], 
                    'order' => 'ASC', 
                    'meta_key' => 'wp_post_views_count', // set custom meta key
                    'orderby' => 'meta_value_num'
                );

                $loop = new WP_Query( $args ); 
                    
                while ( $loop->have_posts() ) : $loop->the_post();?>
                 <div class="col-md-4">
                    <div class="card card-grid card-post">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                              if (!empty( get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) ))) {
                                echo get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) );
                              }else{ ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy.jpg" width="" height="" alt="" />
                           <?php } ?>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <div class="post__date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time( 'F jS, Y' ); ?></div>
                        </div>                           
                    </div>
                </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
        </div>
    </div>

    <?php if ( is_active_sidebar( 'bodywidget' ) ) {?>
        <div class="sectionSep mb-5">
            <div class="row">
                <?php dynamic_sidebar( 'bodywidget' ); ?>
            </div>                
        </div>
    <?php } ?>
    
    <div class="sectionSep mb-5">
        <?php
            $args = array(  
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3, 
                'orderby' => 'rand', 
                'order' => 'ASC', 
            );

            $loop = new WP_Query( $args ); 
                
            while ( $loop->have_posts() ) : $loop->the_post();?>
                <div class="card card-inline card-post mb-4 border-0">
                    <div class="card-img-left">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                              if (!empty( get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) ))) {
                                echo get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) );
                              }else{ ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy.jpg" width="" height="" alt="" />
                               <?php } ?>
                             <?php //the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']);?>
                         </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <div class="post-meta d-flex mb-3">
                            <div class="authore">By : <?php the_author(); ?></div>
                            <div class="post__date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time( 'F jS, Y' ); ?></div>
                        </div>
                        <p class="mb-0"><?php echo mb_strimwidth(get_the_excerpt(), 0, 100, '...'); ?></p>
                    </div>
                </div>
                <hr/>
            <?php endwhile; wp_reset_postdata(); ?>
    </div>

    <div class="sectionSep mb-5">
        <div class="card card-overlay text-light">
            <?php
                $args = array(  
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                    'orderby' => 'rand', 
                    'order' => 'ASC', 
                );

                $loop = new WP_Query( $args ); 
                    
                while ( $loop->have_posts() ) : $loop->the_post();?>
                    <a href="<?php the_permalink(); ?>">
                        <?php
                          if (!empty( get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) ))) {
                            echo get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) );
                          }else{ ?>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy.jpg" width="" height="" alt="" />
                        <?php } ?>
                     </a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <div class="post__date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time( 'F jS, Y' ); ?></div>
                    </div> 
                <?php endwhile; wp_reset_postdata(); ?>                         
        </div>
    </div>

    <div class="sectionSep mb-5">
        <div class="headingBordered d-flex align-items-center mb-4">
            <h3 class="mb-0 text-uppercase">NEWS INDEX</h3>
            <span></span>
        </div>
       <?php
            $new_page = get_option( 'page_on_front' ) > 0 ? 'page' : 'paged';
            $current_page2 = (get_query_var($new_page)) ? get_query_var($new_page) : 1;

                $args = array(  
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'orderby' => 'date', 
                    'order' => 'ASC', 
                    'posts_per_page' => $jnews['news_index_posts_count'],
                    'paged' => $current_page2
                );
                $loop = new WP_Query( $args ); 
                    
                while ( $loop->have_posts() ) : $loop->the_post();?>
                    <div class="card card-inline card-post mb-4 border-0">
                        <div class="card-img-left">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                  if (!empty( get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'img-fluid' ) ))) {
                                    echo get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) );
                                  }else{ ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy.jpg" width="" height="" alt="" />
                             <?php } ?>
                             </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <div class="post-meta d-flex mb-3">
                                <div class="authore">By : <?php the_author(); ?></div>
                                <div class="post__date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time( 'F jS, Y' ); ?></div>
                            </div>
                            <p class="mb-0"><?php echo mb_strimwidth(get_the_excerpt(), 0, 85, '...'); ?></p>
                        </div>
                    </div>
                    <hr/>
                <?php endwhile; ?>
                    <div class='d-flex justify-content-center'>
                        <div class='pagination pg-custom'>
                            <?php $total_pages = $loop->max_num_pages;
                                if ($total_pages > 1){
                                    echo paginate_links(array(
                                        'base' => get_pagenum_link(1) . '%_%',
                                        'format' => '/page/%#%',
                                        'current' => max( 1, $current_page2 ),
                                        'total' => $total_pages,
                                        'prev_next'    => true,
                                        'prev_text'    => __('«'),
                                        'next_text'    => __('»')
                                    ));
                                }?>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); ?> 
    </div>
