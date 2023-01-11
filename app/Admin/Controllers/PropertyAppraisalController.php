<?php

namespace App\Admin\Controllers;


use App\Models\Province;
use App\Models\Branch;
use App\Models\Commune;
use App\Models\District;
use App\Models\Region;
use App\Models\Village;
use App\Models\File;
use App\Models\Borey;
use App\Models\PropertyAppraisal;
use App\Models\InformationType;
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
use App\Models\User;

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

               $grid->model()->orderBy('id','asc');
               $grid->column('id', __('No.'))->asc()->sortable();                   
               $grid->column('reference_id', __('Reference ID'));        
               $grid->column('collateral_owner', __('Owner'))->sortable();
               $grid->column('information_type',__('Type'))->display(function(){
                $id = $this->information_type;
                $information_type= InformationType::where('id', $id)->first();
                if($information_type == null) $informationname= '';
                else
                $informationname = $information_type->information_type_name;
                return $informationname;
            });
            $grid->column('property_address',__('Property Address '))->display(function(){
                $province_id = $this->province_id;
                $province = Province::where('id', $province_id)->first();
                $distict_id = $this->district_id;
                $district = District::where('id', $distict_id)->first();
                $commune_id = $this->commune_id;
                $commune = Commune::where('id', $commune_id)->first();
                $village_id = $this->village_id;
                $village = Village::where('id', $village_id)->first();
    
               // $distict = District::where('id', $distict_id)->first();
                if($village == null) $villageName = '';
                else 
                $villageName = $village->village_name ;
                if($commune == null) $communeName = '';
                else 
                $communeName = $commune->commune_name ;
                if($district == null) $districtName = '';
                else 
                $districtName = $district->district_name ;
                if($province == null) $provinceName = '';
                else 
                $provinceName= $province->province_name ;
                return  $villageName . ' , ' . $communeName . ' , ' . $districtName . ' , ' .  $provinceName  ;
               
            });                                      //filter(['1' => 'PP', '2' => 'SR' ]);   
               $grid->column('region', __('Region'))->filter($this->convertToArray(Province::all(['id', 'province_name'])))->Display(function($province_name){
                $province = Province::where('id', $province_name)->first();
                if($province == null) return '';
               return $province->province_name;  
            }); 
               
               $grid->column('branch_code',__('Branch'))->filter($this->convertToArray(Branch::all(['id', 'branch_code'])))->Display(function($branch_code){
                $branch = Branch::where('branch_code', $branch_code)->first();
                if($branch == null) return '';
                return $branch->branch_name;       
            });
               $grid->column('property_address', __('Property Address'));
               $grid->column('geo_code', __('Geo Code'));
              // $grid->column('report_date', __('Report Date'));

             
        $grid->quickSearch('id','telephone',);
      
        return $grid;
    }
    

    
    
    function convertToArray($data){

        $provinceArray = array();

        foreach($data as $item){
            //$provinceArray = array_merge($provinceArray, array($item->id => $item->province_name));
            $provinceArray[$item->id] = $item->province_name;
        }        

       return $provinceArray;
       
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
    

        $show->field('id', __('ID'))->sortable();
        $show->field('region', __('Region'))->as(function($region){
            $province = Province::where('id', $region)->first();
            if($province == null) return '';
            return $province->province_name ;
        });
        $show->field('branch_code',__('Branch'))->as(function($branch_code){
            $branch = Branch::where('branch_code',$branch_code)->first();
            if($branch == null) return '';
            return '(' . $branch->branch_code . ') ' . $branch->branch_name;
        });

        $show->field('reference_id', __('reference_id'))->sortable(); 
        $show->field('cif', __('CIF No'))->sortable(); 
        $show->field('loan_officer', __('Loan Officer'))->sortable(); 
        $show->field('request_date', __('Request Date'))->sortable(); 
        $show->field('access_road_name', __('Access Road Name'))->sortable(); 
        $show->field('borey', __('Borey'))->sortable(); 
        $show->field('land_title_no', __('Land title no'))->sortable(); 
        $show->field('land_value_persqm', __('Land Value Persqm'))->sortable(); 
        $show->field('property_value', __('Property Value'))->sortable(); 
        $show->field('clinet_contact_no', __('Clinet Contact No'))->sortable(); 
        $show->field('commune_sangkat', __('Commune Sangkat'))->sortable(); 
        $show->field('latitude', __('Latitude'))->sortable(); 
        $show->field('remark', __('Remark'))->sortable(); 
        $show->field('telephone', __('Telephone'))->sortable(); 
        $show->field('report_date', __('Report Date'))->sortable(); 
        $show->field('location_type', __('Location Type'))->sortable(); 
        $show->field('property_type', __('Property Type'))->sortable(); 
        $show->field('no_of_floor', __('No Of Floor'))->sortable(); 
        $show->field('land_size', __('Land_size'))->sortable(); 
        $show->field('building_size_by_measure', ____('Building measure ($)'))->sortable(); 
        $show->field('collateral_owner', __('Owner'))->sortable(); 
        $show->field('provinces', __('Province'))->sortable(); 
        $show->field('village', __('Village'))->sortable(); 
        $show->field('photos',__('Photo'))->sortable(); 
        $show->field('information_type', __('Information Type'))->sortable(); 
        $show->field('type_of_access_road', __('Type Of Access Road'))->sortable(); 
        $show->field('building_status', __('Building Status'))->sortable(); 
        $show->field('land_title_type', __('Land Title Type'))->sortable(); 
        $show->field('land_size_by_measurement', __('Land Size By Measurement'))->sortable(); 
        $show->field('customer_name', __('Customer_Name'))->sortable(); 
        $show->field('building_size_per_sqm', ____('Building Size ($)'))->sortable();
        $show->field('district_khan', __('District Khan'))->sortable(); 
        $show->field('altitude', __('Altitude'))->sortable();
        $grid->column('province_id',__('Province'))->filter($this->convertToArray(Province::all(['id', 'province_name'])))->Display(function($province_id){
        
        $province = Province::where('id', $province_id)->first();
            return $province->province_name;     
        }); 
        $grid->column('district_id',__('District/Khan'))->filter($this->convertToArrays(District::all(['id', 'district_name'])))->Display(function($district_id){
            $district = District::where('id', $district_id)->first();
            return $district->district_name;
        }); 
        $grid->column('commune_id',__('Commune/Sangkat'))->Display(function($comune_id){
            $commune = Commune::where('id', $comune_id)->first();
            return $commune->commune_name;
        }); 
        $grid->column('village_id',__('Village'))->filter($this->convertToArrayv(Village::all(['id', 'village_name'])))->Display(function($village_id){
            $village = Village::where('id', $village_id)->first();
            return $village->village_name ;
        }); 
     

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
            
            $form->select('region', __('Region'))->rules('required')->options(function(){
                return Province::all()->pluck('province_name','id');})->load('branch_code', env('APP_URL') . '/public/api/branch');

            $form->select('branch_code',__('Branch'))->rules('required')->options(function(){
               return Branch::all()->pluck('branch_name','branch_code');});

            //Sum id
            $form->text('property_reference', __('Property Reference '))->value(function(){
                $id = PropertyAppraisal::all()->last();
               return 'PL-'. sprintf('%010d', $id->id + 1);//$id == null? 1 :  
            });


            $form->text('cif', __('CIF No'));
            $form->text('loan_officer', __('RM Name'))->rules('required');
            $form->date('request_date', __('Request Date'))->rules('required');
            $form->text('access_road_name', __('Access Road Name'))->rules('required');
            $form->select('borey', __('Borey'))->rules('required')->options(function(){
                return Borey::all()->pluck('borey_name', 'id');
            });//->rules('required');
            $form->text('land_title_no', __('Land Title No'))->rules('required');
            $form->text('land_value_per_sqm', __('Land Value per Sqm '))->rules('required');
            $form->currency('property_value', __('Property Value '))->rules('required');
            $form->text('clinet_contact_no', __('Clinet Contact No'))->rules('required');
            $form->text('latitude', __('Latitude'))->rules('required');
                 
        });

           
        $form->column(1/3,function($form){
                  
            $form->mobile('telephone', __('Telephone'))->rules('required')->options(['mask' => '099 999 9999']); // add number 
            $form->date('report_date', __('Report Date'))->rules('required');
            $form->select('location_type', __('Location Type'))->rules('required')->options(['Residential Area'=>'Residential Area','Commercial Area'=>'Commercial Area', 'Industrial Area'=>'Industrial Area', 'Agricultural Area'=>'Agricultural Area']);
            $form->select('property_type', __('Property Type'))->rules('required')->options(['Vacant Land'=>'Vacant Land', 'Flat House'=>'Flat House', 'Link House'=>'Link House', 'Villa'=>'Villa', 'Flay house from 1st floor up'=>'Flay house from 1st floor up', 'Twin Villa'=>'Twin Villa','Commercial Bulding'=>'Commercial Bulding', 'Hotel'=>'Hotel','Guesthouse'=>'Guesthouse', 'Warehouse'=>'Warehouse', 'Factory'=>'Factory', 'Condo'=>'Condo', 'Apartment'=>'Apartment','Shop'=>'Shop', 'Gas Station'=>'Gas Station', 'Wooden House'=>'Wooden House','Building'=>'Building','Shop House'=>'Shop House' ]);
            $form->number('no_of_floor', __('No. of Floor'))->rules('required')->min(1);
            $form->text('land_size', __('Land Size (Sqm)'))->rules('required');
            $form->currency('building_size_by_measure', __('Building Size'))->rules('required');
            $form->text('collateral_owner', __('Collateral Owner'))->rules('required');
            $form->text('remark', __('Remark'));
            $form->image('frontphoto', __('Front Photo'))->removable()->uniqueName();
            $form->multipleImage('photos', __('Photo'))->removable()->uniqueName();
            

        });

            $form->column(1/3,function($form){

            $form->select('province', __('Province'))->rules('required')->options(function(){
                return Province::all()->pluck('province_name','id');})->load('district_id', env('APP_URL') . '/public/api/district');
            
                $form->select('district_id', __('District'))->rules('required')->options(function(){
                return District::all()->pluck('district_name','id');})->load('commune_id', env('APP_URL') . '/public/api/commune');
            
            $form->select('commune_id', __('Commune / Sangkat'))->rules('required')->options(function(){
                return Commune::all()->pluck('commune_name','id');})->load('village_id', env('APP_URL') . '/public/api/village');         

            $form->select('village_id', __('Village'))->rules('required')->options(function(){
                return Village::all()->pluck('village_name','id');});
 
            $form->select('information_type', __('Information Type'))->rules('required')->options(['Indication'=>'Indication', 'Asking'=>'Asking','Website'=>'Website','Social Media'=>'Social Media','Government'=>'Government','Real Estate Agent'=>'Real Estate Agent','Property Owner'=>'Property Owner','Others'=>'Others' ]);
            $form->select('type_of_access_road', __('Type Of Access Road'))->rules('required')->options(['Boulevard'=>'Boulevard','National Road'=>'National Road','Paved Road'=>'Paved Road', 'Unpaved Road'=>'Unpaved Road','Alley Road'=>'Alley Road','No Road'=>'No Road' ]);
            $form->number('building_status', __('Building Status (%) '))->min(0)->max(100);//->rules('required');
            $form->select('land_title_type', __('Land Title Type'))->rules('required')->options(['Hard Title'=>'Hard Title','Soft Title'=>'Soft Title']);
            $form->text('land_size_by_measurement', __('Land Size by Measurement (Sqm)'))->rules('required');
            $form->text('building_size_per_sqm', __('Building Size per (Sqm)'))->rules('required');  
            $form->text('customer_name', __('Customer Name'))->rules('required');                        
            $form->text('altitude', __('Altitude'))->rules('required');
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
