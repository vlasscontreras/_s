<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * _s Loop Post
	 *
	 * @hooked _s_post_header  - 10
	 * @hooked _s_post_content - 20
	 */
	do_action( '_s_loop_post' );
	?>

</article><!-- #post-<?php the_ID(); ?> -->
