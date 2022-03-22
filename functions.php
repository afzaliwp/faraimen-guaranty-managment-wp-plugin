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
		return [ 'type' => 'success', 'message' => 'کد ها با موفقیت اضافه شدند. ' . $codes_count ];
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

function fi_get_code( $code ) {
	global $wpdb;
	$tp = $wpdb->prefix;

	return $wpdb->get_row( "SELECT * FROM {$tp}fi_guaranty WHERE `code` = {$code}" );
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
	$results         = $wpdb->get_results( "SELECT *
													FROM {$tp}fi_guaranty 
													WHERE `request` IS NOT null 
													ORDER BY `started_at` 
													DESC LIMIT {$offset}, {$count}" );

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
	$code        = $data['guaranty_code'];
	$code_exists = fi_get_code( $code );

	if ( ! $code_exists ) {
		return false;
	}

	if ( ! empty( $code_exists->customer ) || ! empty( $code_exists->installer ) ) {
		return false;
	}

	$name     = $data['customer_name'];
	$phone    = $data['customer_phone'];
	$customer = [ 'name' => $name, 'phone' => $phone ];
	global $wpdb;
	$tp = $wpdb->prefix;

	return $wpdb->update( $tp . 'fi_guaranty',
		[
			'customer'   => maybe_serialize( $customer ),
			'started_at' => wp_date( 'Y-m-d H:i:s' ),
			'ended_at'   => wp_date( 'Y-m-d H:i:s', strtotime( '+2 years' ) )
		],
		[ 'type' => CUSTOMER, 'code' => $code ],
		[ '%s', '%s', '%s' ],
		[ '%d', '%s' ]
	);
}

function fi_get_inquiry_result( $code ) {
	global $wpdb;
	$tp = $wpdb->prefix;

	return $wpdb->get_row( "SELECT * FROM {$tp}fi_guaranty WHERE code='{$code}' LIMIT 1" );
}

function fi_save_installer_form_data( $code ) {
	$code_exists = fi_get_code( $code );

	if ( ! $code_exists ) {
		return false;
	}

	if ( ! empty( $code_exists->customer ) || ! empty( $code_exists->installer ) ) {
		return false;
	}

	$user      = wp_get_current_user();
	$name      = $user->display_name;
	$user_id   = $user->ID;
	$phone     = get_user_meta( get_current_user_id(), 'billing_phone', true );
	$installer = [ 'id' => $user_id, 'name' => $name, 'phone' => $phone ];

	global $wpdb;
	$tp = $wpdb->prefix;

	return $wpdb->update( $tp . 'fi_guaranty',
		[
			'installer'  => maybe_serialize( $installer ),
			'started_at' => wp_date( 'Y-m-d H:i:s' ),
			'ended_at'   => wp_date( 'Y-m-d H:i:s', strtotime( '+2 years' ) )
		],
		[ 'type' => INSTALLER, 'code' => $code ],
		[ '%s', '%s', '%s' ],
		[ '%d', '%s' ]
	);
}

function fi_save_guaranty_request( $data ) {
	$code = $data['guaranty_code'];

	$code_exists = fi_get_code( $code );

	if ( ! $code_exists ) {
		return false;
	}

	if ( empty( $code_exists->customer ) || empty( $code_exists->installer ) ) {
		return false;
	}

	if (wp_date('Y-m-d') > $code_exists['ended_at']) {
		return false;
	}

	$user      = wp_get_current_user();
	$name      = $user->display_name;
	$user_id   = $user->ID;
	$phone     = get_user_meta( get_current_user_id(), 'billing_phone', true );
	$installer = [ 'id' => $user_id, 'name' => $name, 'phone' => $phone ];

	global $wpdb;
	$tp = $wpdb->prefix;

	return $wpdb->update( $tp . 'fi_guaranty',
		[
			'installer' => maybe_serialize( $installer ),
			'request'   => $data['explanation']
		],
		[ 'type' => INSTALLER, 'code' => $code, ],
		[ '%s', '%s' ],
		[ '%d', '%s' ]
	);
}

function fi_count_new_requests() {
	$guaranty_requests_count = get_option( 'fi_new_guaranty_requests_count', true );
	update_option( 'fi_new_guaranty_requests_count', $guaranty_requests_count + 1 );
}

add_action( 'admin_enqueue_scripts', 'fi_empty_new_requests' );
function fi_empty_new_requests() {
	$current_screen = get_current_screen();
	if ( str_contains( $current_screen->base, 'fi-guaranty-requests' ) ) {
		update_option( 'fi_new_guaranty_requests_count', 0 );
	}
}

function fi_get_installer_code_count($user_id){
	if ($user_id == 0){
		return false;
	}

	global $wpdb;
	$tp = $wpdb->prefix;
	$all_installers = $wpdb->get_results("SELECT * FROM {$tp}fi_guaranty WHERE `installer` IS NOT NULL");

	$installer_codes_count = 0;
	
	foreach ($all_installers as $installer){
		if (maybe_unserialize($installer->installer)['id'] == $user_id){
			$installer_codes_count += 1;
		}
	}

	return $installer_codes_count;
}
fi_get_installer_code_count(1);