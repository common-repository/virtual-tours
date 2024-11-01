<?php
/**
 * ViarLive Shortcode
 *
 * @package    ViarLiveWPPlugin
 * @author     Nick Shtansky <nshtansky@fusionworks.md>
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Class ViarLiveShortcode
 */
class ViarLiveShortcode {

	/**
	 * Register
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'init', array( $this, 'register_shortcode' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_front' ) );
	}

	/**
	 * Register shortcode
	 *
	 * @return void
	 */
	public function register_shortcode() {
		add_shortcode( 'viarlive', array( $this, 'viarlive_shortcode' ) );
	}

	/**
	 * ViarLive shortcode
	 *
	 * @param array $atts Attributes.
	 * @return string
	 */
	public function viarlive_shortcode( array $atts = array() ): string {
		extract(
			shortcode_atts(
				array(
					'url'    => 0,
					'name'   => 0,
					'width'  => 0,
					'height' => 0,
					'border' => 0,
				),
				$atts
			)
		);

		// Load styles and js if shortcode is used.
		wp_enqueue_style( 'viarlive_style' );
		wp_enqueue_script( 'viarlive_script' );

		$output = '<div class="viarlive-tour-container">';

		if ( ! empty( $url ) ) {
			$output .= '<div class="viarlive-tour-shortcode" data-url="' . esc_url( $url ) . '" data-width="' . esc_attr( $width ) . '" data-height="' . esc_attr( $height ) . '"></div>';
		} else {
			$output .= esc_html__( 'No tour selected.', 'virtual-tours' );
		}

		$output .= '</div>';

		return $output;
	}

	/**
	 * Enqueue frontend scripts
	 *
	 * @return void
	 */
	public static function enqueue_front() {
		wp_register_style( 'viarlive_style', VIARLIVE_URL . 'assets/css/front.css', array(), '1.0.1' );
		wp_register_script( 'viarlive_script', VIARLIVE_URL . 'assets/js/script.js', array(), '1.0.1', true );
	}
}
$viar_live_shortcode = new ViarLiveShortcode();
$viar_live_shortcode->register();
