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
    public function index(Content $MapPriceIndicator) 
    {
        $MapPriceIndicator->header($this->title);
        $MapPriceIndicator->body($this->grid());
        //LatLong
        $propertyIndication = [
            'latitude As lat',
            'longtitude As lng',
            'id',
            'branch_name',
            'property_reference',
            'cif_no',
            'rm_name',
            'telephone',
            'requested_date',
            'reported_date',
            'information_type_name',
            'location_type',
            'type_of_access_road',
            'access_road_name',
            'property_type_name',
            'building_status',
            'borey_name',
            'no_of_floor',
            'land_title_type',
            'created_at',
            'land_size',
            'land_value_per_sqm',
            'building_size',
            'building_value_per_sqm',
            'property_value',
            'client_contact_no',
        ];
        $latLong = [
            'latitude As lat',
            'longtitude As lng',
            'id',
        ];
        // Property Indication
        $fieldPropreryLabel = [
            'id',
            'land_value_per_sqm',
        ];
        $reqSearch = request()->search;

        //Property Indication
        $proIndication = DB::table('property_indication_mat_view_summary')->select($propertyIndication);
        if(request()->has('search') && $reqSearch) {
            $proIndication = $proIndication->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $proIndication = $proIndication->get()->toArray() ?? [];

        //Property Research
        $latLongProResearch =  DB::table('property_research_mat_view_summary')->select($latLong);
        if(request()->has('search') && $reqSearch) {
            $latLongProResearch = $latLongProResearch->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $latLongProResearch = $latLongProResearch->get()->toArray() ?? null;
        $propertyResearch = DB::table('property_research_mat_view_summary')->select($fieldPropreryLabel);
        if(request()->has('search') && $reqSearch) {
            $propertyResearch = $propertyResearch->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $propertyResearch = $propertyResearch->get();
        $labelProResearch = $this->labelProResearch($propertyResearch);
        $infoProResearch = DB::table('property_research_mat_view_summary');
        if(request()->has('search') && $reqSearch) {
            $infoProResearch = $infoProResearch->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $infoProResearch = $infoProResearch->get()->toArray() ?? null​​;

        //Property Appraisal
        $latLongProAppraisal =  DB::table('property_appraisal_mat_view_summary')->select($latLong);
        if(request()->has('search') && $reqSearch) {
            $latLongProAppraisal = $latLongProAppraisal->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $latLongProAppraisal =  $latLongProAppraisal->get()->toArray() ?? null;
        $propertyAppraisal = DB::table('property_appraisal_mat_view_summary')->select($fieldPropreryLabel);
        if(request()->has('search') && $reqSearch) {
            $propertyAppraisal = $propertyAppraisal->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $propertyAppraisal = $propertyAppraisal->get();
        $labelProAppraisal = $this->labelProAppraisal($propertyAppraisal);
        $infoProAppraisal = DB::table('property_appraisal_mat_view_summary');
        if(request()->has('search') && $reqSearch) {
            $infoProAppraisal = $infoProAppraisal->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $infoProAppraisal = $infoProAppraisal->get()->toArray() ?? null​​;

        if(request()->check_list == 'indication') {
            $MapPriceIndicator->body(view('map.googleMapIndication', [
                'proIndication' => $proIndication,
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
        } else { 
            $MapPriceIndicator->body(view('map.googleMapPropertyResearch', [
                'latLongProResearch' => $latLongProResearch,
                'labelProResearch' => $labelProResearch,
                'infoProResearch' => $infoProResearch
            ]));
        }
        return $MapPriceIndicator;
    }
    private function labelProIndication($propertyIndication)
    {
        foreach($propertyIndication as $value) {
            $label = "$".$value->land_value_per_sqm;
            $labelArray[] = $label;
        }
        return $labelProIndication = $labelArray ?? null;
    }
    private function labelProResearch($propertyResearch)
    {
        foreach($propertyResearch as $value) {
            $labelProResearch = "$".$value->land_value_per_sqm;
            $arrayLabelProResearch[] = $labelProResearch;
        }
        return $arrayLabelProResearch = $arrayLabelProResearch ?? null;
    }
    private function labelProAppraisal($propertyAppraisal)
    {
        foreach($propertyAppraisal as $value) {
            $labelProAppraisal = "$".$value->land_value_per_sqm;
            $arrayLabelProAppraisal[] = $labelProAppraisal;
        }
        return $arrayLabelProAppraisal = $arrayLabelProAppraisal ?? null;
    }

    protected function grid()
    {

    }

}
