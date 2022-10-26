<?php

/**
 * Declaring widgets
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;


/**
 * Add filter to the parameters passed to a widget's display callback.
 * The filter is evaluated on both the front and the back end!
 *
 * @link https://developer.wordpress.org/reference/hooks/dynamic_sidebar_params/
 */

add_filter('dynamic_sidebar_params', 'understrap_widget_classes');

if (!function_exists('understrap_widget_classes')) {

	/**
	 * Count number of visible widgets in a sidebar and add classes to widgets accordingly,
	 * so widgets can be displayed one, two, three or four per row.
	 *
	 * @global array $sidebars_widgets
	 *
	 * @param array $params {
	 *     Parameters passed to a widget’s display callback.
	 *
	 *     @type array $args  {
	 *         An array of widget display arguments.
	 *
	 *         @type string $name          Name of the sidebar the widget is assigned to.
	 *         @type string $id            ID of the sidebar the widget is assigned to.
	 *         @type string $description   The sidebar description.
	 *         @type string $class         CSS class applied to the sidebar container.
	 *         @type string $before_widget HTML markup to prepend to each widget in the sidebar.
	 *         @type string $after_widget  HTML markup to append to each widget in the sidebar.
	 *         @type string $before_title  HTML markup to prepend to the widget title when displayed.
	 *         @type string $after_title   HTML markup to append to the widget title when displayed.
	 *         @type string $widget_id     ID of the widget.
	 *         @type string $widget_name   Name of the widget.
	 *     }

	 *     @type array $widget_args {
	 *         An array of multi-widget arguments.
	 *
	 *         @type int $number Number increment used for multiples of the same widget.
	 *     }

	 * }
	 * @return array $params
	 */


	// Disable Widget Block Editor (Gutenberg) ~~~~~~~~~~~~~~~~~~
	// function example_theme_support()
	// {
	// 	remove_theme_support('widgets-block-editor');
	// }

	// add_action('after_setup_theme', 'example_theme_support');


	function understrap_widget_classes($params)
	{

		global $sidebars_widgets;

		/*
		 * When the corresponding filter is evaluated on the front end
		 * this takes into account that there might have been made other changes.
		 */

		$sidebars_widgets_count = apply_filters('sidebars_widgets', $sidebars_widgets);

		// Only apply changes if sidebar ID is set and the widget's classes depend on the number of widgets in the sidebar.
		if (isset($params[0]['id']) && strpos($params[0]['before_widget'], 'dynamic-classes')) {

			$sidebar_id   = $params[0]['id'];
			$widget_count = count($sidebars_widgets_count[$sidebar_id]);

			$widget_classes = 'widget-count-' . $widget_count;

			if (0 === $widget_count % 4 || $widget_count > 6) {

				// Four widgets per row if there are exactly four or more than six widgets.
				$widget_classes .= ' col-md-3';
			} elseif (6 === $widget_count) {

				// If exactly six widgets are published.
				$widget_classes .= ' col-md-2';
			} elseif ($widget_count >= 3) {

				// Three widgets per row if there's three or more widgets.
				$widget_classes .= ' col-md-4';
			} elseif (2 === $widget_count) {

				// If two widgets are published.
				$widget_classes .= ' col-md-6';
			} elseif (1 === $widget_count) {

				// If just on widget is active.
				$widget_classes .= ' col-md-12';
			}

			// Replace the placeholder class 'dynamic-classes' with the classes stored in $widget_classes.
			$params[0]['before_widget'] = str_replace('dynamic-classes', $widget_classes, $params[0]['before_widget']);
		}

		return $params;
	}
} // End of if function_exists( 'understrap_widget_classes' ).

add_action('widgets_init', 'understrap_widgets_init');

if (!function_exists('understrap_widgets_init')) {

	/**
	 * Initializes themes widgets.
	 */
	function understrap_widgets_init()
	{

		register_sidebar(

			//Right Sidebar
			array(

				'name'          => __('Right Sidebar', 'understrap'),
				'id'            => 'right-sidebar',
				'description'   => __('Right sidebar widget area', 'understrap'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)

		);


		//Left Sidebar
		register_sidebar(

			array(

				'name'          => __('Left Sidebar', 'understrap'),
				'id'            => 'left-sidebar',
				'description'   => __('Left sidebar widget area', 'understrap'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',

			)

		);


		//Hero Slider
		register_sidebar(

			array(

				'name'          => __('Hero Slider', 'understrap'),
				'id'            => 'hero',
				'description'   => __('Hero slider area. Place two or more widgets here and they will slide!', 'understrap'),
				'before_widget' => '<div class="carousel-item">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => '',
			)

		);


		//Hero Canvas
		register_sidebar(

			array(

				'name'          => __('Hero Canvas', 'understrap'),
				'id'            => 'herocanvas',
				'description'   => __('Full size canvas hero area for Bootstrap and other custom HTML markup', 'understrap'),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => '',
			)
		);


		//Body widget
		register_sidebar(

			array(

				'name'          => __('Body widget', 'understrap'),
				'id'            => 'bodywidget',
				'description'   => __('Full top widget with dynamic grid', 'understrap'),
				'before_widget' => '<div id="%1$s" class="static-hero-widget %2$s dynamic-classes">',
				'after_widget'  => '</div><!-- .static-hero-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);


		//Top Full
		register_sidebar(

			array(

				'name'          => __('Top Full', 'understrap'),
				'id'            => 'statichero',
				'description'   => __('Full top widget with dynamic grid', 'understrap'),
				'before_widget' => '<div id="%1$s" class="static-hero-widget %2$s dynamic-classes">',
				'after_widget'  => '</div><!-- .static-hero-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);


		//Footer Full
		register_sidebar(

			array(

				'name'          => __('Footer Full', 'understrap'),
				'id'            => 'footerfull',
				'description'   => __('Full sized footer widget with dynamic grid', 'understrap'),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);


		//Header Search
		register_sidebar(

			array(

				'name'          => __('Header Search', 'understrap'),
				'id'            => 'headersearch',
				'description'   => __('Full sized footer widget with dynamic grid', 'understrap'),
				'before_widget' => '<div id="%1$s" class=" ">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);


		//Header Social Links
		register_sidebar(

			array(

				'name'          => __('Header Social Links', 'understrap'),
				'id'            => 'headersocial',
				'description'   => __('Full sized footer widget with dynamic grid', 'understrap'),
				'before_widget' => '<div id="%1$s" class=" ">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);



		register_sidebar(
			array(
				'name'          => __('Sidebar Social Links', 'understrap'),
				'id'            => 'sidesociallink',
				'description'   => __('Full sized footer widget with dynamic grid', 'understrap'),
				'before_widget' => '<div id="%1$s" class=" ">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(

				'name'          => __('Footer One', 'understrap'),
				'id'            => 'footerone',
				'description'   => __('Full sized footer widget with dynamic grid', 'understrap'),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<h2 class="widget-title ">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => __('Footer Two', 'understrap'),
				'id'            => 'footertwo',
				'description'   => __('Full sized footer widget with dynamic grid', 'understrap'),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<span class="menu-foot-icon2"><i class="fa fa-bars" aria-hidden="true" style="font-size:34px;"></i></span> <h2 class="widget-title foot-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => __('Footer Three', 'understrap'),
				'id'            => 'footerthree',
				'description'   => __('Full sized footer widget with dynamic grid', 'understrap'),
				'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
				'after_widget'  => '</div><!-- .footer-widget -->',
				'before_title'  => '<span class="menu-foot-icon3"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size:34px;"></i></span><h2 class="widget-title foot-title">',
				'after_title'   => '</h2>',
			)
		);
	}
} // End of function_exists( 'understrap_widgets_init' ).


//Create a WordPress Custom Widget ~~~~~~~

// Register and load the widget
function wpb_load_widget()
{
	register_widget('wpb_widget');
}

add_action('widgets_init', 'wpb_load_widget');

// Creating the widget 
class wpb_widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct(

			// Base ID of your widget
			'wpb_widget',
			// Widget name will appear in UI
			__('Posts by tab', 'wpb_widget_domain'),
			// Widget description
			array('description' => __('Sample widget based on show the posts by tab', 'wpb_widget_domain'),)
		);
	}


	// Creating widget front-end
	public function widget($args, $instance)
	{
		$title = apply_filters('widget_title', $instance['title']);
		// before and after widget arguments are defined by themes
		//echo $args['before_widget'];
		//if ( ! empty( $title ) )
		//echo $args['before_title'] . $title . $args['after_title'];

?>
		<aside class="widget ">
			<h3 class="widget-title"><?php echo $title; ?></h3>
			<ul class="nav nav__post nav__bordered mb-3">
				<?php
				if ($instance['trending'] == 1) { ?>
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#trending">Trending</a>
					</li>
				<?php }

				if ($instance['comments'] == 1) { ?>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#comments">Comments</a>
					</li>
				<?php }

				if ($instance['latest'] == 1) { ?>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#latest">Latest</a>
					</li>
				<?php }; ?>
			</ul>

			<div class="tab-content">
				<?php
				if ($instance['trending'] == 1) { ?>
					<div class="tab-pane active" id="trending">

						<?php
						$post_no = $instance['post_count'];
						setPostViews(get_the_ID());
						query_posts("meta_key=post_views_count&posts_per_page=$post_no&orderby=meta_value_num&order=ASC");

						if (have_posts()) : while (have_posts()) : the_post(); ?>
								<div class="card card-inline card-post mb-4">
									<div class="card-img-left">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
										</a>
									</div>
									<div class="card-body">
										<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
										<div class="post__date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('F jS, Y'); ?></div>
									</div>
								</div>
						<?php endwhile;
						endif;
						wp_reset_query(); ?>
					</div>
				<?php }

				if ($instance['comments'] == 1) { ?>
					<div class="tab-pane fade <?php echo ($instance['trending'] == 0) ? 'active show' : ''; ?>" id="comments">
						<?php
						$post_no = $instance['post_count'];
						$popular = new WP_Query("orderby=comment_count&posts_per_page=$post_no");
						while ($popular->have_posts()) : $popular->the_post(); ?>
							<div class="card card-inline card-post mb-4">
								<div class="card-img-left">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
									</a>
								</div>
								<div class="card-body">
									<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
									<div class="post__date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('F jS, Y'); ?></div>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();  ?>
					</div>
				<?php }
				if ($instance['latest'] == 1) { ?>
					<div class="tab-pane fade <?php echo ($instance['trending'] == 0 && $instance['comments'] == 0) ? 'active show' : ''; ?> " id="latest">
						<?php
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => $instance['post_count'],
							'orderby' => 'meta_value',
							'order' => 'DSC',
						);

						$loop = new WP_Query($args);
						while ($loop->have_posts()) : $loop->the_post(); ?>
							<div class="card card-inline card-post mb-4">
								<div class="card-img-left">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
									</a>
								</div>

								<div class="card-body">
									<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
									<div class="post__date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('F jS, Y'); ?></div>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();
						?>
					</div>
				<?php }; ?>
			</div>
		</aside>
		<?php // This is where you run the code and display the output
		//echo $args['after_widget']; 
		?>
	<?php }



	// Widget Backend 
	public function form($instance)	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('New title', 'wpb_widget_domain');
		}

		if (isset($instance['post_count']) && $instance['post_count'] != '') {
			$post_count = $instance['post_count'];
		} else {
			$post_count = 3;
		}
		isset($instance['trending'])	? ($trending = $instance['trending'])	: $trending = 0;
		isset($instance['comments'])	? ($comments = $instance['comments']) : $comments = 0;
		isset($instance['latest'])	? ($latest = $instance['latest'])		: $latest = 0;
	?>
		<!--  Widget admin form -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Posts Count:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" type="number" value="<?php echo $post_count; ?>" />
		</p>

		<p>
			<label for="">Show tab label</label><br>
			<input class="widefat" <?php echo ($trending == 1) ? 'checked' : ''; ?> id="<?php echo $this->get_field_id('trending'); ?>" name="<?php echo $this->get_field_name('trending'); ?>" type="checkbox" value="1" /><label for="">Trending</label>

			<input class="widefat" <?php echo ($comments == 1) ? 'checked' : ''; ?> id="<?php echo $this->get_field_id('comments'); ?>" name="<?php echo $this->get_field_name('comments'); ?>" type="checkbox" value="1" /><label for="">Comments</label>

			<input class="widefat" <?php echo ($latest == 1) ? 'checked' : ''; ?> id="<?php echo $this->get_field_id('latest'); ?>" name="<?php echo $this->get_field_name('latest'); ?>" type="checkbox" value="1" /><label for="">Latest</label>
		</p>
	<?php
	}

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance){
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['post_count'] = (!empty($new_instance['post_count'])) ? $new_instance['post_count'] : 3;
		$instance['trending'] = (!empty($new_instance['trending'])) ? $new_instance['trending'] : 0;
		$instance['comments'] = (!empty($new_instance['comments'])) ? $new_instance['comments'] : 0;
		$instance['latest'] = (!empty($new_instance['latest'])) ? $new_instance['latest'] : 0;
		return $instance;
	}
} // Class wpb_widget ends here



// Rightside bar bootom widget ~~~~~~~~~~~~~
add_action('widgets_init', 'wpdocs_register_widgets');



function wpdocs_register_widgets()
{
	register_widget('My_Widget');
}


class My_Widget extends WP_Widget
{

	function __construct()
	{

		// To show the title of widget in admin area 
		parent::__construct(

			'posts_by_number',  // Base ID
			'Posts by Number'   // Name

		);
	}

	public $args = array(

		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget'  => '</div></div>'
	);

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */

	public function form($instance)
	{

		if (isset($instance['title'])) {

			$title = $instance['title'];
		} else {

			$title = __('New title', 'text_domain');
		}

		if (isset($instance['post_count']) && $instance['post_count'] != '') {

			$post_count = $instance['post_count'];
		} else {

			$post_count = 3;
		}

	?>

		<p>
			<label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />

		</p>

		<p>
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Posts Count:'); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" type="number" value="<?php echo $post_count; ?>" />

		</p>

	<?php

	}


	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */

	public function update($new_instance, $old_instance)
	{

		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['post_count'] = (!empty($new_instance['post_count'])) ? $new_instance['post_count'] : 3;

		return $instance;
	}



	public function widget($args, $instance)
	{

		extract($args);

		// To show the fields of widget in admin area 
		echo $before_widget;

		if (!empty($instance['title'])) {

			echo $before_title . apply_filters('widget_title', $instance['title']) . $after_title;
		} ?>



		<div class="textwidget">

			<div class="sectionSep">

				<?php

				$i = 1;

				$post_no = $instance['post_count'];

				setPostViews(get_the_ID());

				query_posts("meta_key=post_views_count&posts_per_page=$post_no&orderby=meta_value_num&order=ASC");

				// $args = array(  

				//         'post_type' => 'post',

				//         'post_status' => 'publish',                    

				//         'orderby' => 'name', 

				//         'order' => 'ASC', 

				//         'posts_per_page' => 4

				//     );

				//     $loop = new WP_Query( $args );  


				while (have_posts()) : the_post();

					if ($i == 1) {; ?>


						<div class="post postCount post-count-large mb-4">

							<a href="<?php the_permalink(); ?>">

								<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
							</a>

							<div class="post-content my-3 ">
								<div class="post-title">

									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

									<?php $postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>

									<a target="_blank" class="post-share" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta('twitter'); ?>" title="Tweet this"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>

									<a target="_blank" class="post-share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>

									<a target="_blank" class="post-share" href="https://plus.google.com/share?url=<?php echo $postUrl; ?>" title="Share on Google+"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>

									<!-- <p href="#"><?php global $wp;
														echo home_url($wp->request); ?></p> -->

									<!-- <div class="post-share"><i class="fa fa-share-alt" aria-hidden="true"></i> 0 Shares</div> -->

								</div>

								<div class="post-count d-flex align-items-center justify-content-center">

									<div class="count-number">01</div>

								</div>

							</div>

						</div>


					<?php } else { ?>


						<div class="post postCount mb-3">
							<div class="post-content">
								<div class="post-count">
									<div class="count-number">0<?php echo $i; ?></div>
								</div>

								<div class="post-title">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

									<?php $postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>

									<a target="_blank" class="post-share" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta('twitter'); ?>" title="Tweet this"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>

									<a target="_blank" class="post-share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>

									<a target="_blank" class="post-share" href="https://plus.google.com/share?url=<?php echo $postUrl; ?>" title="Share on Google+"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>

									<!-- <p href="#"><?php global $wp;
														echo home_url($wp->request); ?></p> -->
								</div>
							</div>
						</div>

				<?php
					}
					$i++;
				endwhile;
				wp_reset_postdata();

				?>

			</div>
		</div>


<?php echo $after_widget;
	}
}
?>