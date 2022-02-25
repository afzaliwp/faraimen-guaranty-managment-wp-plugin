<?php
add_action( 'init', 'fi_add_form_shortcodes' );

function fi_add_form_shortcodes() {
	add_shortcode( 'fi_public_form', 'fi_public_form' );
	add_shortcode( 'fi_inquiry_form', 'fi_inquiry_form' );
	add_shortcode( 'fi_installer_form', 'fi_installer_form' );
	add_shortcode( 'fi_guaranty_form', 'fi_guaranty_form' );
}

function fi_public_form(){
	if (isset($_POST['public_send_code'])){
		$result = fi_save_public_form_data($_POST);
	}
	include FI_TPL . "front/public_form.php";
}

function fi_inquiry_form(){
	if (isset($_POST['inquiry_send_code'])){
		$result = fi_get_inquiry_result($_POST['guaranty_code']);
	}
	include FI_TPL . "front/inquiry_form.php";
}

function fi_installer_form(){
	if (isset($_POST['installer_send_code'])){
		$result = fi_save_installer_form_data($_POST['guaranty_code']);
	}
	include FI_TPL . "front/installer_form.php";
}

function fi_guaranty_form(){
	if (isset($_POST['guaranty_send_request'])){
		$result = fi_save_guaranty_request($_POST);
	}
	if (isset($result) && $result > 0){
		fi_count_new_requests();
	}
	include FI_TPL . "front/guaranty_form.php";
}