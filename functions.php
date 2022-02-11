<?php

function fi_load_assets() {
	$current_screen = get_current_screen();

	if ( str_contains( $current_screen->base, 'fi-guaranty' ) ) {

		wp_register_style( 'fi-admin', FI_CSS . 'fi-admin.css', '', '1.0.0' );
		wp_enqueue_style( 'fi-admin' );
	}
}

add_action( 'admin_enqueue_scripts', 'fi_load_assets' );


