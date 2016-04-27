<!DOCTYPE html>
<html>
<head>
    {asset name="Head"}

</head>
<body id="{$BodyID}" class="{$BodyClass}">
<div id="Frame">
    <div class="Top">
        <div class="Row">
            <div class="TopMenu">
                
                
                

                <a href="#">Sign up</a>
                <a href="#">Sign in</a>
                <div class="SiteSearch">{searchbox}</div>
              
            </div>
        </div>
    </div>
    <div class="Banner">
        <div class="Row">
            <strong class="SiteTitle"><a href="{link path="/"}">{logo}</a></strong>
            <!--
            We've placed this optional advertising space below. Just comment out the line and replace "Advertising Space" with your 728x90 ad banner.
            -->
            <!-- <div class="AdSpace">Advertising Space</div> -->
        </div>
    </div>
    <div id="Head">
        <div class="Row">
            <ul class="SiteMenu">
                <li><a href="{link path="/"}">HOME</a></li>
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
                    <li><a href="{link path="/members"}">MEMBERS</a></li>
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
                {module name="MeModule"}
                {asset name="Panel"}
            </div>
            <div class="Column ContentColumn" id="Content"><div id="slider_div" class="Row"></div>{asset name="Content"}</div>
        </div>
    </div>
    <div id="Foot">
        <div class="Row">
            <a href="{vanillaurl}" class="PoweredByVanilla">Powered by Vanilla</a>
            {asset name="Foot"}
        </div>
    </div>

</div>
{event name="AfterBody"}

</body>

</html>
