<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();
?>

	<div id="primary" class="content-area">

		<?php do_action( '_s_before_main' ); ?>

		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				do_action( '_s_before_single_post' );

				get_template_part( 'template-parts/content', 'single' );

				/**
				 * After single post.
				 *
				 * @hooked _s_display_comments - 10
				 */
				do_action( '_s_after_single_post' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

		<?php do_action( '_s_after_main' ); ?>

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
