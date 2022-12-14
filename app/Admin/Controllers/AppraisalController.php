<?php

namespace App\Admin\Controllers;

use App\Models\Appraisal;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\index;
use Encore\Admin\Layout\Content;

class AppraisalController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Property Appraisal';


    // public function index(Content $content){

    //     $content->body($this->dashboard());
    //     $content->body($this->grid());
    //     return $content;
    // }

    public function dashboard(){
        $button = "<button> A </button>";
        return $button;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
  
               $grid = new Grid(new Appraisal());
        

               $grid->column('region', __('Region'));
               $grid->column('branch', __('Branch'));

        $grid->column('Action')->display(function(){
        $text = $this->id;
            return "<button style='background: wihte;'> $text</button>";
        });

        $grid->quickSearch('name');
      
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
        $show = new Show(Appraisal::findOrFail($id));
    
    
      

        $show->field('id', __('id'))->sortable();
        $show->field('region', __('Region'));
        $show->field('branch', __('Branch'));
        $show->field('cif', __('CIF No.'));
        $show->field('loan_officer', __('Loan Officer'));
        $show->field('property_reference', __('Property Reference'));
        $show->field('access_road_name', __('Access Road Name'));
        $show->field('borey', __('Borey'));
        $show->field('land_title_no', __('Land title no'));
        $show->field('land_value_persqm', __('Land Value Persqm'));
        $show->field('property_value', __('Property Value'));
        $show->field('clinet_contact_no', __('Clinet Vontact No'));
        $show->field('commune_sangkat', __('Commune / Sangkat'));
        $show->field('latitude', __('Latitude'));
        $show->field('remark', __('Remark'));





        $show->field('telephone', __('telephone'));
        $show->field('report_date', __('Report Date'));
        $show->field('location_type', __('location_type'));
        $show->field('property_type', __('property_type'));
        $show->field('no_of_floor', __('no_of_floor'));
        $show->field('land_size', __('land_size'));
        $show->field('building_size_by_measure', __('building_size_by_measure'));
        $show->field('collateral_owner', __('collateral_owner'));
        $show->field('province', __('province'));
        $show->field('village', __('village'));
        $show->field('photo', __('photo'));


        $show->field('information_type', __(' information_type'));
        $show->field('type_of_access_road', __('type_of_access_road'));
        $show->field('building_status', __('building_status'));
        $show->field('land_title_type', __(' land_title_type'));
        $show->field('land_size_by_measurement', __('land_size_by_measurement'));
        $show->field('customer_name', __('customer_name'));
        $show->field('building_size_per_sqm', __('building_size_per_sqm'));
        $show->field('district_khan', __('district_khan'));
        $show->field('altitude', __('altitude'));
       
       
        return $show;
    }
    



    /**
     * Make a form builder.
     *
     * @return Form
     */



    protected function form()
    {

        
        $form = new Form(new Appraisal());

        $form->column(1/3,function($form){

            
            $form->text('region', __('Region'));
            $form->text('branch', __('Branch'));
            $form->text('cif', __('CIF No.'));
            $form->text('loan_officer', __('Loan Officer'));
            $form->date('request_date', __('Request Date'));
            $form->text('property_reference', __('Property Reference'));
            $form->text('access_road_name', __('Access Road Name'));
            $form->text('borey', __('Borey'));
            $form->text('land_title_no', __('Land title no'));
            $form->text('land_value_persqm', __('Land Value Persqm'));
            $form->text('property_value', __('Property Value'));
            $form->text('clinet_contact_no', __('Clinet Vontact No'));
            $form->text('commune_sangkat', __('Commune / Sangkat'));
            $form->text('latitude', __('Latitude'));
            $form->text('remark', __('Remark'));           

        });

        $form->column(1/3,function($form){

            
            $form->text('telephone', __('telephone'));
            $form->date('report_date', __('Report Date'));
            $form->text('location_type', __('location_type'));
            $form->text('property_type', __('property_type'));
            $form->text('no_of_floor', __('no_of_floor'));
            $form->text('land_size', __('land_size'));
            $form->text('building_size_by_measure', __('building_size_by_measure'));
            $form->text('collateral_owner', __('collateral_owner'));
            $form->text('province', __('province'));
            $form->text('village', __('village'));
            $form->file('photo', __('photo'));

        

        });

        $form->column(1/3,function($form){

            
            $form->text('information_type', __(' information_type'));
            $form->text('type_of_access_road', __('type_of_access_road'));
            $form->text('building_status', __('building_status'));
            $form->text('land_title_type', __(' land_title_type'));
            $form->text('land_size_by_measurement', __('land_size_by_measurement'));
            $form->text('customer_name', __('customer_name'));
            $form->text('building_size_per_sqm', __('building_size_per_sqm'));
            $form->text('district_khan', __('district_khan'));
            $form->text('altitude', __('altitude'));
            $form->text('swot_analyze', __('swot_analyze'));
            

        

        });


     

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
