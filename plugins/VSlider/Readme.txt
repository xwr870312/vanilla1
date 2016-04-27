This version of the plugin adds the carousel type image and text slider to the Header of the index page. It is contained in an iframe and is appended to the .Menu div in the Discussions Index page via Jquery .The jquery file is vslider.js and is inside of the js folder in the VSlider plugin.

After you upload the plugin VSlider,extract or copy out of the folder called vslider into the root of your forum. 
Then please extract file vslider.html and place it in the root of your forum. 

This is necessary in order to be able to use relative urls in links and images inside the iframe once it renders inside your forum template.

You can place your images in the images folder of the vslider folder that you placed in the root of your forum. 
This makes it possible to link your images using the relative url instead of having to input the full url of images.

example:

vslider/images/image.jpg

instead of 

http://yoursite.com/forum/vslider/images/image.jpg


To edit the slider do so inside the slider.html  and the css inside the slider.css that is inside the vslider folder in the root of your forum.

After you do this then enable the plugin from the dashboard .

If you want the slider to show on more pages, just add the controllers to the default.php . If you want it in another page other than the discussions page you will need to put in the full url to the vslider.html in the vslider.js for the iframe which is located in the Plugin VSlider js folder.

If you want to place it at the very top of the page before the menu, edit the jquery inside the vslider.js file and change the target to where you want it . 

example:

this puts it after the menu

$('body.Vanilla.Discussions.index #Body').prepend(  

this puts it before the menu

$('body.Vanilla.Discussions.index .Menu').prepend(

this puts it at the very top before everything

$('body.Vanilla.Discussions.index #Head').prepend(


Thanks for trying this plugin