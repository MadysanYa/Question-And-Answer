<?php

namespace App\Admin\Controllers;

use Auth;
use App\Models\User;
use App\Model\Invoice;
use App\Models\Branch;
use App\Models\Region;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Admin;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Layout\Content;
use App\Models\MapPriceIndicator;
use App\Models\PropertyIndicator;
use Encore\Admin\Form\Field\Button;
use Illuminate\Support\Facades\Request;
use Encore\Admin\Controllers\AdminController;


class MapPriceIndicatorController extends AdminController 
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Map Price Indicator';
     /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function index(Content $MapPriceIndicator){
        $MapPriceIndicator->header($this->title);
        // $MapPriceIndicator->body($this->dashboard());
        $MapPriceIndicator->body($this->grid());

        //Map 
        $propertys = PropertyIndicator::get();
        $locationArray = [];

        // Latitude, Longtitude
        foreach($propertys as $property){
            $location = [$property->land_value_per_sqm.'$'.','.$property->latitude.','.$property->longtitude];
            $local = implode(" ", $location);
            $arr = explode(",", $local);
            $locationArray[] = $arr;
        }
        $arryProperty = $locationArray;
        
        //Labels on marker
        foreach($propertys as $value){
            $label = "$".$value->land_value_per_sqm;
            $labelArray[] = $label;
        }
        $arrayLabel = $labelArray;

        //Information property indicator

        foreach($propertys as $value){
            $info = [
                $value->latitude.','.
                $value->longtitude.','.
                $value->branch_code.','.
                $value->property_reference.','.
                $value->cif_no.','.
                $value->rm_name.','.
                $value->telephone.','.
                $value->requested_date.','.
                $value->reported_date.','.
                $value->information_type.','.
                $value->location_type.','.
                $value->type_of_access_road.','.
                $value->access_road_name.','.
                $value->property_type.','.
                $value->building_status.','.
                $value->borey.','.
                $value->no_of_floor.','.
                $value->land_title_type.','.
                $value->created_at.','.
                $value->land_size.','.
                $value->land_value_per_sqm.','.
                $value->building_size.','.
                $value->building_value_per_sqm.','.
                $value->property_value.','.
                $value->client_contact_no
            ];
            $infomation = implode(" ", $info);
            $arrInfo = explode(",", $infomation);
            $infoArray[] = $arrInfo;
        }
        $infoProperty = $infoArray;

        $MapPriceIndicator->body(view('map.googleMap', [
            'arryProperty' => $arryProperty,
            'arrayLabel' => $arrayLabel,
            'infoProperty' => $infoProperty
        ]));
       
        
        return $MapPriceIndicator;
    }

    protected function dashboard(){
        
        
    
        $html = <<<HTML
    
        <!DOCTYPE html>
          <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
              
          <head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <title>Laravel Google Maps Multiple Markers Example</title>
              <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
              <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
              <style >
                  #map {
                    height: 550px;
                    width: 100%;
                  }
    
                  .gm-style .gm-style-iw-d::-webkit-scrollbar-track, 
                  .gm-style .gm-style-iw-d::-webkit-scrollbar-track-piece,
                  .gm-style .gm-style-iw-c,
                  .gm-style .gm-style-iw-t::after { 
                    background: red;
                  }
                  .gm-style .gm-style-iw-tc::after {   background: red; }
                 .form-group {
                    width: 100%;
                    padding: 0px 2px;
                    margin: 2px 0;
                    box-sizing: border-box;
                    border: 2px solid green;
                    border-radius: 4px;
                 }
                 input  {
                   width: 20px;
                   height: 20px;
                }
                label {
                    font-size: 20px;    
                    color: blue;
                }
              </style>
          </head>
              
          <body>
              <div class="container mt-5">
                  
                     <form class="form-group">
                      <fieldset>
                        <legend>Select Property :</legend>
                        <input type="checkbox" name="veggies" id="veg1" value="tomato" onclick="return ValidateSelection();">
                        <label for="veg1">Property Research</label>
                        <input form="myForm" type="checkbox" name="veggies" id="veg2"  value="onion" onclick="return ValidateSelection();"> 
                        <label for="veg2">Property Indication</label>
                        <input form="myForm" type="checkbox" name="veggies" id="veg3"  value="lettuce" onclick="return ValidateSelection();"> 
                        <label for="veg3">Property Appraisal</label>
                      </fieldset>
                     </form>

                        <!-- <p><input type="submit" value="Submit"></p> -->
                            
                        <script type="text/javascript">  
                        function ValidateSelection()  
                        {  
                            var check_box = document.getElementsByName("veggies");  
                            var CheckedItems = 0; 
                            for(var i = 0; i < check_box.length; i++)  
                            {  
                                if(check_box[i].checked)  
                                    CheckedItems++;  
                            }  
                            if(CheckedItems > 1){  
                                alert("You can't select more than three veggies!");  
                                return false;}  
                        }  
                        </script>
                  <div id="map"> Map Testing</div>
              </div>
              
              <script type="text/javascript">
                    function initMap() {
                        const myLatLng = { lat: 11.5764211, lng: 104.923754 };
                        const map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 10,
                            center: myLatLng,
                        });

                        var marker, i
                        var infowindow = new google.maps.InfoWindow();
                        //Latitude, Longtitude
                        var locations = $arryProperty;
                        //Labels on marker
                        const labels = $arrayLabel;
                       

                        for (i = 0; i < locations.length; i++) {  
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                label:labels[i],
                                map: map, 
                                // icon: {path: google.maps.SymbolPath.CIRCLE, scale: 0}
                            });
                                
                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                                }
                            })(marker, i));
                        }
                        window.initMap = initMap;
                    }
                </script>
            
        HTML;
    
    
   
        return $html;
    }	
      
    
    protected function grid()
    {

    }

}
