<?php
$current_db_version = get_option( 'fi_db_version' );

if ( FI_DB_VER > intval( $current_db_version ) ) {
	fi_db_upgrade();
	update_option( 'fi_db_version', FI_DB_VER );
}

function fi_db_upgrade() {
	global $table_prefix;
	$table_name = $table_prefix . 'fi_guaranty';
	$query      = "DROP TABLE IF EXISTS `{$table_name}`;
					CREATE TABLE IF NOT EXISTS `{$table_name}` (
  					`ID` bigint(20) NOT NULL AUTO_INCREMENT,
  					`code` text NOT NULL,
  					`type` tinyint(1) NOT NULL,
  					`installer` text,
  					`customer` text,
  					`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  					`started_at` date DEFAULT NULL,
  					`ended_at` date DEFAULT NULL,
  					`request` text,
  					PRIMARY KEY (`ID`),
  					KEY `type` (`type`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8;
					COMMIT;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta($query);
}