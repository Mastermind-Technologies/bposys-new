$(document).ready(function(){
	var map;
	window.initMap = function(){
		latlang = new google.maps.LatLng(14.315036717630743,121.07954978942871);
		map = new google.maps.Map(document.getElementById('map'), {
			center: latlang,
			zoom: 15

		});
		var geocoder = new google.maps.Geocoder();
		var marker = new google.maps.Marker({
			position: latlang,
		});

		marker.setMap(map);

		google.maps.event.addListener(map, 'click', function( event ){
			var newPos = {lat:event.latLng.lat() , lng:event.latLng.lng()};
      // console.log( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
      document.getElementById('lat').value = event.latLng.lat();
      document.getElementById('lng').value = event.latLng.lng();

      marker.setPosition(newPos);

      geocoder.geocode({
      	'latLng': event.latLng
      }, function(results, status) {
      	if (status == google.maps.GeocoderStatus.OK) {
      		if (results[0]) {
      			document.getElementById('gmaps-address').innerHTML = results[0].formatted_address;
      			document.getElementById('g-address').value =  results[0].formatted_address;
            // alert(results[0].formatted_address);
        }
    }
          });//end of geodecoder

  });
	}
})