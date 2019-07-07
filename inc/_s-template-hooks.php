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
