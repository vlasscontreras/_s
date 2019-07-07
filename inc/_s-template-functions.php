<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @since 1.0.0
 * @package _s
 */

if ( ! function_exists( '_s_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @since 1.0.0
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function _s_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}
}

if ( ! function_exists( '_s_pingback_header' ) ) {
	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 *
	 * @since 1.0.0
	 */
	function _s_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}
