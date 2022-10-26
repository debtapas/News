<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
     <meta charset="<?php bloginfo( 'charset' ); ?>" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />
     <link rel="profile" href="https://gmpg.org/xfn/11" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  
    <!-- <title>JpNews</title> -->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
 <?php do_action( 'wp_body_open' ); ?>  
    <div id="topbar">    
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-6 w_forcast">
            <ul>
              <!-- <li><i class="fas fa-cloud"></i></i>35°c,Sunny</li> -->
              <li><i class="far fa-calendar-alt"></i></i><?php echo date('l, F j, Y'); ?></li>
            </ul>
          </div>
          <div class="col-md-6 col-6 log_side">
            <ul>
             <!--  <li><a href="#">Login</a></li>
              <li><a href="#" class="red">Register</a></li> -->
              <!-- <li class="divider">|</li> --> 
              <li>
                  <?php
           if ( is_active_sidebar( 'top-bar-widgets' ) ) {
         ?>
          <div class="widget-column footer-widget-1">
          <?php dynamic_sidebar( 'top-bar-widgets' ); ?>
          </div>
        <?php } ?></li>
             
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div id="logotab">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-12">
            <?php if ( has_custom_logo() ) : ?>
          <div class="site-logo"><?php the_custom_logo(); ?></div>
        <?php endif; ?>
          </div>
          <div class="col-md-8 col-12 ad-space">
             <?php
           if ( is_active_sidebar( 'header-add-widgets' ) ) {
         ?>
          <div class="widget-column footer-widget-1">
          <?php dynamic_sidebar( 'header-add-widgets' ); ?>
          </div>
        <?php } ?>
          </div>
        </div>
      </div>
    </div>


    <div id="navBar">
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-expand-lg navbar-light">
            <button
              class="navbar-toggler ml-auto"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
              <?php 
                  $defaults = array(
                     'theme_location'  => 'primary',
                     'menu'            => 'primary',
                     'container'       =>  false,
                     'add_a_class'     => 'nav-link',
                     'echo'            => true,
                     'fallback_cb'     => 'wp_page_menu',
                    'items_wrap'      => '<ul class="navbar-nav mr-auto">%3$s</ul>',
                     'depth'           => 0,
                    );
                  wp_nav_menu( $defaults);
                               
             ?>

              <form class="form-inline  frm">
              <?php 
                $twentytwentyone_unique_id = wp_unique_id( 'search-form-' );
                $twentytwentyone_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
              ?>
                <form role="search" <?php echo $twentytwentyone_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <!-- <label for="<?php echo esc_attr( $twentytwentyone_unique_id ); ?>"><?php _e( 'Search&hellip;', 'twentytwentyone' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label> -->
                <input type="search" id="<?php echo esc_attr( $twentytwentyone_unique_id ); ?>" class="search-field" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" />
                <button class="btn btn-outline my-2 my-sm-0" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                </form>
              </form>
              
            </div>
          </nav>
        </div>
      </div>
    </div>
    
<?php wp_body_open(); ?>