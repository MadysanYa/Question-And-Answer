<?php

namespace App\Admin\Controllers;

use App\Models\PropertyResearch;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Branch;
use App\Models\contracts;
use Encore\Admin\Layout\Content;

use Illuminate\Support\Facades\Request;

class PropertyResearchConteroller extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */

    //  Title to view
    protected $title = 'Property Research Management';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    public function index(Content $content){
        $content->header($this->title);
        $content->body($this->dashboard());
        $content->body($this->grid());
        return $content;
}

    protected function dashboard(){


		$title1 = "Done";
		// $value1 = $Done;
		$title2 = "Pending";
		// $value2 = $Pending;
		$title3 = "Progressing";
		// $value3 = $Progressing;
		$title4 = "ETC";
		// $value4 = $ETC;

            $html = <<<HTML
            <h1>Dashboard Show Testing</h1>
            
            <div class="row">
                <div class="col-lg-3" style="padding: 0 10px 15px 15px; height: 100px;text-align: center;">
                        <div style="background-color:#abffbd;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
                        {{title1}}
                            <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value1}}</label> -->
                        </div>
                </div>
                <div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
                        <div style="background-color:#ffc0ab;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
                        {{title2}}
                            <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value2}}</label> -->
                        </div>
                </div>
                <div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
                        <div style="background-color:#f1fa75;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
                        {{title3}}
                            <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value3}}</label> -->
                        </div>
                </div>
                <div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
                        <div style="background-color:red;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
                        {{title4}}
                            <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value4}}</label> -->
                        </div>
                </div>
                
            
            </div>
        HTML;

        $html = str_replace('{{title1}}',$title1,$html);
		// $html = str_replace('{{value1}}',$value1,$html);
		$html = str_replace('{{title2}}',$title2,$html);
		// $html = str_replace('{{value2}}',$value2,$html);
		$html = str_replace('{{title3}}',$title3,$html);
		// $html = str_replace('{{value3}}',$value3,$html);
		$html = str_replace('{{title4}}',$title4,$html);
		// $html = str_replace('{{value4}}',$value4,$html);

        return $html;
     }
    
    protected function grid()
    {
        $grid = new Grid(new PropertyResearch);
		$grid->model()->orderBy('id','desc');
		$grid->column('id', __('No.'))->desc()->sortable();
        $grid->column('reference', __('Reference'));
        $grid->column('owner', __('Owner'));
        $grid->column('type', __('Type'));
        $grid->column('property_address', __('Property Address'));
        $grid->column('geo_code', __('Geo Code'));
		
		
		// No need to change
        // $grid->disableExport();
        // $grid->disableFilter();
        $grid->quickSearch('id','department', 'responsible_person');
		
	

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        // $show = new Show(Network::findOrFail($id));
        // return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PropertyResearch());
        $form->text('reference', __('Reference'));
        $form->text('owner', __('Owner'));
        $form->text('type', __('Type'));
        $form->text('property_address', __('Property Address'));
        $form->text('geo_code', __('Geo_Code'));

        // $form->text('responsible_person', __('responsible_person'));
		// $form->text('mac_address', __('mac_address'));
		// $form->text('devices_name', __('devices_name'));
		// $form->text('devies_type', __('devies_type'));
		// $form->text('department', __('department')); 
		// $form->text('status', __('status')); 
		
		
		
		

        $form->footer(function ($footer) {

            // disable reset btn
            $footer->disableReset();
            // disable `View` checkbox
            $footer->disableViewCheck();
            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();
            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();
        
        });


        return $form;
    }
}