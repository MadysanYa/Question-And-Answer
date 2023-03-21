<style>
    #map {
        height: 450px;
        border-radius: 7px !important;
    }

    #map>div[style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;"] {
        display: none !important;
    }

    .map-address>i {
        font-size: 18px;
        color: #00236e;
    }
</style>

<div class="box box-info border-0 p-16">
    <div class="box-header with-border border-0 p-0 box-title-height">
        <h3 class="box-title-font-18">Property Address</h3>
        <span class="float-right">
            <span class="direction-icon">Google Point</span>
            <span class="direction-icon">({{ $googlePoint }})</span>
            <span class="mr-10 ml-10">|</span>
            <a class="direction-icon" href="https://www.google.com.kh/maps/?daddr={{ $googlePoint }}" target="_blank">
                <i class="fa fa-paper-plane mr-10"></i>Get Direction
            </a>
        </span>
        <hr class="mt-7 mb-7">
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div id="map" class="mb-10"></div>
            <div class="map-address">
                <i class="fa fa-map-marker mr-10"></i>
                <span>{{ $shortAddress ?? "" }}</span>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    setInterval(function() { googlemap_remap(); }, 20);

    function initMap() {
        var proLat = {{ Js::from($prolatitude ?? null) }};
        var proLong = {{ Js::from($prolongtitude ?? null) }};
        var mapOptions = {
            center: {
                lat: proLat,
                lng: proLong
            },
            zoom: 12,
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var icon = "{{ asset('imges/marker_icon/default.png') }}";
        var marker = new google.maps.Marker({
            position: {
                lat: proLat,
                lng: proLong
            },
            icon: icon,
            map: map,
        });
    }

    function googlemap_remap() {
        var gimg = $('img[src*="https://maps.google.com/maps/vt"]:not(.gmf)');
        $.each(gimg, function(i, x) {
            var imgurl = $(x).attr("src");
            var urlarray = imgurl.split('!');
            var newurl = "";
            var newc = 0;
            for (i = 0; i < 1000; i++) {
                if (urlarray[i] == "2sen-US") {
                    newc = i - 3;
                    break;
                }
            }
            for (i = 0; i < newc + 1; i++) {
                newurl += urlarray[i] + "!";
            }
            $(x).attr("src", newurl).addClass("gmf");
        });
    }
</script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>