<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

				do_action( '_s_page_before' );

				get_template_part( 'template-parts/content', 'page' );

				do_action( '_s_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

		<?php do_action( '_s_after_main' ); ?>

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
