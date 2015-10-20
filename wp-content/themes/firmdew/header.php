<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

        <?php wp_head(); ?>
    </head>
	<body>
        <div id="parent-wrapper" class="full-width" role="parent">
            <div class="container min-width">
                <header>
                    <div id="logo">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
                        </a>
                    </div>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menus', 'menu_id' => 'top-menu', 'container'=>'nav', 'container_id' => 'top-menu-container', 'container_class' => 'menu-container' ) ); ?>
                    <div class="clr"></div>
                </header>
            </div>