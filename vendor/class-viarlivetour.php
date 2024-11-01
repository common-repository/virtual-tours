<?php
/**
 * ViarLive - Single tour
 *
 * @package    ViarLiveWPPlugin
 * @author     Nick Shtansky <nshtansky@fusionworks.md>
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Class ViarLiveTour
 */
class ViarLiveTour {

	/**
	 * Preview image URL
	 *
	 * @var string
	 */
	private $preview_img;
	/**
	 * Name
	 *
	 * @var string
	 */
	private $name;
	/**
	 * URL
	 *
	 * @var string
	 */
	private $url;
	/**
	 * Slug
	 *
	 * @var string
	 */
	private $slug;
	/**
	 * Date
	 *
	 * @var string
	 */
	private $date;
	/**
	 * Number of views
	 *
	 * @var int
	 */
	private $views;
	/**
	 * Number of spheres
	 *
	 * @var int
	 */
	private $spheres;
	/**
	 * Visibility type
	 *
	 * @var string
	 */
	private $visibility;

	/**
	 * Constructor.
	 *
	 * @param string $preview_img Preview image URL.
	 * @param string $name Name.
	 * @param string $url URL.
	 * @param string $slug Slug.
	 * @param string $date Date.
	 * @param int    $views Number of views.
	 * @param int    $spheres Number of spheres.
	 * @param string $visibility Visibility type.
	 */
	public function __construct( string $preview_img, string $name, string $url, string $slug, string $date, int $views, int $spheres, string $visibility ) {
		$this->preview_img = $preview_img;
		$this->name        = $name;
		$this->url         = $url;
		$this->slug        = $slug;
		$this->date        = $date;
		$this->views       = $views;
		$this->spheres     = $spheres;
		$this->visibility  = $visibility;
	}

	/**
	 * Getter
	 *
	 * @return string
	 */
	public function get_tour_preview_img(): string {
		return $this->preview_img;
	}

	/**
	 * Getter
	 *
	 * @return string
	 */
	public function get_tour_name(): string {
		return $this->name;
	}

	/**
	 * Getter
	 *
	 * @return string
	 */
	public function get_tour_url(): string {
		return $this->url;
	}

	/**
	 * Getter
	 *
	 * @return string
	 */
	public function get_tour_slug(): string {
		return $this->slug;
	}

	/**
	 * Getter
	 *
	 * @return string
	 */
	public function get_tour_date(): string {
		return $this->date;
	}

	/**
	 * Getter
	 *
	 * @return int
	 */
	public function get_tour_views(): int {
		return $this->views;
	}

	/**
	 * Getter
	 *
	 * @return int
	 */
	public function get_tour_spheres(): int {
		return $this->spheres;
	}

	/**
	 * Getter
	 *
	 * @return string
	 */
	public function get_tour_visibility(): string {
		return $this->visibility;
	}
}
