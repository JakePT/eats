<?php
/**
 * Theme header template.
 *
 * @package Eats
 */

defined( 'ABSPATH' ) || exit;
?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
		<meta name="viewport" content="initial-scale=1,shrink-to-fit=no,viewport-fit=cover">
		<script>document.documentElement.classList.replace( 'no-js', 'js' );</script>
		<?php wp_head(); ?>
	</head>

	<body>
		<?php
		wp_body_open();

		get_template_part( 'template-parts/header' );

		get_template_part( 'template-parts/navbar' );