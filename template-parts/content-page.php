<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * _s Page
	 *
	 * @hooked _s_page_header  - 10
	 * @hooked _s_page_content - 20
	 */
	do_action( '_s_page' );
	?>

</article><!-- #post-<?php the_ID(); ?> -->
