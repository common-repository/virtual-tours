<?php
/**
 * Plugin Name: Viar.Live - Virtual Tour Builder
 * Plugin URI: https://viar.live/
 * Description: Transform your WordPress site with Viar.Live Virtual Tour Builder! Create immersive 360° tours, enhance engagement with interactive hotspots, and boost your SEO. Ideal for real estate, tourism, and more. Easy integration and user-friendly.
 * Version: 1.0.1
 * Author: Viar.Live
 * Author URI: https://viar.live
 * License: GPLv2 or later
 *
 * @package    ViarLiveWPPlugin
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

defined( 'VIARLIVE_DIR' ) || define( 'VIARLIVE_DIR', plugin_dir_path( __FILE__ ) );
defined( 'VIARLIVE_URL' ) || define( 'VIARLIVE_URL', plugin_dir_url( __FILE__ ) );
defined( 'VIARLIVE_URL_DOCS' ) || define( 'VIARLIVE_URL_DOCS', 'https://medium.com/viarlive' );
defined( 'VIARLIVE_URL_YOUTUBE' ) || define( 'VIARLIVE_URL_YOUTUBE', 'https://www.youtube.com/@viarlive' );
defined( 'VIARLIVE_URL_SUPPORT' ) || define( 'VIARLIVE_URL_SUPPORT', 'support@viar.live' );
defined( 'VIARLIVE_URL_GETAPI' ) || define( 'VIARLIVE_URL_GETAPI', getenv( 'VIARLIVE_URL_GETAPI' ) ? getenv( 'VIARLIVE_URL_GETAPI' ) : 'https://viar.live/admin/api-keys' );
defined( 'VIARLIVE_URL_LOGIN' ) || define( 'VIARLIVE_URL_LOGIN', getenv( 'VIARLIVE_URL_LOGIN' ) ? getenv( 'VIARLIVE_URL_LOGIN' ) : 'https://viar.live/admin/dashboard' );
defined( 'VIARLIVE_URL_CREATE_CONTENT' ) || define( 'VIARLIVE_URL_CREATE_CONTENT', getenv( 'VIARLIVE_URL_CREATE_CONTENT' ) ? getenv( 'VIARLIVE_URL_CREATE_CONTENT' ) : 'https://viar.live/admin/my-tours' );
defined( 'VIARLIVE_URL_GETPRO' ) || define( 'VIARLIVE_URL_GETPRO', 'https://viar.live/pricing/' );
defined( 'VIARLIVE_URL_API' ) || define( 'VIARLIVE_URL_API', getenv( 'VIARLIVE_URL_API' ) ? getenv( 'VIARLIVE_URL_API' ) : 'https://api.prod.viar.live/' );
defined( 'VIARLIVE_URL_EMBED' ) || define( 'VIARLIVE_URL_EMBED', getenv( 'VIARLIVE_URL_EMBED' ) ? getenv( 'VIARLIVE_URL_EMBED' ) : 'https://viar.live/embed/tour/' );
defined( 'VIARLIVE_IMG_BASE' ) || define( 'VIARLIVE_IMG_BASE', getenv( 'VIARLIVE_IMG_BASE' ) ? getenv( 'VIARLIVE_IMG_BASE' ) : 'https://d2cvrduao46qsl.cloudfront.net/' );

require_once VIARLIVE_DIR . 'vendor/class-viarliveadmin.php';
require_once VIARLIVE_DIR . 'vendor/class-viarlivedashboard.php';
require_once VIARLIVE_DIR . 'vendor/class-viarlivetours.php';
require_once VIARLIVE_DIR . 'shortcode/class-viarliveshortcode.php';
require_once VIARLIVE_DIR . 'widget/class-viarlive-embed-widget.php';
require_once VIARLIVE_DIR . 'elementor/class-viarliveelementor.php';
require_once VIARLIVE_DIR . 'gutenberg/viarlive-embed/viarlivegutenberg.php';

register_activation_hook( __FILE__, 'ViarLiveAdmin::on_activation' );

add_action( 'admin_enqueue_scripts', 'ViarLiveAdmin::viarlive_admin_scripts' );
add_action( 'admin_menu', 'ViarLiveDashboard::init' );
