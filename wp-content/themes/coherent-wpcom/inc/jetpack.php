<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package coherent
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function coherent_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'coherent_jetpack_setup' );

/**
 * Add support for the Site Logo
 *
 * @since Coherent 1.0
 */
function coherent_site_logo_init() {
	add_image_size( 'coherent-logo', 100, 100 );
	add_theme_support( 'site-logo', array( 'size' => 'rcoherent-logo' ) );
}
add_action( 'after_setup_theme', 'coherent_site_logo_init' );

/**
 * Return early if Site Logo is not available.
 *
 * @since Coherent 1.0
 */
function coherent_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}