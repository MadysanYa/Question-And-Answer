<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Google Maps Multiple Markers Example - ItSolutionStuff.com</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <style type="text/css">
        #map {
          height: 550px;
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

            var icons = '../imges/properties_indication.png'

            const markers = locations.map((position, i) => {
				const label = {text: labels[i % labels.length], color: "white", fontSize: "16px", fontWeight: "bold"};
				const marker = new google.maps.Marker({
                    icon:icons,
                    position,
                    label,
				});

				//Content
				marker.addListener("click", () => {
                    infoWindow.setContent(
                        "<b>Latitude: " + propertyIndicator[i][0] + "<br>" +
                        "<b>Longitude: " + propertyIndicator[i][1] + "<br>" +
                        "<b>Branch: " + propertyIndicator[i][2] + "<br>" + 
                        "<b>Property Reference: " + propertyIndicator[i][3] + "<br>" +
                        "<b>CIF No.: " + propertyIndicator[i][4] + "<br>" +
                        "<b>RM Name: " + propertyIndicator[i][5] + "<br>" +
                        "<b>Telephone: " + propertyIndicator[i][6] + "<br>" +
                        "<b>Request Date: " + propertyIndicator[i][7] + "<br>" +
                        "<b>Report Date: " + propertyIndicator[i][8] + "<br>" +
                        "<b>Information Type: " + propertyIndicator[i][9] + "<br>" +
                        "<b>Location Type: " + propertyIndicator[i][10] + "<br>" +
                        "<b>Type Access Road Name " + propertyIndicator[i][11] + "<br>" +
                        "<b>Access Road Name: " + propertyIndicator[i][12] + "<br>" +
                        "<b>Property Type: " + propertyIndicator[i][13] + "<br>" +
                        "<b>Building Status: " + propertyIndicator[i][14] + "%<br>" +
                        "<b>Borey: " + propertyIndicator[i][15] + "<br>" +
                        "<b>No. of Floor: " + propertyIndicator[i][16] + "<br>" +
                        "<b>Land Title Type: " + propertyIndicator[i][17] + "<br>" +
                        "<b>Information Date: " + propertyIndicator[i][18] + "<br>" +
                        "<b>Land Size: " + propertyIndicator[i][19] + "<br>" +
                        "<b>Land Value per Sqm: $" + propertyIndicator[i][20] + "<br>" +
                        "<b>Building Size: " + propertyIndicator[i][21] + "<br>" +
                        "<b>Building Value per Sqm: $" + propertyIndicator[i][22] + "<br>" +
                        "<b>Property Value: $" + propertyIndicator[i][23] + "<br>" +
                        "<b>Contact No. : " + propertyIndicator[i][24]
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