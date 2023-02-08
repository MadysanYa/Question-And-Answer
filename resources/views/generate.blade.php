<?php

// create cURL resource  
$ch = curl_init() ;  
  
//set cURL options  
curl_setopt($ch, CURLOPT_URL, 'https://bbc.com');  

//curl_exec($ch)

//Run cURL (execute http request)   
 $res = curl_exec($ch) ;  
  
// close cURL resource  
// curl_close($res);  
print_r($res);  
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

