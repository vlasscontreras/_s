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
 * Loop
 *
 * @see _s_page_header()
 * @see _s_post_header()
 * @see _s_post_content()
 * @see _s_post_nav()
 */
add_action( '_s_before_loop', '_s_page_header', 10 );
add_action( '_s_loop_post', '_s_post_header', 10 );
add_action( '_s_loop_post', '_s_post_content', 20 );
add_action( '_s_after_loop', '_s_post_nav', 10 );

/**
 * Pages
 *
 * @see _s_page_header()
 * @see _s_page_content()
 */
add_action( '_s_page', '_s_page_header', 10 );
add_action( '_s_page', '_s_page_content', 20 );

/**
 * Posts
 *
 * @see _s_post_header()
 * @see _s_post_meta()
 * @see _s_post_content()
 * @see _s_post_taxonomy()
 * @see _s_edit_post_link()
 * @see _s_post_nav()
 * @see _s_display_comments()
 * @see _s_post_thumbnail()
 */
add_action( '_s_single_post', '_s_post_header', 10 );
add_action( '_s_single_post', '_s_post_content', 20 );
add_action( '_s_single_post', '_s_post_taxonomy', 30 );
add_action( '_s_single_post', '_s_edit_post_link', 40 );
add_action( '_s_single_post', '_s_post_nav', 50 );
add_action( '_s_after_single_post', '_s_display_comments', 10 );

add_action( '_s_afer_post_title', '_s_post_meta', 10 );
add_action( '_s_before_post_content', '_s_post_thumbnail', 10 );

/**
 * _s Footer
 *
 * @see _s_site_info()
 */
add_action( '_s_footer', '_s_site_info', 10 );
