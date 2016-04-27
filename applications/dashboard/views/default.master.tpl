
<!DOCTYPE html>
<html lang="{$CurrentLocale.Lang}">
<head>
    {asset name="Head"}
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
<body id="{$BodyID}" class="{$BodyClass}">
<div id="Frame">
    <div class="Head" id="Head">
        <div class="Row">
            <strong class="SiteTitle"><a href="{link path="/"}">{logo}</a></strong>

            <div class="SiteSearch">{searchbox}</div>
            <ul class="SiteMenu">
                <!-- {dashboard_link} -->
                {discussions_link}
                {activity_link}
                <!-- {inbox_link} -->
                {custom_menu}
                <!-- {profile_link}
               {signinout_link}  -->
            </ul>
        </div>
    </div>
    <div id="Body">
        <div class="Row">
            <div class="BreadcrumbsWrapper">{breadcrumbs}</div>
            <div class="Column PanelColumn" id="Panel">
                {module name="MeModule"}
                {asset name="Panel"}
            </div>
            <div class="Column ContentColumn" id="Content">{asset name="Content"}</div>
        </div>
    </div>
    <div id="Foot">
        <div class="Row">
            <a href="{vanillaurl}" class="PoweredByVanilla" title="Community Software by Vanilla Forums">Forum Software
                Powered by Vanilla</a>
            {asset name="Foot"}
        </div>
    </div>
</div>
{event name="AfterBody"}
</body>
</html>
