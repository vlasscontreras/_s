<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @since 1.0.0
 * @package _s
 */

if ( ! function_exists( '_s_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @since 1.0.0
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function _s_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}
}

if ( ! function_exists( '_s_pingback_header' ) ) {
	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 *
	 * @since 1.0.0
	 */
	function _s_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}

if ( ! function_exists( '_s_skip_links' ) ) {
	/**
	 * Render the skip links.
	 *
	 * @since 1.0.0
	 */
	function _s_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>
		<?php
	}
}

if ( ! function_exists( '_s_site_branding' ) ) {
	/**
	 * Render the site branding.
	 *
	 * @since 1.0.0
	 */
	function _s_site_branding() {
		?>
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$_s_description = get_bloginfo( 'description', 'display' );
			if ( $_s_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $_s_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
	}
}

if ( ! function_exists( '_s_main_navigation' ) ) {
	/**
	 * Render the main navigation.
	 *
	 * @since 1.0.0
	 */
	function _s_main_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', '_s' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( '_s_page_header' ) ) {
	/**
	 * Display the page header
	 *
	 * @since 1.0.0
	 */
	function _s_page_header() {
		?>
		<header class="page-header">
			<?php
			do_action( '_s_before_page_title' );

			if ( is_search() ) :

				// Translators: %s search term.
				printf( '<h1>' . esc_attr__( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' . '</h1>' );

			elseif ( is_archive() ) :

				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );

			elseif ( is_page() ) :

				the_title( '<h1 class="page-title">', '</h1>' );

			else :

				the_title( '<h2 class="page-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );

			endif;

			do_action( '_s_after_page_title' );
			?>
		</header><!-- .page-header -->
		<?php
	}
}

if ( ! function_exists( '_s_page_content' ) ) {
	/**
	 * Display the post content
	 *
	 * @since 1.0.0
	 */
	function _s_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
						'after'  => '</div>',
					)
				);
			?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( '_s_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function _s_post_header() {
		?>
		<header class="entry-header">
			<?php
			do_action( '_s_before_post_title' );

			if ( is_single() ) :

				the_title( '<h1 class="entry-title">', '</h1>' );

			else :

				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

			endif;

			/**
			 * After post title.
			 *
			 * @hooked _s_post_meta - 10
			 */
			do_action( '_s_afer_post_title' );
			?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( '_s_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @since 1.0.0
	 */
	function _s_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
}

if ( ! function_exists( '_s_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function _s_post_content() {
		?>
		<div class="entry-content">
			<?php
			/**
			 * Before post content.
			 *
			 * @hooked _s_post_thumbnail - 10
			 */
			do_action( '_s_before_post_content' );

			if ( is_single() ) :

				the_content(
					sprintf(
						/* translators: %s: post title */
						__( 'Continue reading %s', '_s' ),
						'<span class="screen-reader-text">' . get_the_title() . '</span>'
					)
				);

			else :

				the_excerpt();

			endif;

			do_action( '_s_before_post_links' );

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
					'after'  => '</div>',
				)
			);

			do_action( '_s_after_post_links' );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( '_s_post_taxonomy' ) ) {
	/**
	 * Display the post taxonomies
	 *
	 * @since 1.0.0
	 */
	function _s_post_taxonomy() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', '_s' ) );

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ' ', '_s' ) );
		?>
		<aside class="entry-taxonomy">

			<?php do_action( '_s_before_cat_links' ); ?>

			<?php if ( $categories_list ) : ?>
				<div class="cat-links">
					<?php echo esc_html( _n( 'Category:', 'Categories:', count( get_the_category() ), '_s' ) ); ?> <?php echo wp_kses_post( $categories_list ); ?>
				</div>
			<?php endif; ?>

			<?php do_action( '_s_before_tags_links' ); ?>

			<?php if ( $tags_list ) : ?>
				<div class="tags-links">
					<?php echo wp_kses_post( $tags_list ); ?>
				</div>
			<?php endif; ?>

			<?php do_action( '_s_after_tags_links' ); ?>

		</aside>
		<?php
	}
}

if ( ! function_exists( '_s_edit_post_link' ) ) {
	/**
	 * Display the edit link
	 *
	 * @since 1.0.0
	 */
	function _s_edit_post_link() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', '_s' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<div class="edit-link">',
			'</div>'
		);
	}
}

if ( ! function_exists( '_s_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 *
	 * @since 1.0.0
	 */
	function _s_post_nav() {
		the_post_navigation(
			array(
				'next_text' => esc_html__( 'Next Post', '_s' ),
				'prev_text' => esc_html__( 'Previous Post', '_s' ),
			)
		);
	}
}

if ( ! function_exists( '_s_display_comments' ) ) {
	/**
	 * Display comments
	 *
	 * @since 1.0.0
	 */
	function _s_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || 0 !== intval( get_comments_number() ) ) {
			comments_template();
		}
	}
}

if ( ! function_exists( '_s_post_meta' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function _s_post_meta() {
		if ( ! is_single() ) {
			return;
		}

		// Posted on.
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$output_time_string = sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), $time_string );

		$posted_on = '
			<span class="posted-on">' .
			/* translators: %s: post date */
			sprintf( __( 'Posted on %s', '_s' ), $output_time_string ) .
			'</span>';

		// Author.
		$author = sprintf(
			'<span class="post-author">%1$s <span class="fn">%3$s</span></span>',
			__( 'by', '_s' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);

		// Comments.
		$comments = '';

		if ( ! post_password_required() && ( comments_open() || 0 !== intval( get_comments_number() ) ) ) {
			$comments_number = get_comments_number_text( __( 'Leave a comment', '_s' ), __( '1 Comment', '_s' ), __( '% Comments', '_s' ) );

			$comments = sprintf(
				'<span class="post-comments">&mdash; <a href="%1$s">%2$s</a></span>',
				esc_url( get_comments_link() ),
				$comments_number
			);
		}

		echo wp_kses(
			sprintf( '%1$s %2$s %3$s', $posted_on, $author, $comments ), array(
				'span' => array(
					'class' => array(),
				),
				'a'    => array(
					'href'  => array(),
					'title' => array(),
					'rel'   => array(),
				),
				'time' => array(
					'datetime' => array(),
					'class'    => array(),
				),
			)
		);
	}
}

if ( ! function_exists( '_s_site_info' ) ) {
	/**
	 * Render the site info.
	 *
	 * @since 1.0.0
	 */
	function _s_site_info() {
		?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', '_s' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', '_s' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', '_s' ), '_s', '<a href="https://automattic.com/">Automattic</a>' );
				?>
		</div><!-- .site-info -->
		<?php
	}
}
