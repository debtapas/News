<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article class="singlepage_post" <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="singlep_img"><?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?></div>

	<div class="entry-content">

		<?php
		the_content();
		understrap_link_pages();
		?>

		<div class="entry-footer">
			<?php understrap_entry_footer(); ?>
		</div>

	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer> --><!-- .entry-footer -->

</article><!-- #post-## -->
