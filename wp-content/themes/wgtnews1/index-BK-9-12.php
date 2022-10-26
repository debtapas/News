<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>
<!-- Top Banner Start Here -->

<div class="top-banner">
	<?php 
	$top_banners = get_posts(array(
		'post_type' => 'post',
		'numberposts' => 3,
		'order' =>  'DSC',
		// 'taxonomy' => 'category'
	));
	$i =1;
	foreach($top_banners as $top_banner ){
	if ($i ==1) {
			?>
			<div class="one">
									<img src="<?php echo get_the_post_thumbnail_url($top_banner->ID); ?>" alt=""> 
									<h4><?php echo $top_banner->post_title; ?></h4>
									<?php $by = $top_banner->post_author; ?>
									<li><i class="fa fa-user"></i> By <?php echo get_the_author_meta('display_name',$by); ?></li>
									<!--  <?php echo the_category( ', ' ); ?> -->
									<?php 
									$top_banner_cats = get_the_category($top_banner->ID);
									// print_r($top_banner_cats);
									foreach($top_banner_cats as $top_banner_cat)
									{
									echo $top_banner_cat->name;
									}
									?>

			</div>
    <?php } else{ ?>
 				<?php if ($i >1)  { ?>
						<div class="two">
							<?php if ($i ==2)  { ?>
								<div class="two_one">
												<img src="<?php echo get_the_post_thumbnail_url($top_banner->ID); ?>" alt=""> 
												<h4><?php echo $top_banner->post_title; ?></h4>
												<?php $by = $top_banner->post_author; ?>
												<li><i class="fa fa-user"></i> By <?php echo get_the_author_meta('display_name',$by); ?></li>
												<!--  <?php echo the_category( ', ' ); ?> -->
												<?php 
												$top_banner_cats = get_the_category($top_banner->ID);
												// print_r($top_banner_cats);
												foreach($top_banner_cats as $top_banner_cat)
												{
												echo $top_banner_cat->name;
												}
												?>
								</div>
					    	<?php } else{ ?>
					    	    <div class="two_two">
												<img src="<?php echo get_the_post_thumbnail_url($top_banner->ID); ?>" alt=""> 
												<h4><?php echo $top_banner->post_title; ?></h4>
												<?php $by = $top_banner->post_author; ?>
												<li><i class="fa fa-user"></i> By <?php echo get_the_author_meta('display_name',$by); ?></li>
												<!--  <?php echo the_category( ', ' ); ?> -->
												<?php 
												$top_banner_cats = get_the_category($top_banner->ID);
												// print_r($top_banner_cats);
												foreach($top_banner_cats as $top_banner_cat)
												{
												echo $top_banner_cat->name;
												}
												?>
								</div>
						    <?php }  ?>
						</div>	 
			<?php }  ?>
    <?php } $i++;  }  ?>
</div>

<!-- Top Banner End Here -->

<!-- Weekly top news start Here -->

<!-- <h2>Weekly top news</h2> -->
<div class="weekly-top-news-sec">
	<!-- <?php
		if ( is_active_sidebar( 'weekly-top-news-widgets' ) ) {
			?>
					<div class="widget-column footer-widget-1">
					<?php dynamic_sidebar( 'weekly-top-news-widgets' ); ?>
					</div>
				<?php
		}
		?> -->

		<?php 
$popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
while ( $popularpost->have_posts() ) : $popularpost->the_post();
 
the_title();
 
endwhile;
?>
</div>

<!-- Weekly top news end Here -->


	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content' );
			}

			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->


<?php
get_footer();
