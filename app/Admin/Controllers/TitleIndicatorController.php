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


class TitleIndicatorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Title Indicator';
     /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function index(Content $TitleIndicator){

        $TitleIndicator->header($this->title);
        $TitleIndicator->body($this->grid());
       //LatLong
       $latLong = [
        'latitude As lat',
        'longtitude As lng',
        ];
        // Property Indication
        $fieldPropreryLabel = [
            'id',
            'land_title_type',
        ];
        $reqSearch = request()->search;

        //Property Indication
        $latLongProIndicator = DB::table('property_indication_mat_view_summary')->select($latLong);
        if(request()->has('search') && $reqSearch) {
            $latLongProIndicator = $latLongProIndicator->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $latLongProIndicator = $latLongProIndicator->get()->toArray() ?? null;
        $propertyIndication = DB::table('property_indication_mat_view_summary')->select($fieldPropreryLabel);
        if(request()->has('search') && $reqSearch) {
            $propertyIndication = $propertyIndication->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $propertyIndication = $propertyIndication->get();
        $labelProIndication = $this->labelProIndication($propertyIndication);
        $infoProIndication = DB::table('property_indication_mat_view_summary');
        if(request()->has('search') && $reqSearch) {
            $infoProIndication = $infoProIndication->where('id', $reqSearch)->orWhere('property_reference',$reqSearch);
        }
        $infoProIndication = $infoProIndication->get()->toArray() ?? null​​;

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

        if(request()->check_list == 'indication'){
            $TitleIndicator->body(view('map.googleMapIndication', [
                'latLongProIndicator' => $latLongProIndicator,
                'labelProIndication' => $labelProIndication,
                'infoProIndication' => $infoProIndication
            ]));
        }elseif (request()->check_list == 'research') {
            $TitleIndicator->body(view('map.googleMapPropertyResearch', [
                'latLongProResearch' => $latLongProResearch,
                'labelProResearch' => $labelProResearch,
                'infoProResearch' => $infoProResearch
            ]));
        }elseif (request()->check_list == 'appraisal') {
            $TitleIndicator->body(view('map.googleMapAppraisal', [
                'latLongProAppraisal' => $latLongProAppraisal,
                'labelProAppraisal' => $labelProAppraisal,
                'infoProAppraisal' => $infoProAppraisal
            ]));
        }
        else{
            $TitleIndicator->body(view('map.googleMapPropertyResearch', [
                'latLongProResearch' => $latLongProResearch,
                'labelProResearch' => $labelProResearch,
                'infoProResearch' => $infoProResearch
            ]));
        }

        return $TitleIndicator;
    }

    private function labelProIndication($propertyIndication)
    {
        foreach($propertyIndication as $value) {
            $label = $value->land_title_type;
            $labelArray[] = $label;
        }
        return $labelProIndication = $labelArray ?? null;
    }

    private function labelProResearch($propertyResearch)
    {
        foreach($propertyResearch as $value){
            $labelProResearch = $value->land_title_type;
            $arrayLabelProResearch[] = $labelProResearch;
        }
        return $arrayLabelProResearch = $arrayLabelProResearch ?? null;
    }

    private function labelProAppraisal($propertyAppraisal)
    {
        foreach($propertyAppraisal as $value){
            $labelProAppraisal = $value->land_title_type;
            $arrayLabelProAppraisal[] = $labelProAppraisal;
        }
        return $arrayLabelProAppraisal = $arrayLabelProAppraisal ?? null;
    }

    protected function grid()
    {

    }

}
