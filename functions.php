<?php
/**
 * _s engine room
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @since 1.0.0
 * @package _s
 */

/**
 * Assign the _s version to a var
 */
$theme      = wp_get_theme( '_s' );
$_s_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = apply_filters( '_s_content_width', 640 ); /* pixels */
}

$_s = (object) array(
	'version'    => $_s_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-_s.php',
	'customizer' => require 'inc/customizer/class-_s-customizer.php',
);

require 'inc/_s-functions.php';
require 'inc/_s-template-hooks.php';
require 'inc/_s-template-functions.php';
require 'inc/custom-header.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require 'inc/jetpack/class-_s-jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require 'inc/woocommerce/class-_s-woocommerce.php';
}
