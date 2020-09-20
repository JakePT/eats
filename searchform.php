<?php
/**
 * Search form template.
 *
 * @package Eats
 */

defined( 'ABSPATH' ) || exit;
?>

<form action="<?php echo esc_url( home_url() ); ?>" role="search" class="search-form">
	<input type="search" name="s" placeholder="<?php esc_attr_e( 'e.g. delicious sandwiches', 'eats' ); ?>" class="search-form__input" value="<?php echo esc_attr( get_search_query() ); ?>">

	<button aria-label="<?php esc_attr_e( 'Search', 'eats' ); ?>" class="search-form__button">
		<?php eats_icon( 'search', 'search-form__icon' ); ?>
	</button>
</form>