<?php
/**
 * ViarLive - Widget
 *
 * @package    ViarLiveWPPlugin
 * @author     Nick Shtansky <nshtansky@fusionworks.md>
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

require_once VIARLIVE_DIR . 'vendor/class-viarlivetours.php'; // Get tours urls.

/**
 * Class ViarLive_Embed_Widget
 */
class ViarLive_Embed_Widget extends WP_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {

		/* Widget settings. */
		$widget_ops = array(
			'classname'   => 'viarlive_embed_widget',
			'description' => esc_html__( 'A widget that displays Viar.Live tour.', 'virtual-tours' ),
		);

		/* Widget control settings. */
		$control_ops = array(
			'width'   => 300,
			'height'  => 350,
			'id_base' => 'viarlive_embed_widget',
		);

		/* Create the widget. */
		parent::__construct( 'viarlive_embed_widget', esc_html__( 'Viar.Live Tours', 'virtual-tours' ), $widget_ops, $control_ops );
	}

	/**
	 * Display Widget
	 *
	 * @param array $args Arguments.
	 * @param array $instance Instance.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		/* Our variables from the widget settings. */
		$width    = $instance['width'];
		$height   = $instance['height'];
		$tour_url = $instance['tour_url'];

		echo wp_kses_post( $before_widget );

		// Display Widget.
		?>
			<?php
			/* Display the widget title if one was input (before and after defined by themes). */
			if ( $title ) {
				echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );
			}
			?>
			<div class="viarlive-wp-widget">
				<?php
				if ( ! empty( $tour_url ) ) {
					echo do_shortcode( '[viarlive url="' . esc_url( $tour_url ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '"]' );
				}
				?>
			</div>

		<?php
		echo wp_kses_post( $after_widget );
	}

	/**
	 * Update Widget
	 *
	 * @param array $new_instance New instance.
	 * @param array $old_instance Old instance.
	 * @return array
	 */
	public function update( $new_instance, $old_instance ): array {
		$instance = $old_instance;

		$instance['title']    = wp_strip_all_tags( $new_instance['title'] );
		$instance['tour_url'] = wp_strip_all_tags( $new_instance['tour_url'] );
		$instance['width']    = wp_strip_all_tags( $new_instance['width'] );
		$instance['height']   = wp_strip_all_tags( $new_instance['height'] );

		return $instance;
	}

	/**
	 * Widget Settings
	 *
	 * @param array $instance Instance.
	 */
	public function form( $instance ) {
		$tours = ViarLiveTours::get_tours();

		// default widget settings.
		$defaults = array(
			'title'    => esc_html__( 'Viar.Live Tour', 'virtual-tours' ),
			'width'    => 800,
			'height'   => 500,
			'tour_url' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'virtual-tours' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
					value="<?php echo esc_html( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tour_url' ) ); ?>"><?php esc_html_e( 'Select Tour:', 'virtual-tours' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'tour_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tour_url' ) ); ?>">
				<?php foreach ( $tours as $tour ) { ?>
					<option value="<?php echo esc_url( $tour->url ); ?>"><?php echo esc_html( $tour->name ); ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"><?php esc_html_e( 'Width:', 'virtual-tours' ); ?></label>
			<input type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>"
					value="<?php echo esc_attr( $instance['width'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"><?php esc_html_e( 'Height:', 'virtual-tours' ); ?></label>
			<input type="number" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"
					name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>"
					value="<?php echo esc_attr( $instance['height'] ); ?>" />
		</p>
		<?php
	}

	/**
	 * Init widgets.
	 *
	 * @return void
	 */
	public static function init_widgets() {
		register_widget( 'ViarLive_Embed_Widget' );
	}
}

add_action( 'widgets_init', 'ViarLive_Embed_Widget::init_widgets' );
