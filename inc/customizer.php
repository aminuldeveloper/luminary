<?php
/**
 * Luminary Theme Customizer
 *
 * @package Luminary
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Customizer settings, sections, and controls.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function luminary_customize_register( $wp_customize ) {

	// ---------------------------------------------------------------
	// Panel: Theme Options
	// ---------------------------------------------------------------
	$wp_customize->add_panel(
		'luminary_options',
		array(
			'title'    => esc_html__( 'Theme Options', 'luminary' ),
			'priority' => 130,
		)
	);

	// ---------------------------------------------------------------
	// Section: Colors
	// ---------------------------------------------------------------
	$wp_customize->add_section(
		'luminary_colors',
		array(
			'title'    => esc_html__( 'Colors', 'luminary' ),
			'panel'    => 'luminary_options',
			'priority' => 10,
		)
	);

	// Accent Color.
	$wp_customize->add_setting(
		'luminary_accent_color',
		array(
			'default'           => '#B8860B',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'luminary_accent_color',
			array(
				'label'   => esc_html__( 'Accent Color', 'luminary' ),
				'section' => 'luminary_colors',
			)
		)
	);

	// Body Background Color.
	$wp_customize->add_setting(
		'luminary_body_bg_color',
		array(
			'default'           => '#FAFAF8',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'luminary_body_bg_color',
			array(
				'label'   => esc_html__( 'Body Background Color', 'luminary' ),
				'section' => 'luminary_colors',
			)
		)
	);

	// Text Color.
	$wp_customize->add_setting(
		'luminary_text_color',
		array(
			'default'           => '#2C2C2C',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'luminary_text_color',
			array(
				'label'   => esc_html__( 'Body Text Color', 'luminary' ),
				'section' => 'luminary_colors',
			)
		)
	);

	// Heading Color.
	$wp_customize->add_setting(
		'luminary_heading_color',
		array(
			'default'           => '#1A1A1A',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'luminary_heading_color',
			array(
				'label'   => esc_html__( 'Heading Color', 'luminary' ),
				'section' => 'luminary_colors',
			)
		)
	);

	// ---------------------------------------------------------------
	// Section: Layout
	// ---------------------------------------------------------------
	$wp_customize->add_section(
		'luminary_layout',
		array(
			'title'    => esc_html__( 'Layout', 'luminary' ),
			'panel'    => 'luminary_options',
			'priority' => 20,
		)
	);

	// Sidebar Position.
	$wp_customize->add_setting(
		'luminary_sidebar_position',
		array(
			'default'           => 'right',
			'sanitize_callback' => 'luminary_sanitize_select',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'luminary_sidebar_position',
		array(
			'label'   => esc_html__( 'Sidebar Position', 'luminary' ),
			'section' => 'luminary_layout',
			'type'    => 'select',
			'choices' => array(
				'right' => esc_html__( 'Right Sidebar', 'luminary' ),
				'left'  => esc_html__( 'Left Sidebar', 'luminary' ),
				'none'  => esc_html__( 'No Sidebar (Full Width)', 'luminary' ),
			),
		)
	);

	// Posts Per Row on Blog.
	$wp_customize->add_setting(
		'luminary_posts_per_row',
		array(
			'default'           => '2',
			'sanitize_callback' => 'luminary_sanitize_select',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'luminary_posts_per_row',
		array(
			'label'   => esc_html__( 'Posts Per Row (Blog)', 'luminary' ),
			'section' => 'luminary_layout',
			'type'    => 'select',
			'choices' => array(
				'1' => esc_html__( '1 Column', 'luminary' ),
				'2' => esc_html__( '2 Columns', 'luminary' ),
				'3' => esc_html__( '3 Columns', 'luminary' ),
			),
		)
	);

	// ---------------------------------------------------------------
	// Section: Blog Options
	// ---------------------------------------------------------------
	$wp_customize->add_section(
		'luminary_blog',
		array(
			'title'    => esc_html__( 'Blog Options', 'luminary' ),
			'panel'    => 'luminary_options',
			'priority' => 30,
		)
	);

	// Show Reading Time.
	$wp_customize->add_setting(
		'luminary_show_reading_time',
		array(
			'default'           => true,
			'sanitize_callback' => 'luminary_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'luminary_show_reading_time',
		array(
			'label'   => esc_html__( 'Show Reading Time', 'luminary' ),
			'section' => 'luminary_blog',
			'type'    => 'checkbox',
		)
	);

	// Show Author Bio on Single Posts.
	$wp_customize->add_setting(
		'luminary_show_author_bio',
		array(
			'default'           => true,
			'sanitize_callback' => 'luminary_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'luminary_show_author_bio',
		array(
			'label'   => esc_html__( 'Show Author Bio on Single Posts', 'luminary' ),
			'section' => 'luminary_blog',
			'type'    => 'checkbox',
		)
	);

	// Show Related Posts.
	$wp_customize->add_setting(
		'luminary_show_related_posts',
		array(
			'default'           => true,
			'sanitize_callback' => 'luminary_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'luminary_show_related_posts',
		array(
			'label'   => esc_html__( 'Show Related Posts on Single Posts', 'luminary' ),
			'section' => 'luminary_blog',
			'type'    => 'checkbox',
		)
	);

	// Show Post Navigation.
	$wp_customize->add_setting(
		'luminary_show_post_nav',
		array(
			'default'           => true,
			'sanitize_callback' => 'luminary_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'luminary_show_post_nav',
		array(
			'label'   => esc_html__( 'Show Previous/Next Post Navigation', 'luminary' ),
			'section' => 'luminary_blog',
			'type'    => 'checkbox',
		)
	);

	// ---------------------------------------------------------------
	// Section: Footer
	// ---------------------------------------------------------------
	$wp_customize->add_section(
		'luminary_footer',
		array(
			'title'    => esc_html__( 'Footer', 'luminary' ),
			'panel'    => 'luminary_options',
			'priority' => 40,
		)
	);

	// Footer Credit Text.
	$wp_customize->add_setting(
		'luminary_footer_credit',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'luminary_footer_credit',
		array(
			'label'       => esc_html__( 'Footer Credit Text', 'luminary' ),
			'description' => esc_html__( 'Optional additional text displayed in the footer.', 'luminary' ),
			'section'     => 'luminary_footer',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'luminary_customize_register' );

/**
 * Sanitize select fields.
 *
 * @param  string               $input   The value to sanitize.
 * @param  WP_Customize_Setting $setting The setting object.
 * @return string                         Sanitized value or the default.
 */
function luminary_sanitize_select( $input, $setting ) {
	$input   = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return array_key_exists( $input, $choices ) ? $input : $setting->default;
}

/**
 * Sanitize checkbox fields.
 *
 * @param  bool $checked Whether the checkbox is checked.
 * @return bool
 */
function luminary_sanitize_checkbox( $checked ) {
	return ( isset( $checked ) && true === $checked ) ? true : false;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function luminary_customize_preview_js() {
	wp_enqueue_script(
		'luminary-customizer',
		get_template_directory_uri() . '/assets/js/customizer.js',
		array( 'customize-preview' ),
		LUMINARY_VERSION,
		true
	);
}
add_action( 'customize_preview_init', 'luminary_customize_preview_js' );
