<?php

/**
 * Map submitted value of CF7 to RightNow CRM.
 *
 * This function will filter out any unnecessary data for RightNow
 *
 * @param array $posted_data submitted form data
 * @return array
 */
function map_formdata_to_rn($posted_data) {
	$posted_data['event_disbaccess'] = convert_single_select_value($posted_data['event_disbaccess']);
    $posted_data['ma_opt_in'] = convert_single_select_value($posted_data['ma_opt_in']);

    // Initialize the allowed data for contact fields
    $contact_cf_defaults = contact_fields_default();
    // Initialize the allowed data for incident fields
    $incident_cf_defaults = incident_fields_default();

    $contactFields = array();
    $incidentFields = array();

    // Assigned submitted value to RightNow variable
    foreach($posted_data as $key => $value) {
        if (array_key_exists($key, $contact_cf_defaults)) {
            $contactFields[$key] = $value;
        }
        if (array_key_exists($key, $incident_cf_defaults)) {
            $incidentFields[$key] = $value;
        }
    }
	/*******  Map email, firstname, lastname field for RIGHTNOW *******/
    if (isset($posted_data['crmemail'])) {
        $contactFields['email'] = $posted_data['crmemail'];
    }
    if (isset($posted_data['crmfirstname'])) {
        $contactFields['firstname'] = $posted_data['crmfirstname'];
    }
    if (isset($posted_data['crmlastname'])) {
        $contactFields['lastname'] = $posted_data['crmlastname'];
    }
    /*******  END OF Map email, firstname, lastname field for RIGHTNOW *******/
	
    /*******  THIS IS STATIC VALUE FOR RIGHTNOW *******/
    $incidentFields['channel'] = '6';
    $incidentFields['threadChannel'] = '6';
    $incidentFields['threadEntryType'] = '3';
	/*******  END OF STATIC VALUE FOR RIGHTNOW *******/

    if (!empty($incidentFields['subject'])) {
        $incidentFields['thread'] = $incidentFields['subject'];
    }

    // initiliaze RightNow custom fields
    $defaultcontactcf = contact_custom_fields_default();
    $defaultincidentcf = incident_custom_fields_default();

    $contactFields['custom_fields'] = array();
    $incidentFields['custom_fields'] = array();

    // Assigned submitted data to RightNow custom variables
    foreach ($posted_data as $key => $value) {
        if (array_key_exists($key, $defaultcontactcf)) {
            $contactFields['custom_fields'][$key] = $value;
        }
        if (array_key_exists($key, $defaultincidentcf)) {
            $incidentFields['custom_fields'][$key] = $value;
        }
    }

    $aoi_fields = array();
    if (isset($posted_data['rnareaofinterest']) && is_array($posted_data['rnareaofinterest'])) {
        $aoi_fields = map_aoi_customfields($posted_data['rnareaofinterest']);
    }


    // add AOI custom fields
    $contactFields['custom_fields'] = array_merge($contactFields['custom_fields'], $aoi_fields);
    $incidentFields['custom_fields'] = array_merge($incidentFields['custom_fields'], $aoi_fields);

    return array('contactFields' => $contactFields, 'incidentFields' => $incidentFields);
}

/**
 * Store aoi field's label.
 *
 * @param array $posted_aoifields submitted aoi fields
 * @return array
 */
function map_aoi_customfields ($posted_aoifields) {
    $aoiFields = rn_aoi_options_default();
    $mapped_aoiFields = array();
    foreach ($aoiFields as $key => $labels) {
        if (in_array($key, $posted_aoifields)) {
            $mapped_aoiFields[$labels['shortcut']] = $key;
        } else {
            $mapped_aoiFields[$labels['shortcut']] = '';
        }
    }

    return $mapped_aoiFields;
}

/**
 * Convert selected value of checkbox to integer
 *
 * @param string $postdata
 * @return int
 *
 */
function convert_single_select_value ($postdata) {
    if (!empty($postdata)) {
        return 1;
    } else {
        return 0;
    }
}

/**
 * Get Formid that is used in the page.
 *
 * @param integer $postid
 * @return integer
 */
function get_formid_from_postid ($postid) {
    global $wpdb;

    $sql = "SELECT id FROM " . curtinwpcf7crm_RN_FORMS_TABLE . " WHERE postid = %d ";
    $formid = $wpdb->get_row( $wpdb->prepare($sql, $postid));

    return $formid->id;
}

/**
 * Get the form's fields
 *
 * @param integer $postid
 * @return array
 */
function get_form_fields ($formid) {
    global $wpdb;

    $query = "SELECT * FROM . " . curtinwpcf7crm_RN_FIELDS_TABLE . " WHERE rnformid = %d ";
    $fields = $wpdb->get_results($wpdb->prepare($query, $formid), OBJECT);

    return $fields;
}

/**
 * Get Formid that is used in the page.
 *
 * @param integer $postid
 * @return array
 */
function get_crm_form($formpostid) {
    global $wpdb;

    $query = "SELECT * FROM . " . curtinwpcf7crm_RN_FORMS_TABLE . " WHERE postid = %d LIMIT 1";
    $fields = $wpdb->get_row($wpdb->prepare($query, $formpostid), OBJECT);

    return $fields;
}

/**
 * Store the submitted data
 *
 * @param array $fields
 * @return integer
 */
function insert_rn_fields_to_db ($fields) {
    global $wpdb;

    $inserted_id = $wpdb->insert(curtinwpcf7crm_RN_FIELDS_TABLE, array('rnformid'      => $fields['form_id'],
                                                                       'bundleid'      => $fields['bundleid'],
                                                                       'fieldname'     => $fields['field_name'],
                                                                       'fieldvalue'    => $fields['field_value'],
                                                                       'submittedtime' => $fields['submitted_time']
                                                                 ));
    return $inserted_id;
}

/**
 * Delete Form
 *
 * @param array $fields
 * @return boolean
 */
function delete_crm_form($formpostid) {
    global $wpdb;

    $form = get_crm_form($formpostid);

    if ($wpdb->delete( curtinwpcf7crm_RN_FIELDS_TABLE, array( 'rnformid' => $form->id ), array( '%d' )) &&
        $wpdb->delete( curtinwpcf7crm_RN_FORMS_TABLE, array( 'postid' => $formpostid), array( '%d' )) ){
        return true;
    }

    return false;

}
/**
 * Get the id of last submitted form
 *
 * @return integer
 */
function get_bundle_id() {
    global $wpdb;

    $sql = "SELECT bundleid FROM " . curtinwpcf7crm_RN_FIELDS_TABLE . " ORDER BY id DESC Limit 1";
    $field = $wpdb->get_row( $sql);

    return $field->bundleid;

}

/**
 * Send the submitted form to email
 *
 * @param array $post_data
 * @return boolean
 */
function crm_compose_mail($post_data, $use_html = true) {
    $subject = 'Curtin CRM Form';
	// re-map email, firstname, lastname fields
	if (isset($post_data['crmemail'])) {
        $post_data['email'] = $post_data['crmemail'];
		unset($post_data['crmemail']);
    }
    if (isset($post_data['crmfirstname'])) {
        $post_data['firstname'] = $post_data['crmfirstname'];
		unset($post_data['crmfirstname']);
    }
    if (isset($post_data['crmlastname'])) {
        $post_data['lastname'] = $post_data['crmlastname'];
		unset($post_data['crmlastname']);
    }
	// end of re-map
	
    if (array_key_exists('subject', $post_data) && !empty($post_data['subject'])) {
        $subject = curtinwpcf7crm_strip_newline($post_data['subject']);
    }

    $sender = curtinwpcf7crm_strip_newline($post_data['firstname'] .' '. $post_data['lastname'] .' <'. $post_data['email'] .'>');

    $recipient = curtinwpcf7crm_strip_newline('<webteam@curtin.edu.au>');
    $additional_headers = 'reply-to: '. $post_data['email'].';';

    $excludedfield = array('_curtinwpcf7crm', '_curtinwpcf7crm_version', '_curtinwpcf7crm_locale', '_curtinwpcf7crm_unit_tag', '_wpnonce', '_curtinwpcf7crm_is_ajax_call');
    $body = '';
    foreach ($post_data as $key => $data) {
        if(!in_array($key, $excludedfield)) {
            if (is_array($data)) {
                $body .= $key . ": " . implode(',', $data) . "\n";
            } else {
                $body .= $key . ": " . $data . "\n";
            }
        }
    }

    $headers = "From: $sender;";

    if ( $use_html ) {
        $headers .= "Content-Type: text/html;";
    }

    if ( $additional_headers ) {
        $headers .= $additional_headers;
    }

    $attachments = array();
    //if ( $send ) {
        // send email
        return wp_mail( $recipient, $subject, $body, $headers, $attachments );
    //}
}