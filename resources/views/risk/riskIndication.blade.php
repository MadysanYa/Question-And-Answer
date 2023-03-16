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

        div[style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;"] {
            display: none !important;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="box grid-box">
                @if(!($userIsRmRole || $userIsBmRole))
                    <div class="box-header with-border">
                        <div class="pull-right">
                            <div class="" style="display: flex;align-items: center;">
                                <div class="btn-group pull-right grid-create-btn">
                                    <a href="../../public/admin/risk_indicators/create" class="btn btn-sm btn-success" title="New">
                                        <i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;New</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div style="padding: 10px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

            const locations = {{ Js::from($arryRiskProperty) }};
            const labels = {{ Js::from($arrayLabel) }};
            const riskProperty = {{ Js::from($infoProperty)}};
            const userIsRmRole = {{ Js::from($userIsRmRole)}};
            const userIsBmRole = {{ Js::from($userIsBmRole)}};
            var icons = '../imges/marker_icon/properties_risk.png';

            const markers = locations.map((position, i) => {
				const label = {text: labels[i % labels.length], color: "white", fontSize: "13px"};
				const marker = new google.maps.Marker({
                    icon:icons,
                    position,
                    label,
				});

				//Content
                if(userIsRmRole || userIsBmRole){
                    marker.addListener("click", () => {
                        infoWindow.setContent(
                            "<p style='margin-bottom: 3px;'>Latitude: " + riskProperty[i]['latitude'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Longitude: " + riskProperty[i]['longtitude'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Risk Description: " + riskProperty[i]['description']
                        );
                        infoWindow.open(map, marker);
                    });
                }else{
                    marker.addListener("click", () => {
                        infoWindow.setContent(
                            "<p style='margin-bottom: 3px;'>Latitude: " + riskProperty[i]['latitude'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Longitude: " + riskProperty[i]['longtitude'] + "</p>" +
                            "<p style='margin-bottom: 3px;'>Risk Description: " + riskProperty[i]['description']+ "</p>" +
                            "<b>"+"<a href="+"../../public/admin/risk_indicators/"+riskProperty[i]['id']+"/edit>"+"Edit"+"</a>"
                        );
                        infoWindow.open(map, marker);
                    });
                }
				return marker;
			});
            new markerClusterer.MarkerClusterer({ markers, map });
        }
        window.initMap = initMap;

        setInterval(function () {googlemap_remap();}, 20);
        
        function googlemap_remap() {
            
            var gimg = $('img[src*="https://maps.google.com/maps/vt"]:not(.gmf)');
            
            $.each(gimg, function(i,x){
                var imgurl = $(x).attr("src");
                var urlarray = imgurl.split('!');
                var newurl = ""; var newc = 0;
                for (i = 0; i < 1000; i++) {if (urlarray[i] == "2sen-US"){newc = i-3;break;}}
                for (i = 0; i < newc+1; i++) {newurl += urlarray[i] + "!";}
                $(x).attr("src",newurl).addClass("gmf");
            });
        }
    </script>

    <script type="text/javascript"src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>
   
</body>
</html>