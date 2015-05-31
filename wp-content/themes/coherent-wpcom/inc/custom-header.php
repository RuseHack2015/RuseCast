<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package coherent
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses coherent_header_style()
 * @uses coherent_admin_header_style()
 * @uses coherent_admin_header_image()
 */
function coherent_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'coherent_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 2000,
		'height'                 => 1500,
		'flex-height'            => true,
		'header-text'            => false,
	) ) );
}
add_action( 'after_setup_theme', 'coherent_custom_header_setup' );