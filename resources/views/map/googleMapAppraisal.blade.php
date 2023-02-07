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
                        "<p style='margin-bottom: 3px;'>Latitude: " + propertyAppraisal[i][0] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Longitude: " + propertyAppraisal[i][1] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Branch: " + propertyAppraisal[i][2] + "</p>" + 
                        "<p style='margin-bottom: 3px;'>Property Reference: " + propertyAppraisal[i][3] + "</p>" +
                        "<p style='margin-bottom: 3px;'>CIF No.: " + propertyAppraisal[i][4] + "</p>" +
                        "<p style='margin-bottom: 3px;'>RM Name: " + propertyAppraisal[i][5] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Telephone: " + propertyAppraisal[i][6] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Request Date: " + propertyAppraisal[i][7] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Report Date: " + propertyAppraisal[i][8] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Information Type: " + propertyAppraisal[i][9] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Location Type: " + propertyAppraisal[i][10] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Type Access Road Name " + propertyAppraisal[i][11] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Access Road Name: " + propertyAppraisal[i][12] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Land Title Type: " + propertyAppraisal[i][13] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Property Type: " + propertyAppraisal[i][14] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Building Status: " + propertyAppraisal[i][15] + "%</p>" +
                        "<p style='margin-bottom: 3px;'>Borey: " + propertyAppraisal[i][16] + "</p>" +
                        "<p style='margin-bottom: 3px;'>No. of Floor: " + propertyAppraisal[i][17] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Information Date: " + propertyAppraisal[i][18] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Land Size: " + propertyAppraisal[i][19] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Land Value per Sqm: $" + propertyAppraisal[i][20] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Building Size by measure: " + propertyAppraisal[i][21] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Building Value per Sqm: $" + propertyAppraisal[i][22] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Property Value: $" + propertyAppraisal[i][23] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Customer Name: $" + propertyAppraisal[i][24] + "</p>" +
                        "<p style='margin-bottom: 3px;'>Contact No. : " + propertyAppraisal[i][25] + "</p>"
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