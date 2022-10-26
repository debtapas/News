     <div class="container bannerMain mb-5">
        <div class="row">

            <div class="col-md-8">
                <div id="demo" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                        <?php
                        $i=1;
                            $args = array(  
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => 30, 
                                'orderby' => 'rand', 
                                'order' => 'ASC', 
                            );

                        $loop = new WP_Query( $args ); 
                            
                        while ( $loop->have_posts() ) : $loop->the_post();?>
                            <div class="carousel-item <?php if($i == 1){ echo 'active'; } ?> ">
                                <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']);?>
                                  <a href="<?php the_permalink(); ?>" class="carousel-caption">
                                      <h3><strong><?php the_title(); ?></strong></h3>
                                      <p><?php echo mb_strimwidth(get_the_excerpt(), 0, 20, '...'); ?></p>
                                  </a>
                            </div>
                        <?php $i++; endwhile;
                                wp_reset_postdata(); 
                        ?>
                  </div>

                  <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>
                </div>
            </div>

            <div class="col-md-4">
                <?php
                        $args = array(  
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 2, 
                            'orderby' => 'rand', 
                            'order' => 'ASC', 
                        );

                    $loop = new WP_Query( $args ); 
                        
                    while ( $loop->have_posts() ) : $loop->the_post();?>
                        <div class="card card-overlay card-overlay-bottom text-light mb-3">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']);?>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_excerpt(), 0, 15, '...'); ?></a></h5>
                                <div class="post__date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time( 'F jS, Y' ); ?></div>
                            </div>                           
                        </div>
                    <?php endwhile;
                            wp_reset_postdata(); 
                ?>
            </div>

        </div>
    </div>