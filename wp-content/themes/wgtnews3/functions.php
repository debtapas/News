<?php

/**

 * UnderStrap functions and definitions

 *

 * @package Understrap

 */



// Exit if accessed directly.

defined('ABSPATH') || exit;



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

if (class_exists('WooCommerce')) {

	$understrap_includes[] = '/woocommerce.php';
}



// Load Jetpack compatibility file if Jetpack is activiated.

if (class_exists('Jetpack')) {

	$understrap_includes[] = '/jetpack.php';
}



// Include files.

foreach ($understrap_includes as $file) {

	require_once get_theme_file_path($understrap_inc_dir . $file);
}



// Dynamic CSS ~~~~~~~~~~~

function hook_css()
{

	global $jnews;

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



		.navbar-brand img {

			width: <?php echo $jnews['logo-dimension']['width']; ?>;

			/*margin-top: <?php echo $jnews['opt-spacing-expanded']['margin-top']; ?>;*/

			margin-right: <?php echo $jnews['opt-spacing-expanded']['margin-right']; ?>;

			/*margin-bottom: <?php echo $jnews['opt-spacing-expanded']['margin-bottom']; ?>;*/

			/*margin-left: <?php echo $jnews['opt-spacing-expanded']['margin-left']; ?>;*/

			display: block;

		}
	</style>



<?php

}



add_action('wp_head', 'hook_css');



/*

 * Set post views count using post meta

 */

function setPostViews($postID)
{

	$countKey = 'post_views_count';

	$count = get_post_meta($postID, $countKey, true);

	if ($count == '') {

		$count = 0;

		delete_post_meta($postID, $countKey);

		add_post_meta($postID, $countKey, '0');
	} else {

		$count++;

		update_post_meta($postID, $countKey, $count);

		//echo "Count Message: " . $count;
	}
}



/*Create a checkbox for Featured News posts*/
function sm_custom_meta()
{
	add_meta_box('sm_meta', __('Featured Posts Option', 'sm-textdomain'), 'sm_meta_callback', 'post');
}
function sm_meta_callback($post)
{
	$featured = get_post_meta($post->ID);
?>

	<p>
	<div class="sm-row-content">
		<label for="meta-checkbox">
			<input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if (isset($featured['meta-checkbox'])) checked($featured['meta-checkbox'][0], 'yes'); ?> />
			<?php _e('Featured this post', 'sm-textdomain') ?>
		</label>

	</div>
	</p>

<?php
}
add_action('add_meta_boxes', 'sm_custom_meta');


/**
 * Saves the custom meta input for Featured Posts
 */

function sm_meta_save($post_id)
{

	// Checks save status
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['sm_nonce']) && wp_verify_nonce($_POST['sm_nonce'], basename(__FILE__))) ? 'true' : 'false';

	// Exits script depending on save status
	if ($is_autosave || $is_revision || !$is_valid_nonce) {
		return;
	}

	// Checks for input and saves
	if (isset($_POST['meta-checkbox'])) {
		update_post_meta($post_id, 'meta-checkbox', 'yes');
	} else {
		update_post_meta($post_id, 'meta-checkbox', '');
	}
}
add_action('save_post', 'sm_meta_save');
