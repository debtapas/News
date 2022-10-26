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
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <?php if ( is_active_sidebar( 'footerone' ) ) { ?>
                            <div class="footer_left">
                                <?php dynamic_sidebar( 'footerone' ); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <?php if ( is_active_sidebar( 'footertwo' ) ) { ?>
                            <div class="footer_middle">
                                <?php dynamic_sidebar( 'footertwo' ); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <?php if ( is_active_sidebar( 'footerthree' ) ) {?>
                            <div class="footer_right">
                                <?php dynamic_sidebar( 'footerthree' ); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <div class="footer_inner_bottomm">
                        <p> <?php
                            global $jnews;
                            echo $jnews['opt-editor'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    <?php } ?>
    <!-- footer ends-->

    <!-- bottom Footer -->
    
    <!-- bottom Footer ends-->
    <!-- Back To Top -->
    <a href="#" class="backToTop" title="Back to top"><i class="fa fa-chevron-up"></i></a>
    <!-- Back To Top ends-->


</div><!-- #page we need this extra closing tag here -->



<?php wp_footer(); ?>

</body>

</html>

