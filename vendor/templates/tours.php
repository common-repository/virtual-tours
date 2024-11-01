<div class="viarlive_tours_page viarlive_main_container" style="background-image: url(<?php echo esc_url( VIARLIVE_URL ); ?>/assets/img/container.png);">
	<?php self::viarlive_page_header( array( 'active' => 'tours' ) ); ?>

	<div class="wrapper">
		<?php if ( empty( $tours ) ) { ?>
		<div class="viarlive-notours"> <?php esc_html_e( 'No Tours in your account', 'virtual-tours' ); ?> </div>
													<?php
		} else {
			?>
			<table class="viarlive-table">
				<thead>
					<tr>
						<td class="preview-image"><?php esc_html_e( 'Preview', 'virtual-tours' ); ?></td>
						<td class="name-column"><?php esc_html_e( 'Name', 'virtual-tours' ); ?></td>
						<td class="shortcode-column"><?php esc_html_e( 'Shortcode', 'virtual-tours' ); ?></td>
						<td class="date-column"><?php esc_html_e( 'Date', 'virtual-tours' ); ?></td>
						<td class="spheres-column"><?php esc_html_e( 'Spheres', 'virtual-tours' ); ?></td>
						<td class="spheres-column"><?php esc_html_e( 'Visibility', 'virtual-tours' ); ?></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $tours as $tour ) { ?>
						<tr>
							<td class="preview-image">
								<?php if ( ! empty( $tour->preview_img ) ) { ?>
									<img src="<?php echo esc_url( $tour->preview_img ); ?>" alt="<?php esc_attr_e( 'Preview', 'virtual-tours' ); ?>" />
								<?php } ?>
							</td>
							<td class="name-column"><?php echo esc_html( $tour->name ); ?></td>
							<td class="shortcode-column">
								<?php if ( ! empty( $tour->url ) ) { ?>
									<div class="shortcode_container copy_shortcode_button">
										<input type="text" value="[viarlive url=&quot;<?php echo esc_url( $tour->url ); ?>&quot; width=&quot;800&quot; height=&quot;500&quot;]"></td>
									</div>
								<?php } ?>
							<td><?php echo esc_html( $tour->date ); ?></td>
							<td>
							<?php
							if ( ! empty( $tour->spheres ) ) {
								echo esc_html( $tour->spheres );}
							?>
							</td>
							<td>
							<?php
							if ( ! empty( $tour->visibility ) ) {
								echo esc_html( $tour->visibility );}
							?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<td><?php esc_html_e( 'Preview', 'virtual-tours' ); ?></td>
						<td><?php esc_html_e( 'Name', 'virtual-tours' ); ?></td>
						<td><?php esc_html_e( 'Shortcode', 'virtual-tours' ); ?></td>
						<td><?php esc_html_e( 'Date', 'virtual-tours' ); ?></td>
						<td><?php esc_html_e( 'Spheres', 'virtual-tours' ); ?></td>
						<td><?php esc_html_e( 'Visibility', 'virtual-tours' ); ?></td>
					</tr>
				</tfoot>
			</table>
			<?php } ?>
		<div class="sync_container">
			<form action="<?php echo esc_url( get_the_permalink() ); ?>" method="post">
				<input type="hidden" name="action" value="sync_tours" />
				<button type="submit" id="viarlive-sync-tours">Sync</button>
			</form> <span><?php esc_html_e( 'Import all tours from your Viar.Live panel.', 'virtual-tours' ); ?></span>
		</div>
	</div>
</div>
