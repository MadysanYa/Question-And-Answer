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
            
        HTML;
    
    
   
        return $html;
    }	
      
    
    protected function grid()
    {

    }

}
