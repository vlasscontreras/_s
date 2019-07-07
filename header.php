<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">
		<?php
		/**
		 * Before header
		 *
		 * @hooked _s_skip_links - 10
		 */
		do_action( '_s_before_header' );
		?>

		<header id="masthead" class="site-header">

			<?php
			/**
			 * _s Header
			 *
			 * @hooked _s_site_branding   - 10
			 * @hooked _s_main_navigation - 20
			 */
			do_action( '_s_header' );
			?>

		</header><!-- #masthead -->

		<?php do_action( '_s_before_content' ); ?>

		<div id="content" class="site-content">

			<?php do_action( '_s_content_top' ); ?>
