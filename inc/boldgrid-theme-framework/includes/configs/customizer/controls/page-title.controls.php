<?php
/**
 * Customizer Controls Configs.
 *
 * @package Boldgrid_Theme_Framework
 * @subpackage Boldgrid_Theme_Framework\Configs\Customizer\Controls
 *
 * @since 2.0.0
 *
 * @return array Controls to create in the WordPress Customizer.
 */
return array(
	/* Start Global Page Title Control */
	'bgtfw_global_title_background_color'     => array(
		'type'              => 'bgtfw-palette-selector',
		'transport'         => 'postMessage',
		'settings'          => 'bgtfw_global_title_background_color',
		'label'             => esc_attr__( 'Background Color', 'crio' ),
		'tooltip'           => esc_attr__( 'Choose a color from your palette to use.', 'crio' ),
		'section'           => 'bgtfw_global_page_titles',
		'priority'          => 1,
		'default'           => '',
		'choices'           => array(
			'colors' => $bgtfw_formatted_palette,
			'size'   => $bgtfw_palette->get_palette_size( $bgtfw_formatted_palette ),
		),
		'sanitize_callback' => array( $bgtfw_color_sanitize, 'sanitize_palette_selector' ),
		'edit_vars'         => array(
			array(
				'selector'    => array( '.page .page-header', '.archive .page-header', '.blog .page-header', '.single .page-header-wrapper' ),
				'label'       => esc_attr__( 'Page Title Styling', 'crio' ),
				'description' => esc_attr__( 'Customize the color, background, and size of your page title.', 'crio' ),
			),
			array(
				'selector'    => array( '.single .page-header-wrapper' ),
				'label'       => esc_attr__( 'Post Title Styling', 'crio' ),
				'description' => esc_attr__( 'Customize the color, background, and size of your post title.', 'crio' ),
			),
		),
	),
	'bgtfw_global_title_color'                => array(
		'type'              => 'bgtfw-palette-selector',
		'transport'         => 'postMessage',
		'settings'          => 'bgtfw_global_title_color',
		'label'             => esc_attr__( 'Title Color', 'crio' ),
		'section'           => 'bgtfw_global_page_titles',
		'default'           => '',
		'choices'           => array(
			'colors' => $bgtfw_formatted_palette,
			'size'   => $bgtfw_palette->get_palette_size( $bgtfw_formatted_palette ),
		),
		'sanitize_callback' => array( $bgtfw_color_sanitize, 'sanitize_palette_selector' ),
	),
	'bgtfw_global_title_size'                 => array(
		'type'              => 'radio-buttonset',
		'transport'         => 'postMessage',
		'settings'          => 'bgtfw_global_title_size',
		'label'             => esc_attr__( 'Title Font Size', 'crio' ),
		'section'           => 'bgtfw_global_page_titles',
		'default'           => 'h2',
		'choices'           => array(
			'h1' => esc_attr__( 'H1', 'crio' ),
			'h2' => esc_attr__( 'H2', 'crio' ),
			'h3' => esc_attr__( 'H3', 'crio' ),
			'h4' => esc_attr__( 'H4', 'crio' ),
			'h5' => esc_attr__( 'H5', 'crio' ),
			'h6' => esc_attr__( 'H6', 'crio' ),
		),
		'sanitize_callback' => function( $value, $settings ) {
			return in_array( $value, array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ), true ) ? $value : $settings->default;
		},
		'js_vars'           => array(
			array(
				'element'       => '.page-header .entry-title, .page-header .page-title',
				'function'      => 'html',
				'attr'          => 'class',
				'value_pattern' => 'entry-title $',
			),
		),
	),
	'bgtfw_global_title_alignment'            => array(
		'type'              => 'radio-buttonset',
		'transport'         => 'auto',
		'settings'          => 'bgtfw_global_title_alignment',
		'label'             => esc_attr__( 'Text Position', 'crio' ),
		'section'           => 'bgtfw_global_page_titles',
		'default'           => 'left',
		'choices'           => array(
			'left'   => '<span class="dashicons dashicons-editor-alignleft"></span>' . esc_attr__( 'Left', 'crio' ),
			'center' => '<span class="dashicons dashicons-editor-aligncenter"></span>' . esc_attr__( 'Center', 'crio' ),
			'right'  => '<span class="dashicons dashicons-editor-alignright"></span>' . esc_attr__( 'Right', 'crio' ),
		),
		'sanitize_callback' => function( $value, $settings ) {
			return in_array( $value, array( 'left', 'center', 'right' ), true ) ? $value : $settings->default;
		},
		'output'            => array(
			array(
				'element'  => '.page-header',
				'property' => 'text-align',
			),
		),
	),
	'bgtfw_global_title_position'             => array(
		'type'              => 'radio-buttonset',
		'transport'         => 'refresh',
		'settings'          => 'bgtfw_global_title_position',
		'label'             => esc_attr__( 'Position', 'crio' ),
		'tooltip'           => __( 'Change where your page titles appear on your site.', 'crio' ),
		'section'           => 'bgtfw_global_page_titles',
		'default'           => 'above',
		'choices'           => array(
			'above'   => '<span class="dashicons dashicons-arrow-up-alt"></span>' . __( 'Above Content', 'crio' ),
			'content' => '<span class="dashicons dashicons-format-aside"></span>' . __( 'In Content', 'crio' ),
		),
		'sanitize_callback' => function( $value, $settings ) {
			return in_array( $value, array( 'above', 'content' ), true ) ? $value : $settings->default;
		},
	),
	'bgtfw_global_title_background_container' => array(
		'type'              => 'radio-buttonset',
		'transport'         => 'postMessage',
		'settings'          => 'bgtfw_global_title_background_container',
		'label'             => esc_attr__( 'Background Container', 'crio' ),
		'tooltip'           => __( 'Change where your page titles appear on your site.', 'crio' ),
		'section'           => 'bgtfw_global_page_titles',
		'default'           => 'full-width',
		'choices'           => array(
			'container'  => '<span class="icon-layout-container"></span>' . esc_attr__( 'Contained', 'crio' ),
			'full-width' => '<span class="icon-layout-full-screen"></span>' . esc_attr__( 'Full Width', 'crio' ),
		),
		'sanitize_callback' => function( $value, $settings ) {
			return 'container' === $value || 'full-width' === $value ? $value : $settings->default;
		},
		'js_vars'           => array(
			array(
				'element'       => '.page-title-above .page-header-wrapper',
				'function'      => 'html',
				'attr'          => 'class',
				'value_pattern' => 'page-header-wrapper $',
			),
		),
		'active_callback'   => array(
			array(
				'setting'  => 'bgtfw_global_title_position',
				'operator' => '!==',
				'value'    => 'content',
			),
		),
	),
	'bgtfw_global_title_content_container'    => array(
		'type'              => 'radio-buttonset',
		'transport'         => 'postMessage',
		'settings'          => 'bgtfw_global_title_content_container',
		'label'             => esc_attr__( 'Content Container', 'crio' ),
		'tooltip'           => __( 'Set the page title content to be displayed in a container or full width of the page.', 'crio' ),
		'section'           => 'bgtfw_global_page_titles',
		'default'           => 'container',
		'choices'           => array(
			'container' => '<span class="icon-layout-container"></span>' . esc_attr__( 'Contained', 'crio' ),
			''          => '<span class="icon-layout-full-screen"></span>' . esc_attr__( 'Full Width', 'crio' ),
		),
		'sanitize_callback' => function( $value, $settings ) {
			return 'container' === $value || '' === $value ? $value : $settings->default;
		},
		'js_vars'           => array(
			array(
				'element'       => '.page-title-above .page-header .featured-imgage-header',
				'function'      => 'html',
				'attr'          => 'class',
				'value_pattern' => 'featured-imgage-header $',
			),
		),
		'active_callback'   => array(
			array(
				'setting'  => 'bgtfw_global_title_position',
				'operator' => '!==',
				'value'    => 'content',
			),
			array(
				'setting'  => 'bgtfw_global_title_background_container',
				'operator' => '!==',
				'value'    => 'container',
			),
		),
	),
);
