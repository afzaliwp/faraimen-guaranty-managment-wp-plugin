<?php

function fi_load_assets() {
	$current_screen = get_current_screen();

	if ( str_contains( $current_screen->base, 'fi-guaranty' ) ) {
		wp_register_style( 'fi-admin', FI_CSS . 'fi-admin.css', '', '1.0.0' );
		wp_enqueue_style( 'fi-admin' );
	}
}

add_action( 'admin_enqueue_scripts', 'fi_load_assets' );


function fi_add_codes_from_admin( $codes, $type ) {
	global $wpdb;
	$tp             = $wpdb->prefix;
	$exploded_codes = array_filter( explode( PHP_EOL, $codes ) );
	$unique_codes   = array_unique( $exploded_codes );

	$codes_count = count($unique_codes);
	$last_code = $unique_codes[$codes_count - 1];

	$base_query  = 'INSERT INTO ' . $tp . 'fi_guaranty (code, type) VALUES';
	$value_query = '';

	foreach ( $unique_codes as $index => $code ) {
		$value_query .= ' (' . $code . ', ' . $type . ')';
		if ($index != array_key_last($unique_codes)){
			$value_query .= ', ';
		}
	}
	$query = $base_query . $value_query;

	$result = $wpdb->query( $query);

	if ($result){
		return ['type' => 'success', 'message' => 'کد ها با موفقیت اضافه شدند.'];
	}
	return ['type' => 'error', 'message' => 'خطایی پیش آمده است. لطفا ورودی ها را چک کنید و مجددا اقدام کنید.'];
}