<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Google Maps Multiple Markers Example - ItSolutionStuff.com</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../../resources/js/markerclusterer.min.js"></script>
    <style type="text/css">
        #map {
          height: 650px;
        }

             
        div[style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;"] {
            display: none !important;
        }
        
    </style>
</head>
<body>
    @include('map.filterMap')
    <script type="text/javascript">
        function initMap() {
            const myLatLng = { lat: 11.5690444, lng: 104.9161949 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: myLatLng,
            });

            const infoWindow = new google.maps.InfoWindow({
				// content: "",
				disableAutoPan: true,
			});

            var marker, i , markers = [], markerCluster;

            const locations = {{ Js::from($latLongProResearch) }};
            const labels = {{ Js::from($labelProResearch) }};
            const propertyResearch = {{ Js::from($infoProResearch)}};

            var icons = '../imges/marker_icon/properties_research.png';

            var centerLat, centerLong;

            google.maps.event.addListener(map, "dragend", function() {

                var center = this.getCenter();
                var latitude = center.lat();
                var longitude = center.lng();
                centerLat = center.lat();
                centerLong= center.lng();

                var filter_locations=[];

                if(markerCluster != null) markerCluster.clearMarkers();

                locations.map((position, i) => {
                    if(distanceCalculator(centerLat,centerLong,position.lat,position.lng) <= 1) {
                                    filter_locations.push(position);
                    }
                });

                markers = filter_locations.map((position, i) => {
                    const label = {text: labels[i % labels.length], color: "white", fontSize: "13px"};
                    const marker = new google.maps.Marker({
                        icon:icons,
                        position,
                        label,
                    });

                    //Content
                    marker.addListener("click", () => {
                        infoWindow.setContent(
                            "<p style='margin-bottom: 3px;'>Latitude: " + propertyResearch[i]['latitude'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Longitude: " + propertyResearch[i]['longtitude'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Information Type: " + propertyResearch[i]['information_type_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Property Reference: " + propertyResearch[i]['property_reference'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Location Type: " + propertyResearch[i]['location_type'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Property Type: " + propertyResearch[i]['property_type_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Type Access Road: " + propertyResearch[i]['type_of_access_road'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Access Road Name: " + propertyResearch[i]['access_road_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Borey: " + propertyResearch[i]['borey_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>No. of Floor: " + propertyResearch[i]['no_of_floor'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Land Title Type: " + propertyResearch[i]['land_title_type'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Information Date: " + propertyResearch[i]['created_at'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Land Size: " + propertyResearch[i]['land_size'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Land Value per Sqm: $" + propertyResearch[i]['land_value_per_sqm'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Building Size: " + propertyResearch[i]['building_size'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Building Value per Sqm: $" + propertyResearch[i]['building_value_per_sqm'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Property Market Value: $" + propertyResearch[i]['property_market_value'] + "</p>"
                        );
                        infoWindow.open(map, marker);
                    });
                    return marker;
                });

                markerCluster = new markerClusterer.MarkerClusterer({ markers, map });

            });
            google.maps.event.trigger(map, 'dragend');

            function distanceCalculator(lat1, lon1, lat2, lon2)
            {
                var R = 6371; // km
                var dLat = toRad(lat2-lat1);
                var dLon = toRad(lon2-lon1);
                var lat1 = toRad(lat1);
                var lat2 = toRad(lat2);

                var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                var d = R * c;
                return d;
            }

            // Converts numeric degrees to radians
            function toRad(Value)
            {
                    return Value * Math.PI / 180;
            }

            // Sets the map on all markers in the array.
            function clearMapOnAll() {
                for (let i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);

                }
                for (let i = 0; i < markerClusterer.length; i++) {
                    markerClusterer[i].setMap(null);

                }
            }
        }
        window.initMap = initMap;
    </script>

    <script type="text/javascript"src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>

</body>
</html>

