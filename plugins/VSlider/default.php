<?php if (!defined('APPLICATION')) exit();
/*
Copyright 2008, 2014 Vanilla Forums Inc.
This file is part of Garden.
Garden is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
Garden is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with Garden.  If not, see <http://www.gnu.org/licenses/>.
Contact Vanilla Forums Inc. at support [at] vanillaforums [dot] com
*/

// Define the plugin:


$PluginInfo['VSlider'] = array(
   'Name'=>'VSlider',
   'Description' => "This plugin adds an image slider carousel to the Discussions Index Header below the menu. You can add unlimited images or text and use it as a banner. ",
   'Version' => '1.3',
   'Author' => "VrijVlinder",
   'AuthorEmail' => 'contact@vrijvlinder.com',
   'AuthorUrl' => "http://www.vrijvlinder.com"
);

class VSlider_Plugin extends Gdn_Plugin {

  public function __construct() {
      
   }

  
  

	
   public function Setup() {
		
   }


public function DiscussionsController_Render_Before($Sender) {
//comment this if you want it in the categories index page

  if(IsMobile()){
 return;
}
else
{
$Sender->AddJsFile('plugins/VSlider/js/vslider.js');

   }

}
  
	   
 public function CategoriesController_Render_Before($Sender) {
//uncomment this if you want it in the categories index page
//   if(IsMobile()){
 //return;
//}
//else
//{
//$Sender->AddJsFile('plugins/VSlider/js/vslider.js');
//} 
 
     }
     public function OnDisable() {
      return TRUE;
   }

}


	
        	   
