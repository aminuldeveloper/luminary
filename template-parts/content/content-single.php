<?php
/**
 * Template part for displaying single posts
 *
 * @package Luminary
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>

	<header class="entry-header">

		<div class="entry-header__meta">
			<?php luminary_category_list(); ?>
			<?php luminary_reading_time(); ?>
		</div>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-header__author-date">
			<?php luminary_posted_on(); ?>
			<?php luminary_posted_by(); ?>
		</div>

	</header><!-- .entry-header -->

	<?php luminary_post_thumbnail( 'luminary-featured' ); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'luminary' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				esc_html( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'luminary' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php luminary_tag_list(); ?>
		<?php edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'luminary' ),
					array( 'span' => array( 'class' => array() ) )
				),
				esc_html( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
