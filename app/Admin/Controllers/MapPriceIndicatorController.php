<?php

namespace App\Admin\Controllers;



use Encore\Admin\Controllers\AdminController;
use App\Models\MapPriceIndicator;
use Encore\Admin\Grid;
use App\Model\Invoice;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Request;
use Encore\Admin\Layout\Content;
use App\Models\User;
use Encore\Admin\Form\Field\Button;
use Auth;


use Encore\Admin\Admin;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Form;









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
        $MapPriceIndicator->body($this->dashboard());
        //$MapPriceIndicator->body($this->grid());
       
        
        return$MapPriceIndicator;
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
          <style type="text/css">
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
          </style>
      </head>
          
      <body>
          <div class="container mt-5">
              <h2>Laravel Google Maps Multiple Markers Example</h2>
              <div id="map"></div>
          </div>
          
          <script type="text/javascript">
              function initMap() {
                  const myLatLng = { lat: 11.5764211, lng: 104.923754 };
                  const map = new google.maps.Map(document.getElementById("map"), {
                      zoom: 5,
                      center: myLatLng,
                  });
                  
        
                  
        
                  var infowindow=[];// = new google.maps.InfoWindow();
        
                  var marker=[], i;
                  var locations = [
                        ['National University of Management', 11.5735319,104.9210263],
                        ['Shinhan Bank Cambodia Plc (Head Office)', 11.56913,104.9168975],
                        ['Wat Phnom Daun Penh ', 11.5758086,104.9227217],
                        ['Independence Monument', 11.5559071,104.9280069],
                    ];
                // var icontype  = '/images/home1.png';
              

                    
                  for (i = 0; i < locations.length; i++) {  
                        marker[i] = new google.maps.Marker({
                          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        
                      //  icon: icontype,
                          map: map,
                        
                        icon: {path: google.maps.SymbolPath.CIRCLE, scale: 0}
                        });
                          
                        infowindow[i] = new google.maps.InfoWindow();
                        //google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        //  return function() {
                            infowindow[i].setContent('<label style="color: white;">$133,000</label>');
                            
                            infowindow[i].open(map, marker[i]);
                        //  }
                        //})(marker, i));
        
                  }
              }

              
        
              window.initMap = initMap;
          </script>
        
          <script type="text/javascript"
              src="https://maps.google.com/maps/api/js?key=AIzaSyAMUcSJr7R-FTwCXyKXLKGYc-vwQsu1l5A&callback=initMap" ></script>
        
      </body>
      </html>
       
    HTML;
    return $html;
    }	
      
    
     protected function grid()
     {
        

     }
     



  





    
       
            
        
       
        
       


        
   

}
