;jQuery(document).ready(function($) {
	var jqElemsMaps = $(".tmpl-map");
	if (jqElemsMaps.length === 0) return;
	
	(function() {
		var GMap = function(jqElem) {
			this.jqElem = jqElem;
			
			this.locations = jqElem.data("locations");
			this.markerUrl = jqElem.data("marker-url") || null;
			this.zoom = 15;
			this.latLng = new google.maps.LatLng(jqElem.data('lat'),jqElem.data('lng'));
			this.mapTypeId = google.maps.MapTypeId.ROADMAP;
			this.markers = [];
			var _that = this;
			
			this.map = new google.maps.Map(jqElem.get(0), {
				center: _that.latLng,
				zoom: _that.zoom,
//				styles: _that.mapStyles,
				mapTypeId: _that.mapTypeId,
				zoomControl: true,
//				zoomControlOptions: {
//					position: google.maps.ControlPosition.RIGHT_CENTER
//				}

			});
			this.bounds = new google.maps.LatLngBounds();
			this.infoWindow = new google.maps.InfoWindow();
			
			(function(_that) {
				var marker, i;
				for (i = 0; i < _that.locations.length; i++) {
					var markerIcon = null;
					
					if (_that.locations[i]['markerUrl'] && _that.locations[i]['markerUrl'].length > 0) {
						markerIcon = {
								anchor: new google.maps.Point(28/2, 40),
								size: new google.maps.Size(28, 40),
								url: _that.locations[i]['markerUrl']
						}
					}
					
					marker = new google.maps.Marker({
						title: _that.locations[i]['title'],
						position: new google.maps.LatLng(_that.locations[i]['lat'], _that.locations[i]['lng']),
						map: _that.map,
						icon: markerIcon,
						optimized: false // fix for the icon alignment
					});
					

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
							if (_that.locations[i]['contentHtml'] && _that.locations[i]['contentHtml'].length > 0) {
								_that.infoWindow.setContent(_that.locations[i]['contentHtml']);
								_that.infoWindow.open(_that.map, marker);
							}
						}
					})(marker, i));
					
					_that.bounds.extend(marker.getPosition());
					_that.markers.push(marker);
				}
				
				_that.fitAndResize();
				
			}).call(this, this);
		}
		
		GMap.prototype.fitAndResize = function() {
			this.map.fitBounds(this.bounds);
			var _that = this;
			var listener = google.maps.event.addListener(_that.map, "idle", function() {
				if (_that.map.getZoom() > 15) {
					_that.map.setZoom(15);
				}
				google.maps.event.removeListener(listener); 
			});
		}
		
		
		GMap.prototype.mapStyles = [
			    {
			        "featureType": "all",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "saturation": "-100"
			            }
			        ]
			    },
			    {
			        "featureType": "all",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "all",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "administrative",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "color": "#929292"
			            }
			        ]
			    },
			    {
			        "featureType": "administrative.country",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "visibility": "on"
			            },
			            {
			                "saturation": "5"
			            },
			            {
			                "lightness": "-11"
			            },
			            {
			                "weight": "0.01"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "all",
			        "stylers": [
			            {
			                "color": "#f2f2f2"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape.man_made",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape.man_made",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape.natural",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape.natural",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "all",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "saturation": "-100"
			            },
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "labels.text",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "labels.text.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.attraction",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "saturation": "-100"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.attraction",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.attraction",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.attraction",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.business",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "saturation": "-100"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.business",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.government",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "saturation": "-100"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.government",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.medical",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "saturation": "-100"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.medical",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.park",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "saturation": "-100"
			            },
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.place_of_worship",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "saturation": "-100"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.place_of_worship",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.school",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.school",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "saturation": "-100"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.sports_complex",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "saturation": "-100"
			            }
			        ]
			    },
			    {
			        "featureType": "poi.sports_complex",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "road",
			        "elementType": "all",
			        "stylers": [
			            {
			                "saturation": -100
			            },
			            {
			                "lightness": 45
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "all",
			        "stylers": [
			            {
			                "visibility": "simplified"
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "transit",
			        "elementType": "all",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "all",
			        "stylers": [
			            {
			                "color": "#80c7f4"
			            },
			            {
			                "visibility": "on"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.text",
			        "stylers": [
			            {
			                "color": "#348ea4"
			            },
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.text.stroke",
			        "stylers": [
			            {
			                "visibility": "on"
			            },
			            {
			                "color": "#ffffff"
			            }
			        ]
			    }
			];
		
		jqElemsMaps.each(function() {
			var map = new GMap($(this));
		});
	})();
	
	
	
	
	
	
	
	
	
//	var jqElemsMaps = $(".tmpl-map");
//	if (jqElemsMaps.length === 0) return;
//	
//	(function() {
//		var Gmap = function(jqElem) {
//			this.jqElem = jqElem;
//			this.map = null;
//			this.isMapInitialized = false;
//			this.touch = $("html").hasClass("touch") ? true : false;
//			this.latLng = null;
//			this.zoom = this.jqElem.data("zoom") || 17;
//			this.showInfoWindow = this.jqElem.data('show-info-window') || false;
//			this.location = null;
//			this.infoWindows = [];
//			if (!jqElem.data("height") && !jqElem.data("relative-height")) {
//				this.jqElem.css({
//					"height": "1px",
//					"padding-bottom": "46.25%"
//				})
//			}
//			if (jqElem.data("height")) {
//				this.jqElem.css({
//					"height": "400px"
//				})
//			}
//			if (jqElem.data("relative-height")) {
//				this.jqElem.css({
//					"height": "1px",
//					"padding-bottom": jqElem.data("relative-height") || "46.25%"				
//				});
//			};
//		}
//		
//		Gmap.prototype.mapStyles = [
//		                            {
//		                                "elementType": "geometry",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#f5f5f5"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "elementType": "labels.icon",
//		                                "stylers": [
//		                                  {
//		                                    "visibility": "off"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "elementType": "labels.text.fill",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#616161"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "elementType": "labels.text.stroke",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#f5f5f5"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "administrative.land_parcel",
//		                                "elementType": "labels.text.fill",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#bdbdbd"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "poi",
//		                                "elementType": "labels.text.fill",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#757575"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "poi.park",
//		                                "elementType": "geometry",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#d7d7d7"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "poi.park",
//		                                "elementType": "labels.text.fill",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#9e9e9e"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "road",
//		                                "elementType": "geometry",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#ffffff"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "road",
//		                                "elementType": "labels.icon",
//		                                "stylers": [
//		                                  {
//		                                    "saturation": -100
//		                                  },
//		                                  {
//		                                    "visibility": "on"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "road.arterial",
//		                                "elementType": "labels.text.fill",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#757575"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "road.highway",
//		                                "elementType": "geometry",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#e4e4e4"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "road.highway",
//		                                "elementType": "labels.text.fill",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#616161"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "road.local",
//		                                "elementType": "labels.text.fill",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#9e9e9e"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "transit",
//		                                "stylers": [
//		                                  {
//		                                    "saturation": -10
//		                                  },
//		                                  {
//		                                    "visibility": "on"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "transit",
//		                                "elementType": "labels.icon",
//		                                "stylers": [
//		                                  {
//		                                    "visibility": "on"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "transit.line",
//		                                "elementType": "geometry",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#e5e5e5"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "transit.station",
//		                                "elementType": "geometry",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#eeeeee"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "water",
//		                                "elementType": "geometry",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#c9c9c9"
//		                                  }
//		                                ]
//		                              },
//		                              {
//		                                "featureType": "water",
//		                                "elementType": "labels.text.fill",
//		                                "stylers": [
//		                                  {
//		                                    "color": "#9e9e9e"
//		                                  }
//		                                ]
//		                              }
//		                            ];
//		
//		Gmap.prototype.initialize = function() {
//			this.initMap();
//			this.jqElem.data("jqelem", this);
//		}
//		
//		Gmap.prototype.initMap = function() {
//			var _obj = this;
//			this.latLng = new google.maps.LatLng(this.jqElem.data("lat"), this.jqElem.data("lng")),
//				map = new google.maps.Map(this.jqElem.get(0), {
//				center: this.latLng,
//				zoom: this.zoom,
//				scrollwheel: _obj.jqElem.data("scroll") ? true : false,
//				gestureHandling: _obj.jqElem.data("disable-cooperative") ? 'greedy' : "cooperative"
//			});
//			
//			//infoWindow.open(map, marker);
//			
//			map.setOptions({styles: this.mapStyles});
//			$(window).resize(function() {
//				_obj.resize();
//			});
//			
//			this.map = map;
//			this.isMapInitialized = true;
//			
//			
//			this.jqElem.data("locations").forEach(function(location) {
//				_obj.addLocation(location);
//			});
//		};
//		
//		Gmap.prototype.addLocation = function(location) {
//			var _obj = this,
//				icon = null;
//			if (!this.isMapInitialized) {
//				this.initMap();
//			};
//			
//			var geocoder = new google.maps.Geocoder();
//			if (location.hasOwnProperty(['icon'])) {
//				icon = {
//					url: location['icon']['url'] || null,
//					scaledSize: new google.maps.Size(
//							location['icon']['sizeScaled']['width'], 
//							location['icon']['sizeScaled']['height'])
//				};
//			}
//			var marker = new google.maps.Marker({
//				position: new google.maps.LatLng(location['lat'], location['lng']),
//				icon: icon,
//				title: location['title'],
//				map: _obj.map
//			});
//			
//			if (location.hasOwnProperty(['info'])) {
//				var contentString = '';
//				if (location['info'].hasOwnProperty(['title'])) {
//					contentString = contentString + '<h2>' + location['info']['title'] + '</h2>';
//				}
//				if (location['info'].hasOwnProperty(['description'])) {
//					contentString = contentString + '<div>' + location['info']['description'] + '</div>';
//				}
//				var infoWindow =  new google.maps.InfoWindow({
//					content: contentString
//						
//				});
//				
//				_obj.infoWindows.push(infoWindow);
//				
//				if (location['info']['forceOpen'] && location['info']['forceOpen'] == true) {
//					infoWindow.open(_obj.map, marker);
//				}
//				marker.addListener('click', function() {
//					_obj.infoWindows.forEach(function(window) {
//						window.close();
//					});
//					infoWindow.open(_obj.map, marker);
//		        });
//			}
//						
//			if (geocoder && location.hasOwnProperty(['address'])) {
//			      geocoder.geocode( { 'address': location['address']}, function(results, status) {
//			        if (status == google.maps.GeocoderStatus.OK) {
//			          if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
//			        	  marker.setPosition(results[0].geometry.location);
//			        	  _obj.location = results[0].geometry.location;
//			        	  _obj.resize();
//			          } else {
//			            console.log("No results found");
//			          }
//			        } else {
//			        	console.log("Geocode was not successful for the following reason: " + status);
//			        }
//			      });
//			    }
//			
//			this.resize();
//		}
//		
//		Gmap.prototype.resize = function() {
//			google.maps.event.trigger(map, "resize");
//			map.setCenter(this.location ? this.location : this.latLng);
//		}
//		
//		var gmaps = [];
//		jqElemsMaps.each(function() {
//			var map = new Gmap($(this));
//			map.initialize();
//		});
//	})();
});