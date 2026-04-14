<?php
/**
 * Template part for displaying results in search pages
 *
 * @package Luminary
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card post-card--search' ); ?>>

	<?php luminary_post_thumbnail( 'luminary-card' ); ?>

	<div class="post-card__body">

		<header class="post-card__header">
			<?php
			if ( 'post' === get_post_type() ) :
				echo '<div class="post-card__meta">';
				luminary_category_list();
				echo '</div>';
			endif;
			?>
			<?php the_title( sprintf( '<h2 class="post-card__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .post-card__header -->

		<div class="post-card__excerpt">
			<?php the_excerpt(); ?>
		</div>

		<footer class="post-card__footer">
			<?php luminary_posted_on(); ?>
			<a class="post-card__read-more" href="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Read more: %s', 'luminary' ), get_the_title() ) ); ?>">
				<?php esc_html_e( 'Read More', 'luminary' ); ?>
				<span aria-hidden="true">&rarr;</span>
			</a>
		</footer>

	</div><!-- .post-card__body -->

</article><!-- #post-<?php the_ID(); ?> -->
