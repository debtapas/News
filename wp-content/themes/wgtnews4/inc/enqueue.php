<?php
/**
 * Understrap enqueue scripts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );
		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );

		// Enqueue CSS ~~~~~~~~~~~~~~
		wp_enqueue_style( 'style', get_stylesheet_uri() );		
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		// Bootstrap core CSS
		wp_enqueue_style( 'bootstrap-min-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), $css_version );
		wp_enqueue_style( 'font-awesome-min-css', get_template_directory_uri() . '/css/font-awesome.min.css', array(), $css_version );
	    wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/custom.css', array(), $css_version );
		wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css/slick.css', array(), $css_version );
		

		// Owl link
		//wp_enqueue_style( 'owl-theme-min-css', get_template_directory_uri() . '/css/owl.theme.min.css', array(), $css_version );
		//wp_enqueue_style( 'owl-carousel-min-css', get_template_directory_uri() . '/css/owl-carousel.min.css', array(), $css_version );

		wp_enqueue_style( 'owl.carousel-min-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), $css_version );
		wp_enqueue_style( 'owl.theme-default-min', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), $css_version );

		// Custom styles
		wp_enqueue_style( 'reponsive-css', get_template_directory_uri() . '/css/reponsive.css', array(), $css_version );

		// Enqueue JavaScripts ~~~~~~~~~~~~~~
		 wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-min-js', get_template_directory_uri() . '/js/jquery.min.js', array() );

		 $js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		// wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );

		// bootstrap library
		wp_enqueue_script( 'popper-min-js', get_template_directory_uri() . '/js/popper.min.js', array(), $js_version, true );
		wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), $js_version, true );
		wp_enqueue_script( 'slick-min-js', get_template_directory_uri() . '/js/slick.min.js', array(), $js_version, true );
		wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array(), $js_version, true );
		
		
        

       

		// Custom Js
		wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), /*$js_version,*/ true );

		//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			//wp_enqueue_script( 'comment-reply' );
		//}
	}
} // End of if function_exists( 'understrap_scripts' ).
add_action( 'wp_enqueue_scripts', 'understrap_scripts' );

//Include Redux file for Theme option ~~~~~~~~~~~~~~~~~~~
include( get_template_directory() . '/opt/redux-core/framework.php' );
include( get_template_directory() . '/opt/sample/jnews-config.php' ); // Live theme option page
// include( get_template_directory() . '/opt/sample/sample-config.php' ); // Sample theme option page

//Dependency/Required plugin for Theme installation ~~~~~~~~~~~~~~~~~
require( get_template_directory() . '/inc/plugin-activation-jnews/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/inc/plugin-activation-jnews/install-plugin.php' );