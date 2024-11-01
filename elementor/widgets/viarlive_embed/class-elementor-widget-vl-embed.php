<?php
/**
 * Elementor Widget
 *
 * @package    ViarLiveWPPlugin
 * @author     Nick Shtansky <nshtansky@fusionworks.md>
 */

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Get tours urls.
require_once VIARLIVE_DIR . 'vendor/class-viarlivetours.php';

/**
 * Class Elementor_Widget_ViarLive_Embed
 */
class Elementor_Widget_ViarLive_Embed extends Widget_Base {

	/**
	 * Get script dependencies
	 *
	 * @return string[]
	 */
	public function get_script_depends(): array {
		if ( Plugin::$instance->preview->is_preview_mode() ) {
			wp_register_script( 'viarlive_embed_editor', plugins_url( 'editor.js', __FILE__ ), array( 'elementor-frontend' ), '1.0', true );
			return array( 'viarlive_embed_editor' );
		} else {
			wp_register_script( 'viarlive_embed', plugins_url( 'index.js', __FILE__ ), array(), '1.0', true );
			return array( 'viarlive_embed' );
		}
	}

	/**
	 * Get style dependencies
	 *
	 * @return string[]
	 */
	public function get_style_depends(): array {
		wp_register_style( 'viarlive_embed', plugins_url( 'vl_embed.css', __FILE__ ), array(), '1.0.1' );

		return array(
			'viarlive_embed',
		);
	}

	/**
	 * Get widget name
	 */
	public function get_name(): string {
		return 'viarlive_embed';
	}

	/**
	 * Get widget title
	 */
	public function get_title(): string {
		return esc_html__( 'Viar.Live Embed', 'virtual-tours' );
	}

	/**
	 * Get widget icon
	 */
	public function get_icon(): string {
		return 'viarLiveIcon';
	}

	/**
	 * Get widget categories
	 */
	public function get_categories(): array {
		return array( 'general' );
	}

	/**
	 * Register widget controls
	 */
	protected function register_controls() {
		$tours    = ViarLiveTours::get_visible_tours();
		$url_list = array( '' => 'Select Tour' );

		if ( ! empty( $tours ) ) {
			foreach ( $tours as $tour ) {
				$url_list[ $tour->url ] = $tour->name;
			}
		}

		$this->start_controls_section(
			'content_section',
			array(
				'label' => esc_html__( 'Content', 'virtual-tours' ),
			)
		);
		$this->add_control(
			'url',
			array(
				'label'   => esc_html__( 'Tour', 'virtual-tours' ),
				'type'    => Controls_Manager::SELECT,
				'options' => $url_list,
				'default' => array_key_first( $url_list ),
			)
		);
		$this->add_control(
			'width',
			array(
				'type'        => Controls_Manager::NUMBER,
				'label'       => esc_html__( 'Width', 'virtual-tours' ),
				'placeholder' => '0',
				'min'         => 0,
				'max'         => 2000,
				'step'        => 1,
				'default'     => 600,
			)
		);
		$this->add_control(
			'height',
			array(
				'type'        => Controls_Manager::NUMBER,
				'label'       => esc_html__( 'Height', 'virtual-tours' ),
				'placeholder' => '0',
				'min'         => 0,
				'max'         => 1000,
				'step'        => 1,
				'default'     => 450,
			)
		);
		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<div class="elementor-viarlive-widget">';

		// Header for admin panel.
		if ( is_admin() ) {
			echo '<div class="viarlive-tour-block-header">
						<div class="viarlive-logo"><img src="' . esc_attr( VIARLIVE_URL ) . '/assets/svg/white_logo.svg" alt="logo"/></div>
						<div class="viarlive-settings-button">' . esc_html__( 'Settings', 'virtual-tours' ) . '</div>
					</div>';
		}

		// Widget body.
		if ( ! empty( $settings['url'] ) ) {
			echo do_shortcode( '[viarlive url="' . esc_url( $settings['url'] ) . '" width="' . esc_attr( $settings['width'] ) . '" height="' . esc_attr( $settings['height'] ) . '"]' );
		} elseif ( is_admin() ) {
				echo '<div class="viarlive-tour-block-empty" style="background:url(' . esc_url( VIARLIVE_URL . 'assets/img/block_bg.png' ) . ');">
							<div class="viarlive-empty-logo"></div>
							<div class="viarlive-title">' . esc_html__( 'No tour selected', 'virtual-tours' ) . '</div>
							<div class="viarlive-description">' . esc_html__( 'Select a tour. You should create a tour in your Viar.Live panel and import via API key.', 'virtual-tours' ) . '</div>
						</div>';
		} else {
			esc_html_e( 'No Viar.Live Tour Selected', 'virtual-tours' );
		}
		echo '</div>';
	}
}
