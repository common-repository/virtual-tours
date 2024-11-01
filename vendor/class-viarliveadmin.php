<?php
/**
 * ViarLive - Admin
 *
 * @package    ViarLiveWPPlugin
 * @author     Nick Shtansky <nshtansky@fusionworks.md>
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Class ViarLiveAdmin
 */
class ViarLiveAdmin {

	/**
	 * On plugin activation.
	 *
	 * @return void
	 */
	public static function on_activation() {
		// Create table in MySQL.
		require_once VIARLIVE_DIR . 'vendor/class-viarlivetours.php';
		ViarLiveTours::create_viarlive_tours_table();
	}

	/**
	 * Enqueue scripts and styles.
	 *
	 * @return void
	 */
	public static function viarlive_admin_scripts() {
		wp_enqueue_style( 'viarlive_admin_css', VIARLIVE_URL . 'assets/css/admin.css', array(), '1.0.1' );
		wp_enqueue_script( 'viarlive_admin_script', VIARLIVE_URL . 'assets/js/admin.js', array(), '1.0.1', true );
		wp_enqueue_style( 'vl-google-font', self::viarlive_google_font(), array(), '1.0.0' );
	}

	/**
	 * Get Google font URL.
	 *
	 * @return string
	 */
	public static function viarlive_google_font(): string {
		$font_url   = '';
		$viarlive_font_ex = '300;400;700';

		if ( 'off' !== _x( 'on', 'Lato font: on or off', 'virtual-tours' ) ) {
			$query_args = array(
				'family'  => rawurlencode( 'Lato:wght@' . esc_attr( $viarlive_font_ex ) ),
				'subset'  => rawurlencode( 'latin,latin-ext' ),
				'display' => rawurlencode( 'swap' ),
			);
			$font_url   = add_query_arg( $query_args, '//fonts.googleapis.com/css2' );
		}

		return $font_url;
	}
}
