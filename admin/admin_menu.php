<?php
function fi_add_menu_page() {
	$new_guaranty_requests = get_option('new-guaranty-requests');

	add_menu_page(
		'مدیریت گارانتی ها',
		'گارانتی ها',
		'manage_options',
		'fi-guaranty',
		'fi_admin_menu_main',
		'dashicons-admin-network',
		6
	);

	add_submenu_page(
		'fi-guaranty',
		'اضافه کردن کد گارانتی',
		'اضافه کردن کد',
		'manage_options',
		'fi-guaranty-add-code',
		'fi_admin_menu_add_code'
	);

	add_submenu_page(
		'fi-guaranty',
		'درخواست های گارانتی',
		'درخواست ها',
		'manage_options',
		'fi-guaranty-requests',
		'fi_admin_menu_requests'
	);
}
add_action( 'admin_menu', 'fi_add_menu_page' );

function fi_admin_menu_main() {
	include FI_TPL . 'admin/main.php';
}

function fi_admin_menu_add_code() {
	if (isset($_POST['customers_code_data'])){
		$message = fi_add_codes_from_admin($_POST['customer_codes'], CUSTOMER);
	}

	if (isset($_POST['installers_code_data'])){
		$message = fi_add_codes_from_admin($_POST['installer_codes'], INSTALLER);
	}

	include FI_TPL . 'admin/add_code.php';
}

function fi_admin_menu_requests() {
	include FI_TPL . 'admin/requests.php';
}
