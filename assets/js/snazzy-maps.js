/**
 * Snazzy Maps Widget Frontend JavaScript
 */
(function($) {
    'use strict';

    // Snazzy Maps Styles Collection
    var snazzyStyles = {
        'default': [],
        'subtle-grayscale': [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}],
        'ultra-light': [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}],
        'shades-grey': [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}],
        'midnight-commander': [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":13}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#144b53"},{"lightness":14},{"weight":1.4}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#08304b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#0c4152"},{"lightness":5}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#0b434f"},{"lightness":25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#0b3d51"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"}]},{"featureType":"transit","elementType":"all","stylers":[{"color":"#146474"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#021019"}]}],
        'apple-maps': [{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}],
        'black-white': [{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"weight":1}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"weight":0.8}]},{"featureType":"landscape","stylers":[{"color":"#ffffff"}]},{"featureType":"water","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"elementType":"labels","stylers":[{"visibility":"off"}]},{"elementType":"labels.text","stylers":[{"visibility":"on"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#000000"}]},{"elementType":"labels.icon","stylers":[{"visibility":"on"}]}]
    };

    // Global object to store map instances
    window.snazzyMapsInstances = window.snazzyMapsInstances || {};

    // Check if Google Maps API is fully loaded and ready
    var isGoogleMapsReady = function() {
        return typeof google !== 'undefined' &&
               typeof google.maps !== 'undefined' &&
               typeof google.maps.Geocoder !== 'undefined' &&
               typeof google.maps.Map !== 'undefined';
    };

    // Wait for Google Maps API to be fully ready
    var waitForGoogleMaps = function(callback, attempts) {
        attempts = attempts || 0;

        if (isGoogleMapsReady()) {
            callback();
        } else if (attempts < 50) { // Try for up to 5 seconds
            setTimeout(function() {
                waitForGoogleMaps(callback, attempts + 1);
            }, 100);
        } else {
            console.error('Snazzy Maps: Google Maps API failed to initialize after multiple attempts');
        }
    };

    // Load Google Maps API
    var loadGoogleMapsAPI = function(apiKey, callback) {
        if (isGoogleMapsReady()) {
            callback();
            return;
        }

        if (window.googleMapsApiLoading) {
            waitForGoogleMaps(callback);
            return;
        }

        window.googleMapsApiLoading = true;

        var script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?key=' + apiKey + '&libraries=places&loading=async';
        script.async = true;
        script.defer = true;
        script.onload = function() {
            window.googleMapsApiLoading = false;
            waitForGoogleMaps(callback);
        };
        script.onerror = function() {
            window.googleMapsApiLoading = false;
            console.error('Snazzy Maps: Failed to load Google Maps API. Check your API key and restrictions.');
        };
        document.head.appendChild(script);
    };

    // Initialize a single map
    var initMap = function($container) {
        var settings = $container.data('map-settings');

        if (!settings || !settings.apiKey) {
            console.error('Snazzy Maps: Missing API key or settings');
            return;
        }

        loadGoogleMapsAPI(settings.apiKey, function() {
            var geocoder = new google.maps.Geocoder();
            var mapId = $container.attr('id');

            // Determine center location
            var centerMap = function(center) {
                var mapOptions = {
                    zoom: settings.zoom,
                    center: center,
                    mapTypeId: settings.mapType,
                    zoomControl: settings.zoomControl,
                    mapTypeControl: settings.mapTypeControl,
                    streetViewControl: settings.streetViewControl,
                    fullscreenControl: settings.fullscreenControl,
                    draggable: settings.draggable,
                    scrollwheel: settings.scrollwheel,
                    styles: snazzyStyles[settings.snazzyStyle] || []
                };

                var map = new google.maps.Map($container[0], mapOptions);
                window.snazzyMapsInstances[mapId] = map;

                // Add markers
                if (settings.markers && settings.markers.length > 0) {
                    addMarkers(map, settings.markers, geocoder, settings.infoWindowState);
                }
            };

            // Use lat/lng if provided, otherwise geocode location
            if (settings.lat && settings.lng) {
                var center = {
                    lat: parseFloat(settings.lat),
                    lng: parseFloat(settings.lng)
                };
                centerMap(center);
            } else if (settings.location) {
                geocoder.geocode({ address: settings.location }, function(results, status) {
                    if (status === 'OK' && results[0]) {
                        centerMap(results[0].geometry.location);
                    } else {
                        console.error('Snazzy Maps: Geocoding failed for location: ' + settings.location);
                        // Fallback to default location
                        centerMap({ lat: 40.7128, lng: -74.0060 });
                    }
                });
            } else {
                // Default to New York
                centerMap({ lat: 40.7128, lng: -74.0060 });
            }
        });
    };

    // Add markers to map
    var addMarkers = function(map, markers, geocoder, infoWindowState) {
        var infoWindows = [];
        var markersArray = [];

        markers.forEach(function(markerData, index) {
            var addMarkerToMap = function(position) {
                var markerOptions = {
                    position: position,
                    map: map,
                    title: markerData.title
                };

                if (markerData.icon) {
                    markerOptions.icon = {
                        url: markerData.icon,
                        scaledSize: new google.maps.Size(40, 40)
                    };
                }

                var marker = new google.maps.Marker(markerOptions);
                markersArray.push(marker);

                // Create info window if title or description exists
                if (infoWindowState !== 'none' && (markerData.title || markerData.description)) {
                    var contentString = '<div class="snazzy-info-window">';
                    if (markerData.title) {
                        contentString += '<h3>' + markerData.title + '</h3>';
                    }
                    if (markerData.description) {
                        contentString += '<p>' + markerData.description + '</p>';
                    }
                    contentString += '</div>';

                    var infoWindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    infoWindows.push(infoWindow);

                    // Info window behavior
                    if (infoWindowState === 'always' && index === 0) {
                        infoWindow.open(map, marker);
                    } else if (infoWindowState === 'click') {
                        marker.addListener('click', function() {
                            // Close all other info windows
                            infoWindows.forEach(function(iw) {
                                iw.close();
                            });
                            infoWindow.open(map, marker);
                        });
                    } else if (infoWindowState === 'hover') {
                        marker.addListener('mouseover', function() {
                            // Close all other info windows
                            infoWindows.forEach(function(iw) {
                                iw.close();
                            });
                            infoWindow.open(map, marker);
                        });
                        marker.addListener('mouseout', function() {
                            infoWindow.close();
                        });
                    }
                }
            };

            // Use lat/lng if provided, otherwise geocode location
            if (markerData.lat && markerData.lng) {
                var position = {
                    lat: parseFloat(markerData.lat),
                    lng: parseFloat(markerData.lng)
                };
                addMarkerToMap(position);
            } else if (markerData.location) {
                geocoder.geocode({ address: markerData.location }, function(results, status) {
                    if (status === 'OK' && results[0]) {
                        addMarkerToMap(results[0].geometry.location);
                    } else {
                        console.error('Snazzy Maps: Geocoding failed for marker location: ' + markerData.location);
                    }
                });
            }
        });
    };

    // Initialize all maps on page
    var initAllMaps = function() {
        $('.snazzy-map-container').each(function() {
            var $container = $(this);
            if (!window.snazzyMapsInstances[$container.attr('id')]) {
                initMap($container);
            }
        });
    };

    // Initialize on document ready
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/snazzy_maps.default', function($scope) {
            var $container = $scope.find('.snazzy-map-container');
            if ($container.length) {
                initMap($container);
            }
        });
    });

    // Fallback for non-Elementor pages
    $(document).ready(function() {
        setTimeout(function() {
            initAllMaps();
        }, 100);
    });

})(jQuery);
