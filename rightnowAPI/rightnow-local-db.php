<?php

global $rn_forms_version;
$rn_forms_version = '1.0';

function rn_forms_install() {
    global $wpdb;
    global $rn_forms_db_version;

    $table_name = curtinwpcf7crm_RN_FORMS_TABLE;

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id bigint(20) NOT NULL AUTO_INCREMENT,
		postid bigint(20) NOT NULL,
		name varchar(125) NOT NULL,
		UNIQUE KEY (id)
	) $charset_collate;";

    $wpdb->query($sql);

    add_option( 'rn_forms_db_version', $rn_forms_db_version );
}


global $rn_fields_version;
$rn_fields_version = '1.0';

function rn_fields_install() {
    global $wpdb;
    global $rn_fields_db_version;

    $table_name = curtinwpcf7crm_RN_FIELDS_TABLE;

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id bigint(20) NOT NULL AUTO_INCREMENT,
		rnformid bigint(20) NOT NULL,
		bundleid bigint(20) NOT NULL,
		fieldname varchar(125) NOT NULL,
		fieldvalue varchar(125) NOT NULL,
		submittedtime datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		UNIQUE KEY (id)
	) $charset_collate;";

    $wpdb->query($sql);

    add_option( 'rn_fields_db_version', $rn_fields_db_version );
}
