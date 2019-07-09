<?php
/**
 * The loop template file.
 *
 * Included on pages like index.php, archive.php and search.php to display a loop of posts
 *
 * @link https://codex.wordpress.org/The_Loop
 *
 * @package _s
 */

/**
 * Before Loop
 *
 * @hooked _s_page_header - 10
 */
do_action( '_s_before_loop' );

while ( have_posts() ) :
	the_post();

	/**
	 * Include the Post-Type-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
	 */
	get_template_part( 'template-parts/content', get_post_type() );

endwhile;

/**
 * After loop.
 *
 * @hooked _s_post_nav - 10
 */
do_action( '_s_after_loop' );
