<?php
/**
 * ViarLive - Tours
 *
 * @package    ViarLiveWPPlugin
 * @author     Nick Shtansky <nshtansky@fusionworks.md>
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

require_once VIARLIVE_DIR . 'vendor/class-viarliveapi.php';

/**
 * Class ViarLiveTours
 */
class ViarLiveTours {

	/**
	 * Returns list of tours.
	 *
	 * @return array|false|object|stdClass[]
	 */
	public static function get_tours() {
		if ( isset( $_POST['action'] ) && filter_input( INPUT_POST, 'action', FILTER_SANITIZE_STRING ) === 'sync_tours' ) {
			self::flush_tours();
		}

		if ( ! self::get_tours_from_db() ) {
			$tours = self::fetch_tours_from_viarlive();

			if ( ! empty( $tours ) ) {
				self::cache_viarlive_tours( $tours );
			} else {
				return array();
			}
		}

		return self::get_tours_from_db();
	}

	/**
	 * Get only visible tours
	 *
	 * @return array|false|object|stdClass[]
	 */
	public static function get_visible_tours() {
		$tours = self::get_tours();
		return array_filter(
			$tours,
			function ( $tour ) {
				return 'PRIVATE' !== $tour->visibility;
			}
		);
	}

	/**
	 * Get tours from DB
	 *
	 * @return array|false|object|stdClass[]
	 */
	private static function get_tours_from_db() {
		global $wpdb;
		$table_name = self::get_viarlive_table();

		if ( ! self::viarlive_tours_table_exists() ) {
			return false;
		}

		$tours = wp_cache_get( 'tours', 'viarlive' );
		if ( ! $tours ) {
			$query = "SELECT * FROM $table_name";
			$tours = $wpdb->get_results( $query );

			if ( ! empty( $tours ) ) {
				wp_cache_set( 'tours', $tours, 'viarlive' );
				return $tours;
			}
		} else {
			return $tours;
		}

		return false;
	}

	/**
	 * Check if tours table exists
	 *
	 * @return bool
	 */
	private static function viarlive_tours_table_exists(): bool {
		global $wpdb;
		$table_name = self::get_viarlive_table();

		return ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) === $table_name );
	}

	/**
	 * Saves tours to DB
	 *
	 * @param array $tours List of tours.
	 * @return void
	 */
	private static function cache_viarlive_tours( array $tours ): void {
		global $wpdb;

		if ( ! empty( $tours ) ) {

			self::create_viarlive_tours_table();

			foreach ( $tours as $tour ) {
				$wpdb->insert( self::get_viarlive_table(), $tour );
			}
		}
	}

	/**
	 * Fetch tours from Viar.Live API
	 *
	 * @return array|false
	 */
	public static function fetch_tours_from_viarlive() {
		self::flush_tours();

		$tours = viarLiveAPI::viarlive_api_get_tours();

		if ( ! empty( $tours ) ) {
			return $tours;
		}

		return false;
	}

	/**
	 * Creates a table
	 *
	 * @return void
	 */
	public static function create_viarlive_tours_table() {
		$table_name      = self::get_viarlive_table();
		$charset_collate = self::get_viarlive_table_charset_collate();

		$sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                preview_img varchar(255) NOT NULL,
                name varchar(255) NOT NULL,
                url varchar(255) NOT NULL,
                slug tinytext NOT NULL,
                date datetime NOT NULL,
                views mediumint(9) NOT NULL,
                spheres tinyint NOT NULL,
                visibility tinytext NOT NULL,
                    PRIMARY KEY  (id)
                ) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		maybe_create_table( $table_name, $sql );
	}

	/**
	 * Get table name
	 *
	 * @return string
	 */
	private static function get_viarlive_table(): string {
		global $wpdb;
		return $wpdb->prefix . 'vl_tours';
	}

	/**
	 * Get table charset collate.
	 *
	 * @return string
	 */
	private static function get_viarlive_table_charset_collate(): string {
		global $wpdb;
		return $wpdb->get_charset_collate();
	}

	/**
	 * Listener.
	 *
	 * @return void
	 */
	public static function sync_tours_button_listener() {
		if ( isset( $_REQUEST['viarlive_sync_tours'] ) ) {
			self::sync_tours();
		}
	}

	/**
	 * Synchronize tours from Viar.Live
	 *
	 * @return void
	 */
	private static function sync_tours() {
		self::flush_tours();
		$tours = self::fetch_tours_from_viarlive();
		self::cache_viarlive_tours( $tours );
	}

	/**
	 * Flushes tours from cache
	 *
	 * @return void
	 */
	private static function flush_tours(): void {
		global $wpdb;
		$table_name = self::get_viarlive_table();
		$query      = "TRUNCATE table $table_name";

		$wpdb->query( $query );
	}
}
