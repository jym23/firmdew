<?php

if( !class_exists('Theme_Setup') ){

	/**
	* put here all the necessary function for theme setup
	*/
	class Theme_Setup
	{
		public static function firmdew_theme_setup(){

			$ts = new static;

			// This theme supports a variety of post formats.
			#add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menu( 'primary', __( 'Primary Menu', 'firmdew' ) );

			// This theme uses a custom image size for featured images, displayed on "standard" posts.
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

			//site url's
			update_option('siteurl','http://localhost/firmdew');
			update_option('home','http://localhost/firmdew');

		}
		public static function firmdew_register_scripts(){

			$ts = new static;
			
			wp_register_script('firmdew-menu', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), time(), true);
			wp_register_script('firmdew-js', get_template_directory_uri() . '/assets/js/firmdew.js', array('jquery'), time(), true);

			if( is_home() ) :
				wp_register_script('firmdew-home-slider', get_template_directory_uri() . '/assets/js/jquery.cycle.all.js', array('jquery'), time(), true);
			endif;

			if( !is_admin()) :
				wp_register_style('firmdew-fonts', $ts->get_font_url(), '', time(), 'all');
			endif;
			wp_register_style('firmdew-style', get_stylesheet_uri(), '', time(), 'all');
			wp_register_style('firmdew-fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.css', time(), 'all');

			wp_enqueue_script( 'firmdew-menu' );
			wp_enqueue_script( 'firmdew-home-slider' );
			wp_enqueue_script( 'firmdew-js' );
			
			wp_enqueue_style( 'firmdew-style');
			wp_enqueue_style( 'firmdew-fonts' );
			wp_enqueue_style( 'firmdew-fontawesome' );

		}
		
		public static function get_font_url() {
			$font_url = '';

			/* translators: If there are characters in your language that are not supported
			 * by Open Sans, translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
				$subsets = 'latin,latin-ext';

				/* translators: To add an additional Open Sans character subset specific to your language,
				 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
				 */
				$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

				if ( 'cyrillic' == $subset )
					$subsets .= ',cyrillic,cyrillic-ext';
				elseif ( 'greek' == $subset )
					$subsets .= ',greek,greek-ext';
				elseif ( 'vietnamese' == $subset )
					$subsets .= ',vietnamese';

				$protocol = is_ssl() ? 'https' : 'http';
				$query_args = array(
					'family' => 'Open+Sans:400italic,700italic,400,700',
					'subset' => $subsets,
				);
				$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
			}

			return $font_url;

		}
	}
}

add_action( 'after_setup_theme', array('Theme_Setup','firmdew_theme_setup') );
add_action( 'wp_enqueue_scripts', array('Theme_Setup','firmdew_register_scripts') );