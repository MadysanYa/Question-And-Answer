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

            const locations = {{ Js::from($latLongProResearch) }};
            const labels = {{ Js::from($labelProResearch) }};
            const propertyResearch = {{ Js::from($infoProResearch)}};
            console.log(propertyResearch);

            var icons = '../imges/properties_research.png'

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
                        "<p style='margin-bottom: 3px;'>Latitude: " + propertyResearch[i][0] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Longitude: " + propertyResearch[i][1] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Information Type: " + propertyResearch[i][2] + "</p>" + 
                        "<p style='margin-bottom: 3px;'>Property Reference: " + propertyResearch[i][3] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Location Type: " + propertyResearch[i][4] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Property Type: " + propertyResearch[i][5] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Type Access Road: " + propertyResearch[i][6] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Access Road Name: " + propertyResearch[i][7] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Borey: " + propertyResearch[i][8] + "</p>" +
                        "<p style='margin-bottom: 3px;'>No. of Floor: " + propertyResearch[i][9] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Land Title Type: " + propertyResearch[i][10] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Information Date: " + propertyResearch[i][11] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Land Size: " + propertyResearch[i][12] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Land Value per Sqm: $" + propertyResearch[i][13] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Building Size: " + propertyResearch[i][14] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Building Value per Sqm: $" + propertyResearch[i][15] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Property Market Value: $" + propertyResearch[i][16] + "</p>"
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