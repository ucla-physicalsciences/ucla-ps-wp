<?php
/**
 * Theme Customizer.
 *  @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function ucla_ps_wp_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'custom_css' );
	$wp_customize->remove_section( 'theme' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'header_image' );	
}

add_action( 'customize_register', 'ucla_ps_wp_customize_register' );
