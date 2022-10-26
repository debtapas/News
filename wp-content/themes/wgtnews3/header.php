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
    <header class="mast_head">
        <!-- Top menu -->
        <div class="topMenu">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="nav__top__left d-flex">
                            <?php 
                                if(has_nav_menu( 'topbar' )){
                                        wp_nav_menu(
                                        array(
                                            'theme_location'  => 'topbar'
                                        )
                                    );
                                }
                            ?>
                            <span id="date"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <?php if ( is_active_sidebar( 'headersocial' ) ) {
                            dynamic_sidebar( 'headersocial' );
                        }else{
                            echo "";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top menu end-->

        <div class="navMenu">
            <nav class="navbar">
                <div class="navbar__middle">
                    <div class="container" style="display: block;">
                        <div class="row align-items-center <?php if(!$jnews['switch-on'] == 1){ echo 'justify-content-between'; } ?>">
                            <div class="logoArea d-flex flex-wrap">
                                <!-- Your site title as branding in the menu -->
                                <?php
                                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                    $default_logo = get_stylesheet_directory_uri() . '/images/logo.png';                                    

                                    if ( !has_custom_logo() ) {?>
                                            <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php echo '<img src="'. $default_logo .'">'; ?></a>
                                            <div class="logoCap">
                                                <h5><?php bloginfo( 'name' ); ?></h5>
                                                <p><?php bloginfo( 'description' ); ?></p>
                                            </div>
                                    <?php } elseif( esc_url( $logo[0] ) ){ ?>                                        
                                        <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php echo '<img src="'. esc_url( $logo[0] ) .'">'; ?> </a>
                                        <div class="logoCap">
                                            <h5><?php bloginfo( 'name' ); ?></h5>
                                            <p><?php bloginfo( 'description' ); ?></p>
                                        </div>
                                    <?php }else{ ?>
                                        <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
                                    <?php } ?>
									<!-- end custom logo -->
                            </div>
                            <div class="searchArea">
                                <?php if ( is_active_sidebar( 'headersearch' ) ) { ?>
                                    <div class="site_search ">
                                        <span><i class="fa fa-search"></i> <span>Search</span></span>
                                        <div class="search_input">
                                            <?php dynamic_sidebar('headersearch'); ?>
                                        </div>
                                    </div>                                    
                                <?php } ?>
                            </div>
                            
                            <?php
                                if($jnews['switch-on'] == 1){
                            ?>                                    
                                <div class="logArea">
                                    <ul class="login__menu__web text-right">
                                        <li>
                                        <?php 
                                        if(is_user_logged_in()){?>
                                                <a href="<?php echo wp_logout_url(home_url('/login/')); ?>"><i class="fa fa-user" aria-hidden="true"></i> Log out</a>
                                            <?php }else{?>
                                                <a href="<?php echo home_url('/login/'); ?>"><i class="fa fa-user" aria-hidden="true"></i> Log in</a>
                                           <?php }?>
                                        </li>
                                        <li>
                                            <?php if(is_user_logged_in()){
                                                $user_data = wp_get_current_user(); ?>

                                                <a href="<?php echo home_url('/dashboard/'); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user_data->data->display_name; ?></a>
                                             <?php }else{?>
                                                <a href="<?php echo home_url('/registration/'); ?>"><i class="fa fa-user" aria-hidden="true"></i> Sign up</a>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                            <?php } else{
                                    echo " ";
                                }
                            ?>
                                    
                        </div>
                    </div> 
                </div>
                <div class="navbar__bottom">
                    <div class="container">
                        <button class="navbar_toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>

                        <div class="collapse navbar-collapse show">
                            <div class="navbar-nav">
                                <div class="scelm">
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
                                        <ul class="login__menu">
                                            <li>
                                            <?php
                                                if($jnews['switch-on'] == 1){
                                                    if(is_user_logged_in()){?>
                                                        <a href="<?php echo wp_logout_url(home_url('/login/')); ?>"><i class="fa fa-user" aria-hidden="true"></i> Log out</a>
                                                    <?php }else{?>
                                                        <a href="<?php echo home_url('/login/'); ?>"><i class="fa fa-user" aria-hidden="true"></i> Log in</a>
                                                   <?php }?>
                                        </li>
                                        <li>
                                            <?php if(is_user_logged_in()){
                                                $user_data = wp_get_current_user();                                            
                                                ?>

                                                <a href="<?php echo home_url('/dashboard/'); ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo $user_data->data->display_name; ?></a>
                                             <?php }else{?>
                                                <a href="<?php echo home_url('/registration/'); ?>"><i class="fa fa-user" aria-hidden="true"></i> Sign up</a>
                                            <?php }
                                            } else{
                                                    echo " ";
                                                }
                                            ?>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="social_nav">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="instgram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            
                        </div> 
                    </div>
                </div>       
            </nav>  
        </div>
    </header>
    <div class="header_overlay"></div>



