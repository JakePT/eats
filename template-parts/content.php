<?php
/**
 * Post content template.
 *
 * @package Eats
 */

defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class( 'content' ); ?>>
	<?php the_post_thumbnail( 'full', [ 'class' => 'content__image' ] ); ?>

	<footer class="content__meta">
		<time datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>">
			<?php the_time( get_option( 'date_format' ) ); ?>
		</time>
	</footer>

	<header class="content__header">
		<h1 class="content__title">
			<?php the_title(); ?>
		</h1>
	</header>

	<?php the_content(); ?>
</article>