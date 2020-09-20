<?php
/**
 * Default posts template.
 *
 * @package Eats
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="main">
	<div class="container">
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