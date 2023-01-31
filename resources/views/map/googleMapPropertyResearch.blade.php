<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Google Maps Multiple Markers Example - ItSolutionStuff.com</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <style type="text/css">
        #map {
          height: 600px;
        }
    </style>
</head>
<body>
    @include('map.filterMap')
    <script type="text/javascript">
        function initMap() {
            const myLatLng = { lat: 11.5764211, lng: 104.923754 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center: myLatLng,
            });

            var marker, i
            var infowindow = new google.maps.InfoWindow();

            const locations = {{ Js::from($latLongProResearch) }};
            const labels = {{ Js::from($labelProResearch) }};
            const propertyResearch = {{ Js::from($infoProResearch)}};
            const icons = {url: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png" };
            // var icons = '../imges/home2.png'

            for (i = 0; i < locations.length; i++) {  
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    label:{text: labels[i], color: "white"},
                    icon:icons,
                    map: map, 
                });
                    
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                    infowindow.setContent(
                        "<b>Latitude: " + propertyResearch[i][0] + "<br>" +
                        "<b>Longitude: " + propertyResearch[i][1] + "<br>" +
                        "<b>Information Type: " + propertyResearch[i][2] + "<br>" + 
                        "<b>Property Reference: " + propertyResearch[i][3] + "<br>" +
                        "<b>Location Type: " + propertyResearch[i][4] + "<br>" +
                        "<b>Property Type: " + propertyResearch[i][5] + "<br>" +
                        "<b>Type Access Road: " + propertyResearch[i][6] + "<br>" +
                        "<b>Access Road Name: " + propertyResearch[i][7] + "<br>" +
                        "<b>Borey: " + propertyResearch[i][8] + "<br>" +
                        "<b>No. of Floor: " + propertyResearch[i][9] + "<br>" +
                        "<b>Land Title Type: " + propertyResearch[i][10] + "<br>" +
                        "<b>Information Date: " + propertyResearch[i][11] + "<br>" +
                        "<b>Land Size: " + propertyResearch[i][12] + "<br>" +
                        "<b>Land Value per Sqm: $" + propertyResearch[i][13] + "<br>" +
                        "<b>Building Size: " + propertyResearch[i][14] + "<br>" +
                        "<b>Building Value per Sqm: $" + propertyResearch[i][15] + "<br>" +
                        "<b>Property Market Value: $" + propertyResearch[i][16]
                    );
                    infowindow.open(map, marker);
                    }
                })(marker, i));
            }
            window.initMap = initMap;
        }
    </script>

    <script type="text/javascript"src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <style type="text/css">
        #map {
        height: 500px;
        }
    </style>
</body>
</html>