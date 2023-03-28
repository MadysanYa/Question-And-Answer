<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Google Maps Multiple Markers Example - ItSolutionStuff.com</title>
    <script src="../../resources/js/markerclusterer.min.js"></script>
    <style type="text/css">
        #map {
          height: 650px;
        }
        div[style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;"] {
            display: none !important;
        }
        img[src="https://maps.gstatic.com/mapfiles/transparent.png"]
        { 
            display: none !important;
        }
    </style>
</head>
<body>
    @include('map.filterMap')
    <script type="text/javascript">
        function initMap() {

            const locations = {{ Js::from($proIndication) }};
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);

            var myLatLng = { lat: 11.5690444, lng: 104.9161949 };
            var marker, i , markers = [], markerCluster;
            var icons = '../imges/marker_icon/properties_indication.png';
            var centerLat, centerLong;

            if (urlParams.has('search') && urlParams.get('search') && !jQuery.isEmptyObject(locations)) {
                myLatLng = locations[0];
            } 
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: myLatLng,
            });
            const infoWindow = new google.maps.InfoWindow({
				disableAutoPan: true,
			});

            google.maps.event.addListener(map, "dragend", function() {
                var center = this.getCenter();
                var latitude = center.lat();
                var longitude = center.lng();
                centerLat = center.lat();
                centerLong= center.lng();

                var filter_locations=[];
                var filter_label=[];
                var filter_infor=[];
                if(markerCluster != null) markerCluster.clearMarkers();
                locations.map((position, i) => {
                    if(distanceCalculator(centerLat,centerLong,position.lat,position.lng) <= 1) {
                                    filter_locations.push(position);
                    }
                });
                filter_locations.forEach(function(item){
                    filter_label.push('$' + item.land_value_per_sqm);
                });
                filter_locations.map((position, i) => {
                    filter_infor.push(position);
                });
                markers = filter_locations.map((position, i) => {
                    const label = {text: filter_label[i % filter_label.length], color: "white", fontSize: "13px"};
                    const marker = new google.maps.Marker({
                                    icon:icons,
                                    position,
                                    label,
                                });
                    //Content
                    marker.addListener("click", () => {
                                    infoWindow.setContent(
                                        "<p style='margin-bottom: 3px;'>Latitude: " + filter_infor[i]['lat'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Longitude: " + filter_infor[i]['lng'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Branch: " + filter_infor[i]['branch_name'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Property Reference: " + filter_infor[i]['property_reference'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>CIF No.: " + filter_infor[i]['cif_no'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>RM Name: " + filter_infor[i]['rm_name'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Telephone: " + filter_infor[i]['telephone'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Request Date: " + filter_infor[i]['requested_date'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Report Date: " + filter_infor[i]['reported_date'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Information Type: " + filter_infor[i]['information_type_name'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Location Type: " + filter_infor[i]['location_type'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Type Access Road Name " + filter_infor[i]['type_of_access_road'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Access Road Name: " + filter_infor[i]['access_road_name'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Property Type: " + filter_infor[i]['property_type_name'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Building Status: " + filter_infor[i]['building_status'] + "%</p>" +
                                        "<p style='margin-bottom: 3px;'>Borey: " + filter_infor[i]['borey_name'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>No. of Floor: " + filter_infor[i]['no_of_floor'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Land Title Type: " + filter_infor[i]['land_title_type'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Information Date: " + filter_infor[i]['created_at'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Land Size: " + filter_infor[i]['land_size'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Land Value per Sqm: $" + filter_infor[i]['land_value_per_sqm'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Building Size: " + filter_infor[i]['building_size'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Building Value per Sqm: $" + filter_infor[i]['building_value_per_sqm'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Property Value: $" + filter_infor[i]['property_value'] + "</p>" +
                                        "<p style='margin-bottom: 3px;'>Contact No. : " + filter_infor[i]['client_contact_no'] + "</p>"
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

        setInterval(function () {googlemap_remap();}, 10);

        function googlemap_remap() {
            var gimg = $('img[src*="https://maps.google.com/maps/vt"]:not(.gmf)');
            
            $.each(gimg, function(i,x){
                var imgurl = $(x).attr("src");
                var urlarray = imgurl.split('!');
                var newurl = ""; var newc = 0;
                for (i = 0; i < 1000; i++) {if (urlarray[i] == "2sen-US"){newc = i-3;break;}}
                for (i = 0; i < newc+1; i++) {newurl += urlarray[i] + "!";}
                $(x).attr("src",newurl).addClass("gmf");
            });
        }
    </script>

    <script type="text/javascript"src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>

</body>
</html>
