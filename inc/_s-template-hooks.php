<?php
/**
 * _s Hooks
 *
 * @since 1.0.0
 * @package _s
 */

/**
 * Body Class
 *
 * @see _s_body_classes()
 */
add_filter( 'body_class', '_s_body_classes' );

/**
 * WordPress Head
 *
 * @since _s_pingback_header()
 */
add_action( 'wp_head', '_s_pingback_header' );

/**
 * _s Header
 *
 * @see _s_skip_links()
 * @see _s_site_branding()
 * @see _s_main_navigation()
 */
add_action( '_s_before_header', '_s_skip_links', 10 );
add_action( '_s_header', '_s_site_branding', 10 );
add_action( '_s_header', '_s_main_navigation', 20 );

/**
 * _s Footer
 *
 * @see _s_site_info()
 */
add_action( '_s_footer', '_s_site_info', 10 );
