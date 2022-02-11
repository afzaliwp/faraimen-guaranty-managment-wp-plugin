<?php
function fi_add_menu_page() {
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
}
add_action( 'admin_menu', 'fi_add_menu_page' );

function fi_admin_menu_main() {
	include FI_TPL . 'admin/main.php';
}

function fi_admin_menu_add_code() {
	if (!empty($_POST)){
		var_dump($_POST);
	}
	include FI_TPL . 'admin/add_code.php';
}
