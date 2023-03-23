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
        $fieldPropreryLabel = [
            'id',
            'land_value_per_sqm',
        ];

        //LatLong Property Indication
        $arryProperty =  DB::table('property_indication_mat_view_summary')->select($latLong)->where('id', 2)->get()->toArray() ?? null;

        //Labels on marker
        $propertys = DB::table('property_indication_mat_view_summary')->select($fieldPropreryLabel)->where('id', 2)->get();
        foreach($propertys as $value){
            $label = "$".$value->land_value_per_sqm;
            $labelArray[] = $label;
        }
        $arrayLabel = $labelArray ?? null;

        //Information property indicator
        $infoProperty = DB::table('property_indication_mat_view_summary')->where('id', 2)->get()->toArray() ?? null​​;

        //Property Research
        $propertyResearch = DB::table('property_research_mat_view_summary')->select($fieldPropreryLabel)->get();
        $latLongProResearch =  DB::table('property_research_mat_view_summary')->select($latLong)->get()->toArray() ?? null;
        $labelProResearch = $this->labelProResearch($propertyResearch);
        $infoProResearch = DB::table('property_research_mat_view_summary')->get()->toArray() ?? null​​;

        //Property Appraisal
        $propertyAppraisal = DB::table('property_appraisal_mat_view_summary')->select($fieldPropreryLabel)->get();
        $latLongProAppraisal =  DB::table('property_appraisal_mat_view_summary')->select($latLong)->get()->toArray() ?? null;
        $labelProAppraisal = $this->labelProAppraisal($propertyAppraisal);
        $infoProAppraisal = DB::table('property_appraisal_mat_view_summary')->get()->toArray() ?? null​​;

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
            $MapPriceIndicator->body(view('map.googleMapPropertyResearch', [
                'latLongProResearch' => $latLongProResearch,
                'labelProResearch' => $labelProResearch,
                'infoProResearch' => $infoProResearch
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

    private function labelProAppraisal($propertyAppraisal)
    {
        foreach($propertyAppraisal as $value){
            $labelProAppraisal = "$".$value->land_value_per_sqm;
            $arrayLabelProAppraisal[] = $labelProAppraisal;
        }
        return $arrayLabelProAppraisal = $arrayLabelProAppraisal ?? null;
    }

    protected function grid()
    {

    }

}
