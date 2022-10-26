<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="left-sidebar">
<?php else : ?>
	<div class="col-md-12 widget-area" id="left-sidebar">
<?php endif; ?>
<?php dynamic_sidebar( 'left-sidebar' ); ?>
    <div class="sectionSep">
        <?php
            $i=1;

            $args = array(  
                    'post_type' => 'post',
                    'post_status' => 'publish',                    
                    'orderby' => 'name', 
                    'order' => 'ASC', 
                    'posts_per_page' => 4
                );

                $loop = new WP_Query( $args );  

                while ( $loop->have_posts() ) : $loop->the_post();
                    if( $i == 1 ){; ?>

                        <div class="post postCount post-count-large mb-4">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']);?>
                            </a>
                            <div class="post-content my-3 ">
                                <div class="post-title">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <div class="post-share"><i class="fa fa-share-alt" aria-hidden="true"></i> 0 Shares</div>
                                </div>
                                <div class="post-count d-flex align-items-center justify-content-center">
                                    <div class="count-number">01</div>
                                </div>
                            </div>
                        </div>

                    <?php }else {?>                   

                    <div class="post postCount mb-3">
                        <div class="post-content">
                            <div class="post-count">
                                <div class="count-number">0<?php echo $i; ?></div>
                            </div>
                            <div class="post-title">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="post-share"><i class="fa fa-share-alt" aria-hidden="true"></i> 0 Shares</div>
                            </div>
                        </div>
                    </div>

                <?php ;} $i++; endwhile;
                  wp_reset_postdata();
        ?>
    </div>

</div><!-- #left-sidebar -->
