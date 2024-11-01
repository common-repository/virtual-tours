<div class="viarlive_welcome_page viarlive_main_container"
	style="background-image: url(<?php echo esc_url( VIARLIVE_URL ); ?>/assets/img/background.png);">
	<?php self::viarlive_page_header( array( 'active' => 'starter' ) ); ?>

	<div class="landing_view">
		<div class="left_container">
			<div class="content-container">
				<h1>Virtual Tours</h1>
				<p>Unleashing Extraordinary Real Estate Possibilities. The easiest way to create and share 360˚
					virtual reality tours. WordPress plugins are powerful tools that significantly enhance the
					capabilities of your website. With their ability to add features, improve
				</p>
				<h2>Steps to get started</h2>
			</div>
			<div class="steps_container">
				<div class="step">
					<div class="icon">
						<img src="<?php echo esc_url( VIARLIVE_URL . '/assets/svg/ic1.svg' ); ?>"
							alt="<?php esc_attr_e( 'Icon', 'virtual-tours' ); ?>"/>
						<span>1</span>
					</div>
					<div class="title"><?php esc_html_e( 'Create account', 'virtual-tours' ); ?></div>
					<a class="link" href="<?php echo esc_url( VIARLIVE_URL_LOGIN ); ?>" target="_blank">Link</a>
				</div>
				<div class="step">
					<div class="icon">
						<img src="<?php echo esc_url( VIARLIVE_URL . '/assets/svg/ic2.svg' ); ?>"
							alt="<?php esc_attr_e( 'Icon', 'virtual-tours' ); ?>"/>
						<span>2</span>
					</div>
					<div class="title"><?php esc_html_e( 'Connect with API key', 'virtual-tours' ); ?></div>
					<a class="link" href="<?php echo esc_url( admin_url( 'admin.php?page=viarlive_settings' ) ); ?>">Link</a>
				</div>
				<div class="step">
					<div class="icon">
						<img src="<?php echo esc_url( VIARLIVE_URL . '/assets/svg/ic3.svg' ); ?>"
							alt="<?php esc_attr_e( 'Icon', 'virtual-tours' ); ?>"/>
						<span>3</span>
					</div>
					<div class="title"><?php esc_html_e( 'Create content', 'virtual-tours' ); ?></div>
					<a class="link" href="<?php echo esc_url( VIARLIVE_URL_CREATE_CONTENT ); ?>" target="_blank">Link</a>
				</div>
				<div class="step">
					<div class="icon">
						<img src="<?php echo esc_url( VIARLIVE_URL . '/assets/svg/ic4.svg' ); ?>"
							alt="<?php esc_attr_e( 'Icon', 'virtual-tours' ); ?>"/>
						<span>4</span>
					</div>
					<div class="title"><?php esc_html_e( 'Place it on your pages', 'virtual-tours' ); ?></div>
				</div>
			</div>
			<div class="bottom-content">
				*Unleashing Extraordinary Real Estate Possibilities. The easiest way to create and share 360˚ virtual
				reality tours. WordPress plugins are powerful tools that significantly enhance the capabilities of your
				website. With their ability to add features, improve
			</div>
		</div>
		<div class="right_container"
			style="background-image:url('<?php echo esc_url( VIARLIVE_URL ); ?>/assets/img/building.png');"></div>
	</div>
</div>
