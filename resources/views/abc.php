<?php

// $url = '../../resources/views/googleAutocomplete.blade.php';
$url = 'http://localhost/pms/property-management/resources/views/googleAutocomplete.blade.php';

$curl = curl_init();

// $fields = array(
//     'field_name_1' => 'Value 1',
//     'field_name_2' => 'Value 2',
//     'field_name_3' => 'Value 3'
// );
// $fields_string = http_build_query($fields);

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);

// curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);

$data = curl_exec($curl);
curl_close($curl);

echo $data;
// dd($result);
// close cURL resource  
// curl_close($res);  
//print_r($res);  
// dd($result);


// //Create the size of image or blank image
// $image = imagecreate(500, 300);

// $data = '';

// $data = base64_decode($data);

// $image = imagecreatefromstring($data);
  
// header("Content-Type: image/jpeg");
  
// imagejpeg($image);
// imagedestroy($image);
  
// ?>

<!-- <div id="map" style="height: 231px; width: 386px;"></div>

<script type="text/javascript">

    function initMap() {

        const myLatLng = { lat: 11.5691468, lng: 104.9146152 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: myLatLng,
        });
  
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello Rajkot!",
        });
    }
  
        window.initMap = initMap;
</script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAMUcSJr7R-FTwCXyKXLKGYc-vwQsu1l5A&callback=initMap" ></script> -->

