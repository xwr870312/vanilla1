$(function() {    
	$('.field, textarea').focus(function() {
        if(this.title==this.value) {
            this.value = '';
        }
    }).blur(function(){
        if(this.value=='') {
            this.value = this.title;
        }
    });
    
    $(".slider ul").jcarousel({
		scroll:1,
		auto:6,
		wrap:"both",
		itemFirstInCallback: mycarousel_itemFirstInCallback,
		initCallback: mycarousel_initCallback,
		start: 1,
		// This tells jCarousel NOT to autobuild prev/next buttons
		buttonNextHTML: null,
		buttonPrevHTML: null
	});	
});

$(window).load(function() {
    $('.welcome, .post').setAllToMaxHeight();
    if ($.browser.msie && $.browser.version.substr(0,1)<7) {
		DD_belatedPNG.fix('#logo a, #main, .slider ul li img, .purchase, #Menu, #Menu ul li a:hover, #Menu ul li a.active, .slider-nav a, .welcome');
		DD_belatedPNG.fix('.box-holder .box-top, .box-holder .box-bottom, .box-holder .box');
	};
})

$.fn.setAllToMaxHeight = function(){
return this.height( Math.max.apply(this, $.map( this , function(e){ return $(e).height() }) ) );
}

function mycarousel_initCallback(carousel, item, idx, state) {
	$('.slider-nav a').bind('click', function() {
		carousel.scroll($.jcarousel.intval($(this).text()));
		return false;
	});		
};

function mycarousel_itemFirstInCallback(carousel, item, idx, state) {
	$('.slider-nav a').removeClass('active');
	$('.slider-nav a').eq(idx - 1).addClass('active');
};