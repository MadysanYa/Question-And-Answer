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
use App\Models\PropertyType;
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
use Encore\Admin\Widgets\Collapse;

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

        $filterProvinceId = isset($_REQUEST['province_id'])? $_REQUEST['province_id'] : [];
        $filterDistrictId = isset($_REQUEST['district_id'])? $_REQUEST['district_id'] : [];

               $grid = new Grid(new PropertyAppraisal());        

               $grid->model()->orderBy('id','asc');
               $grid->column('id', __('No.'))->asc()->sortable();                   
               $grid->column('property_reference', __('Reference'))->sortable();   
               $grid->column('collateral_owner', __('Owner'))->sortable();
               $grid->column('information_type',__('Type'))->sortable();

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
               
            }); 
            $grid->column('longtitude',__('Geo Code'))->sortable(); 

            $grid->column('region_id',__('Region'))->filter($this->convertToArrayRegion(Region::all(['id', 'region_name'])))->Display(function($id){// add filter
                $region = Region::where('id', $id)->first();
                if ($region == null)
                return '';
                else
                return $region->region_name;     
            }); 
    
            $grid->column('branch_code',__('Branch'))->filter($this->convertToArrayBranch(Branch::all(['branch_code', 'branch_name'])))->Display(function($branch_code){// add filter
                $branch = Branch::where('branch_code', $branch_code)->first();
                // return $branch->branch_name;
                if($branch == null)
                    return '';
                else
                    return $branch->branch_name;  
    
                });
                //////////////////////////
                $grid->column('requested_date',__('Requested Date'))->sortable(); 
                $grid->column('reported_date',__('Reported Date'))->sortable();
                $grid->column('cif_no',__('CIF No.'))->sortable(); 
                $grid->column('rm_name',__('RM Name'))->sortable(); 
                $grid->column('telephone',__('Telephone'))->sortable(); 
                $grid->column('information_type',__('Information Type'))->sortable()->Display(function($id){
                    $informationtype = InformationType::where('id',$id)->first();
                    if ($informationtype == null ) return '';
                    return $informationtype->information_type_name;
                });
                $grid->column('location_type',__('Location Type')); 
                $grid->column('type_of_access_road',__('Type of Access Road'))->sortable(); 
                $grid->column('access_road_name',__('Access Road Name'))->sortable(); 
                $grid->column('property_type',__('Property Type'))->sortable()->Display(function($id){
                    $propertytype = PropertyType::where('id',$id)->first();
                    if ($propertytype == null ) return '';
                    return $propertytype->property_type_name;
                }); 
                $grid->column('building_status',__('Building Status (%)'))->sortable(); 
                $grid->column('borey',__('Borey'))->display(function($id){
                    $borey = Borey::where('id',$id)->first();
                    if($borey == null) return '';
                    return $borey->borey_name;
                }); 
                $grid->column('no_of_floor',__('No. of floor'))->sortable(); 
                $grid->column('land_title_type',__('Land Titil Type'))->sortable(); 
                $grid->column('land_title_no',__('Lang Title No'))->sortable(); 
                $grid->column('land_size',__('Land Size'))->sortable(); 
                $grid->column('land_value_per_sqm',__('Land Value per Sqm ($)'))->sortable();
                $grid->column('building_size_by_measure',__('Building Size '))->sortable(); 
                $grid->column('property_value',__('Property Value ($)'))->sortable();
                $grid->column('customer_name',__('Customer Name'))->sortable(); 
                $grid->column('client_contact_no',__('Client Contact No.'))->sortable(); 
                $grid->column('province_id',__('Province'))->filter($this->convertToArray(Province::all(['id', 'province_name'])))->Display(function($province_id){
                   $province = Province::where('id', $province_id)->first();
                   if ($province == null) return '';
                    return $province->province_name;     
                });
                $grid->column('district_id',__('District/Khan'))->filter($this->convertToArrayDistrict(District::whereIn('province_id', $filterProvinceId)->get(['id', 'district_name'])))->Display(function($district_id){ //Add filter when click ex:province->distict..
                    $district = District::where('id', $district_id)->first();
                    if ($district == null)  return '';
                    return $district->district_name;
                }); 
                $grid->column('commune_id',__('Commune/Sangkat'))->filter($this->convertToArrayCommune(Commune::whereIn('district_id', $filterDistrictId)->get(['id','commune_name'])))->Display(function($comune_id){
                    $commune = Commune::where('id', $comune_id)->first();
                    if ($commune == null) return '';
                    return $commune->commune_name;
                }); 
                $grid->column('village_id',__('Village'))->Display(function($village_id){
                    $village = Village::where('id', $village_id)->first();
                    if ($village == null) return '';
                    return $village->village_name ;
                });
                $grid->column('latitude',__('Latitude'))->sortable(); 
                $grid->column('longtitude',__('Longtitude'))->sortable(); 
                
                
                $grid->column('remark',__('Remark'))->sortable(); 
        
        
              // create btn with api
              $grid->column('is_verified',__('Verified'))->display(function($is_verified){
                if($is_verified == null) {
    
                        if(User::isVerifierRole()){ // user login
                            $id = $this->id;
                            return ' <a href="'. env('APP_URL') . '/public/api/verify_appraisal/' . $id . '/1" class="btn btn-success" style="width: 80px; border-radius: 10px;margin: 3px;" >Verify</a>
                            <a href="'. env('APP_URL') . '/public/api/verify_appraisal/' . $id . '/2" class="btn btn-danger" style="width: 80px; border-radius: 10px;margin: 3px;">Reject</a>';
                        }
                        else {
                            return '<p style="color: #fff; background: #172191;padding: 0px 5px 0px 5px;text-align:center;">Processing</p>'; 
                        }
                    }
                    else if($is_verified == 1){
                        return '<p style="color: #fff; background: #0c871f;padding: 0px 5px 0px 5px;text-align:center;">Verified</p>'; 
                    }
                    else{
                        return '<p style="color: #fff;background:#ff0000;padding: 0px 5px 0px 5px;text-align:center;">Rejected</p>';
                    }
                });
    
            $grid->column('is_approved',__('Approved'))->display(function($is_approved){
    
                    if($this->is_verified == 1){
                        if($is_approved == null) {
                            if(User::isApproverRole()){
                                $id = $this->id;
                                return ' <a href="'. env('APP_URL') . '/public/api/approve_appraisal/' . $id . '/1" class="btn btn-success" style="width: 80px; border-radius: 10px;margin: 3px;" >Approv</a>
                                <a href="'. env('APP_URL') . '/public/api/approve_appraisal/' . $id . '/2" class="btn btn-danger" style="width: 80px; border-radius: 10px;margin: 3px;">Reject</a>';
                            }
                            else {
                                return '<p style="color: #fff; background: #172191;padding: 0px 5px 0px 5px;text-align:center;">Processing</p>'; 
                            }
                            
                        }
                        else if($is_approved ==1){
                            return '<p style="color: #fff; background: #0c871f;padding: 0px 5px 0px 5px;text-align:center;">Approved</p>'; 
                        }
                        else{
                            return '<p style="color: #fff;background:#ff0000;padding: 0px 5px 0px 5px;text-align:center;">Rejected</p>';
                        }
                    }
                
            });
                
                
               $grid->column('property_address', __('Property Address'));
              
              // $grid->column('report_date', __('Report Date'));

              $grid->quickSearch(['collateral_owner','telephone']);
      
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
    function convertToArrayDistrict($data){

        $districtArray = array();

        foreach($data as $item){      
           
            $districtArray[$item->id] = $item->district_name;
        }
        return $districtArray;

    }
    function convertToArrayCommune($data){

        $communeArray = array();

        foreach($data as $item){      
           
            $communeArray[$item->id] = $item->commune_name;
        }
        return $communeArray;

    }

    function convertToArrayBranch($data){

        $branchArray = array();

        foreach($data as $item){      
           
            $branchArray[$item->branch_code] = $item->branch_name;
        }
        return $branchArray;

    }

    function convertToArrayRegion($data){

        $RegionArray = array();

        foreach($data as $item){      
           
            $RegionArray[$item->id] = $item->region_name;
        }
        return  $RegionArray;

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
    
        $show->field('property_reference',__('Reference'));
        $show->field('collateral_owner',__('Collateral Owner '));
         

        $show->field('region_id', __('Region'))->as(function($region){
            $region = Region::where('id', $region)->first();
            if($region == null) return '';
            return $region->region_name ;
        });
        $show->field('branch_code',__('Branch'))->as(function($branch_code){
            $branch = Branch::where('branch_code', $branch_code)->first();
            if($branch == null) return '';
            return '(' . $branch->branch_code . ')' . $branch->branch_name;
        });
        
        $show->field('cif', __('CIF No'))->sortable(); 
        $show->field('rm_name', __('Loan Officer'))->sortable(); 
        $show->field('requested_date', __('Request Date'))->sortable(); 
        $show->field('access_road_name', __('Access Road Name'))->sortable(); 
        $show->field('borey', __('Borey'))->sortable(); 
        $show->field('land_title_no', __('Land title no'))->sortable(); 
        $show->field('land_value_per_sqm', __('Land Value Persqm'))->sortable(); 
        $show->field('property_value', __('Property Value'))->sortable(); 
        $show->field('client_contact_no', __('Clinet Contact No'))->sortable(); 
        $show->field('commune_id', __('Commune Sangkat'))->sortable(); 
        $show->field('latitude', __('Latitude'))->sortable();
        $show->field('longtitude', __('longtitude'))->sortable(); 
        $show->field('remark', __('Remark'))->sortable(); 
        $show->field('client_contact_no',__('Client Contact No'));
        $show->field('reported_date', __('Report Date'))->sortable(); 
        $show->field('requested_date',__('Requested Date'));
        $show->field('location_type', __('Location Type'))->sortable(); 
        $show->field('property_type',__('Property Type'))->as(function($id){
            $propertytype = PropertyType::where('id', $id)->first();
            if ($propertytype == null ) return '';
            return  $propertytype->property_type_name;
        });
        $show->field('no_of_floor', __('No Of Floor'))->sortable(); 
        $show->field('land_size', __('Land_size'))->sortable(); 
        $show->field('building_size_by_measure', __('Building measure ($)'))->sortable(); 
        $show->field('collateral_owner', __('Owner'))->sortable(); 
        $show->field('photos',__('Photo'))->sortable(); 
        $show->field('information_type',__('Information Type'))->as(function($id){
            $informationtype = InformationType::where('id', $id)->first();
            if ($informationtype == null ) return '';
            return  $informationtype->information_type_name;
        });
        $show->field('type_of_access_road', __('Type Of Access Road'))->sortable(); 
        $show->field('building_status',__('Building Status (%)'));
        $show->field('land_title_type', __('Land Title Type'))->sortable(); 
        $show->field('land_size_by_measurement', __('Land Size By Measurement'))->sortable(); 
        $show->field('customer_name', __('Customer_Name'))->sortable(); 
        $show->field('building_size_per_sqm', __('Building Size '))->sortable();
        
        $show->field('province_id',__('Province'))->as(function($province_id){
            $province = Province::where('id', $province_id)->first();
            return $province->province_name;
        });
        $show->field('district_id',__('District/ Khan'))->as(function($district_id){
            $district = District::where('id', $district_id)->first();
            return $district->district_name;
        });
        $show->field('commune_id',__('Commune / Sangkat'))->as(function($comune_id){
            $commune = Commune::where('id', $comune_id)->first();
            return $commune->commune_name;
        });
        $show->field('village_id',__('Village'))->as(function($village_id){
            $village = Village::where('id', $village_id)->first();
            return $village->village_name   ;
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
            
            $form->select('region_id', __('Region'))->rules('required')->options(function(){
                return Region::all()->pluck('region_name', 'id');})->load('branch_code', env('APP_URL') . '/public/api/branch');

            $form->select('branch_code',__('Branch'))->rules('required')->options(function(){
                 return Branch::all()->pluck('branch_name','branch_code');});

   

            //Sum id
            $form->text('property_reference', __('Property Reference '))->readonly()->value(function(){
                $id = PropertyAppraisal::all()->last();
               return 'PL-'. sprintf('%010d', $id == null? 1 : $id->id + 1);//$id == null? 1 :  
            }); 

            $form->text('cif', __('CIF No'))->inputmask(['mask' => '9999999999']);
            $form->text('rm_name', __('RM Name'))->rules('required');
            $form->date('requested_date', __('Request Date'))->rules('required');
            $form->text('access_road_name', __('Access Road Name'))->rules('required');
            $form->select('borey', __('Borey'))->rules('required')->options(function(){
                return Borey::all()->pluck('borey_name', 'id');
            });
            $form->text('land_title_no', __('Land Title No'))->rules('required');
            $form->currency('land_value_per_sqm', __('Land Value per Sqm '))->rules('required');
            $form->currency('property_value', __('Property Value '))->rules('required');
            $form->text('customer_name', __('Customer Name'))->rules('required');
            $form->mobile('client_contact_no', __('Clinet Contact No'))->rules('required')->options(['mask' => '099 999 9999']);
          
                 
        });

           
        $form->column(1/3,function($form){

            $form->html('<div style="height:105px"></div>');
    
            $form->mobile('telephone', __('Telephone'))->rules('required')->options(['mask' => '099 999 9999']); // add number 
            $form->select('information_type',__('Information Type'))->rules('required')->options(function(){
                 
                return InformationType::all()->pluck('information_type_name','id');
               });
            $form->date('reported_date', __('Report Date'))->rules('required');
            $form->select('location_type', __('Location Type'))->rules('required')->options(['Residential Area'=>'Residential Area','Commercial Area'=>'Commercial Area', 'Industrial Area'=>'Industrial Area', 'Agricultural Area'=>'Agricultural Area']);
            $form->select('property_type', __('Property Type'))->rules('required')->options(function(){
                return PropertyType::all()->pluck('property_type_name','id');
            });
             $form->number('no_of_floor', __('No. of Floor'))->rules('required')->min(1);
            $form->text('land_size', __('Land Size (Sqm) '))->inputmask(['mask' => '9999999.99'])->rules('required');
            $form->text('building_size_by_measure', __('Building_Size_By_Measure'))->inputmask(['mask' => '9999999.99'])->rules('required');
            $form->text('collateral_owner', __('Collateral Owner'))->rules('required');
            $form->text('remark', __('Remark'));
           // $form->map('longtitude', 'latitude');
            $form->image('frontphoto', __('Front Photo'))->removable()->uniqueName();
            $form->multipleImage('photos', __('Photo'))->removable()->uniqueName();
            
        });

            $form->column(1/3,function($form){
                $form->html('<div style="height:105px"></div>');

                $form->select('province_id', __('Province'))->rules('required')->options(function(){
                    return Province::all()->pluck('province_name','id');})->load('district_id', env('APP_URL') . '/public/api/district');
                
                $form->select('district_id', __('District'))->rules('required')->options(function(){
                    return District::all()->pluck('district_name','id');})->load('commune_id', env('APP_URL') . '/public/api/commune');
                
                $form->select('commune_id', __('Commune / Sangkat'))->rules('required')->options(function(){
                    return Commune::all()->pluck('commune_name','id');})->load('village_id', env('APP_URL') . '/public/api/village');         
    
                $form->select('village_id', __('Village'))->rules('required')->options(function(){
                    return Village::all()->pluck('village_name','id');});
            
            $form->select('type_of_access_road', __('Type Of Access Road'))->rules('required')->options(['Boulevard'=>'Boulevard','National Road'=>'National Road','Paved Road'=>'Paved Road', 'Unpaved Road'=>'Unpaved Road','Alley Road'=>'Alley Road','No Road'=>'No Road' ]);
            $form->number('building_status', __('Building Status (%) '))->min(0)->max(100);//->rules('required');
            $form->select('land_title_type', __('Land Title Type'))->rules('required')->options(['Hard Title'=>'Hard Title','Soft Title'=>'Soft Title']);
            $form->text('land_size_by_measurement', __('Land Size by Measurement'))->inputmask(['mask' => '9999999.99'])->rules('required');
            $form->text('building_size_per_sqm', __('Building Size per (Sqm)'))->inputmask(['mask' => '9999999.99'])->rules('required');                       
            $form->text('longtitude', __('Longtitude'))->inputmask(['mask' => '99.999999'])->rules('required');
            $form->text('latitude', __('Latitude'))->inputmask(['mask' => '999.999999'])->rules('required');

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
            //$footer->disableCreatingCheck();
        
        });


        return $form;
    }
}
