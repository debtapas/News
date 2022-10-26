<?php
/**
 * Theme basic setup
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'understrap_setup' );

if ( ! function_exists( 'understrap_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function understrap_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on understrap, use a find and replace
		 * to change 'understrap' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'understrap' ),
				'topbar' => __( 'Topbar Menu', 'understrap' ),
				'footerbottom' => __( 'Footer Bottom', 'understrap' ),
				'footermenu' => __( 'Footer Menu', 'understrap' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'understrap_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Set up the WordPress Theme logo feature.
		add_theme_support( 'custom-logo' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Check and setup theme default settings.
		understrap_setup_theme_default_settings();

	}
}


//After log out, page redirect to login page

// function redirect_to_custom_login_page(){
// 	if(!is_admin()){
// 		wp_redirect(site_url() . "/login");
// 		exit();
// 	}
	
// }
// add_action("wp_logout", "redirect_to_custom_login_page");


// function fn_redirect_wp_admin(){
// 	global $pagenow;

// 	if($pagenow == "wp_login.php" && $_GET['action'] != "logout"){
// 		wp_redirect(site_url() . "/wp-login");
// 		exit();
// 	}
// }



/*News Custom Post type start*/

    function news_custom_post_type() {

    //$supports: Specifies the post type is compatible and supports all essential features. ~~~~
            $supports = array(
                'title', // post title
                'editor', // post content
                'author', // post author
                'thumbnail', // featured images
                'excerpt', // post excerpt
                'custom-fields', // custom fields
                'comments', // post comments
                'revisions', // post revisions
                'post-formats', // post formats
                );

    //$labels: Specifies that the post type is referred properly to the admin area. ~~~~~~~~~~~
            $labels = array(
                'name' => _x('News', 'plural'),
                'singular_name' => _x('News', 'singular'),
                'menu_name' => _x('News', 'admin menu'),
                'name_admin_bar' => _x('News', 'admin bar'),
                'add_new' => _x('Add New', 'add new'),
                'add_new_item' => __('Add New News'),
                'new_item' => __('New News'),
                'edit_item' => __('Edit News'),
                'view_item' => __('View News'),
                'all_items' => __('All News'),
                'search_items' => __('Search News'),
                'not_found' => __('No News found.'),
                );

    //$args: Specifies a permalink slug of the News and a menu position located just beneath the Posts menu. ~~~
            $args = array(
                'supports' => $supports,
                'labels' => $labels,
                'public' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'news'),
                'has_archive' => true,
                'hierarchical' => false,
                );
        register_post_type('news', $args);
    }

    add_action('init', 'news_custom_post_type');

/*News Custom Post type end*/


function jnews_category_taxonomy() {
    // Add new taxonomy (Brand), make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'News Categories', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'News Category', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search News Categories', 'textdomain' ),
        'all_items'         => __( 'All News Categories', 'textdomain' ),
        'parent_item'       => __( 'Parent News Category', 'textdomain' ),
        'parent_item_colon' => __( 'Parent News Category:', 'textdomain' ),
        'edit_item'         => __( 'Edit News Category', 'textdomain' ),
        'update_item'       => __( 'Update News Category', 'textdomain' ),
        'add_new_item'      => __( 'Add New News Category', 'textdomain' ),
        'new_item_name'     => __( 'New News Category Name', 'textdomain' ),
        'menu_name'         => __( 'News Category', 'textdomain' ),
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'news_category' ),
    );
 
    register_taxonomy( 'newscategory', array( 'news' ), $args );
 
    unset( $args );
    unset( $labels );

}
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'jnews_category_taxonomy', 0 );