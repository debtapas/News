<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
global $wp_query;
?>

<section class="content">
    <div class="container">
        <div class="row">
            <!-- Do the left sidebar check and opens the primary div -->
            <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

            <main class="site-main" id="main">

                <?php
                if ( have_posts() ) { ?>
                     <div class="cate-section">
				        <h2 class="catename">
				            <?php
				            $current_page = get_queried_object();
				            echo $current_page->name;
				            ?>
				        </h2>
				        <div class="cat-sec row">
				            <?php
				                $currCat = get_category(get_query_var('cat'));
				                $cat_name = $currCat->name;

				              while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				                    <div class="col-md-4">
				                        <div class="inner-cat category-post-section card mb-5">
				                            <a href="<?php the_permalink(); ?>">
				                                <?php
				                                  if (!empty( get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) ))) {
				                                    echo get_the_post_thumbnail( get_the_id(), 'post-img', array( 'class' => 'card-img-top' ) );
				                                  }else{ ?>
				                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dummy.jpg" width="" height="" alt="" />
				                                   <?php } ?>
				                            </a>
				                            <div class="cat-content cate-content card-body">
				                                <h3 class='cate-heading card-title'><a href="<?php the_permalink(); ?>">
				                                	<?php echo mb_strimwidth(get_the_title(), 0, 55, '...'); ?>
				                                	</a></h3>
				                                <p class='cate-name'><?php echo $cat_name; ?> | <i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('M jS, Y'); ?></span></p>
				                                <p class='cate-para card-text'><?php echo mb_strimwidth(get_the_excerpt(), 0, 75, '...'); ?></p>
				                            </div>
				                        </div>
				                    </div>                
				        <?php endwhile; ?>				                          
				            </div>
				            <!-- Pagination -->
				                <div class='d-flex justify-content-center'>
				                    <div class='pagination pg-custom'>
				                        <?php
				                          global $wp_query;
				                          $total_pages = $wp_query->max_num_pages;
				                          $big = 999999999; // need an unlikely integer

				                             if ($total_pages > 1){
				                                echo paginate_links( array(
				                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				                                'format' => '?paged=%#%',
				                                'prev_next'    => true,
				                                'prev_text' => __('«'),
				                                'next_text' => __('»'),
				                                'current' => max( 1, get_query_var('paged') ),
				                                'mid_size' => 2,
				                                'total' => $total_pages
				                                ) );
				                             }                            
				                        ?>
				                    </div>
				                </div>  
				        </div>
                    
                <?php } else {
                    echo get_template_part( 'loop-templates/content', 'none' );
                } ?>

            </main><!-- #main -->            
		</div>
    </div>
</section>

<?php
get_footer();
