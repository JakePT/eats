<?php
/**
 * Theme functions file.
 *
 * @package Eats
 */

defined( 'ABSPATH' ) || exit;

/**
 * Set up the theme.
 *
 * @return void
 */
function eats_theme_setup() {
	register_nav_menu( 'primary', 'Navbar' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 740, 416, true );
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'eats_theme_setup' );

/**
 * Enqueue theme assets.
 *
 * @return void
 */
function eats_enqueue_assets() {
	wp_register_style(
		'eats-google-fonts',
		'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,700;1,400;1,700&display=swap'
	);

	wp_enqueue_style(
		'eats',
		get_stylesheet_uri(),
		[ 'eats-google-fonts' ],
		filemtime( get_theme_file_path( 'style.css' ) )
	);

	wp_enqueue_script(
		'eats-dropdowns',
		get_theme_file_uri( 'js/dropdowns.js' ),
		[],
		filemtime( get_theme_file_path( 'js/dropdowns.js' ) )
	);
}
add_action( 'wp_enqueue_scripts', 'eats_enqueue_assets' );

/**
 * Output skip link.
 *
 * @return void
 */
function eats_skip_link() {
	printf(
		'<a class="screen-reader-text" href="#main">%s</a>',
		esc_html__( 'Skip to main content', 'eats' )
	);
}
add_action( 'wp_body_open', 'eats_skip_link' );

/**
 * Get the SVG markup for an icon.
 *
 * @param string $icon  Icon name.
 * @param string $class Class attribute for SVG element.
 *
 * @return string SVG markup.
 */
function eats_get_icon( string $icon, string $class = '' ) {
	return sprintf(
		'<svg class="%s"><use xlink:href="#icon-%s"></use></svg>',
		esc_attr( $class ),
		esc_attr( $icon )
	);
}

/**
 * Echo the SVG markup for an icon.
 *
 * @param string $icon  Icon name.
 * @param string $class Class attribute for SVG element.
 *
 * @return void
 */
function eats_icon( string $icon, string $class = '' ) {
	echo eats_get_icon( $icon, $class );
}

/**
 * Output the SVG icons sprite.
 *
 * @return void
 */
function eats_svg_sprite() {
	$svg = get_theme_file_path( '/images/icons.svg' );

	if ( file_exists( $svg ) ) {
		echo file_get_contents( $svg ); // phpcs:ignore WordPress.WP.AlternativeFunctions, WordPress.Security.EscapeOutput
	}
}
add_action( 'wp_footer', 'eats_svg_sprite' );

/**
 * Output a toggle button.
 *
 * @param string $label Button label.
 * @param string $icon  ID attribute of target.
 * @param string $class Which icon to use.
 *
 * @return void
 */
function eats_toggle( string $label, string $target, string $icon ) {
	printf(
		'<button aria-label="%s" aria-controls="%s" aria-expanded="false" class="toggle">%s%s</button>',
		esc_attr( $label ),
		esc_attr( $target ),
		eats_get_icon( $icon, 'toggle__icon toggle__icon--open' ),
		eats_get_icon( 'close', 'toggle__icon toggle__icon--close' )
	);
}