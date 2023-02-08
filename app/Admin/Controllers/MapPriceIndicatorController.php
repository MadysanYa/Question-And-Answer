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
use Illuminate\Support\Facades\DB;
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
        $MapPriceIndicator->body($this->grid());
        //LatLong
        $latLong = [
            'latitude As lat',
            'longtitude As lng',
        ];
        // Property Indication 
        $fieldProIndication = [
            'id',
            'latitude',
            'longtitude',
            'land_value_per_sqm',
            'branch_code',
            'property_reference',
            'cif_no',
            'rm_name',
            'telephone',
            'requested_date',
            'reported_date',
            'information_type',
            'location_type',
            'type_of_access_road',
            'access_road_name',
            'property_type',
            'building_status',
            'borey',
            'no_of_floor',
            'land_title_type',
            'created_at',
            'land_size',
            'land_value_per_sqm',
            'building_size',
            'building_value_per_sqm',
            'property_value',
            'client_contact_no',
            'customer_name',
        ];
        // Property Research 
        $fieldProResearch = [
            'id',
            'latitude',
            'longtitude',
            'information_type',
            'property_reference',
            'location_type',
            'property_type',
            'type_of_access_road',
            'access_road_name',
            'borey',
            'no_of_floor',
            'land_title_type',
            'created_at',
            'land_size',
            'land_value_per_sqm',
            'building_size',
            'building_value_per_sqm',
            'property_market_value'
        ];
        // Property Appraisal
        $fieldProAppraisal = [
            'id',
            'latitude',
            'longtitude',
            'branch_code',
            'property_reference',
            'cif_no',
            'rm_name',
            'telephone',
            'requested_date',
            'reported_date',
            'information_type',
            'location_type',
            'type_of_access_road',
            'access_road_name',
            'land_title_type',
            'property_type',
            'building_status',
            'borey',
            'no_of_floor',
            'created_at',
            'land_size',
            'land_value_per_sqm',
            'building_value_per_sqm',
            'land_size_by_measurement',
            'property_value',
            'customer_name',
            'client_contact_no',
        ];

        //Property Indication
        $propertys = PropertyIndicator::select($fieldProIndication)->get();
        // dd($propertys->type);
        $locationArray = [];

        //LatLong Property Indication
        $arryProperty = PropertyIndicator::select($latLong)->get()->toArray() ?? null;
        
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
                optional($value->branchCode)->branch_name.','.
                $value->property_reference.','.
                $value->cif_no.','.
                $value->rm_name.','.
                $value->telephone.','.
                $value->requested_date.','.
                $value->reported_date.','.
                optional($value->infoType)->information_type_name.','.
                $value->location_type.','.
                $value->type_of_access_road.','.
                $value->access_road_name.','.
                optional($value->propertyType)->property_type_name.','.
                $value->building_status.','.
                optional($value->boreyType)->borey_name.','.
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
        $propertyResearch = PropertyResearch::select($fieldProResearch)->get();
        $proResearch = [];

        $latLongProResearch = PropertyResearch::select($latLong)->get()->toArray() ?? null;
        $labelProResearch = $this->labelProResearch($propertyResearch);
        $infoProResearch = $this->infoProResearch($propertyResearch);

        //Property Appraisal
        $propertyAppraisal = PropertyAppraisal::select($fieldProAppraisal)->get();;
        $proResearch = [];

        $latLongProAppraisal = PropertyAppraisal::select($latLong)->get()->toArray() ?? null;
        $labelProAppraisal = $this->labelProAppraisal($propertyAppraisal);
        $infoProAppraisal = $this->infoProAppraisal($propertyAppraisal);


        if(request()->check_list == 'indication'){
            $MapPriceIndicator->body(view('map.googleMapIndication', [
                'arryProperty' => $arryProperty,
                'arrayLabel' => $arrayLabel,
                'infoProperty' => $infoProperty,
                'propertys' => $propertys,
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

    private function labelProResearch($propertyResearch)
    {
        foreach($propertyResearch as $value){
            $labelProResearch = "$".$value->land_value_per_sqm;
            $arrayLabelProResearch[] = $labelProResearch;
        }
        return $arrayLabelProResearch = $arrayLabelProResearch ?? null;
    }

    private function infoProResearch($propertyResearch)
    {
        foreach($propertyResearch as $value){
            $info = [
                $value->latitude.','.
                $value->longtitude.','.
                optional($value->infoType)->information_type_name.','.
                $value->property_reference.','.
                $value->location_type.','.
                optional($value->propertyType)->property_type_name.','.
                $value->type_of_access_road.','.
                $value->access_road_name.','.
                optional($value->boreyType)->borey_name.','.
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

    private function labelProAppraisal($propertyAppraisal)
    {
        foreach($propertyAppraisal as $value){
            $labelProAppraisal = "$".$value->land_value_per_sqm;
            $arrayLabelProAppraisal[] = $labelProAppraisal;
        }
        return $arrayLabelProAppraisal = $arrayLabelProAppraisal ?? null;
    }

    private function infoProAppraisal($propertyAppraisal)
    {
        foreach($propertyAppraisal as $value){
            $info = [
                $value->latitude.','.
                $value->longtitude.','.
                optional($value->branchCode)->branch_name.','.
                $value->property_reference.','.
                $value->cif_no.','.
                $value->rm_name.','.
                $value->telephone.','.
                $value->requested_date.','.
                $value->reported_date.','.
                optional($value->infoType)->information_type_name.','.
                $value->location_type.','.
                $value->type_of_access_road.','.
                $value->access_road_name.','.
                $value->land_title_type.','.
                $value->property_type.','.
                $value->building_status.','.
                optional($value->boreyType)->borey_name.','.
                $value->no_of_floor.','.
                $value->created_at->format('d-m-Y').','.
                $value->land_size.','.
                $value->land_value_per_sqm.','.
                $value->land_size_by_measurement.','.
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
