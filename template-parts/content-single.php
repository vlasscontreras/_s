<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * _s Single Post
	 *
	 * @hooked _s_post_header    - 10
	 * @hooked _s_post_content   - 20
	 * @hooked _s_post_taxonomy  - 30
	 * @hooked _s_edit_post_link - 40
	 * @hooked _s_post_nav       - 50
	 */
	do_action( '_s_single_post' );
	?>

</article><!-- #post-<?php the_ID(); ?> -->
