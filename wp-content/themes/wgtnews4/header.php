<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

global $jnews;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16"> -->
    <title><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></title>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
    <!-- Header -->
    <header class="header">
        <!-- Top menu -->
        <div class="header_top">
            <div class="container">
                <div class="header_top_inner">
                    <div class="header_left">
                        <div class="header_date">
                            <?php echo date('l jS F Y'); ?>
                        </div>
                    </div>
                    <div class="header_right">
                        <?php if ( is_active_sidebar( 'headersocial' ) ) {
                            dynamic_sidebar( 'headersocial' );
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top menu end-->


        <div class="header_bottom">
                <div class="container">    
                    <nav class="navbar navbar-expand-lg <?php if(!$jnews['switch-on'] == 1){ echo 'justify-content-center custom_nav'; } ?>">
                        <!-- Your site title as branding in the menu -->
                                <?php
                                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                    $default_logo = get_stylesheet_directory_uri() . '/images/logo.png';                                    

                                    if ( !has_custom_logo() ) {?>
                                            <a class="navbar-brand d-flex mr-auto" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php echo '<img src="'. $default_logo .'">'; ?></a>
                                            
                                    <?php } elseif( esc_url( $logo[0] ) ){ ?>                                        
                                        <a class="navbar-brand d-flex mr-auto" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php echo '<img src="'. esc_url( $logo[0] ) .'">'; ?> </a>
                                        
                                    <?php }else{ ?>
                                        <a class="navbar-brand d-flex mr-auto" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
                                    <?php } ?>
                                    <!-- end custom logo -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="navbar-collapse collapse nav_list" id="collapsingNavbar3">
                            <ul class="nav navbar-nav ml-auto justify-content-end">
                                <?php
                                            wp_nav_menu(
                                                array(
                                                    'theme_location'  => 'primary',
                                                    'menu_id'         => 'main-menu',
                                                    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                                                    'container'       => 'div',
                                                    'items_wrap'      => '<ul class="nav-menu">%3$s</ul>'
                                                )
                                            );

                                        ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>



        <!-- logo & navmenu  -->

        

<?php if(is_front_page()){
    ?> 

    <section class="banner">
            <div class="banner_img"><img src="<?php echo $jnews['banner-media']['url']; ?>"></div>
            <div class="banner_text">
                <div class="container">
                    <div class="banner_inner_text">
                        <?php print_r($jnews ['banner-detail']); ?>
                    </div>
                </div>
            </div>
        </section>
<?php } ?>

    </header>
    <div class="header_overlay"></div>



