<?php
/**
 * Plugin Name: FaraImen Guaranty
 * Version:     1.0.0
 * Author:      AfzaliWP (Mohammad Afzali)
 * Author URI:  https://afzaliwp.com
 * Description: This plugin developed for FaraImen Company in order to manage their guaranty codes.
 */

defined( 'ABSPATH' ) || exit();

define( 'FI_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'FI_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

define( 'FI_ADMIN', trailingslashit( FI_DIR . 'admin' ) );
define( 'FI_FRONT', trailingslashit( FI_DIR . 'front' ) );
define( 'FI_TPL', trailingslashit( FI_DIR . 'templates' ) );

define( 'FI_JS', trailingslashit( FI_URL . 'assets/js' ) );
define( 'FI_CSS', trailingslashit( FI_URL . 'assets/css' ) );

global $table_prefix;
define( 'FI_TABLE', $table_prefix . 'fi_guaranty' );
const FI_DB_VER = 1;

//code types to save in db
const INSTALLER = 1;
const CUSTOMER  = 2;

function fi_activation() {
	require_once FI_ADMIN . 'create_db.php';
}

register_activation_hook( __FILE__, 'fi_activation' );

require_once FI_DIR . "functions.php";
if ( is_admin() ) {
	require_once FI_ADMIN . "admin_menu.php";
} else {
	//require_once FI_FRONT . "admin_menu.php";
}