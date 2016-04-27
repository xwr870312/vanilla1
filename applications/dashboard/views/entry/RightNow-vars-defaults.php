<?php
/**
 * This file contains default values and variable names for Curtin RightNow System
 *
 */

function rn_user_desc_options_default () {
    $options = array();
    $options[59]    = "Currently in TAFE / Other";
    $options[60]    = "Currently studying at another uni";
    $options[61]    = "Currently studying at Curtin";
    $options[1314]  = "Curtin graduate";
    $options[1649]  = "Graduate from other university";
    $options[62]    = "Mature age applicant";
    $options[1634]  = "Other (Please specify)";

    return $options;
}

function rn_aoi_options_default () {
    $options = array();
    $options[1148] = array('shortcut' => 'aoi1_enviroagri',                 'label' => 'Agriculture, environment and sustainability');
    $options[1172] = array('shortcut' => 'aoi1_architecture_construction',  'label' => 'Architecture and construction');
    $options[1145] = array('shortcut' => 'aoi1_business',                   'label' => 'Business, management and law');
    $options[1153] = array('shortcut' => 'aoi1_culturelangindigenous',      'label' => 'Culture, language and Indigenous');
    $options[1146] = array('shortcut' => 'aoi1_education',                  'label' => 'Education');
    $options[1150] = array('shortcut' => 'aoi1_engmining',                  'label' => 'Engineering and mining');
    $options[1149] = array('shortcut' => 'aoi1_health',                     'label' => 'Health');
    $options[1152] = array('shortcut' => 'aoi1_itcomputing',                'label' => 'IT and computing');
    $options[1154] = array('shortcut' => 'aoi1_research',                   'label' => 'Research');
    $options[1147] = array('shortcut' => 'aoi1_scholarships',               'label' => 'Scholarships');
    $options[1151] = array('shortcut' => 'aoi1_sciencemaths',               'label' => 'Physical sciences and mathematics');
    $options[1144] = array('shortcut' => 'aoi1_artscreative',               'label' => 'The arts and creative industries');

    return $options;
}

function contact_fields_default() {
    $contactFields = array(
        "contact_id" => '',
        "city" => '',
        "postcode" => '',
        "email" => '',
        "ma_opt_in" => '',
        "firstname" => '',
        "lastname" => '',
        "org_id" => '',
        "ph_mobile" => ''
    );

    return $contactFields;
}

function incident_fields_default() {
    $incidentFields = array(
        "incident_id" => '',
        "contact_id" => '',
        "channel" => '',
        "disposition" => '',
        "interface" => '',
        "contactid" => '',
        "queue" => '',
        "status" => '',
        "subject" => '',
        "threadChannel" => '',
        "threadEntryType" => '',
        "thread" => ''
    );

    return $incidentFields;
}

/**
 * List of default data value for Contact custom fileds.
 *
 * @return array
 */
function contact_custom_fields_default() {
    $contactCF = array(
        'description'                       => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue',  'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'gempharmie_description'            => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue',  'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'interface_contact_type'            => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue',  'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'sch_cntct_type_other'              => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'sch_contacttype'                   => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue',  'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'study_lvl_pg'                      => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'mais10_registered'                 => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'pref_study_lvl_ug'                 => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'age2'                              => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue',  'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'mais10_sessiondate'                => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue',  'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'wire_registered'                   => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'indigenous'                        => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'sch-teachingarea'                  => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue',  'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'curtin_id'                         => array('datatype' => 'INTEGER',   'datavalue' => 'IntegerValue'),
        'pref_study_lvl_pgd'                => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_artscreative'                 => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_business'                     => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_education'                    => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_itcomputing'                  => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_research'                     => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_scholarships'                 => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_culturelangindigenous'        => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_enviroagri'                   => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_health'                       => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_engmining'                    => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_sciencemaths'                 => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_architecture_construction'    => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'c_generic_txt_field1'              => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'c_generic_txt_field2'              => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'c_generic_txt_field3'              => array('datatype' => 'STRING',    'datavalue' => 'StringValue')
    );

    return $contactCF;
}

/**
 * List of default data value for Incident custom fileds.
 *
 * @return array
 */
function incident_custom_fields_default() {
    $incidentCF = array(
        'how_heard'                         => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'campus'                            => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'interface_contact_type'            => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'event_disbaccess'                  => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'wire_registration'                 => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'event_surveyoptin'                 => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'campaign_lvl1'                     => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'wire_custom_school'                => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'campaign_lvl2'                     => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'extraguests'                       => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'event_session'                     => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'extra_notes'                       => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'event_disbacesdtls'                => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'how_heard_other'                   => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'event_extratext'                   => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'course1degreelvl'                  => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'course2degreelvl'                  => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'course3degreelvl'                  => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'course1faculty'                    => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'course2faculty'                    => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'course3faculty'                    => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'course1otherfac'                   => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'course2otherfac'                   => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'course3otherfac'                   => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'worldwideform_topic'               => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'course3othermajor'                 => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'course2othermajor'                 => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'course1othermajor'                 => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'course3major'                      => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'course2major'                      => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'course1major'                      => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'event_numofextras'                 => array('datatype' => 'INTEGER',   'datavalue' => 'IntegerValue'),
        'study_level'                       => array('datatype' => 'STRING',    'datavalue' => 'NamedIDValue', 'xmlns' => 'urn:base.ws.rightnow.com/v1_2'),
        'courses_enquired'                  => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'school_name'                       => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'aoi1_architecture_construction'    => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_artscreative'                 => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_business'                     => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_culturelangindigenous'        => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_education'                    => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_engmining'                    => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_enviroagri'                   => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_health'                       => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_itcomputing'                  => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_scholarships'                 => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_sciencemaths'                 => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_research'                     => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'aoi1_business'                     => array('datatype' => 'BOOLEAN',   'datavalue' => 'BooleanValue'),
        'i_generic_txt_field1'              => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'i_generic_txt_field2'              => array('datatype' => 'STRING',    'datavalue' => 'StringValue'),
        'i_generic_txt_field3'              => array('datatype' => 'STRING',    'datavalue' => 'StringValue')
    );

    return $incidentCF;
}