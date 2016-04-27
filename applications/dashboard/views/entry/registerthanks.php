<?php if (!defined('APPLICATION')) exit(); 
include 'RightNowAPI.php';
            if(isset($_POST['submit'])) {
                    $email = $_POST['Email'];
                   if(isset($email)) {
                    $contactFields = array(    
                        "email" => $_POST['Email'],
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
        }
    }
?>
<div class="Center SplashInfo">
    <h1><?php echo t('Thank You!'); ?></h1>

    <div id="Message">
        <?php echo t('Your application will be reviewed by an administrator. You will be notified by email if your application is approved.');?>
    </div>
</div>
