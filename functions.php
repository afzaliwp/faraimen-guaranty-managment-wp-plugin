<?php
add_action( 'admin_enqueue_scripts', 'fi_load_admin_assets' );
function fi_load_admin_assets() {
	$current_screen = get_current_screen();
	if ( str_contains( $current_screen->base, 'fi-guaranty' ) ) {
		wp_register_style( 'fi-admin', FI_CSS . 'fi-admin.css', '', '1.0.0' );
		wp_enqueue_style( 'fi-admin' );
	}
}

add_action( 'wp_enqueue_scripts', 'fi_load_front_assets' );
function fi_load_front_assets() {
	wp_register_style( 'fi-front', FI_CSS . 'fi-front.css', '', '1.0.0' );
	wp_enqueue_style( 'fi-front' );
}

function fi_add_codes_from_admin( $codes, $type ) {
	global $wpdb;
	$tp             = $wpdb->prefix;
	$exploded_codes = array_filter( explode( PHP_EOL, $codes ) );
	$unique_codes   = array_unique( $exploded_codes );

	$codes_count = count( $unique_codes );

	$base_query  = 'INSERT INTO ' . $tp . 'fi_guaranty (code, type) VALUES';
	$value_query = '';

	foreach ( $unique_codes as $index => $code ) {
		$value_query .= ' (' . $code . ', ' . $type . ')';
		if ( $index != array_key_last( $unique_codes ) ) {
			$value_query .= ', ';
		}
	}
	$query = $base_query . $value_query;

	$result = $wpdb->query( $query );

	if ( $result ) {
		return [ 'type' => 'success', 'message' => 'کد ها با موفقیت اضافه شدند.' ];
	}

	return [ 'type' => 'error', 'message' => 'خطایی پیش آمده است. لطفا ورودی ها را چک کنید و مجددا اقدام کنید.' ];
}

function fi_get_codes() {
	$page   = $_GET['codes-page'] ?: 1;
	$count  = 50;
	$offset = $count * ( $page - 1 );

	global $wpdb;
	$tp              = $wpdb->prefix;
	$all_codes_count = $wpdb->get_var( "SELECT COUNT(ID) FROM {$tp}fi_guaranty" );
	$page_count      = ceil( $all_codes_count / $count );
	$results         = $wpdb->get_results( "SELECT * FROM {$tp}fi_guaranty ORDER BY `ID` DESC LIMIT {$offset}, {$count}" );

	return [
		'all'        => $all_codes_count,
		'codes'      => $results,
		'pagination' => [ 'pages' => $page_count, 'current' => $page ]
	];
}

function fi_delete_codes( $code_ids ) {

	if ( empty( $code_ids ) ) {
		return false;
	}
	global $wpdb;
	$tp = $wpdb->prefix;

	$ids = '';
	foreach ( $code_ids as $index => $id ) {
		$ids .= $id;
		if ( $index != array_key_last( $code_ids ) ) {
			$ids .= ', ';
		}
	}

	return $wpdb->query( "DELETE FROM {$tp}fi_guaranty WHERE ID IN ({$ids});" );
}

function fi_get_requests() {
	$page   = $_GET['codes-page'] ?: 1;
	$count  = 50;
	$offset = $count * ( $page - 1 );

	global $wpdb;
	$tp              = $wpdb->prefix;
	$all_codes_count = $wpdb->get_var( "SELECT COUNT(ID) FROM {$tp}fi_guaranty WHERE `request` != null" );
	$page_count      = ceil( $all_codes_count / $count );
	$results         = $wpdb->get_results( "SELECT * FROM {$tp}fi_guaranty WHERE `request` != null ORDER BY `started_at` DESC LIMIT {$offset}, {$count}" );

	return [
		'all'        => $all_codes_count,
		'codes'      => $results,
		'pagination' => [ 'pages' => $page_count, 'current' => $page ]
	];
}

function fi_gregorian_to_jalali( $date, $separator = '-' ) {
	include_once FI_ADMIN . 'jdf.php';
	$separated_date = explode( $separator, $date );

	return gregorian_to_jalali( $separated_date[0], $separated_date[1], $separated_date[2], $separator );
}

function fi_save_public_form_data( $data ) {
	$code     = $data['guaranty_code'];
	$name     = $data['customer_name'];
	$phone    = $data['customer_phone'];
	$customer = [ 'name' => $name, 'phone' => $phone ];
	global $wpdb;
	$tp = $wpdb->prefix;

	return $wpdb->update( $tp . 'fi_guaranty',
		[ 'customer' =>  maybe_serialize($customer)],
		[ 'type' => INSTALLER, 'code' => $code ],
		[ '%s' ],
		[ '%d', '%s' ]
	);
}

function fi_get_inquiry_result($code){
	global $wpdb;
	$tp = $wpdb->prefix;

	return $wpdb->get_row("SELECT * FROM {$tp}fi_guaranty WHERE code='{$code}' LIMIT 1");
}
