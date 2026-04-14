<?php
/**
 * Luminary scripts and styles enqueue
 *
 * @package Luminary
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts and styles.
 */
function luminary_scripts() {

	// Normalize CSS reset.
	wp_enqueue_style(
		'luminary-normalize',
		get_template_directory_uri() . '/assets/css/normalize.css',
		array(),
		'8.0.1'
	);

	// Self-hosted fonts CSS.
	wp_enqueue_style(
		'luminary-fonts',
		get_template_directory_uri() . '/assets/css/fonts.css',
		array(),
		LUMINARY_VERSION
	);

	// Main stylesheet.
	wp_enqueue_style(
		'luminary-style',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'luminary-normalize', 'luminary-fonts' ),
		LUMINARY_VERSION
	);

	// Theme style.css (required by WordPress).
	wp_enqueue_style(
		'luminary-theme-style',
		get_stylesheet_uri(),
		array( 'luminary-style' ),
		LUMINARY_VERSION
	);

	// Navigation JS.
	wp_enqueue_script(
		'luminary-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		LUMINARY_VERSION,
		true
	);

	// Comments reply script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Inject Customizer dynamic CSS as inline style.
	$custom_css = luminary_get_customizer_css();
	if ( $custom_css ) {
		wp_add_inline_style( 'luminary-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'luminary_scripts' );

/**
 * Build dynamic CSS from Customizer settings.
 *
 * @return string CSS string.
 */
function luminary_get_customizer_css() {
	$accent_color   = get_theme_mod( 'luminary_accent_color', '#B8860B' );
	$body_bg        = get_theme_mod( 'luminary_body_bg_color', '#FAFAF8' );
	$text_color     = get_theme_mod( 'luminary_text_color', '#2C2C2C' );
	$heading_color  = get_theme_mod( 'luminary_heading_color', '#1A1A1A' );

	$accent_color  = sanitize_hex_color( $accent_color );
	$body_bg       = sanitize_hex_color( $body_bg );
	$text_color    = sanitize_hex_color( $text_color );
	$heading_color = sanitize_hex_color( $heading_color );

	$css = ':root {';

	if ( $accent_color ) {
		$css .= '--color-accent:' . esc_attr( $accent_color ) . ';';
	}
	if ( $body_bg ) {
		$css .= '--color-bg:' . esc_attr( $body_bg ) . ';';
	}
	if ( $text_color ) {
		$css .= '--color-text:' . esc_attr( $text_color ) . ';';
	}
	if ( $heading_color ) {
		$css .= '--color-heading:' . esc_attr( $heading_color ) . ';';
	}

	$css .= '}';

	return $css;
}

/**
 * Enqueue block editor assets.
 */
function luminary_block_editor_assets() {
	wp_enqueue_style(
		'luminary-editor-fonts',
		get_template_directory_uri() . '/assets/css/fonts.css',
		array(),
		LUMINARY_VERSION
	);
}
add_action( 'enqueue_block_editor_assets', 'luminary_block_editor_assets' );
