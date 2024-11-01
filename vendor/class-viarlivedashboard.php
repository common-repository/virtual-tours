<?php
/**
 * ViarLive - Dashboard
 *
 * @package    ViarLiveWPPlugin
 * @author     Nick Shtansky <nshtansky@fusionworks.md>
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Class ViarLiveDashboard
 */
class ViarLiveDashboard {

	/**
	 * Init
	 *
	 * @return void
	 */
	public static function init() {
		add_menu_page(
			esc_html__( 'Viar.Live', 'virtual-tours' ),
			esc_html__( 'Embed Viar.Live', 'virtual-tours' ),
			'manage_options',
			'viarlive',
			'ViarLiveDashboard::viarlive_welcome_html',
			'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTYiIGhlaWdodD0iNTYiIHZpZXdCb3g9IjAgMCA1NiA1NiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0yOCA1NkM0My40NjQgNTYgNTYgNDMuNDY0IDU2IDI4QzU2IDEyLjUzNiA0My40NjQgMCAyOCAwQzEyLjUzNiAwIDAgMTIuNTM2IDAgMjhDMCA0My40NjQgMTIuNTM2IDU2IDI4IDU2Wk0zOC4wMzQ3IDE3Ljk4MzFIMTguMDM3OEMxNy4yMzg3IDE3Ljk4MzEgMTYuNTIxNCAxOC4zMzI4IDE2LjAzMDQgMTguODg3Nkg0MC4wNDIxQzM5LjU1MTEgMTguMzMyOCAzOC44MzM4IDE3Ljk4MzEgMzguMDM0NyAxNy45ODMxWk05Ljk0MDU3IDIzLjgwMDRDOS45NDA1NyAyMS42MDI2IDExLjM4MzcgMTkuNzQxOSAxMy4zNzQxIDE5LjExNDJDMTQuMDIyNyAxNy4xNTk3IDE1Ljg2NTYgMTUuNzUgMTguMDM3OCAxNS43NUgzOC4wMzQ3QzQwLjIxNjcgMTUuNzUgNDIuMDY2NSAxNy4xNzI1IDQyLjcwNzIgMTkuMTQwOEM0NC42NTUyIDE5Ljc5MzEgNDYuMDU4OSAyMS42MzI4IDQ2LjA1ODkgMjMuODAwNFYzNS4xODE5QzQ2LjA1ODkgMzcuODk1MSA0My44NTk0IDQwLjA5NDcgNDEuMTQ2MSA0MC4wOTQ3SDM1LjcyODRDMzQuMzQzNiA0MC4wOTQ3IDMzLjA2NTcgMzkuMzk3MyAzMi4yOTggMzguMjgyNUgyMy44Mzk1QzIzLjA4MjEgMzkuNDAwOCAyMS44MDkzIDQwLjA5NDcgMjAuNDIyNCA0MC4wOTQ3SDE0Ljg1MzRDMTIuMTQwMSA0MC4wOTQ3IDkuOTQwNTcgMzcuODk1MSA5Ljk0MDU3IDM1LjE4MTlWMjMuODAwNFpNMjUuMjYwNSAzNi4wNDk1SDMwLjg0MDNDMjkuMjc1NiAzNC42MzkyIDI2LjgwMjQgMzQuNjMyOCAyNS4yNjA1IDM2LjA0OTVaTTQxLjc1MTUgMjkuNDkxQzQxLjc1MTUgMzIuMDUzMSAzOS42NzQ1IDM0LjEzMDEgMzcuMTEyNCAzNC4xMzAxQzM0LjU1MDMgMzQuMTMwMSAzMi40NzM0IDMyLjA1MzEgMzIuNDczNCAyOS40OTFDMzIuNDczNCAyNi45MjkgMzQuNTUwMyAyNC44NTIgMzcuMTEyNCAyNC44NTJDMzkuNjc0NSAyNC44NTIgNDEuNzUxNSAyNi45MjkgNDEuNzUxNSAyOS40OTFaTTIzLjUyNjUgMjkuNDkxMUMyMy41MjY1IDMyLjA1MzIgMjEuNDQ5NSAzNC4xMzAyIDE4Ljg4NzQgMzQuMTMwMkMxNi4zMjUzIDM0LjEzMDIgMTQuMjQ4NCAzMi4wNTMyIDE0LjI0ODQgMjkuNDkxMUMxNC4yNDg0IDI2LjkyOSAxNi4zMjUzIDI0Ljg1MjEgMTguODg3NCAyNC44NTIxQzIxLjQ0OTUgMjQuODUyMSAyMy41MjY1IDI2LjkyOSAyMy41MjY1IDI5LjQ5MTFaTTE3LjIzMDUgMjkuNjU2N0MxNy4yMzA1IDI4Ljk5ODYgMTcuNDU3MiAyOC41NTU3IDE3Ljc1MDMgMjguMjc1N0MxOC4wNTE5IDI3Ljk4NzYgMTguNDYzNSAyNy44MzQyIDE4Ljg4NzMgMjcuODM0MkMxOS4yNTMzIDI3LjgzNDIgMTkuNTUgMjcuNTM3NSAxOS41NSAyNy4xNzE1QzE5LjU1IDI2LjgwNTUgMTkuMjUzMyAyNi41MDg4IDE4Ljg4NzMgMjYuNTA4OEMxOC4xNTEyIDI2LjUwODggMTcuNDAzIDI2Ljc3NDUgMTYuODM0OCAyNy4zMTcyQzE2LjI1ODEgMjcuODY4MSAxNS45MDUgMjguNjY3OCAxNS45MDUgMjkuNjU2N0MxNS45MDUgMzAuMDIyNyAxNi4yMDE3IDMwLjMxOTQgMTYuNTY3NyAzMC4zMTk0QzE2LjkzMzcgMzAuMzE5NCAxNy4yMzA1IDMwLjAyMjcgMTcuMjMwNSAyOS42NTY3Wk0zNS4xMjQxIDI5LjY1NjdDMzUuMTI0MSAyOC45OTg2IDM1LjM1MDkgMjguNTU1NyAzNS42NDQgMjguMjc1N0MzNS45NDU2IDI3Ljk4NzYgMzYuMzU3MSAyNy44MzQyIDM2Ljc4MDkgMjcuODM0MkMzNy4xNDY5IDI3LjgzNDIgMzcuNDQzNiAyNy41Mzc1IDM3LjQ0MzYgMjcuMTcxNUMzNy40NDM2IDI2LjgwNTUgMzcuMTQ2OSAyNi41MDg4IDM2Ljc4MDkgMjYuNTA4OEMzNi4wNDQ5IDI2LjUwODggMzUuMjk2NyAyNi43NzQ1IDM0LjcyODUgMjcuMzE3MkMzNC4xNTE3IDI3Ljg2ODEgMzMuNzk4NiAyOC42Njc4IDMzLjc5ODYgMjkuNjU2N0MzMy43OTg2IDMwLjAyMjcgMzQuMDk1MyAzMC4zMTk0IDM0LjQ2MTQgMzAuMzE5NEMzNC44Mjc0IDMwLjMxOTQgMzUuMTI0MSAzMC4wMjI3IDM1LjEyNDEgMjkuNjU2N1oiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo=',
			30
		);

		add_submenu_page(
			'viarlive',
			esc_html__( 'Get Started', 'virtual-tours' ),
			esc_html__( 'Get Started', 'virtual-tours' ),
			'manage_options',
			'viarlive',
			'ViarLiveDashboard::viarlive_welcome_html'
		);

		add_submenu_page(
			'viarlive',
			esc_html__( 'Tours', 'virtual-tours' ),
			esc_html__( 'Tours', 'virtual-tours' ),
			'manage_options',
			'viarlive_tours',
			'ViarLiveDashboard::viarlive_tours_list_html'
		);

		add_submenu_page(
			'viarlive',
			esc_html__( 'Settings', 'virtual-tours' ),
			esc_html__( 'Settings', 'virtual-tours' ),
			'manage_options',
			'viarlive_settings',
			'ViarLiveDashboard::viarlive_settings_html'
		);

		// Settings Fields.
		register_setting( 'viarlive', 'viarlive_settings', array( 'sanitize_callback' => 'viarLiveDashboard::viarlive_sanitize_input' ) );

		add_settings_section(
			'viarlive_api_section',
			esc_html__( 'Setup Viar.Live connection', 'virtual-tours' ),
			'',
			'viarlive'
		);

		add_settings_field(
			'viarlive_api_field',
			esc_html__( 'API Key', 'virtual-tours' ),
			'ViarLiveDashboard::viarlive_api_field_cb',
			'viarlive',
			'viarlive_api_section',
			array(
				'label_for' => 'viarlive_api_key',
			)
		);
	}

	/**
	 * Sanitize input.
	 *
	 * @param array $inputs Inputs.
	 * @return array
	 */
	public static function viarlive_sanitize_input( array $inputs ) {
		$options         = get_option( 'viarlive_settings' );
		$sanitized_input = array();

		foreach ( $inputs as $input_key => $input_value ) {
			if ( empty( $input_value ) && isset( $options[ $input_key ] ) ) {
				$sanitized_input[ $input_key ] = $options[ $input_key ];
			} elseif ( ! empty( $input_value ) ) {
					$input_value                   = str_replace( ' ', '', $input_value );
					$input_value                   = trim( wp_strip_all_tags( stripslashes( $input_value ) ) );
					$input_value                   = sanitize_text_field( $input_value );
					$sanitized_input[ $input_key ] = $input_value;
			} else {
				$sanitized_input[ $input_key ] = false;
			}
		}

		return $sanitized_input;
	}

	/**
	 * API field callback.
	 *
	 * @param array $args Arguments.
	 * @return void
	 */
	public static function viarlive_api_field_cb( array $args ) {
			$options = get_option( 'viarlive_settings' ); ?>
			<div class="api_key_container">
				<input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" name="viarlive_settings[<?php echo esc_attr( $args['label_for'] ); ?>]" placeholder="<?php echo ! empty( $options[ $args['label_for'] ] ) ? '************' : ''; ?>" class="form-control" />
			</div>
			<p id="<?php echo esc_attr( $args['label_for'] ); ?>_description">
					<?php esc_html_e( 'Your API Key can be found on Viar.Live', 'virtual-tours' ); ?> <a href="<?php echo esc_url( VIARLIVE_URL_GETAPI ); ?>" target="_blank"><strong><?php esc_html_e( 'settings page', 'virtual-tours' ); ?></strong></a>
			</p>
			<?php
	}

	/**
	 * Header.
	 *
	 * @return void
	 */
	public static function viarlive_page_header() {

		include_once VIARLIVE_DIR . 'vendor/templates/header.php';
	}

	/**
	 * Welcome.
	 *
	 * @return void
	 */
	public static function viarlive_welcome_html() {

		include_once VIARLIVE_DIR . 'vendor/templates/welcome.php';
	}

	/**
	 * List.
	 *
	 * @return void
	 */
	public static function viarlive_tours_list_html() {

		include_once VIARLIVE_DIR . 'vendor/class-viarlivetours.php';
		$tours = ViarLiveTours::get_tours();

		include_once VIARLIVE_DIR . 'vendor/templates/tours.php';
	}

	/**
	 * Settings.
	 *
	 * @return void
	 */
	public static function viarlive_settings_html() {

		// Content for Administrators only.
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		include_once VIARLIVE_DIR . 'vendor/templates/settings.php';
	}
}
