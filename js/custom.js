//Home Full width Slider
var data = mystr.split("+++");
var i, m;
var slides = [ ];
for(i = 0; i < data.length; i++){
    m = data[i];
    slides.push({image : m});
}
jQuery(function(jQuery){
jQuery.supersized({
		slides : slides,
        transition : transition
});
});
// Google Map
var $j = jQuery.noConflict();
jQuery('#map').gmap3({
marker:{
    latLng: latlon,
	options:{
          icon: map_pointer
        }
  },
  map:{
    options:{
      zoom: 10
    }
  }
});