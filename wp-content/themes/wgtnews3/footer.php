<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>


<!-- footer -->
 <?php if ( is_active_sidebar( 'footerone' ) || is_active_sidebar( 'footertwo' ) || is_active_sidebar( 'footerthree' ) || is_active_sidebar( 'footerfour' ) || is_active_sidebar( 'footerfull' ) ) {?>
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>
                        </div>
                                <?php if ( is_active_sidebar( 'footerone' ) ) {?>
                                    <div class="col-md-4">
                                            <?php dynamic_sidebar( 'footerone' ); ?>
                                    </div>
                                <?php } ?>

                                <?php if ( is_active_sidebar( 'footertwo' ) ) {?>
                                    <div class="col-md-4 ftr_midle_bar">   
                                            <?php dynamic_sidebar( 'footertwo' ); ?>
                                    </div>
                                <?php } ?>

                                <?php if ( is_active_sidebar( 'footerthree' ) ) {?>
                                    <div class="col-md-4">
                                            <?php dynamic_sidebar( 'footerthree' ); ?>
                                    </div>
                                <?php } ?>
                    </div>
                </div>
            </footer>
    <?php } ?>
    <!-- footer ends-->

    <!-- Sub Footer -->
    <div class="sub_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="copytight__info">
                    	<p>
                            <?php
                                global $jnews;
                                 echo $jnews['opt-editor'];
                             ?>
                     </p>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
    <!-- Sub Footer ends-->
    <!-- Back To Top -->
    <a href="#" class="backToTop" title="Back to top"><i class="fa fa-chevron-up"></i></a>
    <!-- Back To Top ends-->


</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

