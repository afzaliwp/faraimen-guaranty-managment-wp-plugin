<?php
delete_option( 'fi_db_version' );

global $table_prefix;

$table_name = $table_prefix . 'fi_guaranty';
$query      = "DROP TABLE IF EXISTS `{$table_name}`";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

dbDelta($query);