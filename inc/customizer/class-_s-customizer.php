<?php
/**
 * _s Theme Customizer
 *
 * @since 1.0.0
 * @package _s
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '_s_Customizer' ) ) {
	/**
	 * The _s Customizer Class
	 */
	class _s_Customizer {
		/**
		 * Setup class.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'register' ) );
			add_action( 'customize_preview_init', array( $this, 'preview_js' ) );
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @since 1.0.0
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function register( $wp_customize ) {
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial( 'blogname', array(
					'selector'        => '.site-title a',
					'render_callback' => array( $this, 'partial_blogname' ),
				) );

				$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
					'selector'        => '.site-description',
					'render_callback' => array( $this, 'partial_blogdescription' ),
				) );
			}
		}

		/**
		 * Render the site title for the selective refresh partial.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function partial_blogname() {
			bloginfo( 'name' );
		}

		/**
		 * Render the site tagline for the selective refresh partial.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function partial_blogdescription() {
			bloginfo( 'description' );
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 *
		 * @since 1.0.0
		 */
		public function preview_js() {
			wp_enqueue_script( '_s-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
		}
	}
}

return new _s_Customizer();
