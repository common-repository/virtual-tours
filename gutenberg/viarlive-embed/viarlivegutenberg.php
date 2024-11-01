<?php
/**
 * Guttenberg Widget
 *
 * @package    ViarLiveWPPlugin
 * @author     Nick Shtansky <nshtansky@fusionworks.md>
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Init block
 *
 * @return void
 */
function viarlive_viarlive_embed_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'viarlive_viarlive_embed_block_init' );

/** Enqueue assets
 *
 * @return void
 */
function viarlive_embed_enqueue_assets_frontend() {
	$asset_file = include plugin_dir_path( __FILE__ ) . 'build/view.asset.php';
	wp_enqueue_script(
		'viarlive-embed-block-script',
		plugins_url( 'build/view.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'viarlive_embed_enqueue_assets_frontend' );

/** Get tours */
require_once VIARLIVE_DIR . 'vendor/class-viarlivetours.php';

add_action(
	'rest_api_init',
	function () {
		register_rest_route(
			'vl/v1',
			'/viarLiveTours',
			array(
				'methods'             => 'GET',
				'callback'            => 'viarLiveTours::get_tours',
				'permission_callback' => '__return_true',
			)
		);
	}
);
