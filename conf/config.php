<?php if (!defined('APPLICATION')) exit();

// Conversations
$Configuration['Conversations']['Version'] = '2.2';

// Database
$Configuration['Database']['Name'] = 'vanilla';
$Configuration['Database']['Host'] = 'localhost';
$Configuration['Database']['User'] = 'root';
$Configuration['Database']['Password'] = '';

// EnabledApplications
$Configuration['EnabledApplications']['Conversations'] = 'conversations';
$Configuration['EnabledApplications']['Vanilla'] = 'vanilla';
$Configuration['EnabledApplications']['Yaga'] = 'yaga';

// EnabledPlugins
$Configuration['EnabledPlugins']['GettingStarted'] = 'GettingStarted';
$Configuration['EnabledPlugins']['HtmLawed'] = 'HtmLawed';
$Configuration['EnabledPlugins']['CreativeCLEditor'] = true;
$Configuration['EnabledPlugins']['CustomHomepage'] = true;
$Configuration['EnabledPlugins']['CustomPages'] = true;
$Configuration['EnabledPlugins']['DiscussionEvent'] = true;
$Configuration['EnabledPlugins']['IndexPhotos'] = true;
$Configuration['EnabledPlugins']['EasyReply'] = true;
$Configuration['EnabledPlugins']['Flagging'] = true;
$Configuration['EnabledPlugins']['GooglePlus'] = true;
$Configuration['EnabledPlugins']['Gravatar'] = true;
$Configuration['EnabledPlugins']['Groups'] = true;
$Configuration['EnabledPlugins']['HotThreads'] = true;
$Configuration['EnabledPlugins']['LatestPostList'] = true;
$Configuration['EnabledPlugins']['MembersListEnh'] = true;
$Configuration['EnabledPlugins']['Memberships'] = true;
$Configuration['EnabledPlugins']['ProfileExtender'] = true;
$Configuration['EnabledPlugins']['Quotes'] = true;
$Configuration['EnabledPlugins']['RecentActivity'] = true;
$Configuration['EnabledPlugins']['RegistrationGroup'] = true;
$Configuration['EnabledPlugins']['Tagging'] = true;
$Configuration['EnabledPlugins']['TopPosters'] = true;
$Configuration['EnabledPlugins']['Twitter'] = true;
$Configuration['EnabledPlugins']['VSlider'] = true;
$Configuration['EnabledPlugins']['YagaDiscussionHeaderBadges'] = true;

// Garden
$Configuration['Garden']['Title'] = 'Vanilla 2';
$Configuration['Garden']['Cookie']['Salt'] = '5wqJ1i7XaDvQ5Q9C';
$Configuration['Garden']['Cookie']['Domain'] = '';
$Configuration['Garden']['Registration']['ConfirmEmail'] = true;
$Configuration['Garden']['Email']['SupportName'] = 'Vanilla 2';
$Configuration['Garden']['SystemUserID'] = '1';
$Configuration['Garden']['InputFormatter'] = 'Html';
$Configuration['Garden']['Version'] = '2.2';
$Configuration['Garden']['Cdns']['Disable'] = false;
$Configuration['Garden']['CanProcessImages'] = true;
$Configuration['Garden']['Installed'] = true;
$Configuration['Garden']['Theme'] = 'bittersweet';
$Configuration['Garden']['HomepageTitle'] = 'Vanilla 2';
$Configuration['Garden']['Description'] = '';
$Configuration['Garden']['Logo'] = 'I7M66RVZBMLV.jpg';
$Configuration['Garden']['FavIcon'] = 'favicon_ccc3be690339a5d0.ico';
$Configuration['Garden']['Html']['SafeStyles'] = false;

// Plugin
$Configuration['Plugin']['HotThreads']['HideIfEmpty'] = '1';
$Configuration['Plugin']['HotThreads']['AutoUpdateDelay'] = '120';
$Configuration['Plugin']['HotThreads']['MaxEntriesToDisplay'] = '10';
$Configuration['Plugin']['HotThreads']['DisplayPageSet'] = 'all';
$Configuration['Plugin']['HotThreads']['AgeThreshold'] = '30';
$Configuration['Plugin']['HotThreads']['ViewsThreshold'] = '10';
$Configuration['Plugin']['HotThreads']['CommentsThreshold'] = '1';

// Plugins
$Configuration['Plugins']['GettingStarted']['Dashboard'] = '1';
$Configuration['Plugins']['GettingStarted']['Plugins'] = '1';
$Configuration['Plugins']['GettingStarted']['Discussion'] = '1';
$Configuration['Plugins']['GettingStarted']['Categories'] = '1';
$Configuration['Plugins']['DiscussionEvent']['DisplayInSidepanel'] = true;
$Configuration['Plugins']['DiscussionEvent']['MaxDiscussionEvents'] = 10;
$Configuration['Plugins']['Groups']['Enabled'] = true;
$Configuration['Plugins']['LatestPostList']['Frequency'] = 120;
$Configuration['Plugins']['LatestPostList']['Effects'] = 'none';
$Configuration['Plugins']['LatestPostList']['Count'] = 5;
$Configuration['Plugins']['LatestPostList']['Pages'] = 'all';
$Configuration['Plugins']['LatestPostList']['Link'] = 'discussions';
$Configuration['Plugins']['Memberships']['Enabled'] = true;

// Routes
$Configuration['Routes']['DefaultController'] = 'discussions';
$Configuration['Routes']['Xm1lbWJlcnMoLy4qKT8k'] = array('plugin/MembersListEnh$1', 'Internal');

// TopPosters
$Configuration['TopPosters']['Limit'] = '1';
$Configuration['TopPosters']['Location']['Show'] = 'discussion';
$Configuration['TopPosters']['Excluded'] = false;

// Vanilla
$Configuration['Vanilla']['Version'] = '2.2';

// Yaga
$Configuration['Yaga']['Version'] = '1.1';

// Last edited by admin (127.0.0.1)2016-04-27 11:57:07