<?php
/**
 * ViarLive - API
 *
 * @package    ViarLiveWPPlugin
 * @author     Nick Shtansky <nshtansky@fusionworks.md>
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Class ViarLiveAPI
 */
class ViarLiveAPI {

	/**
	 * Get tours from Viar.Live API
	 *
	 * @return array
	 */
	public static function viarlive_api_get_tours(): array {
		$page  = 0;
		$items = array();
		while ( $new_items = self::viarlive_api_get_page( $page ) ) {
			$items = array_merge( $items, $new_items );
			++$page;
		}
		return $items;
	}

	/**
	 * Get single page of results from Viar.Live API
	 *
	 * @param int $page Page number.
	 * @return array|null
	 */
	private static function viarlive_api_get_page( int $page ): ?array {
		$options = get_option( 'viarlive_settings' );
		if ( ! empty( $options['viarlive_api_key'] ) ) {

			$items = array();
			$url   = VIARLIVE_URL_API . 'api/v1/tour/self?size=100&page=' . $page;

			$response = wp_remote_request(
				$url,
				array(
					'headers' => array(
						'x-api-key' => $options['viarlive_api_key'],
					),
				)
			);

			if ( ! is_wp_error( $response ) && wp_remote_retrieve_response_code( $response ) === 200 ) {
				$body = wp_remote_retrieve_body( $response );
				$data = json_decode( $body, true );

				if ( isset( $data['page'] ) && is_array( $data['page'] ) ) {
					foreach ( $data['page'] as $item ) {
						$items[] = array(
							'preview_img' => sanitize_text_field( VIARLIVE_IMG_BASE . $item['startingPoint']['previewUrl'] ),
							'name'        => sanitize_text_field( $item['title'] ),
							'url'         => sanitize_text_field( VIARLIVE_URL_EMBED . $item['id'] ),
							'slug'        => sanitize_text_field( $item['id'] ),
							'date'        => gmdate( 'Y-m-d H:i:s', round( $item['createdAt'] / 1000 ) ),
							'views'       => sanitize_text_field( $item['views']['total'] ),
							'spheres'     => sanitize_text_field( $item['sphereCount'] ),
							'visibility'  => sanitize_text_field( $item['visibility'] ),
						);
					}
				}

				return $items;

			} else {
				return null;
			}
		}
		return null;
	}
}
