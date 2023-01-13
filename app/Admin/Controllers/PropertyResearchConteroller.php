<?php

namespace App\Admin\Controllers;

use App\Models\Borey;
use App\Models\Province;
use App\Models\Branch;
use App\Models\Commune;
use App\Models\District;
use App\Models\Region;
use App\Models\Village;
use App\Models\File;
use App\Models\InformationType;
use App\Models\PropertyResearch;
use App\Models\PropertyType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Form\Field\Button;
use Encore\Admin\Form\Field\Id;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Request;
use Encore\Admin\Layout\Content;
use App\Models\User;

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


		// $title1 = "Done";
		// // $value1 = $Done;
		// $title2 = "Pending";
		// // $value2 = $Pending;
		// $title3 = "Progressing";
		// // $value3 = $Progressing;
		// $title4 = "ETC";
		// // $value4 = $ETC;

        //     $html = <<<HTML
        //     <h1>Dashboard Show Testing</h1>
            
        //     <div class="row">
        //         <div class="col-lg-3" style="padding: 0 10px 15px 15px; height: 100px;text-align: center;">
        //                 <div style="background-color:#abffbd;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
        //                 {{title1}}
        //                     <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value1}}</label> -->
        //                 </div>
        //         </div>
        //         <div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
        //                 <div style="background-color:#ffc0ab;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
        //                 {{title2}}
        //                     <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value2}}</label> -->
        //                 </div>
        //         </div>
        //         <div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
        //                 <div style="background-color:#f1fa75;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
        //                 {{title3}}
        //                     <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value3}}</label> -->
        //                 </div>
        //         </div>
        //         <div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
        //                 <div style="background-color:red;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
        //                 {{title4}}
        //                     <!-- <label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value4}}</label> -->
        //                 </div>
        //         </div>
                
            
        //     </div>
        // HTML;

        // $html = str_replace('{{title1}}',$title1,$html);
		// // $html = str_replace('{{value1}}',$value1,$html);
		// $html = str_replace('{{title2}}',$title2,$html);
		// // $html = str_replace('{{value2}}',$value2,$html);
		// $html = str_replace('{{title3}}',$title3,$html);
		// // $html = str_replace('{{value3}}',$value3,$html);
		// $html = str_replace('{{title4}}',$title4,$html);
		// // $html = str_replace('{{value4}}',$value4,$html);

        // return $html;
    }
    
    protected function grid()
    {

        //filter  
        $filterRegionID = isset($_REQUEST['region_id'])? $_REQUEST['region_id'] : [];
        $filterProvinceId = isset($_REQUEST['province_id'])? $_REQUEST['province_id'] : [];
        $filterDistrictId = isset($_REQUEST['district_id'])? $_REQUEST['district_id'] : [];

        //print_r($filterProvinceId);

        $grid = new Grid(new PropertyResearch);
		
		$grid->model()->orderBy('id','asc');
        $grid->column('id', __('No.'))->asc()->sortable();
        $grid->column('information_type',__('Information Type'))->sortable();
		$grid->column('property_reference', __('Reference'))->sortable();
        $grid->column('information_date',__('Information Date'))->sortable();
        $grid->column('branch_code',__('Branch'))->filter($this->convertToArrayBranch(Branch::all(['branch_code', 'branch_name'])))->Display(function($branch_code){// add filter
            $branch = Branch::where('branch_code', $branch_code)->first();
            // return $branch->branch_name;
            if($branch == null)
                return '';
            else
                return $branch->branch_name;  

            });
  
        //$grid->column('requested_date',__('Requested Date'))->sortable(); 
        $grid->column('contact_no',__('Contact No'))->sortable(); 
        $grid->column('location_type',__('Location Type'))->sortable(); 
        $grid->column('type_of_access_road',__('Type of Access Road'))->sortable(); 
        $grid->column('access_road_name',__('Access Road Name'))->sortable(); 
        $grid->column('property_type',__('Property Type'))->sortable()->Display(function($id){
            $propertytype = PropertyType::where('id',$id)->first();
            return $propertytype->property_type_name;
        }); 
        $grid->column('borey',__('Borey'))->sortable()->display(function($id){
            $borey = Borey::where('id',$id)->first();
            return $borey->borey_name;
        }); 
        $grid->column('no_of_floor',__('No. of floor'))->sortable(); 
        $grid->column('land_title_type',__('Land Titil Type'))->sortable(); 
        $grid->column('land_size',__('Land Size'))->sortable(); 
        $grid->column('land_value_per_sqm',__('Land Value per Sqm ($)'))->sortable();
        $grid->column('building_size',__('Building Size ($)'))->sortable(); 
        $grid->column('building_value_per_sqm',__('Building Value per Sqm ($)'))->sortable();
        $grid->column('property_market_value',__('Property Market Value ($)'))->sortable();
        $grid->column('province_id',__('Province'))->filter($this->convertToArray(Province::all(['id', 'province_name'])))->Display(function($province_id){
           $province = Province::where('id', $province_id)->first();
            return $province->province_name;     
        });
        $grid->column('district_id',__('District/Khan'))->filter($this->convertToArrayDistrict(District::whereIn('province_id', $filterProvinceId)->get(['id', 'district_name'])))->Display(function($district_id){ //Add filter when click ex:province->distict..
            $district = District::where('id', $district_id)->first();
            return $district->district_name;
        }); 
        $grid->column('commune_id',__('Commune/Sangkat'))->filter($this->convertToArrayCommune(Commune::whereIn('district_id', $filterDistrictId)->get(['id','commune_name'])))->Display(function($comune_id){
            $commune = Commune::where('id', $comune_id)->first();
            return $commune->commune_name;
        }); 
        $grid->column('village_id',__('Village'))->sortable()->Display(function($village_id){
            $village = Village::where('id', $village_id)->first();
            return $village->village_name ;
        });
        $grid->column('longtitude',__('Longtitude'))->sortable(); 
        //$grid->column('latitude',__('Latitude'))->sortable(); 
        //$grid->column('remark',__('Remark'))->sortable(); 

      // create btn with api
        $grid->column('is_verified',__('Verified'))->display(function($is_verified){
            if($is_verified == null) {
                    if(User::isVerifierRole()){ // user login
                        $id = $this->id;
                        return ' <a href="'. env('APP_URL') . '/public/api/verify/' . $id . '/1" class="btn btn-success" style="width: 80px; border-radius: 10px;margin: 3px;" >Verify</a>
                        <a href="'. env('APP_URL') . '/public/api/verify/' . $id . '/2" class="btn btn-danger" style="width: 80px; border-radius: 10px;margin: 3px;">Reject</a>';
                    }
                    else {
                        return '<p style="color: #172191; border: 1px solid #172191;padding: 5px;text-align:center;">Processing</p>'; 
                    }
                }
                else if($is_verified == 1){
                    return '<p style="color: #0c871f; border: 1px solid #0c871f;padding: 5px;text-align:center;">Verified</p>'; 
                }
                else{
                    return '<p style="color: #ff0000;border: 1px solid #ff0000;padding: 5px;text-align:center;">Rejected</p>';
                }
            });

        $grid->column('is_approved',__('Approved'))->display(function($is_approved){

                if($this->is_verified == 1){
                    if($is_approved == null) {
                        if(User::isApproverRole()){
                            $id = $this->id;
                            return ' <a href="'. env('APP_URL') . '/public/api/approve/' . $id . '/1" class="btn btn-success" style="width: 80px; border-radius: 10px;margin: 3px;" >Approv</a>
                            <a href="'. env('APP_URL') . '/public/api/approve/' . $id . '/2" class="btn btn-danger" style="width: 80px; border-radius: 10px;margin: 3px;">Reject</a>';
                        }
                        else {
                            return '<p style="color: #172191; border: 1px solid #172191;padding: 5px;text-align:center;">Processing</p>'; 
                        }
                        
                    }
                    else if($is_approved ==1){
                        return '<p style="color: #0c871f; border: 1px solid #0c871f;padding: 5px;text-align:center;">Approved</p>'; 
                    }
                    else{
                        return '<p style="color: #ff0000;border: 1px solid #ff0000;padding: 5px;text-align:center;">Rejected</p>';
                    }
                }
            
        });
       
        // $grid->disableExport();
        //  $grid->disableFilter();
        $grid->quickSearch(['collateral_owner','telephone']);
		
		$grid->filter(function($filter){
			$filter->disableIdFilter();
		//	$filter->equal('company');
		});

		//print_r(Request::route('company'));
        return $grid;
    }

        // filter 
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
        $show = new Show( PropertyResearch::findOrFail($id));
            //1
            $show->field('information_type',__('Information Type'))->as(function($id){
                $informationtype = InformationType::where('id', $id)->first();
                return  $informationtype->information_type_name;
            });
            //2
            $show->field('property_reference',__('Reference'));
            //3
            $show->field('access_road_name',__('Access Road Name'));
            //4
            $show->field('no_of_floor',__('No. of floor'));
            //5
            $show->field('land_size',__('Land Size'));
            //6
            $show->field('building_value_per_sqm',__('Building Value per Sqm ($)'));
            //7
            $show->field('district_id',__('District/ Khan'))->as(function($district_id){
                $district = District::where('id', $district_id)->first();
                return $district->district_name;
            });
            //8
            $show->field('contact_no',__('Contact No'));
            //9
            $show->field('remark',__('Remark'));
            //10
            $show->field('location_type',__('Location Type'));
            //11
            $show->field('property_type',__('Property Type'))->as(function($id){
                $propertytype = PropertyType::where('id', $id)->first();
                return  $propertytype->property_type_name;
            });
            //12
            $show->field('land_title_type',__('Land Titil'));
            //13
            $show->field('land_value_per_sqm',__('Land Value per Sqm ($)'));
            //14
            $show->field('property_market_value',__('Property Market Value ($)'));
            //15
            $show->field('commune_id',__('Commune / Sangkat'))->as(function($comune_id){
                $commune = Commune::where('id', $comune_id)->first();
                return $commune->commune_name;
            });
            //16
            $show->field('longtitude',__('Longtitude'));
            //17
            $show->field('type_of_access_road',__('Type of Access Road'));
            //18
            $show->field('borey',__('Borey'))->as(function($id){
                $borey = Borey::where('id', $id)->first();
                return $borey->borey_name;
            });
            //19
            $show->field('information_date',__('Information Date'));
            //20
            $show->field('building_size',__('Building Size ($)'));
            //21
            $show->field('province_id',__('Province'))->as(function($province_id){
                $province = Province::where('id', $province_id)->first();
                return $province->province_name;
            });
            //22
            $show->field('village_id',__('Village'))->as(function($village_id){
                $village = Village::where('id', $village_id)->first();
                return $village->village_name   ;
            });
            //23
            $show->field('latitude',__('Latitude'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()

    {
        $form = new Form(new PropertyResearch());
        // max 9 part 1
        $form->column(1/3, function ($form){
            //1
            $form->select('information_type',__('Information Type'))->rules('required')->options(function(){
                return InformationType::all()->pluck('information_type_name','id');
               });
            //2
            //zero loading 
            $form->text('property_reference', __('Property Reference '))->readonly()->value(function(){
                $id = PropertyResearch::all()->last();
                return 'PL-'. sprintf('%010d', $id == null? 1 : $id->id + 1);
            });
            //3
            $form->text('access_road_name', __('Access Road Name'))->rules('required');
            //4
            $form->number('no_of_floor', __('No. of Floor'))->rules('required')->min(1);
            //5
            $form->text('land_size', __('Land Size (sqm)'))->rules('required');
            //6
            $form->currency('building_value_per_sqm', __('Building Value per Sqm '))->rules('required');
            //7
            $form->select('district_id', __('District / Khan'))->rules('required')->options(function(){
                return District::all()->pluck('district_name','id');})->load('commune_id', env('APP_URL') . '/public/api/commune');
            //8
            $form->mobile('contact_no', __('Contact No'))->rules('required')->options(['mask' => '099 999 9999']);
            //9
            $form->text('remark', __('Remark'));

        });
        //max 7 part 2
        $form->column(1/3, function ($form){
            $form->html('<div style="height:52px"></div>');
            //10
            $form->select('location_type', __('Location Type'))->rules('required')->options(['Residential Area'=>'Residential Area', 'Commercial Area'=>'Commercial Area','Industrial Area'=>'Industrial Area','Agricultural Area'=>'Agricultural Area']);
            //11
            $form->select('property_type', __('Property Type'))->rules('required')->options(function(){
                return PropertyType::all()->pluck('property_type_name','id');
                return 'PL-'. sprintf('%010d',$id == null? 1 : $id->id + 1);
            });
            //12
            $form->select('land_title_type', __('Land Title Type'))->rules('required')->options(['Hard Title'=>'Hard Title', 'Soft Title'=>'Soft Title']);
            //13
            $form->currency('land_value_per_sqm', __('Land Value per Sqm '))->rules('required');
            //14
            $form->currency('property_market_value', __('Property Market Value '))->rules('required');
            //15
            $form->select('commune_id', __('Commune / Sangkat'))->rules('required')->options(function(){
                return Commune::all()->pluck('commune_name','id');})->load('village_id', env('APP_URL') . '/public/api/village');
            //16
            $form->text('longtitude', __('Longtitude'))->inputmask(['mask' => '99.999999'])->rules('required');
            
        });
        //max 7 part 3
        $form->column(1/3, function ($form){   
            $form->html('<div style="height:52px"></div>');
            //17
            $form->select('type_of_access_road', __('Type of Access Road'))->rules('required')->options(['Boulevard'=>'Boulevard','National Road'=>'National Road', 'Paved Road'=>'Paved Road','Upaved Road'=>'Upaved Road','Alley Road'=>'Alley Road','No Road'=>'No Road']);
            //18
            $form->select('borey', __('Borey'))->rules('required')->options(function(){
                return Borey::all()->pluck('borey_name', 'id');
            });
            //19
            $form->date('information_date', __('Information Date'))->rules('required');
            //20
            $form->currency('building_size', __('Building Size'))->rules('required');
            //21
            $form->select('province_id', __('Province'))->rules('required')->options(function(){
                return Province::all()->pluck('province_name','id');})->load('district_id', env('APP_URL') . '/public/api/district');
                
            //22
            $form->select('village_id', __('Village'))->rules('required')->options(function(){
                return Village::all()->pluck('village_name','id');});
            //23
            $form->text('latitude', __('Latitude'))->inputmask(['mask' => '999.999999'])->rules('required');

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