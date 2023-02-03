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
use App\Models\PropertyResearch;
use Encore\Admin\Layout\Content;
use App\Models\MapPriceIndicator;
use App\Models\PropertyAppraisal;
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
        //Property Indication
        $propertys = PropertyIndicator::get();
        $locationArray = [];

        // Latitude, Longtitude
        foreach($propertys as $property){
            $location = [$property->land_value_per_sqm.'$'.','.$property->latitude.','.$property->longtitude];
            $arr = explode(",", implode(" ", $location));
            $locationArray[] = $arr;
        }
        $arryProperty = $locationArray ?? null;
        
        //Labels on marker
        foreach($propertys as $value){
            $label = "$".$value->land_value_per_sqm;
            $labelArray[] = $label;
        }
        $arrayLabel = $labelArray ?? null;

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
                $value->created_at->format('d-m-Y').','.
                $value->land_size.','.
                $value->land_value_per_sqm.','.
                $value->building_size.','.
                $value->building_value_per_sqm.','.
                $value->property_value.','.
                $value->client_contact_no
            ];
            $arrInfo = explode(",", implode(" ", $info));
            $infoArray[] = $arrInfo;
        }
        $infoProperty = $infoArray ?? null;

        //Property Research
        $propertyResearch = PropertyResearch::get();
        $proResearch = [];

        $latLongProResearch = $this->latLongProResearch($propertyResearch);
        $labelProResearch = $this->labelProResearch($propertyResearch);
        $infoProResearch = $this->infoProResearch($propertyResearch);

        //Property Appraisal
        $propertyAppraisal = PropertyAppraisal::get();
        $proResearch = [];

        $latLongProAppraisal = $this->latLongProAppraisal($propertyAppraisal);
        $labelProAppraisal = $this->labelProAppraisal($propertyAppraisal);
        $infoProAppraisal = $this->infoProAppraisal($propertyAppraisal);


        if(request()->check_list == 'indication'){
            $MapPriceIndicator->body(view('map.googleMapIndication', [
                'arryProperty' => $arryProperty,
                'arrayLabel' => $arrayLabel,
                'infoProperty' => $infoProperty,
            ]));
        }elseif (request()->check_list == 'research') {
            $MapPriceIndicator->body(view('map.googleMapPropertyResearch', [
                'latLongProResearch' => $latLongProResearch,
                'labelProResearch' => $labelProResearch,
                'infoProResearch' => $infoProResearch
            ]));
        }elseif (request()->check_list == 'appraisal') {
            $MapPriceIndicator->body(view('map.googleMapAppraisal', [
                'latLongProAppraisal' => $latLongProAppraisal,
                'labelProAppraisal' => $labelProAppraisal,
                'infoProAppraisal' => $infoProAppraisal
            ]));
        }
        else{
            $MapPriceIndicator->body(view('map.googleMapIndication', [
                'arryProperty' => $arryProperty,
                'arrayLabel' => $arrayLabel,
                'infoProperty' => $infoProperty,
            ]));
        }

        return $MapPriceIndicator;
    }
    
    public function latLongProResearch($propertyResearch)
    {
        foreach ($propertyResearch as $value) {
            $proResearchs = [$value->land_value_per_sqm.'$'.','.$value->latitude.','.$value->longtitude];
            $propertySearch = explode(",", implode(" ", $proResearchs));
            $proResearchArray[] = $propertySearch;
        }
        return $arrayProResearch = $proResearchArray ?? null;
    }

    public function labelProResearch($propertyResearch)
    {
        foreach($propertyResearch as $value){
            $labelProResearch = "$".$value->land_value_per_sqm;
            $arrayLabelProResearch[] = $labelProResearch;
        }
        return $arrayLabelProResearch = $arrayLabelProResearch ?? null;
    }

    public function infoProResearch($propertyResearch)
    {
        foreach($propertyResearch as $value){
            $info = [
                $value->latitude.','.
                $value->longtitude.','.
                $value->information_type.','.
                $value->property_reference.','.
                $value->location_type.','.
                $value->property_type.','.
                $value->type_of_access_road.','.
                $value->access_road_name.','.
                $value->borey.','.
                $value->no_of_floor.','.
                $value->land_title_type.','.
                $value->created_at->format('d-m-Y').','.
                $value->land_size.','.
                $value->land_value_per_sqm.','.
                $value->building_size.','.
                $value->building_value_per_sqm.','.
                $value->property_market_value
            ];
            $arrInfoProResearch = explode(",", implode(" ", $info));
            $arrayInfor[] = $arrInfoProResearch;
        }
        return $infoPropertyResearch = $arrayInfor ?? null;
    }

    public function latLongProAppraisal($propertyAppraisal)
    {
        foreach ($propertyAppraisal as $value) {
            $proAppraisal = [$value->land_value_per_sqm.'$'.','.$value->latitude.','.$value->longtitude];
            $properAppraisal = explode(",", implode(" ", $proAppraisal));
            $proAppraisalArray[] = $properAppraisal;
        }
        return $arrayAppraisal = $proAppraisalArray ?? null;
    }

    public function labelProAppraisal($propertyAppraisal)
    {
        foreach($propertyAppraisal as $value){
            $labelProAppraisal = "$".$value->land_value_per_sqm;
            $arrayLabelProAppraisal[] = $labelProAppraisal;
        }
        return $arrayLabelProAppraisal = $arrayLabelProAppraisal ?? null;
    }

    public function infoProAppraisal($propertyAppraisal)
    {
        foreach($propertyAppraisal as $value){
            
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
                $value->land_title_type.','.
                $value->property_type.','.
                $value->building_status.','.
                $value->borey.','.
                $value->no_of_floor.','.
                $value->created_at->format('d-m-Y').','.
                $value->land_size.','.
                $value->land_value_per_sqm.','.
                $value->building_size.','.
                $value->building_value_per_sqm.','.
                $value->property_value.','.
                $value->customer_name.','.
                $value->client_contact_no
            ];
            $arrInfoProAppraisal = explode(",", implode(" ", $info));
            $arrayInfor[] = $arrInfoProAppraisal;
        }
        return $infoPropertyAppraisal = $arrayInfor ?? null;
    }

    protected function grid()
    {

    }

}
