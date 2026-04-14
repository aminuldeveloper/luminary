<?php
/**
 * Template part for displaying posts in the blog loop
 *
 * @package Luminary
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>

	<?php luminary_post_thumbnail( 'luminary-card' ); ?>

	<div class="post-card__body">

		<div class="post-card__meta">
			<?php luminary_category_list(); ?>
			<?php luminary_reading_time(); ?>
		</div>

		<header class="post-card__header">
			<?php the_title( '<h2 class="post-card__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</header>

		<div class="post-card__excerpt">
			<?php the_excerpt(); ?>
		</div>

		<footer class="post-card__footer">
			<div class="post-card__author-date">
				<?php luminary_posted_on(); ?>
				<?php luminary_posted_by(); ?>
			</div>
			<a class="post-card__read-more" href="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Read more: %s', 'luminary' ), get_the_title() ) ); ?>">
				<?php esc_html_e( 'Read More', 'luminary' ); ?>
				<span aria-hidden="true">&rarr;</span>
			</a>
		</footer>

	</div><!-- .post-card__body -->

</article><!-- #post-<?php the_ID(); ?> -->
