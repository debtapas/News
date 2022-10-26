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
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- top bar strat -->
	<div id="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-12 w_forcast">
            <ul>
              <!-- <li><i class="fas fa-cloud"></i></i>35°c,Sunny</li> -->
              <li><i class="far fa-calendar-alt"></i></i><?php echo date('l, F j, Y'); ?></li>
            </ul>
          </div>
          <div class="col-md-6 col-12 log_side">
            <ul>
             <!--  <li><a href="#">Login</a></li>
              <li><a href="#" class="red">Register</a></li> -->
          </ul>
          <ul>
             	<?php 
					$social_icons = get_posts(array(
						'post_type' => 'social-media',
						'number_posts' => 4
					));
					foreach($social_icons as $social_icon) { ?>
							<li><a href="<?php echo $social_icon->social_link; ?>"><i class="<?php echo $social_icon->social_class; ?>"></i></a></li>
				<?php } ?>
   
            </ul>
          </div>
        </div>
      </div>
    </div>
	
	<!-- top bar end/ -->
	<!-- logo section strat -->
		
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
		       if ( is_active_sidebar( 'top-bar-widgets' ) ) {
			   ?>
					<div class="widget-column footer-widget-1">
					<?php dynamic_sidebar( 'top-bar-widgets' ); ?>
					</div>
			  <?php } ?>
          </div>
        </div>
      </div>
    </div>
	
	<!-- logo section end -->


	<!-- Navbar start here -->

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
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_class'      => 'menu-wrapper',
				'container_class' => 'primary-menu-container',
				'items_wrap'      => '<ul id="navbar-nav mr-auto" class="%2$s">%3$s</ul>',
				'fallback_cb'     => false,
			)
		);
	 ?>

            	
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active devider">
                  <a class="nav-link" href="#"
                    >HOME <span class="sr-only">(current)</span></a
                  >
                </li>

                <li class="nav-item devider">
                  <a class="nav-link" href="#">NEWS</a>
                </li>

                <li class="nav-item devider">
                  <a class="nav-link" href="#">TECH</a>
                </li>

                <li class="nav-item devider">
                  <a class="nav-link" href="#">ENTERTAINMENT</a>
                </li>
                <li class="nav-item devider">
                  <a class="nav-link" href="#">LIFESTYLE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">REVIEW</a>
                </li>
              </ul>
              <form class="form-inline  frm">
                <input
                  class="form-control mr-sm-2"
                  type="search"
                  placeholder="Search"
                  aria-label="Search"
                />
                <button class="btn btn-outline my-2 my-sm-0" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </form>
            </div>
          </nav>
        </div>
      </div>
    </div>


<!-- hgjjkhg -->
<div class="navbar-left-side">
<div class="navbar-header">
	<?php 
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_class'      => 'menu-wrapper',
				'container_class' => 'primary-menu-container',
				'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
				'fallback_cb'     => false,
			)
		);
	 ?>
</div>
</div>

<div class="navbar-right-side">
<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$twentytwentyone_unique_id = wp_unique_id( 'search-form-' );

$twentytwentyone_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form role="search" <?php echo $twentytwentyone_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $twentytwentyone_unique_id ); ?>"><?php _e( 'Search&hellip;', 'twentytwentyone' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label>
	<input type="search" id="<?php echo esc_attr( $twentytwentyone_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'twentytwentyone' ); ?>" />
</form>

</div>


	<!-- Navbar end here -->
	




<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

		<header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

			<div class="site-branding-container">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
			</div><!-- .site-branding-container -->

			<?php if ( is_singular() && twentynineteen_can_show_post_thumbnail() ) : ?>
				<div class="site-featured-image">
					<?php
						twentynineteen_post_thumbnail();
						the_post();
						$discussion = ! is_page() && twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null;

						$classes = 'entry-header';
					if ( ! empty( $discussion ) && absint( $discussion->responses ) > 0 ) {
						$classes = 'entry-header has-discussion';
					}
					?>
					<div class="<?php echo $classes; ?>">
						<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
					</div><!-- .entry-header -->
					<?php rewind_posts(); ?>
				</div>
			<?php endif; ?>
		</header><!-- #masthead -->

	<div id="content" class="site-content">
