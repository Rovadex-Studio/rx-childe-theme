<?php
/**
 * Child functions and definitions.
 */
add_filter( 'rvdx-theme/assets-depends/styles', 'rvdx_child_theme_styles_depends' );

/**
 * Enqueue styles.
 */
function rvdx_child_theme_styles_depends( $deps ) {

	$child_handle = 'rvdx-child-theme-style';

	wp_register_style(
		$child_handle,
		get_template_directory_uri() . '/style.css',
		array(),
		rvdx_theme()->version()
	);

	$deps[] = $child_handle;

	return $deps;
}
