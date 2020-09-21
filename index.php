<?php
/**
 * Default posts template.
 *
 * @package Eats
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="main" tabindex="-1">
	<div class="container">
		<h1 class="screen-reader-text">
			<?php the_archive_title(); ?>
		</h1>

		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/entry' );
			}
		} else {
			get_template_part( 'template-parts/no-results' );
		}
		?>
	</div>
</main>

<?php
get_footer();