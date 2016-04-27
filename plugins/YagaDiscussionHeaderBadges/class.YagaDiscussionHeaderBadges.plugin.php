<?php if (!defined('APPLICATION')) exit();

// Define the plugin:
$PluginInfo['YagaDiscussionHeaderBadges'] = array(
   'Description' => 'This plugin shows badges in the AuthorInfo of a discussion header.',
   'Version' => '0.1.3',
   'Author' => "Martin Wahnschaffe",
   'AuthorEmail' => 'martin@imagineearth.info',
   'AuthorUrl' => 'http://www.imagineearth.info',
   'License'     => 'GPLv3',
);


class YagaDiscussionHeaderBadgesPlugin extends Gdn_Plugin {

  /**
    * Base_Render_Before Event Hook
    *
    * This is a common hook that fires for all controllers (Base), on the Render method (Render), just 
    * before execution of that method (Before). It is a good place to put UI stuff like CSS and Javascript 
    * inclusions. Note that all the Controller logic has already been run at this point.
    *
    * @param $Sender Sending controller instance
    */
  public function Base_Render_Before($Sender) {
	$Sender->AddCssFile($this->GetResource('design/badges.css', FALSE, FALSE));
  }
   
  public function DiscussionController_AuthorInfo_Handler($Sender, $Args) {
    	// Get the user object from the controller, I am just guessing with this line
	$UserID = $Sender->EventArguments['Author']->UserID;
    
	$BadgeAwardModel = Yaga::BadgeAwardModel();
    	$Badges = $BadgeAwardModel->GetByUser($UserID);

	foreach($Badges as $Badge) {
		echo Anchor(
			Img($Badge['Photo']),
			'badges/detail/' . $Badge['BadgeID'] . '/' . Gdn_Format::Url($Badge['Name']),
			array('title' => $Badge['Name']),
			array('class' => 'DiscussionHeaderBadge')
		);
	}
  }
}