<div class="viarlive-header">
	<div class="logo">
		<img src="<?php echo esc_url( VIARLIVE_URL . 'assets/svg/white_logo.svg' ); ?>" alt="<?php esc_html_e( 'Embed viar.live', 'virtual-tours' ); ?> logo" />
	</div>
	<div class="nav">
		<ul>
			<li class="started_link
			<?php
			if ( ! empty( $viarlive_args['active'] ) && 'starter' === $viarlive_args['active'] ) {
				echo 'active'; }
			?>
			">
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=viarlive' ) ); ?>"><?php esc_html_e( 'Help', 'virtual-tours' ); ?></a>
			</li>
			<li class="tours_link
			<?php
			if ( ! empty( $viarlive_args['active'] ) && 'tours' === $viarlive_args['active'] ) {
				echo 'active'; }
			?>
			">
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=viarlive_tours' ) ); ?>"><?php esc_html_e( 'Tours', 'virtual-tours' ); ?></a>
			</li>
			<li class="settings_link
			<?php
			if ( ! empty( $viarlive_args['active'] ) && 'settings' === $viarlive_args['active'] ) {
				echo 'active'; }
			?>
			">
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=viarlive_settings' ) ); ?>"><?php esc_html_e( 'Settings', 'virtual-tours' ); ?></a>
			</li>
		</ul>
	</div>
</div>
