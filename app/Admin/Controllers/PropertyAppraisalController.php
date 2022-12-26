<?php

namespace App\Admin\Controllers;

use App\Models\Province;
use App\Models\Branch;
use App\Models\Commune;
use App\Models\District;
use App\Models\Region;
use App\Models\Village;
use App\Models\File;
use App\Models\PropertyAppraisal;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\index;
use Encore\Admin\Form\Field\Id;
use Encore\Admin\Form\Field\Button;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\Request;
Use Encore\Admin\Widgets\Table;

class PropertyAppraisalController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Property Appraisal';


        /**
     * Make a grid builder.
     *
     * @return Grid
     */



     
    protected function grid()   
    {
  

               $grid = new Grid(new PropertyAppraisal());        

               $grid->column('id', __('ID'));               
               $grid->column('reference_id', __('reference_id'));               
               $grid->column('collateral_owner', __('Owner'));
               $grid->column('type', __('Type'));
               $grid->column('property_address', __('Property Address'));
               $grid->column('geo_code', __('Geo Code'));

             
        $grid->quickSearch('cif','region','province','remark');
      
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
        $show = new Show(PropertyAppraisal::findOrFail($id)); 
        // $show->field('id', __('Id'));
        // $show->field('name', __('Name'));
        // $show->field('username', __('Username'));
        // $show->field('password', __('Password'));
        // $show->field('remark', __('Remark'));
        // $show->field('updated_at', __('Updated at'));
        // $show->field('created_at', __('Created at'));  

        $show->field('id', __('ID'))->sortable();
        $show->field('region', __('Region'))->as(function($region){
            $province = Province::where('id', $region)->first();
            if($province == null) return '';
            return $province->province_name ;
        });
        $show->field('branch_code',__('Branch'))->as(function($branch_code){
            $branch = Branch::where('branch_code', $branch_code)->first();
            if($branch == null) return '';
            return '(' . $branch->branch_code . ') ' . $branch->branch_name;
        });

        $show->field('reference_id', __('reference_id'));
        $show->field('cif', __('CIF No'));
        $show->field('loan_officer', __('Loan Officer'));
        $show->field('request_date', __('Request Date'));
        $show->field('property_reference', __('Property Reference'));
        $show->field('access_road_name', __('Access Road Name'));
        $show->field('borey', __('Borey'));
        $show->field('land_title_no', __('Land title no'));
        $show->field('land_value_persqm', __('Land Value Persqm'));
        $show->field('property_value', __('Property Value'));
        $show->field('clinet_contact_no', __('Clinet Contact No'));
        $show->field('commune_sangkat', __('Commune Sangkat'));
        $show->field('latitude', __('Latitude'));
        $show->field('remark', __('Remark'));
        $show->field('telephone', __('Telephone'));
        $show->field('report_date', __('Report Date'));
        $show->field('report_date', __('Report Date'));
        $show->field('location_type', __('Location Type'));
        $show->field('property_type', __('Property Type'));
        $show->field('no_of_floor', __('No Of Floor'));
        $show->field('land_size', __('Land_size'));
        $show->field('building_size_by_measure', __('Building Size By Measure'));
        $show->field('collateral_owner', __('Owner'));
        $show->field('provinces', __('Province'));
        $show->field('village', __('Village'));
        $show->field('photo',__('Photo'));
        $show->field('information_type', __('Information Type'));
        $show->field('type_of_access_road', __('Type Of Access Road'));
        $show->field('building_status', __('Building Status'));
        $show->field('land_title_type', __('Land Title Type'));
        $show->field('land_size_by_measurement', __('Land Size By Measurement'));
        $show->field('customer_name', __('Customer_Name'));
        $show->field('building_size_per_sqm', __('Building Size Per Sqm'));
        $show->field('district_khan', __('District Khan'));
        $show->field('altitude', __('Altitude'));
        $show->field('reference_id', __('Reference'));  

        return $show;
    }
    
    /**
     * Make a form builder.
     *
     * @return Form
     */

    protected function form()
    {

        $form = new Form(new PropertyAppraisal());

        $form->column(1/3,function($form){
            
            $form->select('region', __('Region'))->options(function(){
                return Province::all()->pluck('province_name', 'id');})->load('branch_code', env('APP_URL') . '/public/api/branch');

            $form->select('branch_code',__('Branch'))->options(function(){
                 return Branch::all()->pluck('branch_name','branch_code');});

         

            //Sum id
            $form->text('reference_id', __('Property Reference'))->value(function(){
                $id = PropertyAppraisal::all()->last();
                return $id->id + 1 ;
            });


            $form->text('cif', __('CIF No'));
            $form->text('loan_officer', __('RM Name'));
            $form->date('request_date', __('Request Date'));
            $form->text('property_reference', __('Property Reference'));
            $form->text('access_road_name', __('Access Road Name'));
            $form->text('borey', __('Borey'));
            $form->text('land_title_no', __('Land Title No'));
            $form->text('land_value_persqm', __('Land Value per Sqm'));
            $form->text('property_value', __('Property Value'));
            $form->text('clinet_contact_no', __('Clinet Contact No'));
            $form->select('commune_id', __('Commune / Sangkat'))->load('village_id', env('APP_URL') . '/public/api/village');
            $form->text('latitude', __('Latitude'));
            $form->text('remark', __('Remark'));     
        });

           
        $form->column(1/3,function($form){
                  
            $form->text('telephone', __('Telephone'));
            $form->date('report_date', __('Report Date'));
            $form->select('location_type', __('Location Type'))->options(['Residential Area'=>'Residential Area','Commercial Area'=>'Commercial Area', 'Industrial Area'=>'Industrial Area', 'Agricultural Area'=>'Agricultural Area']);
            $form->select('property_type', __('Property Type'))->options(['Vacant Land'=>'Vacant Land', 'Flat House'=>'Flat House', 'Link House'=>'Link House', 'Villa'=>'Villa', 'Flay house from 1st floor up'=>'Flay house from 1st floor up', 'Twin Villa'=>'Twin Villa','Commercial Bulding'=>'Commercial Bulding', 'Hotel'=>'Hotel','Guesthouse'=>'Guesthouse', 'Warehouse'=>'Warehouse', 'Factory'=>'Factory', 'Condo'=>'Condo', 'Apartment'=>'Apartment','Shop'=>'Shop', 'Gas Station'=>'Gas Station', 'Wooden House'=>'Wooden House','Building'=>'Building','Shop House'=>'Shop House' ]);
            $form->text('no_of_floor', __('No Oof Floor'));
            $form->text('land_size', __('Land Size'));
            $form->text('building_size_by_measure', __('Building Size By Measure'));  
            $form->text('collateral_owner', __('Collateral Owner'));  
          
            $form->select('province', __('Province'))->options(function(){
                return Province::all()->pluck('province_name','id');})->load('district_id', env('APP_URL') . '/public/api/district');

            $form->select('village_id', __('Village'));
            $form->multipleFile('photo', __('Photo'));   
        });

            $form->column(1/3,function($form){
             
            $form->select('information_type', __('Information Type'))->options(['Indication'=>'Indication', 'Asking'=>'Asking','Website'=>'Website','Social Media'=>'Social Media','Government'=>'Government','Real Estate Agent'=>'Real Estate Agent','Property Owner'=>'Property Owner','Others'=>'Others' ]);
            $form->select('type_of_access_road', __('Type Of Access Road'))->options(['Boulevard'=>'Boulevard','National Road'=>'National Road','Paved Road'=>'Paved Road', 'Unpaved Road'=>'Unpaved Road','Alley Road'=>'Alley Road','No Road'=>'No Road' ]);
            $form->text('building_status', __('Building Status'));
            $form->select('land_title_type', __('Land Title Type'))->options(['Hard Title'=>'Hard Title','Soft Title'=>'Soft Title']);
            $form->text('land_size_by_measurement', __('Land Size by Measurement'));
            $form->text('building_size_per_sqm', __('Building Size per Sqm'));  
            $form->text('customer_name', __('Customer Name'));
               // District  
               $form->select('district_id', __('District'))->load('commune_id', env('APP_URL') . '/public/api/commune');
                             
            $form->text('altitude', __('Altitude'));
            $form->button('swot_analyze', __('Swot Analyze'));

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
