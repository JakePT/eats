<?php
/**
 * Navbar template.
 *
 * @package Eats
 */

defined( 'ABSPATH' ) || exit;

if ( ! has_nav_menu( 'primary' ) ) {
	return;
}
?>

<div class="strip strip--dark">
	<div class="container">
		<h1 class="screen-reader-text">
			<?php echo esc_html( wp_get_nav_menu_name( 'primary' ) ); ?>
		</h1>

		<?php
		wp_nav_menu(
			[
				'theme_location'  => 'primary',
				'container'       => 'nav',
				'container_id'    => 'navbar',
				'container_class' => 'navbar',
				'fallback_cb'     => false,
				'depth'           => 1,
			]
		);
		?>
	</div>
</div>