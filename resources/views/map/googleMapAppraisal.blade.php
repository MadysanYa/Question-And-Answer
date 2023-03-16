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

            const locations = {{ Js::from($latLongProAppraisal) }};
            const labels = {{ Js::from($labelProAppraisal) }};
            const propertyAppraisal = {{ Js::from($infoProAppraisal)}};

            var icons = '../imges/marker_icon/properties_appraisal.png';

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
                            "<p style='margin-bottom: 3px;'>Latitude: " + propertyAppraisal[i]['latitude'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Longitude: " + propertyAppraisal[i]['longtitude'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Branch: " + propertyAppraisal[i]['branch_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Property Reference: " + propertyAppraisal[i]['property_reference'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>CIF No.: " + propertyAppraisal[i]['cif_no'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>RM Name: " + propertyAppraisal[i]['rm_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Telephone: " + propertyAppraisal[i]['telephone'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Request Date: " + propertyAppraisal[i]['requested_date'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Report Date: " + propertyAppraisal[i]['reported_date'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Information Type: " + propertyAppraisal[i]['information_type_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Location Type: " + propertyAppraisal[i]['location_type'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Type Access Road Name " + propertyAppraisal[i]['type_of_access_road'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Access Road Name: " + propertyAppraisal[i]['access_road_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Land Title Type: " + propertyAppraisal[i]['land_title_type'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Property Type: " + propertyAppraisal[i]['property_type_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Building Status: " + propertyAppraisal[i]['building_status'] + "%</p>" +
                            "<p style='margin-bottom: 3px;'>Borey: " + propertyAppraisal[i]['borey_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>No. of Floor: " + propertyAppraisal[i]['no_of_floor'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Information Date: " + propertyAppraisal[i]['created_at'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Land Size: " + propertyAppraisal[i]['land_size'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Land Value per Sqm: $" + propertyAppraisal[i]['land_value_per_sqm'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Building Size by measure: " + propertyAppraisal[i]['land_size_by_measurement'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Building Value per Sqm: $" + propertyAppraisal[i]['building_value_per_sqm'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Property Value: $" + propertyAppraisal[i]['property_value'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Customer Name: " + propertyAppraisal[i]['customer_name'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Contact No. : " + propertyAppraisal[i]['client_contact_no'] + "</p>"
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
