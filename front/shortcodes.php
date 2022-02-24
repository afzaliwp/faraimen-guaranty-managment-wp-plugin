<?php
add_action( 'init', 'fi_add_form_shortcodes' );

function fi_add_form_shortcodes() {
	add_shortcode( 'fi_public_form', 'fi_public_form' );
}

function fi_public_form(){
	if (isset($_POST['public_send_code'])){
		$result = fi_save_public_form_data($_POST);
	}
	include FI_TPL . "front/public_form.php";
}