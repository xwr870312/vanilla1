<!doctype html>
<!--[if lt IE 7 ]> <html lang="en-AU" prefix="og: http://ogp.me/ns#" class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" id="bilya"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en-AU" prefix="og: http://ogp.me/ns#" class="no-js lt-ie10 lt-ie9 lt-ie8" id="bilya"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-AU" prefix="og: http://ogp.me/ns#" class="no-js lt-ie10 lt-ie9" id="bilya"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-AU" prefix="og: http://ogp.me/ns#" class="no-js lt-ie10" id="bilya"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en-AU" prefix="og: http://ogp.me/ns#" class="no-js" id="bilya"> <!--<![endif]-->

<head>
  <script src="https://code.jquery.com/jquery-1.11.3.js"></script>

  <script type="text/javascript">

    $( document ).ready(function() {
      //console.log( "ready!" );

      $('#description').change(function() {
        if($("#description").val() == 1634) {// "Other" option value is 1634.
          $("#description_other").show();
          $("#error_tag").hide();
        }
        else {
          $("#description_other").hide();
          $("#error_tag").hide();
        }
      });
    });

  </script>

    <?php
        include 'includes/RightNowAPI.php';

        $objRightNowAPI = new RightNowAPI();

        $first_name = "";
        $last_name = "";
        $email = "";
        $postcode = "";
        $age = "";
        $description = "";
        $description_other = "";
        $aoi_architecture = "";
        $aoi_agri = "";
        $aoi_business = "";
        $aoi_culture = "";
        $aoi_education = "";
        $aoi_engineering = "";
        $aoi_health = "";
        $aoi_it = "";
        $aoi_research = "";
        $aoi_scholarships = "";
        $aoi_art = "";
        $aoi_science = "";
        $disability = "";
        $opt_in = "";
        $errorFound = false;
        $campaign = "";
        $session = "";

        if(isset($_GET['campaign'])) {
          $campaign = $_GET['campaign'];
        }

        if(isset($_GET['session'])) {
          $session = $_GET['session'];
        }

        if(isset($_POST['set']))
        {
          $campaign = $_POST['campaign'];
        }

        if(isset($_POST['session']))
        {
          $campaign = $_POST['campaign'];
          $session = $_POST['event_session'];
        }

        // web form
        if(isset($_POST['submit'])) {

            if(isset($_POST['firstname'])) {
              $first_name = $_POST['firstname'];
            }
            if(isset($_POST['lastname'])) {
              $last_name = $_POST['lastname'];
            }
            if(isset($_POST['email'])) {
              $email = $_POST['email'];
            }
            if(isset($_POST['postcode'])) {
              $postcode = $_POST['postcode'];
            }
            if(isset($_POST['age2'])) {
              $age = $_POST['age2'];
            }
            if(isset($_POST['description'])) {
              $description = $_POST['description'];
            }
            if(isset($_POST['description_other'])) {
              $description_other = $_POST['description_other'];
            }
            if(isset($_POST['aoi_architecture'])) {
              $aoi_architecture = $_POST['aoi_architecture'];
            }
            if(isset($_POST['aoi_agri'])) {
              $aoi_agri = $_POST['aoi_agri'];
            }
            if(isset($_POST['aoi_business'])) {
              $aoi_business = $_POST['aoi_business'];
            }
            if(isset($_POST['aoi_culture'])) {
              $aoi_culture = $_POST['aoi_culture'];
            }
            if(isset($_POST['aoi_education'])) {
              $aoi_education = $_POST['aoi_education'];
            }
            if(isset($_POST['aoi_engineering'])) {
              $aoi_engineering = $_POST['aoi_engineering'];
            }
            if(isset($_POST['aoi_health'])) {
              $aoi_health = $_POST['aoi_health'];
            }
            if(isset($_POST['aoi_it'])) {
              $aoi_it = $_POST['aoi_it'];
            }
            if(isset($_POST['aoi_research'])) {
              $aoi_research = $_POST['aoi_research'];
            }
            if(isset($_POST['aoi_scholarships'])) {
              $aoi_scholarships = $_POST['aoi_scholarships'];
            }
            if(isset($_POST['aoi_art'])) {
              $aoi_art = $_POST['aoi_art'];
            }
            if(isset($_POST['aoi_science'])) {
              $aoi_science = $_POST['aoi_science'];
            }
            if(isset($_POST['event_disbaccess'])) {
              $disability = $_POST['event_disbaccess'];
            }
            if(isset($_POST['ma_opt_in'])) {
              $opt_in = $_POST['ma_opt_in'];
            }

            // error report
            $error = array(
              'firstname' => "",
              'lastname' => "",
              'email' => "",
              'postcode' => "",
              'age' => "",
              'description' => "",
              'description_other' => "",
              'aoi_agri' => "",
              'aoi_architecture' => "",
              'aoi_business' => "",
              'aoi_culture' => "",
              'aoi_education' => "",
              'aoi_engineering' => "",
              'aoi_health' => "",
              'aoi_it' => "",
              'aoi_research' => "",
              'aoi_scholarships' => "",
              'aoi_science' => "",
              'aoi_art' => "",
              'event_disbaccess' => "",
              'ma_opt_in' => ""
              );

            if(isset($_POST['firstname'])) {
              $firstname = test_text_input($_POST['firstname']);

              if($first_name == "") {
                $error["firstname"] = "error";
                $errorFound = true;
              }
            }

            if(isset($_POST['lastname'])) {
              $lastname = test_text_input($_POST['lastname']);

              if($lastname == "") {
                $error["lastname"] = "error";
                $errorFound = true;
              }
            }

            if(isset($_POST['email'])) {
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error["email"] = "error";
                $errorFound = true;
              }
            }

            if(isset($_POST['postcode'])) {
              if ($postcode == "") {
                $error["postcode"] = "error";
                $errorFound = true;
              }
              elseif (!is_numeric($postcode)) {
                $error["postcode"] = "error";
                $errorFound = true;
              }
            }

            if(isset($_POST['age2'])) {
              
              $ages = array(
              '1354',
              '1962',
              '1355',
              '1356',
              '1357',
              '1358',
              '1359'
              );

              $found = false;

              if ($age == "") {
                $error["age"] = "error";
                $errorFound = true;
              }
              else {
                if (!is_numeric($age)) {
                  $error["age"] = "error";
                  $errorFound = true;
                }
                foreach ($ages as $ageValue) {
                  if($age == $ageValue) {
                    $found = true;
                  }
                }
                if($found == false)
                {
                  $error["age"] = "error";
                  $errorFound = true;
                }
              }
            }

            if(isset($_POST['description'])) {

              $descriptions = array(
              '59',
              '1671',
              '1670',
              '1669',
              '1668',
              '57',
              '58',
              '1690',
              '1691',
              '60',
              '61',
              '1314',
              '1649',
              '63',
              '62',
              '64',
              '245',
              '1634'
              );

              $found = false;

              if ($description == "") {
                $error["description"] = "error";
                $errorFound = true;
              }
              else {
                if (!is_numeric($description)) {
                  $error["description"] = "error";
                  $errorFound = true;
                }
                foreach ($descriptions as $descriptionValue) {
                  if($description == $descriptionValue) {
                    $found = true;
                  }
                }
                if($found == false)
                {
                  $error["description"] = "error";
                  $errorFound = true;
                }
              }
            }

            if(isset($_POST['description_other'])) {
              if ($description == "1634") {
                $description_other = test_text_input($_POST['description_other']);

                if($description_other == "") {
                  $error["description_other"] = "error";
                  $errorFound = true;
                }
              }
            }

            if(!$errorFound) {

              $contactFields["postcode"] = $postcode;

              $contactFields["email"] = $email;

              if($opt_in == "1")
                $contactFields["ma_opt_in"] = $opt_in;

              $contactFields["firstname"] = $firstname;

              $contactFields["lastname"] = $lastname;

              $contactFields["custom_fields"]["description"] = $description;

              $contactFields["custom_fields"]["age2"] = $age;

              if($description_other == "")
                $contactFields["custom_fields"]["description_other"] = $description_other;
              if($aoi_architecture != "")
                $contactFields["custom_fields"]["aoi1_architecture_construction"] = $aoi_architecture;
              if($aoi_agri != "")
                $contactFields["custom_fields"]["aoi1_enviroagri"] = $aoi_agri;
              if($aoi_art != "")
                $contactFields["custom_fields"]["aoi1_artscreative"] = $aoi_art;
              if($aoi_science != "")
                $contactFields["custom_fields"]["aoi1_sciencemaths"] = $aoi_science;
              if($aoi_scholarships != "")
                $contactFields["custom_fields"]["aoi1_scholarships"] = $aoi_scholarships;
              if($aoi_it != "")
                $contactFields["custom_fields"]["aoi1_itcomputing"] = $aoi_it;
              if($aoi_education != "")
                $contactFields["custom_fields"]["aoi1_education"] = $aoi_education;
              if($aoi_business != "")
                $contactFields["custom_fields"]["aoi1_business"] = $aoi_business;
              if($aoi_research != "")
                $contactFields["custom_fields"]["aoi1_research"] = $aoi_research;
              if($aoi_culture != "")
                $contactFields["custom_fields"]["aoi1_culturelangindigenous"] = $aoi_culture;
              if($aoi_health != "")
                $contactFields["custom_fields"]["aoi1_health"] = $aoi_health;
              if($aoi_engineering != "")
                $contactFields["custom_fields"]["aoi1_engmining"] = $aoi_engineering;

              if($campaign == "pgie")
              {
                $subject = "Registration for PostGrad Expo";
              }

              if($campaign == "tbdo")
              {
                $subject = "Registration for Teacher's Big Day Out";
              }

              if($campaign == "pie")
              {
                $subject = "Registration for Parent Information Session";
              }

              if($campaign == "mais")
              {
                $subject = "Registration for Mature Age Information Session";
              }

              if($campaign == "twilighttour")
              {
                $subject = "Registration for Twilight Campus Tours";
              }

              $incidentFields["custom_fields"]["event_session"] = $session;

              $incidentFields["subject"] = $subject;
              $incidentFields["custom_fields"]["campaign_lvl1"] = $campaign;
              $incidentFields["custom_fields"]["campaign_lvl2"] = "registration";

              if($disability != "")
                $incidentFields["custom_fields"]["event_disbaccess"] = $disability;

              // incident for registration
              $response = $objRightNowAPI->createContactIncident($contactFields, $incidentFields);

              if($campaign == "pgie")
              {
                $subject = "Attended the PostGrad Expo";
              }
              if($campaign == "tbdo")
              {
                $subject = "Attended the Teacher's Big Day Out";
              }
              if($campaign == "pie")
              {
                $subject = "Attended the Parent Information Session";
              }
              if($campaign == "mais")
              {
                $subject = "Attended the Mature Age Information Session";
              }
              if($campaign == "twilighttour")
              {
                $subject = "Attended the Twilight Campus Tours";
              }

              $incidentFields["subject"] = $subject;
              $incidentFields["custom_fields"]["campaign_lvl2"] = "attended";

              // incident for attended
              $response = $objRightNowAPI->createContactIncident($contactFields, $incidentFields);
            }
        }

        function test_text_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);

          return $data;
        }
    ?>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Future Students Support Home Page - Curtin University of Technology</title>

      <link rel="icon" type="image/x-icon" href="//global.curtin.edu.au/responsive-assets/img/favicon.ico">
      <link rel="apple-touch-icon-precomposed" sizes="57x57" href="//global.curtin.edu.au/responsive-assets/img/apple-touch-icon-57x57-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="76x76" href="//global.curtin.edu.au/responsive-assets/img/apple-touch-icon-76x76-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="120x120" href="//global.curtin.edu.au/responsive-assets/img/apple-touch-icon-120x120-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="152x152" href="//global.curtin.edu.au/responsive-assets/img/apple-touch-icon-152x152-precomposed.png">


      <!--[if (gt IE 8) | (IEMobile)]><!-->

      <link href="//global.curtin.edu.au/assets/1.1.1/css/style.css" rel="stylesheet" type="text/css" />
      <!--<![endif]-->
      <!--[if (lt IE 9) & (!IEMobile)]>
        <link rel="stylesheet" href="//global.curtin.edu.au/assets/1.1.1/assets/css/old-ie.css">
      <![endif]-->  

      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">

      <script src="//global.curtin.edu.au/assets/1.1.1/js/modernizr.js"></script>

      <style>
          span.error {
              color: #f00;
              display: block;
              font-size: 1em;
          }

          form#rn_CreateAccount .rn_TextInput {
           margin-left: 0px !important;
          }
          form#rn_CreateAccount .rn_TextInput label {
          text-align: left !important; 
          }
          .rn_AdvancedKeyword , .rn_AdvancedFilter , .rn_AdvancedSort {
              padding: 0px 0px 0px 0px !important;
          }
          .secondary-content{
            margin-top:0px !important;
          }
          .rn_Paginator {
              font-size: 100% !important;
          }
          .yui-panel-container yui-dialog yui-simple-dialog{
            width:400px;

          }
          .rn_AdvancedSearchDialog .rn_DialogContent .rn_AdvancedFilter, .rn_AdvancedSearchDialog .rn_DialogContent .rn_AdvancedSort {
              border-top: 0px solid #fff !important;
          }
          .yui-skin-sam .yui-panel-container.shadow {
          }
          .yui-skin-sam .yui-panel-container {
              padding: 0 1px;
          }
          .yui-overlay, .yui-panel-container {
              position: absolute;
              visibility: hidden;
              z-index: 2;
          }

          .rn_SearchTips {
            display:none;
          }

          .container-close {
            display: none;
          }

          #rnDialog1_mask, #rnDialog2_mask,#rnDialog3_mask, #rnDialog4_mask,#rnDialog5_mask, #rnDialog6_mask,#rnDialog7_mask, #rnDialog8_mask,#rnDialog9_mask, #rnDialog10_mask,#rnDialog11_mask, #rnDialog12_mask{
            position: absolute !important;
            margin:0 auto !important;
            background-color: #464643;
            opacity: 0.5;
           }

          #rnDialog1, #rnDialog2, #rnDialog3, #rnDialog4, #rnDialog5, #rnDialog6, #rnDialog7, #rnDialog8, #rnDialog9, #rnDialog10{
            background-color: #F4F4F4;
                border: 1px solid #c1c1c1;
                box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
                position: relative;
                width:300px !important;
          }
          div[id^='rnDialog_']{
            position: absolute !important;
            margin:0 auto !important;
            width: 400px !important;
            background-color: #fff !important;
          }

          .hd{
            background-color: #ccc !important;
          }
          .bd{
            margin-left:5px;
          }
          button[id*=_Button_], button[id*=NotificationManager] {
                -moz-user-select: none;
                background-clip: padding-box;
                background-color: #e5e5e5;
                background-image: linear-gradient(to top, #e5e5e5 0%, #efefef 45.12%, #f4f4f4 49.19%, #ffffff 100%) !important;
                background-size: 100% auto;
                border: 1px solid #adadad !important;
                border-radius: 3px;
                box-shadow: 0 2px 2px rgba(0, 0, 0, 0.06), 0 0 0 1px #fff inset;
                color: #653392 !important;
                cursor: pointer;
                display: inline-block;
                font-family: "GandhiSansBold",Arial;
                font-size: 0.9375rem;
                line-height: normal !important;
                outline: medium none;
                padding: 0.625rem 1rem;
                text-align: center;
                text-decoration: none;
                text-transform: uppercase;
                vertical-align: middle;
                width: 100%;
          }

          .rn_MessageBox b,  div#rn_ErrorLocation.rn_MessageBox.rn_ErrorMessage div b a{
            display:none;
          }
          button[id*=_Button_]:hover, button[id*=NotificationManager]:hover {
                -moz-user-select: none;
                background-clip: padding-box;
                background-color: #e5e5e5;
                background-image: linear-gradient(to top, #e5e5e5 0%, #efefef 45.12%, #f4f4f4 49.19%, #ffffff 100%) !important;
                background-size: 100% auto;
                border: 1px solid #FFBF00 !important;
                border-radius: 3px;
                box-shadow: 0 2px 2px rgba(0, 0, 0, 0.06), 0 0 0 1px #fff inset;
                color: #4C4C4C !important; 
          }
          span[id^=rn_Dialog] {
            font-size: 0.92em !important;
            font-weight: 400 !important;
            margin-left: 5px;
          }

          .rn_Heading, div[id^='rn_SmartAssistantDialog'], label[id*=Email] {
            font-size: 0.92em !important;
            margin-left: 5px;
          }
           
      </style>


    <style type='text/css'>
    .rn_ScreenReaderOnly{position:absolute; height:1px; left:-10000px; overflow:hidden; top:auto; width:1px;}
    .rn_Hidden{display:none;}
    </style>
    <!--<base href='http://134.7.100.53/rnt-attended-form/'>-->
    <style type='text/css'>
    /*Begin CSS for standard/navigation/NavigationTab2 */
    .rn_NavigationTab2{display:inline-block;}
    .rn_NavigationTab2 a{cursor:pointer;float:left;font-size:1em;font-weight:bold;height:20px;_height:18px;margin-right:4px;padding:5px 20px;position:relative;}
    .rn_NavigationTab2 .rn_DropDown{padding-right:28px;}
    .rn_NavigationTab2 a em{display:block;font-size:xx-small;height:18px;margin:3px 4px 0 0;position:absolute;right:0;top:0;width:20px;}
    .rn_NavigationTab2 .rn_SubNavigation{display:block;float:none;position:absolute;z-index:1;width:150px;}
    .rn_NavigationTab2 .rn_SubNavigation.rn_Hidden, .rn_NavigationTab2.rn_Hidden{display:none;}
    .rn_NavigationTab2 .rn_SubNavigation a{display:block;float:none;margin:0;padding:5px 0 0 10px;width:140px;}
    .rn_NavigationTab2 a{background:#EEEEEE url(/euf/assets/themes/standard/images/tabBackground.png) repeat-x scroll 0 -22px;border-top:1px solid #FFF;color:#202020;text-decoration:none;}
    .rn_NavigationTab2 a:hover, .rn_NavigationTab2 a:focus{background-color: #F8F8F8;background-position:0 -18px;color:#000;}
    .rn_NavigationTab2 a:focus{outline:thin dotted #FFF;}
    .rn_NavigationTab2 a.rn_SelectedTab{background:#FFF none repeat scroll 0 0;color:#000;}
    .rn_NavigationTab2 a em{background:url(/euf/assets/themes/standard/images/tabBackground.png) no-repeat 0 0;color:#000;font-size:0em;}
    .rn_NavigationTab2 a:hover em, .rn_NavigationTab2 a:focus em{background-position:-20px 0;}
    .rn_NavigationTab2 .rn_SubNavigation{background:#FFF none repeat scroll 0 0;border:1px solid #CCC;padding:10px 0 0;top:100px;}
    .rn_NavigationTab2 .rn_SubNavigation a{background:#FFF;border:none;color:#404040;height:auto !important;height:23px;margin-bottom:1px;min-height:23px;text-transform: none;}
    .rn_NavigationTab2 .rn_SubNavigation a:hover{background:#EEE;}
    .rn_NavigationTab2 .rn_SubNavigation a:focus{outline:thin dotted #777;}
    /*End CSS for standard/navigation/NavigationTab2 */

    /*Begin CSS for custom/cStandard/cSearch/cKeywordText2 */
    .rn_KeywordText2 input{font-size:1.333em;}
    .rn_KeywordText2{display:inline;}
    /*End CSS for custom/cStandard/cSearch/cKeywordText2 */

    /*Begin CSS for custom/cStandard/cSearch/cSearchButton2 */
    .rn_SearchButton2{display:inline;bottom: 0px;}
    .rn_SearchButton2 input{border:none;vertical-align:top;}
    .rn_SearchButton2 .rn_SubmitButton{background-color:#0E53A7;color:#FFF;cursor:pointer;font-weight:bold;}
    /*End CSS for custom/cStandard/cSearch/cSearchButton2 */

    /*Begin CSS for custom/cSearch/cAdvancedSearchDialog */
    .rn_AdvancedSearchDialog{overflow:visible;}
    .rn_AdvancedSearchDialog .rn_DialogContent{overflow:visible;padding-top:16px;position:relative;}
    .rn_AdvancedSearchDialog .rn_DialogContent .rn_SearchTips{color:#333;position:absolute;right:0px;_right:10px;top:0px;}
    .rn_AdvancedSearchDialog .rn_DialogContent .rn_AdvancedSubWidget{clear:right;overflow:hidden;padding:16px 8px;}
    .rn_AdvancedSearchDialog .rn_DialogContent .rn_AdvancedSubWidget:empty{display:none;}
    .rn_AdvancedSearchDialog .rn_DialogContent .rn_AdvancedFilter, .rn_AdvancedSearchDialog .rn_DialogContent .rn_AdvancedSort{border-top:1px solid #FFF;}
    .rn_AdvancedSearchDialog .rn_DialogContent .rn_AdvancedFilter button{width:auto !important;width:60%;max-width:60%;}
    .rn_AdvancedSearchDialog .rn_DialogContent label{color:#333;float:left;font-weight:bold;width:38%;}
    .rn_AdvancedSearchDialog .rn_DialogContent select{display:block;min-width:160px;}
    /*End CSS for custom/cSearch/cAdvancedSearchDialog */

    /*Begin CSS for custom/cSearch/cKeywordText2 */
    .rn_KeywordText2 input{font-size:1.333em;}
    .rn_KeywordText2{display:inline;}
    /*End CSS for custom/cSearch/cKeywordText2 */

    /*Begin CSS for custom/cSearch/cProductCategorySearchFilter */
    .rn_ProductCategorySearchFilter button.rn_DisplayButton{background:none;color:#000;cursor:pointer;font-weight:normal;overflow:hidden;text-overflow:ellipsis;-moz-border-radius:0;-webkit-border-radius:0;border-radius:0;-moz-box-shadow:none;-webkit-box-shadow:none;box-shadow:none;z-index:0 !important;}
    .rn_ProductCategorySearchFilter .yui-overlay-hidden .rn_Panel table{*border-collapse:separate;}
    .rn_ProductCategorySearchFilter .ygtvrow{cursor:pointer;}
    .rn_ProductCategorySearchFilter .ygtvspacer{width:1em;display:block;}
    .rn_ProductCategorySearchFilter .ygtvlabel, .rn_ProductCategorySearchFilter .ygtvlabel:link, .rn_ProductCategorySearchFilter .ygtvlabel:visited, .rn_ProductCategorySearchFilter .ygtvlabel:hover{font-size:inherit;}
    .rn_ProductCategorySearchFilter button.rn_DisplayButton{background:#FFF url(/euf/assets/themes/standard/images/splitButtonArrow.png) no-repeat scroll right center;border:1px solid #B1B1B1;min-height:1.5em;min-width:250px;padding:4px 20px 4px 4px;text-align:left;text-shadow:none;}
    .rn_ProductCategorySearchFilter .rn_Panel{background:#FFF;border:1px solid #B1B1B1;max-height:200px;overflow:auto;padding:6px;}
    .rn_ProductCategorySearchFilter button.rn_DisplayButton:hover, .rn_ProductCategorySearchFilter button.rn_DisplayButton:focus{background-color:#F8F8F8;}
    .rn_ProductCategorySearchFilter table{border-collapse:collapse;}
    .rn_ProductCategorySearchFilter .rn_Label{color:#333333;float:left;font-weight:bold;width:38%;}
    /*End CSS for custom/cSearch/cProductCategorySearchFilter */

    /*Begin CSS for custom/cLogin/cLoginForm2 */
    .rn_LoginForm2 label.rn_Hidden{display:none;}
    .rn_LoginForm2.rn_ContentLoading{background:url(/euf/assets/themes/standard/images/loading.gif) no-repeat center center;}
    .rn_LoginForm2 input{margin-bottom:5px;}
    .rn_LoginForm2 input[type="text"], .rn_LoginForm2 input[type="password"]{width:200px;}
    .rn_LoginForm2 label{margin-bottom:5px;display:block;}
    /*End CSS for custom/cLogin/cLoginForm2 */

    </style>
    <link type="text/css" rel="stylesheet" href="/rnt/rnw/yui_2.7/treeview/assets/treeview-menu.css" />
    <link rel="stylesheet" type="text/css" href="/euf/rightnow/css/developmentHeader.css"/>
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body class="subsite--default page-section"><p style="display: inline;"><input type="hidden" value="1" id="rn_VirtualBufferUpdateTrigger" name="rn_VirtualBufferUpdateTrigger"></p><div></div><iframe id="_yuiResizeMonitor" title="Text Resize Monitor" style="position: absolute; visibility: visible; width: 2em; height: 2em; top: -33px; left: 0px; border-width: 0px;"></iframe>
<form class="rn_Hidden"><input id="rn_History_Field" type="hidden"></form>


  
<!-- Google Tag Manager - Added 2015-08-10 by Gareth Hall -->
<noscript>&lt;iframe src="//www.googletagmanager.com/ns.html?id=GTM-WKWRXD"
height="0" width="0" title="Google Tag Manager" style="display:none;visibility:hidden"&gt;&lt;/iframe&gt;</noscript>
<script type="text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataCoreLayer','GTM-WKWRXD');</script>
<!-- End Google Tag Manager -->

<a href="/app/ask#skip-to-content" class="visually-hidden">Skip to main content</a>

<!-- Begin global header -->
<header class="page-header" role="banner">
  <!-- Begin global bar -->
  <div class="global-bar">
    <div class="global-bar__inner global-bar__inner--header">
      <div class="wrapper">
        <!-- Begin logo -->
        <a href="http://www.curtin.edu.au/" class="site-logo" title="Curtin University home page">
          <img src="//global.curtin.edu.au/responsive-assets/img/logo-curtin-university.png" alt="Curtin University">
        </a>
        <!-- End logo -->
        <!-- Begin global search -->
        <a href="http://search.curtin.edu.au/" class="toggle-icon toggle-icon--search curtin-icon-search"></a>
        <div class="js-cf"></div>
        <form method="get" action="http://search.curtin.edu.au/s/search.html" class="site-search" role="search">
          <input type="search" name="query" accesskey="q" class="site-search__field">
          <input type="hidden" name="collection" value="curtin-university">
          <input type="hidden" name="clive" value="curtin-web,curtin-staff,curtin-jobs,curtin-maps,curtin-entities">
          <button type="submit" class="search-button--global">Search</button>
        </form>
        <!-- End global search -->
      </div>
    </div>
    <div class="global-bar__inner global-bar__inner--footer">
      <div class="wrapper">
        <ul class="global-bar__links">
          <li><a href="http://curtin.edu.au/">Curtin Home</a></li>
          <li><a href="http://library.curtin.edu.au/">Library</a></li>
          <li><a href="http://www.curtin.edu.au/contact-us/">Contact</a></li>
        </ul><div class="cf"></div>
        <ul class="global-bar__login">
          <li class="global-bar__login--student"><a href="https://oasis.curtin.edu.au/">Student OASIS</a></li>
          <li class="global-bar__login--staff"><a href="https://staffoasis.curtin.edu.au/">Staff OASIS</a></li>
        </ul><ul class="global-bar__login--mobile">
          <li class="global-bar__login--student"><a href="https://oasis.curtin.edu.au/">Student OASIS</a></li>
          <li class="global-bar__login--staff"><a href="https://staffoasis.curtin.edu.au/">Staff OASIS</a></li>
        </ul>

        <!-- Begin mobile navigation -->
        <ul class="site-navi__layout--mobile js-main-navi">
          <li class="page_item page-item-2"><a href="http://futurestudents.curtin.edu.au/">Home</a></li>
          <li class="page_item page-item-151"><a href="http://futurestudents.curtin.edu.au/international-future-students/">International future students</a></li>
          <li class="page_item page-item-153 has-subnav"><a href="http://futurestudents.curtin.edu.au/school-leavers/">School leavers</a><i class="curtin-icon-arrow-wide-down"></i>
          <ul class="sub-menu">
          <li class="page_item page-item-168"><a href="http://futurestudents.curtin.edu.au/school-leavers/courses/">Courses</a></li>
          <li class="page_item page-item-170 has-subnav"><a href="http://futurestudents.curtin.edu.au/school-leavers/how-to-get-in/">How to get in</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-171 has-subnav"><a href="http://futurestudents.curtin.edu.au/school-leavers/ways-you-can-study/">Ways you can study</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-172"><a href="http://futurestudents.curtin.edu.au/school-leavers/studentbox/">Studentbox</a></li>
          <li class="page_item page-item-173"><a href="http://futurestudents.curtin.edu.au/school-leavers/gap-year/">Taking a gap year</a></li>
          <li class="page_item page-item-174"><a href="http://futurestudents.curtin.edu.au/school-leavers/what-it-costs/">What it costs</a></li>
          <li class="page_item page-item-175"><a href="http://futurestudents.curtin.edu.au/school-leavers/scholarships/">Scholarships</a></li>
          <li class="page_item page-item-176 has-subnav"><a href="http://futurestudents.curtin.edu.au/school-leavers/crl/">Credit for previous study or work experience</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-177"><a href="http://futurestudents.curtin.edu.au/school-leavers/glossary/">Glossary of terms</a></li>
          <li class="page_item page-item-178"><a href="http://futurestudents.curtin.edu.au/school-leavers/forms/">Forms</a></li>
          </ul>
          </li>
          <li class="page_item page-item-155 has-subnav"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/">Non school leavers</a><i class="curtin-icon-arrow-wide-down"></i>
          <ul class="sub-menu">
          <li class="page_item page-item-211"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/courses/">Courses</a></li>
          <li class="page_item page-item-212 has-subnav"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/how-to-get-in/">How to get in</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-213 has-subnav"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/ways-you-can-study/">Ways you can study</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-214"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/info-sessions/">Mature age information sessions</a></li>
          <li class="page_item page-item-215"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/what-it-costs/">What it costs</a></li>
          <li class="page_item page-item-216"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/scholarships/">Scholarships</a></li>
          <li class="page_item page-item-217 has-subnav"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/crl/">Credit for previous study or work experience</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-218"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/glossary/">Glossary of terms</a></li>
          <li class="page_item page-item-219"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/forms/">Forms</a></li>
          </ul>
          </li>
          <li class="page_item page-item-2151 has-subnav"><a href="http://futurestudents.curtin.edu.au/postgraduates/">Postgraduates</a><i class="curtin-icon-arrow-wide-down"></i>
          <ul class="sub-menu">
          <li class="page_item page-item-331"><a href="http://futurestudents.curtin.edu.au/postgraduates/courses/">Courses</a></li>
          <li class="page_item page-item-335"><a href="http://futurestudents.curtin.edu.au/postgraduates/postgraduate-expo/">Postgraduate Expo</a></li>
          <li class="page_item page-item-336"><a href="http://futurestudents.curtin.edu.au/postgraduates/research/">Research</a></li>
          <li class="page_item page-item-337 has-subnav"><a href="http://futurestudents.curtin.edu.au/postgraduates/how-to-get-in/">How to get in</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-340 has-subnav"><a href="http://futurestudents.curtin.edu.au/postgraduates/ways-you-can-study/">Ways you can study</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-346"><a href="http://futurestudents.curtin.edu.au/postgraduates/what-it-costs/">What it costs</a></li>
          <li class="page_item page-item-347"><a href="http://futurestudents.curtin.edu.au/postgraduates/scholarships/">Scholarships</a></li>
          <li class="page_item page-item-348"><a href="http://futurestudents.curtin.edu.au/postgraduates/rpl/">Credit for previous study or work experience</a></li>
          <li class="page_item page-item-349"><a href="http://futurestudents.curtin.edu.au/postgraduates/glossary/">Glossary of terms</a></li>
          <li class="page_item page-item-350"><a href="http://futurestudents.curtin.edu.au/postgraduates/forms/">Forms</a></li>
          </ul>
          </li>
          <li class="page_item page-item-159 has-subnav"><a href="http://futurestudents.curtin.edu.au/year-10s/">Year 10s</a><i class="curtin-icon-arrow-wide-down"></i>
          <ul class="sub-menu">
          <li class="page_item page-item-247"><a href="http://futurestudents.curtin.edu.au/year-10s/choosing-year-12-subjects/">Choosing Year 11 and 12 subjects</a></li>
          <li class="page_item page-item-248 has-subnav"><a href="http://futurestudents.curtin.edu.au/year-10s/prerequisites/">Prerequisite lists</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-249"><a href="http://futurestudents.curtin.edu.au/year-10s/courses/">Courses</a></li>
          <li class="page_item page-item-251"><a href="http://futurestudents.curtin.edu.au/year-10s/uni-words/">Uni words</a></li>
          </ul>
          </li>
          <li class="page_item page-item-161 has-subnav"><a href="http://futurestudents.curtin.edu.au/parents-and-teachers/">Parents and teachers</a><i class="curtin-icon-arrow-wide-down"></i>
          <ul class="sub-menu">
          <li class="page_item page-item-262 has-subnav"><a href="http://futurestudents.curtin.edu.au/parents-and-teachers/parents/">Parents</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-263 has-subnav"><a href="http://futurestudents.curtin.edu.au/parents-and-teachers/teachers/">Teachers</a><i class="curtin-icon-arrow-wide-down"></i></li>
          </ul>
          </li>
          <li class="page_item page-item-163 has-subnav"><a href="http://futurestudents.curtin.edu.au/student-life/">Student life</a><i class="curtin-icon-arrow-wide-down"></i>
          <ul class="sub-menu">
          <li class="page_item page-item-273 has-subnav"><a href="http://futurestudents.curtin.edu.au/student-life/workload/">Workload</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-274 has-subnav"><a href="http://futurestudents.curtin.edu.au/student-life/support/">Support</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-275 has-subnav"><a href="http://futurestudents.curtin.edu.au/student-life/convenience/">Convenience</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-276 has-subnav"><a href="http://futurestudents.curtin.edu.au/student-life/fun-and-fitness/">Fun, fitness and wellbeing</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-277 has-subnav"><a href="http://futurestudents.curtin.edu.au/student-life/study-areas/">Our study areas</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-278 has-subnav"><a href="http://futurestudents.curtin.edu.au/student-life/where-we-are/">Where we are</a><i class="curtin-icon-arrow-wide-down"></i></li>
          <li class="page_item page-item-279"><a href="http://futurestudents.curtin.edu.au/student-life/outreach/">Curtin Outreach</a></li>
          <li class="page_item page-item-280"><a href="http://futurestudents.curtin.edu.au/student-life/open-day/">Open Day</a></li>
          </ul>
          </li>
          <li class="page_item page-item-2300 has-subnav"><a href="http://futurestudents.curtin.edu.au/contact/">Contact us</a><i class="curtin-icon-arrow-wide-down"></i>
          <ul class="sub-menu">
          <li class="page_item page-item-2301"><a href="/app/answers/list">FAQs</a></li>
          <li class="page_item page-item-2302"><a href="/app/ask">Ask us a question</a></li>
          <li class="page_item page-item-2304"><a href="/app/appointments/">Book an appointment</a></li>
          </ul>
          </li>
          <li class="show-nav-more" style="display: block;"><a href="/app/ask#bilya">+ more</a></li>
          <li class="show-nav-less"><a href="/app/ask#">- less</a></li> 
          <li class="site-navi__item--mobile"><a href="http://library.curtin.edu.au/" data-wpel-ignored="true">Library</a></li>
          <li class="site-navi__item--mobile"><a href="http://www.curtin.edu.au/contact-us/" data-wpel-ignored="true">Contact</a></li>
        <li><a href="/app/ask#" class="js-close">Close menu <span class="curtin-icon-x"></span></a></li></ul>
      </div>
    </div>
  </div>
  <!-- End global bar -->

  <!-- Begin subsite header -->
  <div class="subsite-header">
    <div class="wrapper">
      <div class="subsite-title">
        <a href="/app/ask#">Future Students</a>
      </div>
    </div>
  </div>
  <!-- End subsite header -->

  <div class="master-header__content">
    <!-- Begin global nav -->
    <nav class="site-navi" role="navigation">
      <div class="wrapper">
        <ul class="site-navi__layout" role="menubar" aria-hidden="false">
  <li class="page_item page-item-2" role="menuitem"><a href="http://futurestudents.curtin.edu.au/">Home</a></li>
  <li class="page_item page-item-151" role="menuitem"><a href="http://futurestudents.curtin.edu.au/international-future-students/">International future students</a></li>
  <li class="page_item page-item-153 has-subnav" role="menuitem" aria-haspopup="true"><a href="http://futurestudents.curtin.edu.au/school-leavers/">School leavers</a>
  <ul class="sub-menu" data-test="true" aria-hidden="true" role="menu">
  <li class="page_item page-item-168" role="menuitem"><a href="http://futurestudents.curtin.edu.au/school-leavers/courses/" tabindex="-1">Courses</a></li>
  <li class="page_item page-item-170 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/school-leavers/how-to-get-in/" tabindex="-1">How to get in</a></li>
  <li class="page_item page-item-171 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/school-leavers/ways-you-can-study/" tabindex="-1">Ways you can study</a></li>
  <li class="page_item page-item-172" role="menuitem"><a href="http://futurestudents.curtin.edu.au/school-leavers/studentbox/" tabindex="-1">Studentbox</a></li>
  <li class="page_item page-item-173" role="menuitem"><a href="http://futurestudents.curtin.edu.au/school-leavers/gap-year/" tabindex="-1">Taking a gap year</a></li>
  <li class="page_item page-item-174" role="menuitem"><a href="http://futurestudents.curtin.edu.au/school-leavers/what-it-costs/" tabindex="-1">What it costs</a></li>
  <li class="page_item page-item-175" role="menuitem"><a href="http://futurestudents.curtin.edu.au/school-leavers/scholarships/" tabindex="-1">Scholarships</a></li>
  <li class="page_item page-item-176 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/school-leavers/crl/" tabindex="-1">Credit for previous study or work experience</a></li>
  <li class="page_item page-item-177" role="menuitem"><a href="http://futurestudents.curtin.edu.au/school-leavers/glossary/" tabindex="-1">Glossary of terms</a></li>
  <li class="page_item page-item-178" role="menuitem"><a href="http://futurestudents.curtin.edu.au/school-leavers/forms/" tabindex="-1">Forms</a></li>
  </ul>
  </li>
  <li class="page_item page-item-155 has-subnav" role="menuitem" aria-haspopup="true"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/">Non school leavers</a>
  <ul class="sub-menu" data-test="true" aria-hidden="true" role="menu">
  <li class="page_item page-item-211" role="menuitem"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/courses/" tabindex="-1">Courses</a></li>
  <li class="page_item page-item-212 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/how-to-get-in/" tabindex="-1">How to get in</a></li>
  <li class="page_item page-item-213 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/ways-you-can-study/" tabindex="-1">Ways you can study</a></li>
  <li class="page_item page-item-214" role="menuitem"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/info-sessions/" tabindex="-1">Mature age information sessions</a></li>
  <li class="page_item page-item-215" role="menuitem"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/what-it-costs/" tabindex="-1">What it costs</a></li>
  <li class="page_item page-item-216" role="menuitem"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/scholarships/" tabindex="-1">Scholarships</a></li>
  <li class="page_item page-item-217 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/crl/" tabindex="-1">Credit for previous study or work experience</a></li>
  <li class="page_item page-item-218" role="menuitem"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/glossary/" tabindex="-1">Glossary of terms</a></li>
  <li class="page_item page-item-219" role="menuitem"><a href="http://futurestudents.curtin.edu.au/non-school-leavers/forms/" tabindex="-1">Forms</a></li>
  </ul>
  </li>
  <li class="page_item page-item-2151 has-subnav" role="menuitem" aria-haspopup="true"><a href="http://futurestudents.curtin.edu.au/postgraduates/">Postgraduates</a>
  <ul class="sub-menu" data-test="true" aria-hidden="true" role="menu">
  <li class="page_item page-item-331" role="menuitem"><a href="http://futurestudents.curtin.edu.au/postgraduates/courses/" tabindex="-1">Courses</a></li>
  <li class="page_item page-item-335" role="menuitem"><a href="http://futurestudents.curtin.edu.au/postgraduates/postgraduate-expo/" tabindex="-1">Postgraduate Expo</a></li>
  <li class="page_item page-item-336" role="menuitem"><a href="http://futurestudents.curtin.edu.au/postgraduates/research/" tabindex="-1">Research</a></li>
  <li class="page_item page-item-337 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/postgraduates/how-to-get-in/" tabindex="-1">How to get in</a></li>
  <li class="page_item page-item-340 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/postgraduates/ways-you-can-study/" tabindex="-1">Ways you can study</a></li>
  <li class="page_item page-item-346" role="menuitem"><a href="http://futurestudents.curtin.edu.au/postgraduates/what-it-costs/" tabindex="-1">What it costs</a></li>
  <li class="page_item page-item-347" role="menuitem"><a href="http://futurestudents.curtin.edu.au/postgraduates/scholarships/" tabindex="-1">Scholarships</a></li>
  <li class="page_item page-item-348" role="menuitem"><a href="http://futurestudents.curtin.edu.au/postgraduates/rpl/" tabindex="-1">Credit for previous study or work experience</a></li>
  <li class="page_item page-item-349" role="menuitem"><a href="http://futurestudents.curtin.edu.au/postgraduates/glossary/" tabindex="-1">Glossary of terms</a></li>
  <li class="page_item page-item-350" role="menuitem"><a href="http://futurestudents.curtin.edu.au/postgraduates/forms/" tabindex="-1">Forms</a></li>
  </ul>
  </li>
  <li class="page_item page-item-159 has-subnav" role="menuitem" aria-haspopup="true"><a href="http://futurestudents.curtin.edu.au/year-10s/">Year 10s</a>
  <ul class="sub-menu" data-test="true" aria-hidden="true" role="menu">
  <li class="page_item page-item-247" role="menuitem"><a href="http://futurestudents.curtin.edu.au/year-10s/choosing-year-12-subjects/" tabindex="-1">Choosing Year 11 and 12 subjects</a></li>
  <li class="page_item page-item-248 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/year-10s/prerequisites/" tabindex="-1">Prerequisite lists</a></li>
  <li class="page_item page-item-249" role="menuitem"><a href="http://futurestudents.curtin.edu.au/year-10s/courses/" tabindex="-1">Courses</a></li>
  <li class="page_item page-item-251" role="menuitem"><a href="http://futurestudents.curtin.edu.au/year-10s/uni-words/" tabindex="-1">Uni words</a></li>
  </ul>
  </li>
  <li class="page_item page-item-161 has-subnav" role="menuitem" aria-haspopup="true"><a href="http://futurestudents.curtin.edu.au/parents-and-teachers/">Parents and teachers</a>
  <ul class="sub-menu" data-test="true" aria-hidden="true" role="menu">
  <li class="page_item page-item-262 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/parents-and-teachers/parents/" tabindex="-1">Parents</a></li>
  <li class="page_item page-item-263 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/parents-and-teachers/teachers/" tabindex="-1">Teachers</a></li>
  </ul>
  </li>
  <li class="page_item page-item-163 has-subnav" role="menuitem" aria-haspopup="true"><a href="http://futurestudents.curtin.edu.au/student-life/">Student life</a>
  <ul class="sub-menu" data-test="true" aria-hidden="true" role="menu">
  <li class="page_item page-item-273 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/student-life/workload/" tabindex="-1">Workload</a></li>
  <li class="page_item page-item-274 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/student-life/support/" tabindex="-1">Support</a></li>
  <li class="page_item page-item-275 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/student-life/convenience/" tabindex="-1">Convenience</a></li>
  <li class="page_item page-item-276 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/student-life/fun-and-fitness/" tabindex="-1">Fun, fitness and wellbeing</a></li>
  <li class="page_item page-item-277 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/student-life/study-areas/" tabindex="-1">Our study areas</a></li>
  <li class="page_item page-item-278 has-subnav" role="menuitem"><a href="http://futurestudents.curtin.edu.au/student-life/where-we-are/" tabindex="-1">Where we are</a></li>
  <li class="page_item page-item-279" role="menuitem"><a href="http://futurestudents.curtin.edu.au/student-life/outreach/" tabindex="-1">Curtin Outreach</a></li>
  <li class="page_item page-item-280" role="menuitem"><a href="http://futurestudents.curtin.edu.au/student-life/open-day/" tabindex="-1">Open Day</a></li>
  </ul>
  </li>
  <li class="page_item page-item-2300 has-subnav" role="menuitem" aria-haspopup="true"><a href="http://futurestudents.curtin.edu.au/contact/">Contact us</a>
  <ul class="sub-menu" data-test="true" aria-hidden="true" role="menu">
    <li class="page_item page-item-2301" role="menuitem"><a href="/app/answers/list" tabindex="-1">FAQs</a></li>
    <li class="page_item page-item-2302" role="menuitem"><a href="/app/ask" tabindex="-1">Ask us a question</a></li>
    <li class="page_item page-item-2304" role="menuitem"><a href="/app/appointments/" tabindex="-1">Book an appointment</a></li>
  </ul>
  </li>
  <li class="show-nav-more" style="display: block;" role="menuitem"><a href="/app/ask#bilya">+ more</a></li>
  <li class="show-nav-less" role="menuitem"><a href="/app/ask#">- less</a></li>
  <li class="site-navi__item--mobile" role="menuitem"><a href="http://library.curtin.edu.au/" data-wpel-ignored="true">Library</a></li>
  <li class="site-navi__item--mobile" role="menuitem"><a href="http://www.curtin.edu.au/contact-us/" data-wpel-ignored="true">Contact</a></li>
</ul>
      </div>
    </nav>
    <!-- End global nav -->
    <div class="site-navi__dropdown"></div>
  </div>
</header>
<!-- End global header -->


<!-- Begin primary panel -->
<div class="wrapper">
    <div class="row">
         <section class="main-content full" role="main">
            <div class="row">      
            <?php   
                echo '<div class="main-content" role="main" id="skip-to-content">';
                  echo '<form id="frmCampaign" method="post" action="webform.php" novalidate="novalidate" class="flow">';
                    echo '<fieldset class="campaigne">';
                    echo '<legend>Campaign Selection</legend>';
                      echo '<select name="campaign" id="campaign">';
                      echo '<option value="">---</option>';

                      echo '<option value="pgie"';
                      if(isset($_POST['set']) || isset($_POST['session']) || isset($_POST['attended']) || isset($campaign)) {
                          if(isset($campaign)) {
                            if($campaign == 'pgie') {
                                echo " selected";
                            }
                          }
                        }
                      echo '>PostGradExpo</option>';

                      echo "<option value='tbdo'";
                      if(isset($_POST['set']) || isset($_POST['session']) || isset($_POST['attended']) || isset($campaign)) {
                          if(isset($campaign)) {
                            if($campaign == 'tbdo') {
                                echo " selected";
                            }
                          }
                        }
                      echo ">Teacher's Big Day Out</option>";

                      echo '<option value="twilighttour"';
                      if(isset($_POST['set']) || isset($_POST['session']) || isset($_POST['attended']) || isset($campaign)) {
                          if(isset($campaign)) {
                            if($campaign == 'twilighttour') {
                                echo " selected";
                            }
                          }
                        }
                      echo '>Twilight Campus Tours</option>';

                      echo '<option value="mais"';
                      if(isset($_POST['set']) || isset($_POST['session']) || isset($_POST['attended']) || isset($campaign)) {
                          if(isset($campaign)) {
                            if($campaign == 'mais') {
                                echo " selected";
                            }
                          }
                        }
                      echo '>Mature Age Information Session</option>';
                      echo '</select>';
                      echo "<br />";
                      echo '<button type="submit" value="set" name="set">Set Campaign</button>';
                    echo '</fieldset>';
                  echo '</form>';
                
		            if($errorFound || !isset($_POST['submit'])) {
                
                  $reportFieldReg = array( 
                    "report_id" => "102420",
                    "campaign_lvl1" => $campaign
                  );

                  $reportFieldAtt = array( 
                    "report_id" => "102421",
                    "campaign_lvl1" => $campaign
                  );
                  
                  $registrationReport = $objRightNowAPI->getReport($reportFieldReg);
                  $attendedReport     = $objRightNowAPI->getReport($reportFieldAtt);

                  // convert soap into simple xml
                  $registrationXML = simplexml_load_string($registrationReport);
                  $attendedXML     = simplexml_load_string($attendedReport);

                  // search xml tag structure for node Row which holds the id
                  $registrationData = (array) $registrationXML->children('soapenv', true)->Body->children('n0', true)->RunAnalyticsReportResponse->CSVTableSet->CSVTables->CSVTable->Rows->Row;
                  $attendedData = (array) $attendedXML->children('soapenv', true)->Body->children('n0', true)->RunAnalyticsReportResponse->CSVTableSet->CSVTables->CSVTable->Rows->Row;

                  $eventSessions =  array();

                  if($campaign != "" && $session != "") {
                  echo '<form id="frmRegister" method="post" action="webform.php';
                    if($campaign != "") {
                      echo '?campaign='.$campaign;
                    }
                    if($session != "") {
                      echo '&session='.$session;
                    }
                    echo ' "novalidate="novalidate" class="flow">';
                    echo '<fieldset class="section">';

                      echo '<legend>Contact Details</legend>';

                      // firstname
                      echo '<label for="firstname">';
                      echo 'First name';
                      echo '<abbr class="req" title="required">*</abbr>';
                      echo '</label>';
                      echo '<input type="text" name="firstname" value="';
                      if(isset($_POST['submit'])) {
                        if($errorFound) {
                          echo $_POST['firstname'];
                        }
                      }
                      echo '" size="40" id="firstname" aria-required="true" aria-invalid="false"/>';
                      if(isset($_POST['submit'])) {
                        if($error["firstname"] == "error") {
                          echo '<span class="error">Please fill in the required field.</span>';
                        }
                      }

                      // lastname
                      echo '<label for="lastname">';
                      echo 'Last name';
                      echo '<abbr class="req" title="required">*</abbr>';
                      echo '</label>';
                      echo '<input type="text" name="lastname" value="';
                      if(isset($_POST['submit'])) {
                        if($errorFound) {
                          echo $_POST['lastname'];
                        }
                      }
                      echo '" size="40" id="lastname" aria-required="true" aria-invalid="false"/>';
                      if(isset($_POST['submit'])) {
                        if($error["lastname"] == "error") {
                          echo '<span class="error">Please fill in the required field.</span>';
                        }
                      }

                      // email
                      echo '<label for="email">';
                      echo 'Email';
                      echo '<abbr class="req" title="required">*</abbr>';
                      echo '</label>';
                      echo '<input type="text" name="email" value="';
                      if(isset($_POST['submit'])) {
                        if($errorFound) {
                          echo $_POST['email'];
                        }
                      }
                      echo '" size="40" id="email" aria-required="true" aria-invalid="false"/>';
                      if(isset($_POST['submit'])) {
                        if($error["email"] == "error") {
                          echo '<span class="error">Please fill in the required field.</span>';
                        }
                      }

                      // postcode
                      echo '<label for="postcode">';
                      echo 'Postcode';
                      echo '<abbr class="req" title="required">*</abbr>';
                      echo '</label>';
                      echo '<input type="text" name="postcode" value="';
                      if(isset($_POST['submit'])) {
                        if($errorFound) {
                          echo $_POST['postcode'];
                        }
                      }
                      echo '" size="40" id="postcode" aria-required="true" aria-invalid="false"/>';
                      if(isset($_POST['submit'])) {
                        if($error["postcode"] == "error") {
                          echo '<span class="error">Please fill in the required field.</span>';
                        }
                      }

                      // age
                      echo '<label for="age">Age';
                      echo '<abbr class="req" title="required">*</abbr>';
                      echo '</label>';
                      echo '<select name="age2" id="age" aria-invalid="false">';
                      echo '<option value=""';
                      if(isset($_POST['submit'])) {
                        if(isset($age)) {
                          if($age == '') {
                              echo " selected";
                          }
                        }
                      }
                      echo'>---</option>';
                      echo '<option value="1354"';
                      if(isset($_POST['submit'])) {
                        if(isset($age)) {
                          if($age == '1354') {
                              echo " selected";
                          }
                        }
                      }
                      echo '>17 & under</option>';
                      echo '<option value="1962"';
                      if(isset($_POST['submit'])) {
                        if(isset($age)) {
                          if($age == '1962') {
                              echo " selected";
                          }
                        }
                      }
                      echo '>18+</option>';
                      echo '<option value="1355"';
                      if(isset($_POST['submit'])) {
                        if(isset($age)) {
                          if($age == '1355') {
                              echo " selected";
                          }
                        }
                      }
                      echo '>18-19</option>';
                      echo '<option value="1356"';
                      if(isset($_POST['submit'])) {
                        if(isset($age)) {
                          if($age == '1356') {
                              echo " selected";
                          }
                        }
                      }
                      echo '>20-27</option>';
                      echo '<option value="1357"';
                      if(isset($_POST['submit'])) {
                        if(isset($age)) {
                          if($age == '1357') {
                              echo " selected";
                          }
                        }
                      }
                      echo '>28-35</option>';
                      echo '<option value="1358"';
                      if(isset($_POST['submit'])) {
                        if(isset($age)) {
                          if($age == '1358') {
                              echo " selected";
                          }
                        }
                      }
                      echo '>36-45</option>';
                      echo '<option value="1359"';
                      if(isset($_POST['submit'])) {
                        if(isset($age)) {
                          if($age == '1359') {
                              echo " selected";
                          }
                        }
                      }
                      echo '>46 & over</option>';
                      echo '</select>';
                      if(isset($_POST['submit'])) {
                        if($error["age"] == "error") {
                          echo '<span class="error">Please fill in the required field.</span>';
                        }
                      }

                      // desciption
                      echo '<label for="description">Description';
                      echo '<abbr class="req" title="required">*</abbr>';
                      echo '</label>';
                      echo '<select name="description" id="description" aria-invalid="false">';
                        echo '<option value=""';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>---</option>';
                        echo '<option value="59"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '59') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Currently in TAFE / Other</option>';
                        echo '<option value="1671"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '1671') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Currently in Year 7 or below</option>';
                        echo '<option value="1670"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '1670') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Currently in / Completed Year 8</option>';
                        echo '<option value="1669"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '1669') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Currently in / Completed Year 9</option>';
                        echo '<option value="1668"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '1668') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Currently in / Completed Year 10</option>';
                        echo '<option value="57"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '57') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Currently in / Completed Year 11</option>';
                        echo '<option value="58"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '58') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Currently in Year 12</option>';
                        echo '<option value="1690"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '1690') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Complete Year 12, going into Uni/TAFE</option>';
                        echo '<option value="1691"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '1691') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Complete Year 12, taking time off study</option>';
                        echo '<option value="60"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '60') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Currently studying at another uni</option>';
                        echo '<option value="61"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '61') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Currently studying at Curtin</option>';
                        echo '<option value="1314"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '1314') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Curtin Graduate</option>';
                        echo '<option value="1649"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '1649') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Graduate from other university</option>';
                        echo '<option value="63"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '63') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Interested parent/guardian</option>';
                        echo '<option value="62"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '62') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Mature age applicant</option>';
                        echo '<option value="64"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '64') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>School Career Counsellor</option>';
                        echo '<option value="245"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '245') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>School principal/teacher</option>';
                        echo '<option value="1634"';
                        if(isset($_POST['submit'])) {
                          if(isset($description)) {
                            if($description == '1634') {
                                echo " selected";
                            }
                          }
                        }
                        echo '>Other (Please specify)</option>';
                      echo '</select>';
                      if(isset($_POST['submit'])) {
                        if($error["description"] == "error") {
                          echo '<span class="error">Please fill in the required field.</span>';
                        }
                      }

                      // other description
                      if(isset($_POST['submit'])) {
                        if($_POST['description'] == "1634") {
                          echo '<div id="description_other">';
                          echo '<label for="other-specify-field">Other specify</label>';
                          echo '<input type="text" name="description_other" value="';
                          if(isset($_POST['submit'])) {
                            if($errorFound) {
                                echo $_POST['description_other'];
                            }
                          }
                          echo '" size="40" id="other-specify-field" aria-invalid="false"/>';
                          echo '</div>';
                          if($error["description_other"] == "error") {
                            echo '<span class="error" id="error_tag">Please fill in the required field.</span>';
                          }
                        }
                        else {
                          echo '<div id="description_other" style="display: none;">';
                          echo '<label for="other-specify-field">Other specify</label>';
                          echo '<input type="text" name="description_other" value="" size="40" id="other-specify-field" aria-invalid="false"/>';
                          echo '</div>';
                        }
                      }
                      else {
                          echo '<div id="description_other" style="display: none;">';
                          echo '<label for="other-specify-field">Other specify</label>';
                          echo '<input type="text" name="description_other" value="" size="40" id="other-specify-field" aria-invalid="false"/>';
                          echo '</div>';
                      }
                      
                      echo '<br/>';
                      // area of interest checkboxes
                      echo '<label for="rnareaofinterest">Please indicate your area of interest <abbr class="req" title="required">*</abbr></label>';
                      echo '<label><input type="checkbox" name="aoi_agri" value="1148" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_agri)) {
                          if($aoi_agri == '1148') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/>&nbsp;';
                      echo 'Agriculture, environment and sustainability</label>';
                      echo '<label><input type="checkbox" name="aoi_architecture" value="1172" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_architecture)) {
                          if($aoi_architecture == '1172') {
                              echo " checked";
                          }
                        }
                      }
                      echo' />&nbsp;';
                      echo 'Architecture and construction</label>';
                      echo '<label><input type="checkbox" name="aoi_business" value="1145" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_architecture)) {
                          if($aoi_architecture == '1172') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/> &nbsp;';
                      echo 'Business, management and law</label>';
                      echo '<label><input type="checkbox" name="aoi_culture" value="1153" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_culture)) {
                          if($aoi_culture == '1153') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/> &nbsp;';
                      echo 'Culture, language and Indigenous</label>';
                      echo '<label><input type="checkbox" name="aoi_education" value="1146" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_education)) {
                          if($aoi_education == '1146') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/> &nbsp;';
                      echo 'Education</label>';
                      echo '<label><input type="checkbox" name="aoi_engineering" value="1150" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_engineering)) {
                          if($aoi_engineering == '1150') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/> &nbsp;';
                      echo 'Engineering and mining</label>';
                      echo '<label><input type="checkbox" name="aoi_health" value="1149" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_health)) {
                          if($aoi_health == '1149') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/> &nbsp;';
                      echo 'Health</label>';
                      echo '<label><input type="checkbox" name="aoi_it" value="1152" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_it)) {
                          if($aoi_it == '1152') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/> &nbsp;';
                      echo 'IT and computing</label>';
                      echo '<label><input type="checkbox" name="aoi_research" value="1154" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_research)) {
                          if($aoi_research == '1154') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/> &nbsp;';
                      echo 'Research</label>';
                      echo '<label><input type="checkbox" name="aoi_scholarships" value="1147" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_scholarships)) {
                          if($aoi_scholarships == '1147') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/> &nbsp;';
                      echo 'Scholarships</label>';
                      echo '<label><input type="checkbox" name="aoi_science" value="1151" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_science)) {
                          if($aoi_science == '1151') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/> &nbsp;';
                      echo 'Physical sciences and mathematics</label>';
                      echo '<label><input type="checkbox" name="aoi_art" value="1144" ';
                      if(isset($_POST['submit'])) {
                        if(isset($aoi_art)) {
                          if($aoi_art == '1144') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/> &nbsp;';
                      echo 'The arts and creative industries</label>';

                    echo '</fieldset>';

                    echo '<fieldset>';
                      echo '<legend>Access requirements</legend>';
                      echo '<p>';
                      echo '<span class="form-sub-head">If you require disabled access please check the box below. We will contact you to discuss your needs.</span>';
                      echo '</p>';
                      echo '<div class="checkbox-stacked">';
                      echo '<input type="checkbox" value="1" name="event_disbaccess" id="disabled-access"';
                      if(isset($_POST['submit'])) {
                        if(isset($disability)) {
                          if($disability == '1') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/>';
                      echo '<label for="disabled-access">Disability access required (we will contact you to discuss)</label>';
                      echo '</div>';
                    echo '</fieldset>';

                    echo '<fieldset>';
                      echo '<legend>Subscribe</legend>';
                      echo '<div class="checkbox-stacked">';
                      echo '<input type="checkbox" value="1" name="ma_opt_in" id="ma_opt_in"';
                      if(isset($_POST['submit'])) {
                        if(isset($opt_in)) {
                          if($opt_in == '1') {
                              echo " checked";
                          }
                        }
                      }
                      echo '/>';
                      echo '<label for="ma_opt_in">I would like to receive further information from Curtin about courses, events and services via email.</label>';
                      echo '</div>';
                    echo '</fieldset>';

                      echo "<br />";
                      echo '<button type="submit" value="submit" name="submit">Submit</button>';
                      echo "<br />";
                      echo "<br />";

                    echo '</fieldset>';
                echo '</form>';
              }
                
                echo '</div>';
                echo '<aside class="secondary-content" role="complementary">';
                  echo '<div class="module" style="margin-top: 24px;">';
                    echo '<div>';
                      if(isset($campaign) != "") {
                        if($campaign != "") {
                          echo '<form id="frmSession" method="post" action="webform.php" novalidate="novalidate" class="flow">';
                            echo '<fieldset class="session">';
                            echo '<legend>Session</legend>';
                              echo '<select name="event_session" id="event_session">';
                              echo '<option value="">---</option>';
                              foreach ($registrationData as $registrationValue) {
                                $event_found = false;

                                $registrationValuePieces = explode(",", $registrationValue);

                                foreach ($eventSessions as $eventSessionsValue) {

                                  if ($eventSessionsValue == $registrationValuePieces[5] )
                                  {
                                      $event_found = true;
                                  }
                                }

                                // if not added yet
                                if(!$event_found) {     
                                  if($registrationValuePieces[5] != "") {            
                                    echo '<option value="'.$registrationValuePieces[5].'"';
                                    if(isset($_POST['set']) || isset($_POST['session']) || isset($_POST['attended']) || isset($session)) {
                                      if(isset($session)) {
                                        if($session == $registrationValuePieces[5]) {
                                            echo " selected";
                                        }
                                      }
                                    }
                                    echo'>'.$registrationValuePieces[5].'</option>';
                                    $eventSessions[$registrationValuePieces[5]] = $registrationValuePieces[5];
                                  }
                                }
                              }
                              echo '</select>';
                              echo '<input type="hidden" name="campaign" value="'.$campaign.'">';
                              echo "<br />";
                              echo '<button type="submit" value="session" name="session">Set Session</button>';
                            echo '</fieldset>';
                          echo '</form>';
                          if(isset($_POST['submit'])) {
                            if($error["session"] == "error") {
                              echo '<span class="error">Please fill in the required field.</span>';
                            }
                          }
                        }
                      }
                    echo '</div>';
                  echo '</div>';
                echo '</aside>';
            	}
            	else {
            		echo '<header class="main-content__header">';
                      	echo '<h1 class="page-title">Postgrad expo &#8211; thank you</h1>';
                      	echo '<div class="main-content__header__info">';
                        	echo '<div class="main-content__header__title"></div>';
                      	echo '</div>';
                    	echo '</header><!-- .main-content__header -->';

                    	echo '<div class="editable-content">';
                       	echo '<p>Thank you for registering for the Postgrad Expo.</p>';
                      
            		echo '<p>You will receive a confirmation email shortly. We look forward to seeing you at the event!</p>';
            		echo '<p>&nbsp;</p>';
                    	echo '</div><!-- .editable-content -->';
            	}
            
            ?>
            </div>
        </section>
    </div>
</div>
<!-- End primary panel -->


<!-- Begin global footer -->
<footer class="page-footer" role="contentinfo">
  <div class="page-footer__header">
    <div class="border"></div>
  </div>
  <div class="page-footer__content">
    <div class="wrapper">
      <div class="page-footer__content--1 slide-toggle">
        <h2 class="page-footer__content__title">Curtin campuses</h2><h2 class="button">Curtin campuses<i class="curtin-icon-arrow-wide-down"></i></h2>
        <div class="slide-toggle__content boxed">
          <p>We have campuses across Australia and Asia.</p>
          <div class="contact-panel">
            <a href="https://www.google.com.au/maps/place/Curtin+University/@-32.0023512,115.8922161,15z/data=!3m1!4b1!4m2!3m1.1.1x0:0x8623a5870014444e" class="contact-panel__title"><span>Current campus:</span>Kent Street, Bentley, Perth, Western Australia 6102</a>
            <ul class="contact-panel__content">
              <li><a href="http://properties.curtin.edu.au/maps/">Maps</a></li>
              <li><a href="http://about.curtin.edu.au/getting-here-and-parking.cfm">Getting here</a></li>
              <li><a href="http://library.curtin.edu.au/">Library</a></li>
              <li><a href="http://properties.curtin.edu.au/parking/">Parking</a></li>
            </ul>
          </div>
          <div class="dropdown other-locations">
            <div class="dropdown__button">
              <div class="dropdown__button__toggle"><i class="curtin-icon-arrow-wide-down"></i></div>
              <div class="dropdown__button__label">Select a different campus website</div>
            </div>
            <ul class="dropdown__menu link-list--high-contrast" role="menu">
              <li><a href="http://www.curtin.edu.au/">Perth, WA</a></li>
              <li><a href="http://about.curtin.edu.au/campusinfo/locations.cfm">Other WA campuses</a></li>
              <li><a href="http://sydney.curtin.edu.au/">Curtin Sydney</a></li>
              <li><a href="http://www.curtin.edu.my/">Curtin Sarawak</a></li>
              <li><a href="http://www.curtin.edu.sg/">Curtin Singapore</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="page-footer__content--2 slide-toggle">
        <h2 class="page-footer__content__title">Teaching Areas</h2><h2 class="button">Teaching Areas<i class="curtin-icon-arrow-wide-down"></i></h2>
        <div class="slide-toggle__content">
          <ul class="link-list">
            <li><a href="http://karda.curtin.edu.au/">Centre for Aboriginal Studies</a></li>
            <li><a href="http://business.curtin.edu.au/">Curtin Business School</a></li>
            <li><a href="http://healthsciences.curtin.edu.au/">Health Sciences</a></li>
            <li><a href="http://humanities.curtin.edu.au/">Humanities</a></li>
            <li><a href="http://scieng.curtin.edu.au/">Science and Engineering</a></li>
          </ul>
        </div>
      </div>
      <div class="page-footer__content--3 slide-toggle">
        <h2 class="page-footer__content__title">Contact</h2><h2 class="button">Contact<i class="curtin-icon-arrow-wide-down"></i></h2>
        <div class="slide-toggle__content">
          <ul class="link-list">
            <li>
              <a href="/app/answers/list" rel="nofollow" title="" class="ext-link">

                                FAQs</a></li>
            <li>
              <a href="/app/ask" rel="nofollow" title="" class="ext-link">Ask us a new question</a></li>
            <li>
              <a href="/app/appointments/" rel="nofollow" title="" class="ext-link">Book an appointment</a></li>
            <li><a href="https://www.google.com.au/maps/place/Future+Students+Centre/@-32.0048769,115.8936588,17z/data=!3m1!4b1!4m2!3m1.1.1x2a32bc8934dcd635:0xc6c442fdb129fc6a" rel="nofollow" title="" class="ext-link">Visit us</a></li>
          </ul>
          <div class="vcard">
            <div class="org">Curtin University</div>
            <div class="tel"><strong>Telephone enquiries</strong><a href="tel:+6192661000" title="Call +6192661000">+61 9266 1000</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page-footer__social-media">
    <div class="wrapper">
      <h3><a href="http://www.curtin.edu.au/socialmedia/">Connect with Curtin</a></h3>
      <ul>
        <li><a href="http://twitter.com/curtinuni" class="ss-icon social-twitter" title="Follow us on Twitter">?</a></li>
        <li><a href="http://facebook.com/curtinuniversity" class="ss-icon social-facebook" title="Like us on Facebook">?</a></li>
        <li><a href="http://instagram.com/curtinuniversity" class="ss-icon social-instagram" title="Follow us on Instagram">?</a></li>
        <li><a href="http://www.youtube.com/user/CurtinUniversity" class="ss-icon social-youtube" title="Follow us on YouTube">?</a></li>
        <li><a href="https://plus.google.com/+curtinuniversity/" class="ss-icon social-googleplus" title="Follow us on Google+">?</a></li>
        <li><a href="http://www.linkedin.com/company/curtinuniversity" class="ss-icon social-linkedin" title="Follow us on LinkedIn">?</a></li>
      </ul>
    </div>
  </div>
  <div class="page-footer__copyright">
    <div class="wrapper">
      <div class="cricos">
        <p><strong>CRICOS Provider Code: 00301J</strong>
        <small>ABN: 99 143 842 569</small>
        <small>TEQSA: <a href="http://www.teqsa.gov.au/national-register/provider/prv12158" rel="nofollow" title="" class="ext-link">PRV12158</a></small>
        <small>Curtin University is a trademark of Curtin University of Technology</small>
        <small>Page last modified: August 18, 2015</small>
        </p>
      </div>
      <ul class="copyright">
        <li><a href="http://global.curtin.edu.au/legal/">Copyright and disclaimer</a></li>
        <li><a href="http://global.curtin.edu.au/legal/privacy.cfm/">Privacy statement</a></li>
        <li><a href="http://www.curtin.edu.au/accessibility/">Accessibility information</a></li>
      </ul>
    </div>
  </div>
  <div class="page-footer__credits">
    <div class="wrapper">
      <div class="aus-tech-network">
        <a href="http://www.atn.edu.au/" title="Visit Australian Technology Network of Universities website">
          <img src="//global.curtin.edu.au/responsive-assets/img/logo-australian-technology-network.png" alt="Australian Technology Network of Universities">
        </a>
      </div>
      <div class="indigenous-welcome">
        <p>Curtin would like to pay respect to the indigenous members of our community by acknowledging the traditional Nyungar owners of this land.<br>
          <a href="http://about.curtin.edu.au/traditional-aboriginal-welcome.cfm">Watch our traditional Aboriginal welcome</a></p>
      </div>
    </div>
  </div>
</footer>

<!-- Begin scripts -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//global.curtin.edu.au/assets/1.1.1/js/yepnope.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.js"></script>

  <script>
    jQuery(document).ready(function($) {

      // Syntax highlight
      $("pre").addClass("prettyprint");
      prettyPrint();

      // Smooth scrolling
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
      $(".main-content a[href=#]").click(function() {
        return false;
      });
    });
  </script>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

</html>
