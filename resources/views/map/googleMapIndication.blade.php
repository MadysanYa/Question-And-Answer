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
    </style>
</head>
<body>
    @include('map.filterMap')
    <script type="text/javascript">
        function initMap() {
            const myLatLng = { lat: 11.5764211, lng: 104.923754 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: myLatLng,
            });

            const infoWindow = new google.maps.InfoWindow({
				// content: "",
				disableAutoPan: true,
			});

            var marker, i 

            const locations = {{ Js::from($arryProperty) }};
            const labels = {{ Js::from($arrayLabel) }};
            const propertyIndicator = {{ Js::from($infoProperty)}};

            var icons = '../imges/marker_icon/properties_indication.png';

            const markers = locations.map((position, i) => {
				const label = {text: labels[i % labels.length], color: "white", fontSize: "13px"};
				const marker = new google.maps.Marker({
                    icon:icons,
                    position,
                    label,
				});

				//Content
				marker.addListener("click", () => {
                    infoWindow.setContent(
                        "<p style='margin-bottom: 3px;'>Latitude: " + propertyIndicator[i][0] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Longitude: " + propertyIndicator[i][1] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Branch: " + propertyIndicator[i][2] + "</p>" + 
                        "<p style='margin-bottom: 3px;'>Property Reference: " + propertyIndicator[i][3] + "</p>" +
                        "<p style='margin-bottom: 3px;'>CIF No.: " + propertyIndicator[i][4] + "</p>" +
                        "<p style='margin-bottom: 3px;'>RM Name: " + propertyIndicator[i][5] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Telephone: " + propertyIndicator[i][6] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Request Date: " + propertyIndicator[i][7] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Report Date: " + propertyIndicator[i][8] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Information Type: " + propertyIndicator[i][9] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Location Type: " + propertyIndicator[i][10] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Type Access Road Name " + propertyIndicator[i][11] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Access Road Name: " + propertyIndicator[i][12] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Property Type: " + propertyIndicator[i][13] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Building Status: " + propertyIndicator[i][14] + "%</p>" +
                        "<p style='margin-bottom: 3px;'>Borey: " + propertyIndicator[i][15] + "</p>" +
                        "<p style='margin-bottom: 3px;'>No. of Floor: " + propertyIndicator[i][16] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Land Title Type: " + propertyIndicator[i][17] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Information Date: " + propertyIndicator[i][18] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Land Size: " + propertyIndicator[i][19] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Land Value per Sqm: $" + propertyIndicator[i][20] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Building Size: " + propertyIndicator[i][21] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Building Value per Sqm: $" + propertyIndicator[i][22] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Property Value: $" + propertyIndicator[i][23] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Contact No. : " + propertyIndicator[i][24] + "</p>"
                    );
                    infoWindow.open(map, marker);
				});
				return marker;
			});
            new markerClusterer.MarkerClusterer({ markers, map });
        }
        window.initMap = initMap;
    </script>

    <script type="text/javascript"src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
   
</body>
</html>