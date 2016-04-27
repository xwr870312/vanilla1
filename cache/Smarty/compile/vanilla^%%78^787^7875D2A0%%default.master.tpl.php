<?php /* Smarty version 2.6.25, created on 2016-04-27 11:33:18
         compiled from /Applications/XAMPP/xamppfiles/htdocs/vanilla/themes/bittersweet/views/default.master.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'asset', '/Applications/XAMPP/xamppfiles/htdocs/vanilla/themes/bittersweet/views/default.master.tpl', 4, false),array('function', 'searchbox', '/Applications/XAMPP/xamppfiles/htdocs/vanilla/themes/bittersweet/views/default.master.tpl', 18, false),array('function', 'link', '/Applications/XAMPP/xamppfiles/htdocs/vanilla/themes/bittersweet/views/default.master.tpl', 25, false),array('function', 'logo', '/Applications/XAMPP/xamppfiles/htdocs/vanilla/themes/bittersweet/views/default.master.tpl', 25, false),array('function', 'module', '/Applications/XAMPP/xamppfiles/htdocs/vanilla/themes/bittersweet/views/default.master.tpl', 96, false),array('function', 'vanillaurl', '/Applications/XAMPP/xamppfiles/htdocs/vanilla/themes/bittersweet/views/default.master.tpl', 104, false),array('function', 'event', '/Applications/XAMPP/xamppfiles/htdocs/vanilla/themes/bittersweet/views/default.master.tpl', 110, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
    <?php echo smarty_function_asset(array('name' => 'Head'), $this);?>


</head>
<body id="<?php echo $this->_tpl_vars['BodyID']; ?>
" class="<?php echo $this->_tpl_vars['BodyClass']; ?>
">
<div id="Frame">
    <div class="Top">
        <div class="Row">
            <div class="TopMenu">
                
                
                

                <a href="#">Sign up</a>
                <a href="#">Sign in</a>
                <div class="SiteSearch"><?php echo smarty_function_searchbox(array(), $this);?>
</div>
              
            </div>
        </div>
    </div>
    <div class="Banner">
        <div class="Row">
            <strong class="SiteTitle"><a href="<?php echo smarty_function_link(array('path' => "/"), $this);?>
"><?php echo smarty_function_logo(array(), $this);?>
</a></strong>
            <!--
            We've placed this optional advertising space below. Just comment out the line and replace "Advertising Space" with your 728x90 ad banner.
            -->
            <!-- <div class="AdSpace">Advertising Space</div> -->
        </div>
    </div>
    <div id="Head">
        <div class="Row">
            <ul class="SiteMenu">
                <li><a href="<?php echo smarty_function_link(array('path' => "/"), $this);?>
">HOME</a></li>
                <li><a>ABOUT+</a>
                    <ul class="sub-menu">
                    <li><a href="http://localhost/vanilla/index.php?p=/page/new-page-test">GETTING STARTED</a></li>
                    <li><a>FAQ</a></li>
                    <li><a>COMMUNITIES GUIDELINES</a></li>
                    <li><a href="/vanilla/index.php?p=/plugin/page/useragreement">USER AGREEMENT</a></li>
                    <li><a>SAFETY ONLINE</a></li>
                    <li><a href="/vanilla/index.php?p=/plugin/page/privacy">PRIVACY</a></li>
                    </ul>
                </li>
                <li><a>STUDY & EXAMS+</a>
                    <ul class="sub-menu">
                    <li><a>REVISION RESOURCES</a></li>
                    <li><a>PAST WACE EXAMS</a></li>
                    <li><a>ATAR CALCULATOR GUIDE</a></li>
                    <li><a>WACE EXAM TIMETABLES</a></li>
                    <li><a>CHEAT SHEETS</a></li>
                    <li><a>COVER SHEETS</a></li>
                    <li><a>VIDEO TUTORIALS</a></li>
                    <li><a>STUDY TIPS</a></li>
                    <li><a>EXAM TIPS</a></li>
                    <li><a>HEALTH TIPS</a></li>
                    </ul>
                </li>
                <li><a>COMMUNITY+</a>
                    <ul class="sub-menu">
                    <li><a>FORUMS</a></li>
                    <li><a>BLOGS</a></li>
                    <li><a>GROUPS</a></li>
                    <li><a>EVENTS</a></li>
                    <li><a href="<?php echo smarty_function_link(array('path' => "/members"), $this);?>
">MEMBERS</a></li>
                    </ul></li>
                <li><a>UNI LIFE</a></li>
                <li><a>BUY/SELL+</a>
                <ul class="sub-menu">
                    <li><a>YEAR 10</a></li>
                    <li><a>YEAR 11</a></li>
                    <li><a>YEAR 12</a></li>
                    <li><a>IB</a></li>
                    <li><a>TIPS</a></li>
                    </ul>
                </li>
                <li><a>FUN STUFF+</a>
                <ul class="sub-menu">
                    <li><a>COMPETITIONS</a></li>
                    <li><a>GIVEAWAYS</a></li>
                    <li><a>COMPETITION SUGGESTIONS</a></li>
                    </ul></li>
                <li><a>CONTACT+</a>
                    <ul class="sub-menu">
                        <li><a>REPORT AN ISSUE</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div id="Body">

        <div class="Row">
            <div class="Column PanelColumn" id="Panel">
                <?php echo smarty_function_module(array('name' => 'MeModule'), $this);?>

                <?php echo smarty_function_asset(array('name' => 'Panel'), $this);?>

            </div>
            <div class="Column ContentColumn" id="Content"><div id="slider_div" class="Row"></div><?php echo smarty_function_asset(array('name' => 'Content'), $this);?>
</div>
        </div>
    </div>
    <div id="Foot">
        <div class="Row">
            <a href="<?php echo smarty_function_vanillaurl(array(), $this);?>
" class="PoweredByVanilla">Powered by Vanilla</a>
            <?php echo smarty_function_asset(array('name' => 'Foot'), $this);?>

        </div>
    </div>

</div>
<?php echo smarty_function_event(array('name' => 'AfterBody'), $this);?>


</body>

</html>