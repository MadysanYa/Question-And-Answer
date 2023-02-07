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

            const locations = {{ Js::from($latLongProAppraisal) }};
            console.log(locations);
            const labels = {{ Js::from($labelProAppraisal) }};
            const propertyAppraisal = {{ Js::from($infoProAppraisal)}};

            var icons = '../imges/properties_appraisal.png'

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
                        "<b>Latitude: " + propertyAppraisal[i][0] + "<br>" +
                        "<b>Longitude: " + propertyAppraisal[i][1] + "<br>" +
                        "<b>Branch: " + propertyAppraisal[i][2] + "<br>" + 
                        "<b>Property Reference: " + propertyAppraisal[i][3] + "<br>" +
                        "<b>CIF No.: " + propertyAppraisal[i][4] + "<br>" +
                        "<b>RM Name: " + propertyAppraisal[i][5] + "<br>" +
                        "<b>Telephone: " + propertyAppraisal[i][6] + "<br>" +
                        "<b>Request Date: " + propertyAppraisal[i][7] + "<br>" +
                        "<b>Report Date: " + propertyAppraisal[i][8] + "<br>" +
                        "<b>Information Type: " + propertyAppraisal[i][9] + "<br>" +
                        "<b>Location Type: " + propertyAppraisal[i][10] + "<br>" +
                        "<b>Type Access Road Name " + propertyAppraisal[i][11] + "<br>" +
                        "<b>Access Road Name: " + propertyAppraisal[i][12] + "<br>" +
                        "<b>Land Title Type: " + propertyAppraisal[i][13] + "<br>" +
                        "<b>Property Type: " + propertyAppraisal[i][14] + "<br>" +
                        "<b>Building Status: " + propertyAppraisal[i][15] + "%<br>" +
                        "<b>Borey: " + propertyAppraisal[i][16] + "<br>" +
                        "<b>No. of Floor: " + propertyAppraisal[i][17] + "<br>" +
                        "<b>Information Date: " + propertyAppraisal[i][18] + "<br>" +
                        "<b>Land Size: " + propertyAppraisal[i][19] + "<br>" +
                        "<b>Land Value per Sqm: $" + propertyAppraisal[i][20] + "<br>" +
                        "<b>Building Size by measure: " + propertyAppraisal[i][21] + "<br>" +
                        "<b>Building Value per Sqm: $" + propertyAppraisal[i][22] + "<br>" +
                        "<b>Property Value: $" + propertyAppraisal[i][23] + "<br>" +
                        "<b>Customer Name: $" + propertyAppraisal[i][24] + "<br>" +
                        "<b>Contact No. : " + propertyAppraisal[i][25]
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