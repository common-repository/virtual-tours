<?php
/**
 * Class ViarLiveElementor
 *
 * @package    ViarLiveWPPlugin
 * @author     Nick Shtansky <nshtansky@fusionworks.md>
 */

use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class ViarLiveElementor
 */
class ViarLiveElementor {
	const MINIMUM_ELEMENTOR_VERSION = '3.7.0';
	const MINIMUM_PHP_VERSION       = '7.2';

	/**
	 * Instance of this class
	 *
	 * @var self|null
	 */
	private static $instance = null;

	/**
	 * Instance
	 * Ensures only one instance of the class is loaded or can be loaded.
	 */
	public static function instance(): ?ViarLiveElementor {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {

		add_action( 'after_setup_theme', array( $this, 'init' ) );
	}

	/**
	 * Initialize
	 */
	public function init() {

		// Check if Elementor installed and activated.
		if ( ! did_action( 'elementor/loaded' ) ) {
			return;
		}

		// Check for a required Elementor version.
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for a required PHP version.
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

		// Add actions.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'init_widgets' ) );

		add_action(
			'elementor/editor/before_enqueue_scripts',
			function () {
				wp_enqueue_style( 'viarLiveElementor', plugins_url( '../assets/css/elementor.css', __FILE__ ), array(), '1.0.1' );
			}
		);
	}


	/**
	 * Admin notices
	 * Warning when the site doesn't have a minimum required Elementor version.
	 */
	public function admin_notice_minimum_elementor_version() {
		printf(
			'<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',
			esc_html__( 'Theme requires Elementor version 3.7.0 or greater.', 'virtual-tours' )
		);
	}

	/**
	 * Admin notices
	 * Warning when the site doesn't have a minimum required PHP version.
	 */
	public function admin_notice_minimum_php_version() {
		printf(
			'<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',
			esc_html__( 'Theme requires PHP version 7,2 or greater.', 'virtual-tours' )
		);
	}

	/**
	 * Init Widgets
	 * Include widget files and register them
	 */
	public function init_widgets() {
		require_once __DIR__ . '/widgets/viarlive_embed/class-elementor-widget-viarlive-embed.php';

		$class = '\Elementor_Widget_ViarLive_Embed';
		Plugin::instance()->widgets_manager->register( new $class() );
	}
}

ViarLiveElementor::instance();
