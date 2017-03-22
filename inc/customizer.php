<?php
/**
 * lean Theme Customizer
 *
 * @package lean
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lean_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	/**
	 * Add Panel for Layouts.
	 * 
	 */
	$wp_customize->add_panel(
			// $id
			'anaya_panelLayouts',
			// $args
			array(
				'priority' 			=> 30,
				'capability' 		=> 'edit_theme_options',
				'theme_supports'	=> '',
				'title' 			=> __( 'Layouts', 'lean' ),
			)
	);

	/****************************************************
	* Section: siteLayout
	* Panel:   Layouts
	****************************************************/
	
	$wp_customize->add_section(
		// $id
		'anaya_Layouts_siteLayout_section',
		// $args
		array(
			'title'			=> __( 'Layout', 'lean' ),
			'panel'			=> 'anaya_panelLayouts'
		)
	);

	//Setting: siteLayout
	//Section:   siteLayout
	//Panel: Layouts
	$wp_customize->add_setting( 'anaya_siteLayout_siteLayout', array(
		'default'			=> 'full-width',
		'type'				=> 'theme_mod',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'lean_sanitize_select'
	) );
	
	//Control: Site Layout
	$wp_customize->add_control( 'anaya_siteLayout_siteLayout', array(
		'label'			=>		__('Site Layout', 'lean'),
		//checkbox, dropdown-pages, radio, select, text, textarea, email, number, phone (req: input_attrs), url
		'type'			=>		'radio', 
		'section'		=>		'anaya_Layouts_siteLayout_section',
		'choices'		=> array(
				'full-width' => __( 'Full Width', 'lean' ),
				'boxed' => __( 'Boxed', 'lean' )
			)	
	) );
		


}
add_action( 'customize_register', 'lean_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lean_customize_preview_js() {
	wp_enqueue_script( 'lean_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'lean_customize_preview_js' );

/**
 * Sanitication Callbacks
 */
function lean_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
