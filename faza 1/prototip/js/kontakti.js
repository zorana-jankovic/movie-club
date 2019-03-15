function myMap() {
				
				var mapOptions = {
					center: new google.maps.LatLng(43.551766, 7.028266),
					zoom: 18,
					mapTypeId: google.maps.MapTypeId.HYBRID
				}
				var map = new google.maps.Map(document.getElementById("map"), mapOptions);		
			}