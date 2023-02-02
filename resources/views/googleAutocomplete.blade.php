<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Add Google Map in Laravel? - ItSolutionStuff.com</title>
    <!-- <script src="http://localhost/pms/property-management/resources/js/html2canvas.js"></script>
    <script src="http://localhost/pms/property-management/resources/js/html2canvas.min.js"></script> -->

    <script src="../../resources/js/html2canvas.js"></script>
    <script src="../../resources/js/html2canvas.min.js"></script>
    
    <!-- <script src="{{ asset('/vendor/chartjs/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('/vendor/chartjs/dist/html2canvas.min.js') }}"></script> -->

    <!--?php
    Use Encore\Admin\Admin;
        Admin::js('./js/app.js');
        Admin::js('./js/bootstap.js');
    ?-->

    <style type="text/css">
        #map {
          height: 400px;
        }
    </style>
</head>
    
<body>
    <div id="capture" style="padding: 10px; background: #f5da55; margin-top: 10px; width: 200px;">
      <h4 style="color: #000; ">Hello world!</h4>
    </div>

    <div id="snap" class="container mt-5">
        <h2>Google Map Show Testing One</h2>
        <div id="map"></div>
    </div>

      <p id="here"></p>

    <button onclick="myCanvas()">Try it</button>
  
    <script type="text/javascript">
      function myCanvas() {
        html2canvas(document.querySelector("#snap"),{useCORS: true,}).then(canvas => {
          // document.body.appendChild(canvas);
        document.getElementById("here").appendChild(canvas);
      });

      // html2canvas(document.getElementById("map"),
      //  {useCORS: true,})
      //     .then(function(canvas) {
      //       var img = canvas.toDataURL("image/jpeg");
      //       var image = new Image();
      //       image.src = img;
      //     document.getElementById("here").appendChild(image);
      //     // document.body.appendChild(image);
      // });
    }
    </script>

    <script type="text/javascript">
        function initMap() {
          const myLatLng = { lat: 11.5972878, lng: 104.8253013 };
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
  
    <!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&callback=initMap" ></script> -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAMUcSJr7R-FTwCXyKXLKGYc-vwQsu1l5A&callback=initMap" ></script>

</body>
</html>