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
    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    } else {
        $description = "";
    }

    $contactFields = array( 
        "email" => $email,
        "firstname" => $first_name,
        "lastname" => $last_name,
        "custom_fields" => array(
            "description" => $description
    ));

    $incidentFields = array(
        "subject" => "StudentBox Registration",
        "thread" => "StudentBox Registration",
        );

    $objRightNowAPI = new RightNowAPI();
    $test = $objRightNowAPI->createContactIncident($contactFields, $incidentFields);

    if($test!=''){
        header("Location:thankyou/index.html");
    }
    else{
        
    }

}

?>
<html lang="en" xmlns:og="http://ogp.me/ns#"><head data-layout-view="simple" class="xj_layout_head">
<title>Step 2) Create Your Profile on Studentbox - Studentbox</title>

<style type="text/css" media="screen,projection">
@import url(http://static.ning.com/socialnetworkmain/widgets/index/css/common-982.min.css?xn_version=2665753446);
@import url(http://static.ning.com/socialnetworkmain/widgets/index/css/component.min.css?xn_version=3166809551);
@import url(http://static.ning.com/socialnetworkmain/widgets/index/css/paidaccess.css?xn_version=122287764);
</style>
<style type="text/css" media="screen,projection">
@import url(http://api.ning.com:80/files/yki3KxYnc55KK3Zji5whhWEOVLxaKaEiT8nFeoK8KGjqwsbKbJeaVoqtIsTTEaUqU5Kxc0ZFI4D7GWWQuve7nQG1qiU5hAsy/1182897353.css?xn_version=201602291910);
</style>
<style type="text/css" media="screen,projection">
    
@import url(http://api.ning.com:80/files/MsUDKlVI-MOi7STn8gNiLYkoXggoPl3kfBI0HQb37oT0CIrp6TZfibAo3A2LGacIp5xska1S2u9Fotel4PxaxBZKDhYGmzs0/1182913611.css?xn_version=201602291910);

</style>
</head>
<body>

<div class="xg_theme" data-layout-pack="romeo">
    <div id="xg_themebody">
        <div id="xg" class="account xg_widget_main xg_widget_main_authorization xg_widget_main_authorization_newProfile">
            <div id="xg_body">
                <div id="xg_canvas" class="xj_canvas">  
                    <form id="profile_form" method="post" action="studentbox_form.php">
                        <input type="hidden" name="xg_token" value="9f30539ac2b0234dde6315712cd72b29">    <div class="xg_module xg_lightborder">
                        <div class="xg_module_body pad">
                            <h2>Step 2) Create Your Profile on Studentbox</h2>
                            <p>Last step! Tell us a bit about yourself</p>
                            <p class="dy-small xg_lightfont"><img src="http://static.ning.com/socialnetworkmain/widgets/index/gfx/icon/privacy.gif?xn_version=1777564376" alt="Private" title="Private"> indicates answers are only visible to administrators</p>
                                <fieldset class="nolegend profile profile_questions">
                                    <p>
                                    <label for="question_2">First Name *</label><img src="http://static.ning.com/socialnetworkmain/widgets/index/gfx/icon/privacy.gif?xn_version=1777564376" alt="Private" title="Private"><br>
                                    <input type="text" name="first_name" class="textfield" id="question_2">            
                                    </p>
                                    <p>
                                    <label for="question_3">Last Name *</label><img src="http://static.ning.com/socialnetworkmain/widgets/index/gfx/icon/privacy.gif?xn_version=1777564376" alt="Private" title="Private"><br>
                                    <input type="text" name="last_name" class="textfield" id="question_3">            
                                    </p>
                                    <p>
                                    <label for="question_4">Email *</label><img src="http://static.ning.com/socialnetworkmain/widgets/index/gfx/icon/privacy.gif?xn_version=1777564376" alt="Private" title="Private"><br>
                                    <input type="text" name="email" class="textfield" id="question_4">            
                                    </p>           
                                    <dl id="countryContainer" _required="1">
                                        <dt class="align-left"><label for="country">Description</label></dt>
                                        <dd>
                                            <select name="description" id="description" aria-invalid="false">
                                                <option value="">---</option>
                                                <option value="59">Currently in TAFE / Other</option>
                                                <option value="1671">Currently in Year 7 or below</option>
                                                <option value="1670">Currently in / Completed Year 8</option>
                                                <option value="1669">Currently in / Completed Year 9</option>
                                                <option value="1668">Currently in / Completed Year 10</option>
                                                <option value="57">Currently in / Completed Year 11</option>
                                                <option value="58">Currently in Year 12</option>
                                                <option value="1690">Complete Year 12, going into Uni/TAFE</option>
                                                <option value="1691">Complete Year 12, taking time off study</option>
                                                <option value="60">Currently studying at another uni</option>
                                                <option value="61">Currently studying at Curtin</option>
                                                <option value="1314">Curtin Graduate</option>
                                                <option value="1649">Graduate from other university</option>
                                                <option value="63">Interested parent/guardian</option>
                                                <option value="62">Mature age applicant</option>
                                                <option value="64">School Career Counsellor</option>
                                                <option value="245">School principal/teacher</option>
                                                <option value="1634">Other (Please specify)</option>
                                            </select>
                                        </dd>
                                    </dl> 
                                    <p>
                                    <input type="checkbox" name="question_4" class="checkbox" id="question_4"> 
                                    <label for="question_4">I agree to the <a href="termsofservice.html">terms of service</a></label>           
                                    </p>                        
                                </fieldset>
                                <button class="button--primary-submit" type="submit" id="submit" name="submit">Express your interest</button>         
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>