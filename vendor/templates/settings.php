<div class="viarlive_welcome_page viarlive_main_container" style="background-image: url(<?php echo esc_url( VIARLIVE_URL ); ?>/assets/img/container.png);">
	<?php self::viarlive_page_header( array( 'active' => 'settings' ) ); ?>

	<div class="wp_messages">
		<?php
			// Display wp notifications.
		if ( isset( $_GET['settings-updated'] ) ) {
			add_settings_error( 'viarlive_messages', 'viarlive_message', esc_html__( 'Settings Saved', 'virtual-tours' ), 'updated' );
		}
			settings_errors( 'viarlive_messages' );
		?>
	</div>
	<div class="wrapper">
		<div class="viarlive_settings_container">
			<form action="options.php" method="post">
				<?php
				settings_fields( 'viarlive' );
				do_settings_sections( 'viarlive' );
				submit_button( 'Save Settings' );
				?>
			</form>
			<img class="decor" src="<?php echo esc_url( VIARLIVE_URL . '/assets/img/bg.png' ); ?>" alt="<?php esc_attr__( 'Decor', 'virtual-tours' ); ?>" />
		</div>
	</div>
</div>
