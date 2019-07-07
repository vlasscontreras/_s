<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

			<?php do_action( '_s_content_bottom' ); ?>

		</div><!-- #content -->

		<?php do_action( '_s_before_footer' ); ?>

		<footer id="colophon" class="site-footer">
			<?php
			/**
			 * _s Footer
			 *
			 * @hooked _s_site_info - 10
			 */
			do_action( '_s_footer' );
			?>
		</footer><!-- #colophon -->

		<?php do_action( '_s_after_footer' ); ?>

	</div><!-- #page -->

	<?php wp_footer(); ?>

</body>
</html>
