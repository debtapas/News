<?php

/**

 * Understrap enqueue scripts

 *

 * @package Understrap

 */



// Exit if accessed directly.

defined('ABSPATH') || exit;



if (!function_exists('understrap_scripts')) {

	/**

	 * Load theme's JavaScript and CSS sources.

	 */

	function understrap_scripts()
	{

		// Get the theme data.

		$the_theme     = wp_get_theme();

		$theme_version = $the_theme->get('Version');

		//$css_version = $theme_version . '.' . filemtime(get_template_directory() . '/css/theme.min.css');



		// Enqueue CSS ~~~~~~~~~~~~~~

		//add fonts.googleapis 
		wp_enqueue_style('fonts-googleapis', 'https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap');
		wp_enqueue_style('font-google', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');

		//Bootstrap min CSS
		wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array());

		//add font-awesome-min-css
		wp_enqueue_style('font-awesome-min', get_template_directory_uri() . '/css/font-awesome.min.css', array());

		//add style css
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_style('understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array());

		//Custom styles
		wp_enqueue_style('reponsive-css', get_template_directory_uri() . '/css/responsive.css', array());



		// Owl link
		// wp_enqueue_style( 'owl-theme-min-css', get_template_directory_uri() . '/css/owl.theme.min.css', array(), $css_version );

		// wp_enqueue_style( 'owl-carousel-min-css', get_template_directory_uri() . '/css/owl-carousel.min.css', array(), $css_version );



		// Enqueue JavaScripts ~~~~~~~~~~~~~~

		// bootstrap js library

		wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), true);
		wp_enqueue_script('jquery-3-3-1', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), true);
		wp_enqueue_script('popper-min', get_template_directory_uri() . '/js/popper.min.js', array(), true);

		wp_enqueue_script('moment-min-js', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js', array(), /*$js_version,*/ true);
		//wp_enqueue_script('jquery-min', get_template_directory_uri() . '/js/jquery.min12.js', array());

		// Custom Js
		wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), /*$js_version,*/ true);



		// wp_enqueue_script('jquery');

		//$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );

		// wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );

		// Owl carousel

		//wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array(), $js_version, true );


		if (is_singular() && comments_open() && get_option('thread_comments')) {

			wp_enqueue_script('comment-reply');
		}
	}
} // End of if function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');



//Include Redux file for Theme option ~~~~~~~~~~~~~~~~~~~

include(get_template_directory() . '/opt/redux-core/framework.php');

include(get_template_directory() . '/opt/sample/jnews-config.php'); // Live theme option page

// include( get_template_directory() . '/opt/sample/sample-config.php' ); // Sample theme option page


//Dependency/Required plugin for Theme installation ~~~~~~~~~~~~~~~~~

require(get_template_directory() . '/inc/plugin-activation-jnews/class-tgm-plugin-activation.php');

require_once(get_template_directory() . '/inc/plugin-activation-jnews/install-plugin.php');
