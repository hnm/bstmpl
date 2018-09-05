;jQuery(document).ready(function($) {
	var jqElemsMaps = $(".tmpl-map");
	if (jqElemsMaps.length === 0) return;
	
	(function() {
		var Gmap = function(jqElem) {
			this.jqElem = jqElem;
			this.map = null;
			this.isMapInitialized = false;
			this.touch = $("html").hasClass("touch") ? true : false;
			this.latLng = null;
			this.zoom = this.jqElem.data("zoom") || 17;
			this.showInfoWindow = this.jqElem.data('show-info-window') || false;
			this.location = null;
			this.infoWindows = [];
			if (!jqElem.data("height") && !jqElem.data("relative-height")) {
				this.jqElem.css({
					"height": "1px",
					"padding-bottom": "46.25%"
				})
			}
			if (jqElem.data("height")) {
				this.jqElem.css({
					"height": "400px"
				})
			}
			if (jqElem.data("relative-height")) {
				this.jqElem.css({
					"height": "1px",
					"padding-bottom": jqElem.data("relative-height") || "46.25%"				
				});
			};
		}
		
		Gmap.prototype.mapStyles = [
		                            {
		                                "elementType": "geometry",
		                                "stylers": [
		                                  {
		                                    "color": "#f5f5f5"
		                                  }
		                                ]
		                              },
		                              {
		                                "elementType": "labels.icon",
		                                "stylers": [
		                                  {
		                                    "visibility": "off"
		                                  }
		                                ]
		                              },
		                              {
		                                "elementType": "labels.text.fill",
		                                "stylers": [
		                                  {
		                                    "color": "#616161"
		                                  }
		                                ]
		                              },
		                              {
		                                "elementType": "labels.text.stroke",
		                                "stylers": [
		                                  {
		                                    "color": "#f5f5f5"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "administrative.land_parcel",
		                                "elementType": "labels.text.fill",
		                                "stylers": [
		                                  {
		                                    "color": "#bdbdbd"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "poi",
		                                "elementType": "labels.text.fill",
		                                "stylers": [
		                                  {
		                                    "color": "#757575"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "poi.park",
		                                "elementType": "geometry",
		                                "stylers": [
		                                  {
		                                    "color": "#d7d7d7"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "poi.park",
		                                "elementType": "labels.text.fill",
		                                "stylers": [
		                                  {
		                                    "color": "#9e9e9e"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "road",
		                                "elementType": "geometry",
		                                "stylers": [
		                                  {
		                                    "color": "#ffffff"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "road",
		                                "elementType": "labels.icon",
		                                "stylers": [
		                                  {
		                                    "saturation": -100
		                                  },
		                                  {
		                                    "visibility": "on"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "road.arterial",
		                                "elementType": "labels.text.fill",
		                                "stylers": [
		                                  {
		                                    "color": "#757575"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "road.highway",
		                                "elementType": "geometry",
		                                "stylers": [
		                                  {
		                                    "color": "#e4e4e4"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "road.highway",
		                                "elementType": "labels.text.fill",
		                                "stylers": [
		                                  {
		                                    "color": "#616161"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "road.local",
		                                "elementType": "labels.text.fill",
		                                "stylers": [
		                                  {
		                                    "color": "#9e9e9e"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "transit",
		                                "stylers": [
		                                  {
		                                    "saturation": -10
		                                  },
		                                  {
		                                    "visibility": "on"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "transit",
		                                "elementType": "labels.icon",
		                                "stylers": [
		                                  {
		                                    "visibility": "on"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "transit.line",
		                                "elementType": "geometry",
		                                "stylers": [
		                                  {
		                                    "color": "#e5e5e5"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "transit.station",
		                                "elementType": "geometry",
		                                "stylers": [
		                                  {
		                                    "color": "#eeeeee"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "water",
		                                "elementType": "geometry",
		                                "stylers": [
		                                  {
		                                    "color": "#c9c9c9"
		                                  }
		                                ]
		                              },
		                              {
		                                "featureType": "water",
		                                "elementType": "labels.text.fill",
		                                "stylers": [
		                                  {
		                                    "color": "#9e9e9e"
		                                  }
		                                ]
		                              }
		                            ];
		
		Gmap.prototype.initialize = function() {
			this.initMap();
			this.jqElem.data("jqelem", this);
		}
		
		Gmap.prototype.initMap = function() {
			var _obj = this;
			this.latLng = new google.maps.LatLng(this.jqElem.data("lat"), this.jqElem.data("lng")),
				map = new google.maps.Map(this.jqElem.get(0), {
				center: this.latLng,
				zoom: this.zoom,
				scrollwheel: _obj.jqElem.data("scroll") ? true : false,
				gestureHandling: _obj.jqElem.data("disable-cooperative") ? 'greedy' : "cooperative"
			});
			
			//infoWindow.open(map, marker);
			
			map.setOptions({styles: this.mapStyles});
			$(window).resize(function() {
				_obj.resize();
			});
			
			this.map = map;
			this.isMapInitialized = true;
			
			
			this.jqElem.data("locations").forEach(function(location) {
				_obj.addLocation(location);
			});
		};
		
		Gmap.prototype.addLocation = function(location) {
			var _obj = this,
				icon = null;
			if (!this.isMapInitialized) {
				this.initMap();
			};
			
			var geocoder = new google.maps.Geocoder();
			if (location.hasOwnProperty(['icon'])) {
				icon = {
					url: location['icon']['url'] || null,
					scaledSize: new google.maps.Size(
							location['icon']['sizeScaled']['width'], 
							location['icon']['sizeScaled']['height'])
				};
			}
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(location['lat'], location['lng']),
				icon: icon,
				title: location['title'],
				map: _obj.map
			});
			
			if (location.hasOwnProperty(['info'])) {
				var contentString = '';
				if (location['info'].hasOwnProperty(['title'])) {
					contentString = contentString + '<h2>' + location['info']['title'] + '</h2>';
				}
				if (location['info'].hasOwnProperty(['description'])) {
					contentString = contentString + '<div>' + location['info']['description'] + '</div>';
				}
				var infoWindow =  new google.maps.InfoWindow({
					content: contentString
						
				});
				
				_obj.infoWindows.push(infoWindow);
				
				if (location['info']['forceOpen'] && location['info']['forceOpen'] == true) {
					infoWindow.open(_obj.map, marker);
				}
				marker.addListener('click', function() {
					_obj.infoWindows.forEach(function(window) {
						window.close();
					});
					infoWindow.open(_obj.map, marker);
		        });
			}
						
			if (geocoder && location.hasOwnProperty(['address'])) {
			      geocoder.geocode( { 'address': location['address']}, function(results, status) {
			        if (status == google.maps.GeocoderStatus.OK) {
			          if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
			        	  marker.setPosition(results[0].geometry.location);
			        	  _obj.location = results[0].geometry.location;
			        	  _obj.resize();
			          } else {
			            console.log("No results found");
			          }
			        } else {
			        	console.log("Geocode was not successful for the following reason: " + status);
			        }
			      });
			    }
			
			this.resize();
		}
		
		Gmap.prototype.resize = function() {
			google.maps.event.trigger(map, "resize");
			map.setCenter(this.location ? this.location : this.latLng);
		}
		
		var gmaps = [];
		jqElemsMaps.each(function() {
			var map = new Gmap($(this));
			map.initialize();
		});
	})();
});