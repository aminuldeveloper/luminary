<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Luminary
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content-wrap' ); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php luminary_post_thumbnail( 'luminary-featured' ); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'luminary' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		edit_post_link(
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
		);
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
