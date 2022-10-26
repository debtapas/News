<?php

/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.

defined('ABSPATH') || exit;
get_header();
$container = get_theme_mod('understrap_container_type');

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Do the left sidebar check and opens the primary div -->
            <?php get_template_part('global-templates/left-sidebar-check'); ?>
            <main class="site-main" id="main">
                <?php
                if (have_posts()) {
                    echo get_template_part('loop-templates/content', get_post_format());
                } else {
                    echo get_template_part('loop-templates/content', 'none');
                }
                ?>
            </main><!-- #main -->

        </div>
    </div>
</section>
<?php

get_footer();
