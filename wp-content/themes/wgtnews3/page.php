<?php

/**
 * Template Name: Right Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

$container = get_theme_mod('understrap_container_type');
?>

<!-- Banner section start here -->
<div class="banner_section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<div class="banner_left">
					<div class="banner_left_lft">
						<img src="<?php bloginfo('template_directory'); ?>/images/live_icon.png" alt=""> <span>Live Update</span>
					</div>
					<div class="banner_left_rgt">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php
								$args = array(
									'post_type' => 'post',
									'post_status' => 'publish',
									'posts_per_page' => 10,
									'orderby' => 'rand',
									'order' => 'ASC',

								);
								$loop = new WP_Query($args);
								$i = 0;
								while ($loop->have_posts()) : $loop->the_post(); ?>

									<div class="carousel-item <?php if ($i == 0) {
																	echo "active";
																} ?>">
										<p> <?php the_title(); ?></p>
									</div>

								<?php
									$i++;
								endwhile;
								wp_reset_postdata();

								?>

							</div>
							<div class="prev_next_cntn">
								<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="banner_left_down">
					<?php
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 1,
						'ignore_sticky_posts' => 1,
						'orderby' => 'rand',
						'order' => 'ASC',
					);
					$loop = new WP_Query($args);

					while ($loop->have_posts()) : $loop->the_post(); ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', ['class' => 'w-100', 'title' => 'Feature image']); ?></a>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

						<ul class="list-inline admin_date">
							<li>By <span><?php the_author(); ?></span></li>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i> <span><?php the_time('F jS, Y'); ?></span></li>
						</ul>
						<p><?php echo mb_strimwidth(get_the_excerpt(), 0, 150); ?></p>

					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>
			</div>

			<!-- Right sidebar -->
			<?php get_template_part('sidebar-templates/sidebar', 'right'); ?>
		</div>
	</div>
</div>
<!-- Banner section end here -->

<?php
while (have_posts()) {
	the_post();
	if (!is_front_page()) {
		//get_template_part('loop-templates/content', 'page');
		get_template_part('loop-templates/content', 'page');
	} else {
		get_template_part('loop-templates/content', get_post_format());
		//get_template_part('index');
	}
}

?>
<?php
get_footer();
?>