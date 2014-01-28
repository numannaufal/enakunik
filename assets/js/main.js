var Site = {
	init: function(){
		$('html').removeClass('no-js');
		if($('#zoom').length)
			Site.zoom();

		if($('#map').length)
			Site.map();
	},

	zoom: function() {
		$('#zoom').elevateZoom({
			zoomWindowWidth: 300,
			zoomWindowHeight: 300,
			easing:true,
			zoomWindowPosition:11
		});
	},

	map: function() {
		var mark = new GMaps({
			div:"#map",
			lat: -6.273703,
			lng: 106.839251

		})

		mark.addMarker({
			lat: -6.273703,
			lng: 106.839251,
 			title: 'EnakUnik',
  			click: function(e) {
    		alert('You clicked in this marker');
			}
		});
	},	


};

$(function (){
	Site.init();
});


