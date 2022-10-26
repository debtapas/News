<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
global $jnews;
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<section class="content">

    <?php if($jnews['switched-on'] == 1){
        get_template_part( 'loop-templates/banner' );
    }; ?>
    
    <div class="container">
        <div class="row">
            <!-- Do the left sidebar check and opens the primary div -->
            <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

            <main class="site-main" id="main">

                <?php
                if ( have_posts() ) {
                        echo get_template_part( 'loop-templates/content', get_post_format() );
                    
                } else {
                    echo get_template_part( 'loop-templates/content', 'none' );
                }
                ?>

            </main><!-- #main -->            

            <!-- Do the right sidebar check -->
            <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
            
		</div>
    </div>
</section>


<?php
get_footer();
