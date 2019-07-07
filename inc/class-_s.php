<?php
/**
 * _s class
 *
 * @since 1.0.0
 * @package _s
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '_s' ) ) {
	/**
	 * The main _s class
	 */
	class _s {
		/**
		 * Setup class
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 *
		 * @since 1.0.0
		 */
		public function setup() {
			/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on _s, use a find and replace
			* to change '_s' to the name of your theme in all the template files.
			*/
			load_theme_textdomain( '_s', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
			add_theme_support( 'title-tag' );

			/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
			add_theme_support( 'post-thumbnails' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus( array(
				'menu-1' => esc_html__( 'Primary', '_s' ),
			) );

			/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support( 'custom-logo', array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			) );
		}

		/**
		 * Register widget area.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		public function widgets_init() {
			register_sidebar( array(
				'name'          => esc_html__( 'Sidebar', '_s' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', '_s' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @since 1.0.0
		 */
		public function scripts() {
			global $_s_version;

			/**
			 * Styles
			 */
			wp_enqueue_style( '_s-style', get_parent_theme_file_uri( 'style.css' ), array(), $_s_version );

			/**
			 * Scripts
			 */
			wp_enqueue_script( '_s-navigation', get_parent_theme_file_uri( 'assets/js/navigation.js' ), array(), '20151215', true );
			wp_enqueue_script( '_s-skip-link-focus-fix', get_parent_theme_file_uri( 'assets/js/skip-link-focus-fix.js' ), array(), '20151215', true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
	}
}

return new _s();
