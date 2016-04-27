<?php

include 'RightNowAPI.php';

if(isset($_POST['submit'])) {

    if (isset($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
    } else {
        $first_name = "";
    }

    if (isset($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
    } else {
        $last_name = "";
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = "";
    }

    if (isset($_POST['aoi1_enviroagri'])) {
        $aoi1_enviroagri = "1";
    } else {
        $aoi1_enviroagri = "";
    }

    if (isset($_POST['aoi1_architecture'])) {
        $aoi1_architecture = "1";
    } else {
        $aoi1_architecture = "";
    }

    if (isset($_POST['aoi1_business'])) {
        $aoi1_business = "1";
    }  else {
        $aoi1_business = "";
    }

    if (isset($_POST['aoi1_culturelangi'])) {
        $aoi1_culturelangi = "1";
    } else {
        $aoi1_culturelangi = "";
    }

    if (isset($_POST['aoi1_education'])) {
        $aoi1_education = "1";
    } else {
        $aoi1_education = "";
    }

    if (isset($_POST['aoi1_engmining'])) {
        $aoi1_engmining = "1";
    } else {
        $aoi1_engmining = "";
    }

    if (isset($_POST['aoi1_health'])) {
        $aoi1_health = "1";
    } else {
        $aoi1_health = "";
    }

    if (isset($_POST['aoi1_itcomputing'])) {
        $aoi1_itcomputing = "1";
    } else {
        $aoi1_itcomputing = "";
    }

    if (isset($_POST['aoi1_research'])) {
        $aoi1_research = "1";
    } else {
        $aoi1_research = "";
    }

    if (isset($_POST['aoi1_scholarships'])) {
        $aoi1_scholarships = "1";
    } else {
        $aoi1_scholarships = "";
    }

    if (isset($_POST['aoi1_sciencemaths'])) {
        $aoi1_sciencemaths = "1";
    } else {
        $aoi1_sciencemaths = "";
    }

    if (isset($_POST['aoi1_artscreative'])) {
        $aoi1_artscreative = "1";
    } else {
        $aoi1_artscreative = "";
    }

    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    } else {
        $description = "";
    }

    if (isset($_POST['course1major'])) {
        $course1major = $_POST['course1major'];
    } else {
        $course1major = "";
    }

    if (isset($_POST['event_disbaccess'])) {
        $event_disbaccess = 1;
    } else {
        $event_disbaccess = "";
    }

    if (isset($_POST['ma_opt_in'])) {
        $ma_opt_in = 1;
    } else {
        $ma_opt_in = "";
    }
    /*
    $contactFields = array(	
        "contact_id" => "",
        "city" => "Perth",
        "postcode" => "6018",
        "email" => $email,
        "ma_opt_in" => $ma_opt_in,
        "firstname" => $first_name,
        "lastname" => $last_name,
        "org_id" => "35",
        "ph_mobile" => "99999999",
        "custom_fields" => array(
            "description" => $description,
            "gempharmie_description" => "1623",
            "interface_contact_type" => "5",
            "description_other" => "other description",
            "sch_cntct_type_other" => "school contact",
            "gempharmie_descother" => "gem other description",
            "sch_contacttype" => "160",
            "study_lvl_pg" => "1",
            "mais10_registered" => "1",
            "pref_study_lvl_ug" => "1",
            "age2" => "1357",
            "mais10_sessiondate" => "1427",
            "wire_registered" => "1",
            "indigenous" => "1",
            "sch_teachingareaother" => "super science",
            "curtin_id" => "254134E",
            "admit_year" => "2001",
            "pref_study_lvl_pgd" => "",
            "aoi1_artscreative" => "",
            "aoi1_business" => "",
            "aoi1_education" => "",
            "aoi1_itcomputing" => "",
            "aoi1_research" => "",
            "aoi1_scholarships" => "",
            "aoi1_culturelangindigenous" => "",
            "aoi1_enviroagri" => "",
            "aoi1_health" => "",
            "aoi1_engmining" => "",
            "aoi1_sciencemaths" => "",
            "aoi1_architecture_construction" => "",
            "generic_txt_field1" => "generic_txt_field1",
            "generic_txt_field2" => "generic_txt_field2",
            "generic_txt_field3" => "generic_txt_field3"));

    $incidentFields = array(
        "incident_id" => "",
        "contact_id" => "",
        "channel" => "6",
        "disposition" => "253",
        "interface" => "1",
        "contactid" => "",
        "queue" => "29",
        "status" => "1",
        "subject" => "Expression of Interest for Postgraduate Expo",
        "threadChannel" => "6",
        "threadEntryType" => "3",
        "thread" => "Expression of Interest for Postgraduate Expo",
        "custom_fields" => array(
            "how_heard" => "1316",
            "campus" => "1597",
            "event_disbaccess" => $event_disbaccess,
            "wire_registration" => "0",
            "event_surveyoptin" => "1",
            "campaign_lvl1" => "pgie",
            "wire_custom_school" => "test_wire_custom_school",
            "campaign_lvl2" => "eoi",
            "extraguests" => "1939",
            "event_session" => "test_event_session",
            "extra_notes" => "test_extra_notes",
            "event_disbacesdtl" => "test_event_disbacesdtl",
            "how_heard_other" => "test_how_heard_other",
            "event_extratext" => "Expression of Interest for Postgraduate Expo",
            "course1degreelvl" => "1540",
            "course2degreelvl" => "1557",
            "course3degreelvl" => "1576",
            "course1faculty" => "1543",
            "course2faculty" => "1580",
            "course3faculty" => "1587",
            "course1otherfac" => "1550",
            "course2otherfac" => "1563",
            "course3otherfac" => "1571",
            "worldwideform_top" => "1755",
            "course3othermajor" => "test_course3othermajor",
            "course2othermajor" => "test_course2othermajor",
            "course1othermajor" => "test_course1othermajor",
            "course3major" => "test_course3Major",
            "course2major" => "test_course2major",
            "course1major" => $course1major,
            "event_numofextras" => "3",
            "study_level" => "1361",
            "courses_enquired" => "test_courses_enquired",
            "school_name" => "test_school_name",
            "aoi1_architecture_construction" => $aoi1_architecture,
            "aoi1_artscreative" => $aoi1_artscreative,
            "aoi1_business" => $aoi1_business,
            "aoi1_culturelangindigenous" => $aoi1_culturelangi,
            "aoi1_education" => $aoi1_education,
            "aoi1_engmining" => $aoi1_engmining,
            "aoi1_enviroagri" => $aoi1_enviroagri,
            "aoi1_health" => $aoi1_health,
            "aoi1_itcomputing" => $aoi1_itcomputing,
            "aoi1_scholarships" => $aoi1_scholarships,
            "aoi1_sciencemaths" => $aoi1_sciencemaths,
            "aoi1_research" => $aoi1_research,
            "generic_txt_field1" => "generic_txt_field1",
            "generic_txt_field2" => "generic_txt_field2",
            "generic_txt_field3" => "generic_txt_field3"));
    */

    $contactFields = array(    
        "email" => "snoopy@home.com",
        "firstname" => "Snoopy",
        "lastname" => "Dog"
        );

    $incidentFields = array(
        "incident_id" => "",
        "contact_id" => "",
        "subject" => "Registration for Studentbox",
        "threadChannel" => "6",
        "threadEntryType" => "3",
        "thread" => "Registration for Studentbox",
        "custom_fields" => array(
            "campaign_lvl1" => "studentbox",
            "campaign_lvl2" => "registration",
           ));


    $objRightNowAPI = new RightNowAPI();
    $test = $objRightNowAPI->createContactIncident($contactFields, $incidentFields);

    echo "Done!";
}

?>

<html>
<head>
    <title>test webform</title>
</head>

<form id="frmRegister" method="post" action="webform.php" novalidate="novalidate" class="flow">

    <fieldset class="section">
        <legend>Your details</legend>

        <label for="txtfirstname">First name <abbr class="req" title="required">*</abbr></label>
        <input id="txtfirst_name" class="required" type="text" value="" size="30" name="first_name" aria-required="true">

        <label for="txtccf_765">Last name <abbr class="req" title="required">*</abbr></label>
        <input id="txtccf_765" class="required" type="text" value="" size="30" name="last_name" aria-required="true">

        <label for="txtemail">Email address</label>
        <input id="txtemail" class="required email" type="text" size="30" value="" name="email" aria-required="true">

        <label for="postcode">Postcode <abbr class="req" title="required">*</abbr></label>
        <input id="postcode" class="required postcode" type="text" size="9" value="" name="postcode" aria-required="true">

    </fieldset>

    <button class="button--primary-submit" type="submit" id="submit" name="submit">Express your interest</button>

</form>

</html>