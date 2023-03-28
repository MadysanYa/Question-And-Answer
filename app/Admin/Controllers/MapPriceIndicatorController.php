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
        $propertyResearch = [
            'latitude As lat',
            'longtitude As lng',
            'id',
            'information_type_name',
            'property_reference',
            'location_type',
            'property_type_name',
            'type_of_access_road',
            'access_road_name',
            'borey_name',
            'no_of_floor',
            'land_title_type',
            'created_at',
            'land_size',
            'land_value_per_sqm',
            'building_size',
            'building_value_per_sqm',
            'property_market_value',
        ];
        $propertyAppraisal = [
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
            'land_title_type',
            'property_type_name',
            'building_status',
            'borey_name',
            'no_of_floor',
            'created_at',
            'land_size',
            'land_value_per_sqm',
            'land_size_by_measurement',
            'building_value_per_sqm',
            'property_value',
            'customer_name',
            'client_contact_no',
        ];
        $reqSearch = request()->search;

        //Property Indication
        $proIndication = DB::table('property_indication_mat_view_summary')->select($propertyIndication);
        if(request()->has('search') && $reqSearch) {
            $proIndication = $proIndication->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $proIndication = $proIndication->get()->toArray() ?? [];

        //Property Research
        $proResearch =  DB::table('property_research_mat_view_summary')->select($propertyResearch);
        if(request()->has('search') && $reqSearch) {
            $proResearch = $proResearch->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $proResearch = $proResearch->get()->toArray() ?? [];

        //Property Appraisal
        $proAppraisal =  DB::table('property_appraisal_mat_view_summary')->select($propertyAppraisal);
        if(request()->has('search') && $reqSearch) {
            $proAppraisal = $proAppraisal->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $proAppraisal =  $proAppraisal->get()->toArray() ?? [];

        if(request()->check_list == 'indication') {
            $MapPriceIndicator->body(view('map.googleMapIndication', [
                'proIndication' => $proIndication,
            ]));
        }elseif (request()->check_list == 'research') {
            $MapPriceIndicator->body(view('map.googleMapPropertyResearch', [
                'proResearch' => $proResearch,
            ]));
        }elseif (request()->check_list == 'appraisal') {
            $MapPriceIndicator->body(view('map.googleMapAppraisal', [
                'proAppraisal' => $proAppraisal,
            ]));
        } else { 
            $MapPriceIndicator->body(view('map.googleMapPropertyResearch', [
                'proResearch' => $proResearch,
            ]));
        }
        return $MapPriceIndicator;
    }

    protected function grid()
    {

    }

}
