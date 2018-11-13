<?php
/**
 * Child functions and definitions.
 */
add_filter( 'rx-theme/assets-depends/styles', 'rx_child_theme_styles_depends' );

/**
 * Enqueue styles.
 */
function rx_child_theme_styles_depends( $deps ) {

	$parent_handle = 'rx-parent-theme-style';

	wp_register_style(
		$parent_handle,
		get_template_directory_uri() . '/style.css',
		array(),
		rx_theme()->version()
	);

	$deps[] = $parent_handle;

	return $deps;
}

/**
 * Disable magic button for your clients
 *
 * Un-comment next line to disble magic button output for you clients.
 */
//add_action( 'jet-theme-core/register-config', 'rx_child_theme_disable_magic_button' );

function rx_child_theme_disable_magic_button( $config_manager ) {
	$config_manager->register_config( array(
		'library_button' => false,
	) );
}

/**
 * Disable unnecessary theme modules
 *
 * Un-comment next line and return unnecessary modules from returning modules array.
 */
//add_filter( 'rx-theme/allowed-modules', 'rx_child_theme_allowed_modules' );

function rx_child_theme_allowed_modules( $modules ) {

	return array(
		'blog-layouts'    => array(),
		'crocoblock'      => array(),
		'woo'             => array(
			'woo-breadcrumbs' => array(),
			'woo-page-title'  => array(),
		),
	);

}

/**
 * Registering a new structure
 *
 * To change structure and apropriate documnet type parameters go to
 * structures/archive.php and document-types/archive.php
 *
 * To print apropriate location add next code where you need it:
 * if ( function_exists( 'jet_theme_core' ) ) {
 *     jet_theme_core()->locations->do_location( 'rx_child_theme_archive' );
 * }
 * Where 'rx_child_theme_archive' - apropritate location name (from example).
 *
 * Un-comment next line to register new structure.
 */
//add_action( 'jet-theme-core/structures/register', 'rx_child_theme_structures' );

function rx_child_theme_structures( $structures_manager ) {

	require get_theme_file_path( 'structures/archive.php' );
	require get_theme_file_path( 'structures/404.php' );

	$structures_manager->register_structure( 'Rx_Child_Theme_Structure_Archive' );
	$structures_manager->register_structure( 'Rx_Child_Theme_Structure_404' );

}
