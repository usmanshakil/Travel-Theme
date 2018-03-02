/*--------------------------------------------------------
Scrollpage
--------------------------------------------------------*/
jQuery('a.scroll_a, .scroll_home, .links-home a').click(function(){
    jQuery('html, body').animate({
        scrollTop: jQuery( jQuery.attr(this, 'href') ).offset().top- 43
    }, 500);
    return false;
});

jQuery('#top-nav .pges').onePageNav({
        filter : ':not(.external a)',
		easing: 'swing',
		scrollOffset: 43,
        scrollThreshold : 0.95
    });

if( window.innerWidth < 767 ) {

    jQuery('#top-nav .pges').onePageNav({
		easing: 'swing',
		scrollOffset: 0,
        scrollThreshold : 0.95
    });
    jQuery('a.scroll_a, .scroll_home, .links-home a').click(function(){
        jQuery('html, body').animate({
        scrollTop: jQuery( jQuery.attr(this, 'href') ).offset().top- 0
    }, 500);
    return false;
});
}

/*--------------------------------------------------------
Tooltip
--------------------------------------------------------*/
jQuery('.tooltip_1').tooltip();
			
/*--------------------------------------------------------
Hover images icon
--------------------------------------------------------*/	
    //Set opacity on each span to 0%
    jQuery(".icon-hover").css({'opacity':'0'});

	jQuery('figure a').hover(
		function() {
			jQuery(this).find('.icon-hover').stop().fadeTo(800, 1);
		},
		function() {
			jQuery(this).find('.icon-hover').stop().fadeTo(800, 0);
		}
	)
/*--------------------------------------------------------
Gallery func
--------------------------------------------------------*/	
jQuery(function(){
    // Initialize the gallery
    jQuery('figure a').touchTouch();

});

/*--------------------------------------------------------
Accordion
--------------------------------------------------------*/	
 jQuery('.accordion').each(function(){
    var jQuerythis = jQuery(this),
        jQuerytoggle = jQuerythis.find('dt');
    
    jQuerytoggle.click(function(){
      if( jQuery(this).next().is(':hidden') ) {
        jQuerythis.find('dt').removeClass('active').next().slideUp();
        jQuery(this).toggleClass('active').next().slideDown();
      }
      return false;
    });
    
  });
  
