<?php if (!defined('APPLICATION')) exit();
  $PluginInfo['CustomHomepage'] = array(
   'Name' => 'Custom Homepage',
   'Description' => 'This plugin allows users to set their own choices for which homepage they will see when they connect to the forum.',
   'Version' => '0.2.2',
   'Author' => "doycet",
   'AuthorEmail' => 'doyce.testerman@gmail.com',
   'AuthorUrl' => 'http://vanillaforums.org/discussion/27138/any-to-give-users-their-own-selection-of-homepage-layout'
);


class CustomHomepagePlugin extends Gdn_Plugin {

public function UserModel_AfterGetSession_Handler($Sender) {
    $Request = Gdn::Request();
   if($Request->Path() == '') {
   $User = $Sender->EventArguments['User'];

// override the default controller route temporarily if it has been set

   $Controller = $this->GetUserMeta($User->UserID, 'DefaultController', FALSE, TRUE);
   if($Controller) {
   Gdn::Router()->SetRoute('DefaultController', $Controller, 'Internal', FALSE);
   }
 }
}

public function Gdn_Dispatcher_AfterControllerCreate_Handler($Sender) {
   $User = Gdn::Session()->User;
   $Controller = $Sender->EventArguments['Controller'];

// override the default layout temporarily if applicable

   switch($Controller->ControllerName) {
   case 'discussionscontroller':
   $DiscussionsLayout = $this->GetUserMeta($User->UserID, 'DiscussionsLayout', C('Vanilla.Discussions.Layout', NULL), TRUE);
   SaveToConfig('Vanilla.Discussions.Layout', $DiscussionsLayout, array('Save' => FALSE));
   break;
   case 'categoriescontroller':
   $CategoriesLayout = $this->GetUserMeta($User->UserID, 'CategoriesLayout', C('Vanilla.Categories.Layout', NULL), TRUE);
   SaveToConfig('Vanilla.Categories.Layout', $CategoriesLayout, array('Save' => FALSE));
   break;
   }
}

/*public function ProfileController_EditMyAccountAfter_Handler($Sender) {
   $User = $Sender->User;

// Load their current settings

   $Controller = $this->GetUserMeta($User->UserID, 'DefaultController', FALSE, TRUE);
   $DiscussionsLayout = $this->GetUserMeta($User->UserID, 'DiscussionsLayout', FALSE, TRUE);
   $CategoriesLayout = $this->GetUserMeta($User->UserID, 'CategoriesLayout', FALSE, TRUE);

// Save the settings to the form
   
   $Sender->Form->SetValue('DefaultController', $Controller);
   $Sender->Form->SetValue('DiscussionsLayout', $DiscussionsLayout);
   $Sender->Form->SetValue('CategoriesLayout', $CategoriesLayout);
   $ControllerOptions = array(
   'discussions' => 'Discussion List',
   'categories' => 'Category List'
   );
   $LayoutOptions = array(
   'modern' => T('Modern non-table-based layout'),
   'table' => T('Classic table layout used by traditional forums')
   );
   echo '<li class="Homepage">';
   echo $Sender->Form->Label('Homepage View', 'DefaultController');
   echo $Sender->Form->DropDown('DefaultController', $ControllerOptions, array('IncludeNull' => TRUE));
   echo $Sender->Form->Label('Discussions View', 'DiscussionsLayout');
   echo $Sender->Form->DropDown('DiscussionsLayout', $LayoutOptions, array('IncludeNull' => TRUE));
   $LayoutOptions['mixed'] = T('All categories listed with a selection of 5 recent discussions under each');
   echo $Sender->Form->Label('Categories View', 'CategoriesLayout');
   echo $Sender->Form->DropDown('CategoriesLayout', $LayoutOptions, array('IncludeNull' => TRUE));
   echo '</li>';
}
*/
public function ProfileController_EditMyAccountAfter_Handler($Sender) {
            $ControllerOptions = array(
                'discussions' => 'Discussion List',
                'categories' => 'Category List'
            );
            $CLayoutOptions = $DLayoutOptions = array(
                'modern' => T('Modern non-table-based layout'),
                'table' => T('Classic table layout used by traditional forums')
            );
            $CLayoutOptions['mixed'] = T('All categories listed with a selection of 5 recent discussions under each');
    // retrieve previously selected values.
            if ($ControllerSelected = $this->GetUserMeta($Sender->User->UserID, 'DefaultController')) {
                $ControllerSelected = array_values($ControllerSelected);
                $dvalue = getvalue($ControllerSelected[0], $ControllerOptions);
                $dunshift = $ControllerSelected[0] = $dvalue;
                array_unshift($ControllerOptions, $dunshift);
            }
            if ($DiscussionsLayout = $this->GetUserMeta($Sender->User->UserID, 'DiscussionsLayout')) {
                $DiscussionsLayout = array_values($DiscussionsLayout);
                $dvalue = getvalue($DiscussionsLayout[0], $DLayoutOptions);
                $dunshift = $DiscussionsLayout[0] = $dvalue;
                array_unshift($DLayoutOptions, $dunshift);
            }
            if ($CategoriesLayout = $this->GetUserMeta($Sender->User->UserID, 'CategoriesLayout')) {
                $CategoriesLayout = array_values($CategoriesLayout);
                $dvalue = getvalue($CategoriesLayout[0], $CLayoutOptions);
                $dunshift = $CategoriesLayout[0] = $dvalue;
                array_unshift($CLayoutOptions, $dunshift);
            }
            echo '<li class="Homepage">';
            echo $Sender->Form->Label('Homepage View', 'DefaultController');
            echo $Sender->Form->DropDown('DefaultController', $ControllerOptions);
            echo $Sender->Form->Label('Discussions View', 'DiscussionsLayout');
            echo $Sender->Form->DropDown('DiscussionsLayout', $DLayoutOptions);
            echo $Sender->Form->Label('Categories View', 'CategoriesLayout');
            echo $Sender->Form->DropDown('CategoriesLayout', $CLayoutOptions);
            echo '</li>';
        }
           
public function UserModel_AfterSave_Handler($Sender) {
   $FormValues = $Sender->EventArguments['FormPostValues'];
   $UserID = val('UserID', $FormValues, 0);

// Require valid user ID

   if(!is_numeric($UserID) || $UserID <= 0) {
   return;
   }
   $DefaultController = val('DefaultController', $FormValues, FALSE);
   if($DefaultController) {
   $this->SetUserMeta($UserID, 'DefaultController', $DefaultController);
   }
   $DiscussionsLayout = val('DiscussionsLayout', $FormValues, FALSE);
   if($DiscussionsLayout) {
   $this->SetUserMeta($UserID, 'DiscussionsLayout', $DiscussionsLayout);
   }
   $CategoriesLayout = val('CategoriesLayout', $FormValues, FALSE);
   if($CategoriesLayout) {
   $this->SetUserMeta($UserID, 'CategoriesLayout', $CategoriesLayout);
   }
   }
}