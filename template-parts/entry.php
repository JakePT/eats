<?php
/**
 * Entry template.
 *
 * @package Eats
 */

defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'entry' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'post-thumbnail', [ 'class' => 'entry__image' ] ); ?>
		</a>
	<?php endif; ?>

	<div class="entry__content">
		<footer class="entry__meta">
			<time datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>">
				<?php the_time( get_option( 'date_format' ) ); ?>
			</time>
		</footer>

		<header class="entry__header">
			<h2 class="entry__title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
		</header>

		<?php the_excerpt(); ?>

		<a href="<?php the_permalink(); ?>" class="read-more">
			<?php esc_html_e( 'Read More', 'eats' ); ?>
			<?php eats_icon( 'chevron', 'read-more__icon' ); ?>
		</a>
	</div>
</article>