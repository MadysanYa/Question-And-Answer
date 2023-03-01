<?php

namespace App\Admin\Controllers;

use Auth;
use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Admin;
use App\Models\RiskIndicator;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\DB;
use Encore\Admin\Form\Field\Button;
use Illuminate\Support\Facades\Request;
use Encore\Admin\Controllers\AdminController;


class RiskIndicatorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Risk Indicator';
     /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function index(Content $RiskIndicator){

        $RiskIndicator->header($this->title);
        $RiskIndicator->body($this->grid());

        $userIsRmRole = User::isRmRole();
        $userIsBmRole = User::isBmRole();

        //LatLong
        $latLong = [
            'latitude As lat',
            'longtitude As lng',
        ];
        // Property Indication
        $fieldRiskIndicator = [
            'id',
           'title',
           'latitude',
           'longtitude',
           'description',
        ];

        //Property Indication
        $propertys = RiskIndicator::select($fieldRiskIndicator)->get();
        $locationArray = [];

        //LatLong Property Indication
        $arryRiskProperty = RiskIndicator::select($latLong)->get()->toArray() ?? null;

        //Labels on marker
        foreach($propertys as $value){
            $label = $value->title;
            $labelArray[] = $label;
        }
        $arrayLabel = $labelArray ?? null;

        //Information property indicator
        foreach($propertys as $value){
            $info = [
                $value->latitude.','.
                $value->longtitude.','.
                $value->description.','.
                $value->id
            ];
            $arrInfo = explode(",", implode(" ", $info));
            $infoArray[] = $arrInfo;
        }
        $infoProperty = $infoArray ?? null;

        $RiskIndicator->body(view('risk.riskIndication', [
            'arryRiskProperty' => $arryRiskProperty,
            'arrayLabel' => $arrayLabel,
            'infoProperty' => $infoProperty,
            'userIsRmRole' => $userIsRmRole,
            'userIsBmRole' => $userIsBmRole,
        ]));

        return $RiskIndicator;
    }
    protected function grid()
    {

    }
    protected function form()
    {
        $form = new Form(new RiskIndicator());
        $form->column(1/2, function ($form){
            $form->text('title', __('Title'))->rules('required');
            $form->text('latitude', __('Latitude'))->inputmask(['mask' => '99.9999999'])->rules('required');
            $form->text('longtitude', __('Longtitude'))->inputmask(['mask' => '999.9999999'])->rules('required');
            // $form->textarea('description', __('Description'));
            $form->textarea('description', __('Description'))->rows(10);

        });

        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });

        $form->footer(function ($footer) {

            // disable reset btn
            $footer->disableReset();
            // disable `View` checkbox
            $footer->disableViewCheck();
            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();
            // disable `Continue Creating` checkbox

            
            //$footer->disableCreatingCheck();
            $footer->disableCreatingCheck();

        });

        return $form;
    }

}
