<?php
/**
 * Header section template.
 *
 * @package Eats
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="strip">
	<div class="container">
		<header class="header">
			<div class="header__tools">
				<nav class="header__menu-toggle">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						eats_toggle(
							__( 'Toggle menu', 'eats' ),
							'navbar',
							'menu'
						);
					}
					?>
				</nav>

				<div class="header__logo">
					<a href="<?php echo esc_url( home_url() ); ?>" class="logo">
						<?php eats_icon( 'hamburger', 'logo__icon' ); ?>
						<span class="logo__text">
							<?php bloginfo( 'name' ); ?>
						</span>
					</a>
				</div>

				<div class="header__search-toggle">
					<?php
					eats_toggle(
						__( 'Toggle search', 'eats' ),
						'search',
						'search'
					);
					?>
				</div>
			</div>

			<div id="search" class="header__search">
				<?php get_search_form(); ?>
			</div>
		</header>
	</div>
</div>