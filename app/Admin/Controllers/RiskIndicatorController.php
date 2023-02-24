<?php

namespace App\Admin\Controllers;



use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\RiskIndicator;
use Encore\Admin\Layout\Content;
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

    public function index(Content $RiskIndicator)
    {
        $userIsRmRole = User::isRmRole();

        $RiskIndicator->header($this->title);
        // $RiskIndicator->body($this->dashboard());
        $RiskIndicator->body($this->grid());

        //Map 
        //Property Indication
        $riskPropertys = RiskIndicator::get();
        $locationArray = [];

        // Latitude, Longtitude
        foreach($riskPropertys as $risk){
            $raskLocation = [$risk->title.','.$risk->latitude.','.$risk->longtitude];
            $arr = explode(",", implode(" ", $raskLocation));
            $locationArray[] = $arr;
        }
        $arryRiskProperty = $locationArray;
        
        // Labels on marker
        foreach($riskPropertys as $value){
            $label = $value->title;
            $labelArray[] = $label;
        }
        $arrayLabel = $labelArray;

        //Information property indicator
        foreach($riskPropertys as $value){
            $info = [
                $value->latitude.','.
                $value->longtitude.','.
                $value->description.','.
                $value->id
            ];
            $arrInfo = explode(",", implode(" ", $info));
            $infoArray[] = $arrInfo;
        }
        $infoProperty = $infoArray;

        $RiskIndicator->body(view('risk.riskIndication', [
            'arryRiskProperty' => $arryRiskProperty,
            'arrayLabel' => $arrayLabel,
            'infoProperty' => $infoProperty,
            'userIsRmRole' => $userIsRmRole
        ]));

        return $RiskIndicator;
    }

    protected function dashboard(){
    
   
        return $html;
    }	
   
    
    protected function grid()
    {

    }
  



    protected function form()
    {
        $form = new Form(new RiskIndicator());
        $form->column(1/2, function ($form){
            $form->text('title', __('Title'))->rules('required');
            $form->text('latitude', __('Latitude'))->inputmask(['mask' => '99.999999'])->rules('required');
            $form->text('longtitude', __('Longtitude'))->inputmask(['mask' => '999.999999'])->rules('required');
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
