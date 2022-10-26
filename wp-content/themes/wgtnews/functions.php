<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

// Dynamic CSS ~~~~~~~~~~~
function hook_css() {
	global $jnews;
	$from = $jnews['topbar-color-header']['from'];
	$to = $jnews['topbar-color-header']['to'];
	$angle = $jnews['topbar-color-header']['gradient-angle'];
	// echo "<pre>";
	// print_r($jnews);
	// die();
    ?>
        <style>			            
			@font-face {
			    font-family: 'Candara';
			    src: url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara.eot' ?>");
			    src: url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara.eot' ?>") format('embedded-opentype'),
			        url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara.woff2' ?>") format('woff2'),
			        url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara.woff' ?>") format('woff'),
			        url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara.ttf' ?>") format('truetype'),
			        url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara.svg' ?>") format('svg');
			    font-weight: normal;
			    font-style: normal;
			    font-display: swap;
			}

			@font-face {
			    font-family: 'Candara';
			    src: url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara-Bold.eot' ?>");
			    src: url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara-Bold.eot' ?>") format('embedded-opentype'),
			        url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara-Bold.woff2' ?>") format('woff2'),
			        url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara-Bold.woff' ?>") format('woff'),
			        url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara-Bold.ttf' ?>") format('truetype'),
			        url("<?php echo get_template_directory_uri() . '/fonts/candara/Candara-Bold.svg' ?>") format('svg');
			    font-weight: bold;
			    font-style: normal;
			    font-display: swap;
			}
			.nav__top__left ul li a{
				color: <?php echo $jnews['top-bar-font-style']['color']; ?>;
			}
			.topMenu {
			    background: rgba(<?php echo $from; ?>);
			    background-image: linear-gradient(<?php echo $angle; ?>deg, <?php echo $from; ?>, <?php echo $to; ?>);
			    /*background: -moz-linear-gradient(left, rgba(254,78,25,1) 0%, rgba(247,157,22,1) 100%);
			    background: -webkit-gradient(left top, right top, color-stop(0%, rgba(254,78,25,1)), color-stop(100%, rgba(247,157,22,1)));
			    background: -webkit-linear-gradient(left, rgba(254,78,25,1) 0%, rgba(247,157,22,1) 100%);
			    background: -o-linear-gradient(left, rgba(254,78,25,1) 0%, rgba(247,157,22,1) 100%);
			    background: -ms-linear-gradient(left, rgba(254,78,25,1) 0%, rgba(247,157,22,1) 100%);
			    background: linear-gradient(to right, rgba(254,78,25,1) 0%, rgba(247,157,22,1) 100%);*/
    			color: <?php echo $jnews['top-bar-font-style']['color']; ?>;
    			font-size: <?php echo $jnews['top-bar-font-style']['font-size']; ?>;
			}

			.navbar-brand img{
				width: <?php echo $jnews['logo-dimension']['width']; ?>;
				height: <?php echo $jnews['logo-dimension']['height']; ?>;
				/*margin-top: <?php echo $jnews['opt-spacing-expanded']['margin-top']; ?>;*/
				margin-right: <?php echo $jnews['opt-spacing-expanded']['margin-right']; ?>;
				/*margin-bottom: <?php echo $jnews['opt-spacing-expanded']['margin-bottom']; ?>;*/
				/*margin-left: <?php echo $jnews['opt-spacing-expanded']['margin-left']; ?>;*/
				display: block;
			}
			.mast_head .navbar-nav .nav-menu > li{
				margin-top: <?php echo $jnews['menu-space']['margin-top']; ?>; 
				margin-right: <?php echo $jnews['menu-space']['margin-right']; ?>; 
				margin-bottom: <?php echo $jnews['menu-space']['margin-bottom']; ?>; 
				margin-left: <?php echo $jnews['menu-space']['margin-left']; ?>;
			}
			h1{
				color: <?php echo $jnews['h1-title-style']['color']; ?>;
				font-size: <?php echo $jnews['h1-title-style']['font-size']; ?>;
			}
			h2{
				color: <?php echo $jnews['h2-title-style']['color']; ?>;
				font-size: <?php echo $jnews['h2-title-style']['font-size']; ?>;
			}
			h3{
				color: <?php echo $jnews['h3-title-style']['color']; ?>;
				font-size: <?php echo $jnews['h3-title-style']['font-size']; ?>;
			}
			h4{
				color: <?php echo $jnews['h4-title-style']['color']; ?>;
				font-size: <?php echo $jnews['h4-title-style']['font-size']; ?>;
			}
			h5{
				color: <?php echo $jnews['h5-title-style']['color']; ?>;
				font-size: <?php echo $jnews['h5-title-style']['font-size']; ?>;
			}
			h6{
				color: <?php echo $jnews['h6-title-style']['color']; ?>;
				font-size: <?php echo $jnews['h6-title-style']['font-size']; ?>;
			}
			a {
			    color: <?php echo $jnews['title-anchor-color']; ?>;
			}
			a:hover {
			    color: <?php echo $jnews['title-anchor-hover']; ?>;
			}
			.htItem,
			.nav.nav__post.nav__bordered li a.active,
			.authore,
			.pagination.pg-custom .page-numbers.current,
			.search_input .input-group .btn,
			.btn-secondary {
				background-color: <?php echo $jnews['opt-color-heading-bg']; ?>;
			}
			.pagination.pg-custom .page-numbers.current {
			    border-color: <?php echo $jnews['opt-color-heading-bg']; ?>;
			}
			.nav__post.nav__bordered,
			.headingTab {
			  border-bottom: 1px solid <?php echo $jnews['opt-color-heading-bg']; ?>;
			}
			.nav.nav__post.nav__bordered li a:hover,
			.nav.nav__post.nav__bordered li a.active {
			    border-color: <?php echo $jnews['opt-color-heading-bg']; ?>;
			}
			.mast_head .navbar-nav .nav-menu > li > a {
				color: <?php echo $jnews['menu-font-size']['color']; ?>;
			 	font-size: <?php echo $jnews['menu-font-size']['font-size']; ?>;
			}
			.mast_head .navbar-nav .nav-menu > li > a:hover, 
			.mast_head .navbar-nav .nav-menu > li > a:focus, 
			.mast_head .navbar-nav .nav-menu > li.active > a{
			    color: <?php echo $jnews['menu-hover-active-focus']; ?>;
			}
			html body,
			p{
				color: <?php echo $jnews['opt-color-body-content']; ?>;
			}
        </style>
    <?php
}


add_action('wp_head', 'hook_css');

/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

// Navigation Active Menu ~~~~~~~~~~~~~
// add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
//     function special_nav_class($classes, $item){
//          if( in_array('current-menu-item', $classes) ){
//                  $classes[] = 'active ';
//          }
//          return $classes;
//     }