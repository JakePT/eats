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
		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content' );
		}
		?>
	</div>
</main>

<?php
get_footer();