<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Uninstall
 *
 * @return void
 */
function viarlive_uninstall() {
	global $wpdb;

	$table_name = $wpdb->prefix . 'vl_tours';
	$query      = "DROP table $table_name";

	$wpdb->query( $query );
	delete_option( 'viarlive_settings' );
}

viarlive_uninstall();
