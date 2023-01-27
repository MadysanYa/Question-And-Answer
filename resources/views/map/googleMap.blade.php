<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Google Maps Multiple Markers Example - ItSolutionStuff.com</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <style type="text/css">
        #map {
          height: 550px;
        }
        .gm-style .gm-style-iw-d::-webkit-scrollbar-track, 
        .gm-style .gm-style-iw-d::-webkit-scrollbar-track-piece,
        .gm-style .gm-style-iw-c,
        .gm-style .gm-style-iw-t::after { 
        background: red;
        }
        .gm-style .gm-style-iw-tc::after {   background: red; }
        form {
            border: 2px solid red;
            border-radius: 4px;
            font-size:25px;
        }
        input  {
            width: 25px;
            height: 25px;
        }
        label {
            font-size: 30px;
            color: #0066cc;
        }
    </style>
</head>
    
    <div class="container mt-5">
        <form >
            <fieldset>
                <legend style="font-size:30px">Select Property :</legend>
                <input type="checkbox" name="box" id="veg1" value="tomato" onclick="return ValidateSelection();">
                <label for="veg1">Property Research</label>
                <input form="myForm" type="checkbox" name="box" id="veg2"  value="onion" onclick="return ValidateSelection();"> 
                <label for="veg2">Property Indication</label>
                <input form="myForm" type="checkbox" name="box" id="veg3"  value="lettuce" onclick="return ValidateSelection();"> 
                <label for="veg3">Property Appraisal</label>
            </fieldset>
        </form>

        <script type="text/javascript">  
            function ValidateSelection()  
            {  
                var check_box = document.getElementsByName("box");  
                var CheckedItems = 0; 
                for(var i = 0; i < check_box.length; i++)  
                {  
                if(check_box[i].checked)  
                    CheckedItems++;  
                }  
                if(CheckedItems > 1){  
                alert(" select only!");  
                    return false;}  
                }  
        </script>
        <div id="map"></div>
    </div>
    <script type="text/javascript">
        function initMap() {
            const myLatLng = { lat: 11.5764211, lng: 104.923754 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center: myLatLng,
            });

            var marker, i
            var infowindow = new google.maps.InfoWindow();

            const locations = {{ Js::from($arryProperty) }};
            const labels = {{ Js::from($arrayLabel) }};
            const propertyIndicator = {{ Js::from($infoProperty)}};

            // var icons = '../imges/home2.png'

            for (i = 0; i < locations.length; i++) {  
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    label:labels[i],
                    map: map, 
                });
                    
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                    infowindow.setContent(
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
                        "<b>Building Status (%): " + propertyIndicator[i][14] + "<br>" +
                        "<b>Borey: " + propertyIndicator[i][15] + "<br>" +
                        "<b>No. of Floor: " + propertyIndicator[i][16] + "<br>" +
                        "<b>Land Title Type: " + propertyIndicator[i][17] + "<br>" +
                        "<b>Information Date: " + propertyIndicator[i][18] + "<br>" +
                        "<b>Land Size: " + propertyIndicator[i][19] + "<br>" +
                        "<b>Land Value per Sqm($): "+ propertyIndicator[i][20] + "<br>" +
                        "<b>Building Size: " + propertyIndicator[i][21] + "<br>" +
                        "<b>Building Value per Sqm($): " + propertyIndicator[i][22] + "<br>" +
                        "<b>Property Value($): " + propertyIndicator[i][23] + "<br>" +
                        "<b>Contact No. : " + propertyIndicator[i][24]
                    );
                    infowindow.open(map, marker);
                    }
                })(marker, i));
            }
            window.initMap = initMap;
        }
    </script>

    <script type="text/javascript"src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
   
</body>
</html>