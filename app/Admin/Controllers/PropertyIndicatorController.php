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
use App\Models\PropertyIndicator;
use App\Models\PropertyType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Form\Field\Button;
use Encore\Admin\Form\Field\Id;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Request;
use Encore\Admin\Layout\Content;


class PropertyIndicatorController extends AdminController 
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Property Indication';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
   
    
    protected function grid()
    {
        $grid = new Grid(new PropertyIndicator);
		
		$grid->model()->orderBy('id','asc');
        $grid->column('id', __('No.'))->asc()->sortable();
		$grid->column('property_reference', __('Reference'))->sortable();
        

       // });
        $grid->column('collateral_owner',__('Owner'))->sortable();
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
           
        });
        $grid->column('cif_no',__('Geo Code'))->sortable();
        // 14-12-22  start project
        $grid->column('region',__('Region'))->filter($this->convertToArray(Province::all(['id', 'province_name'])))->Display(function($province_id){
            $province = Province::where('id', $province_id)->first();
            return $province->province_name;     
        }); 
        $grid->column('branch_code',__('Branch'))->filter($this->convertToArrayv(Branch::all(['id', 'branch_name'])))->Display(function($branch_code){
            $branch = Branch::where('branch_code', $branch_code)->first();
            if($branch == null) return '';
            return $branch->branch_name;      
        });  
        $grid->column('requested_date',__('Requested Date'))->sortable(); 
        $grid->column('reported_date',__('Reported Date'))->sortable();
        $grid->column('cif_no',__('CIF No.'))->sortable(); 
        $grid->column('rm_name',__('RM Name'))->sortable(); 
        $grid->column('telephone',__('Telephone'))->sortable(); 
        $grid->column('information_type',__('Information Type'));//->filter($this->convertToArray(InformationType::all(['id'])));
        $grid->column('location_type',__('Location Type')); 
        $grid->column('type_of_access_road',__('Type of Access Road'))->sortable(); 
        $grid->column('access_road_name',__('Access Road Name'))->sortable(); 
        $grid->column('property_type',__('Property Type')); 
        $grid->column('building_status',__('Building Status (%)'))->sortable(); 
        $grid->column('borey',__('Borey')); 
        $grid->column('no_of_floor',__('No. of floor'))->sortable(); 
        $grid->column('land_title_type',__('Land Titil Type'))->sortable(); 
        $grid->column('land_title_no',__('Lang Title No'))->sortable(); 
        $grid->column('land_size',__('Land Size'))->sortable(); 
        $grid->column('land_value_per_sqm',__('Land Value per Sqm ($)'))->sortable();
        $grid->column('building_size',__('Building Size ($)'))->sortable(); 
        $grid->column('building_value_per_sqm',__('Building Value per Sqm ($)'))->sortable();
        $grid->column('property_value',__('Property Value ($)'))->sortable();
        $grid->column('customer_name',__('Customer Name'))->sortable(); 
        $grid->column('client_contact_no',__('Cliend Contact No.'))->sortable(); 
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
        $grid->column('longtitude',__('Longtitude'))->sortable(); 
        $grid->column('latitude',__('Latitude'))->sortable(); 
        // $grid->column('front_photo',__('Fornt Photo'))->sortable();
        // $grid->column('photos',__('Photo'))->sortable(); 
        $grid->column('remark',__('Remark'))->sortable(); 
      
       /* $grid->column('name', __('Contrac Title'))->sortable()->modal('', function($model){
			
			 //$show = new Show(Contract::findOrFail($model['id']));
			 
			  return $model['id'];
		});*/
        //  $grid->column('startdate', __('Start date'))->display(function ($startdate){
			
		//  	return '<div style="background:#00c0ef;color: white;padding: 2px;width: 100px;text-align: center;border-radius: 15px;">' . $startdate . '</div>';
	    //  });
		
        // $grid->column('enddate', __('End date'))->display(function ($enddate){
			
		// 	if($enddate == '') return '';
		// 	return '<div style="background:#ff6600;color: white;padding: 2px;width: 100px;text-align: center;border-radius: 15px;">' . $enddate . '</div>';
		// });
		// $grid->column('file', __('Attachment(s)'))->downloadable('../upload');
		// $grid->column('company', __('Company'));
		// $grid->column('amount', __('Amount (USD)'));
		// $grid->column('Status', __('Status'))->display(function ($title){
		// 	$date_now = date("Y-m-d");
		// 	if($this->enddate < $date_now && $this->enddate != NULL)
		// 		return '<div style="background:red;color: white;padding: 3px;width: 70px;text-align: center;border-radius: 4px;">Expired</div>';
		// 	else 
		// 		return '<div style="background: #03fc66;padding: 3px;width: 70px; text-align: center;border-radius: 4px;">Valid</div>';
		// });
        // $grid->column('remark', __('Remark'));
		
        // $grid->disableExport();
        //  $grid->disableFilter();
        $grid->quickSearch('collateral_owner');
		
		
		// $grid->filter(function($filter){
		// 	$filter->disableIdFilter();
		// 	$filter->equal('company');
		// });

		
		//print_r(Request::route('company'));

        return $grid;
    }
    function convertToArray($data){

        $provinceArray = array();

        foreach($data as $item){
            //$provinceArray = array_merge($provinceArray, array($item->id => $item->province_name));
            $provinceArray[$item->id] = $item->province_name;
        }
        return $provinceArray;
       
      
        // $informationtypeArray = array();
        // foreach($data as $item){
        //     $informationtypeArray[$item->id] = $item->information_type;
        // }
        // return $informationtypeArray;
       
    }
    function convertToArrays($data){
        $districtArray = array();
        foreach($data as $item){
            $districtArray[$item->id] = $item->district_name;
        }
        return $districtArray;
    }   
    function convertToArrayv($data){
        // $villageArray = array();
        // foreach($data as $item){
        //     $villageArray[$item->id] = $item->village_name;
        // }
        // return $villageArray;
        $branchArray = array();
        foreach($data as $item){
            $branchArray[$item->id] = $item->branch_name;
        }
        return $branchArray;
    }


    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show( PropertyIndicator::findOrFail($id));

        // $show->column(1/2, function ($show){
            $show->field('property_reference',__('Reference'));
            $show->field('collateral_owner',__('Collateral Owner '));
             // $show->field('startdate', __('Start date'));
            // $show->field('enddate', __('End date'));
            // $show->field('type',__('Type'));
            //  $show->field('property_address',__('Property Address '));//->display(function(){  // 20-12-22
            //     $province_id = $this->province;
            //     $province = Province::where('id', $province_id)->first();
            //     $distict_id = $this->district_id;
            //     $district = District::where('id', $distict_id)->first();
            //     $commune_id = $this->commune_id;
            //     $commune = Commune::where('id', $commune_id)->first();
            //     $village_id = $this->village_id;
            //     $village = Village::where('id', $village_id)->first();
    
            //    // $distict = District::where('id', $distict_id)->first();
            //     //if($village == null) return $village_id;
            //     return $village->village_name . ' , ' . $commune->commune_name . ' , ' . $district->district_name . ' , ' .  $province->province_name  ;
                
            // });

            // $show->field('geo_code',__('Geo Code'));
            $show->field('region', __('Region'))->as(function($region){
                $province = Province::where('id', $region)->first();
                if($province == null) return '';
                return $province->province_name ;
            });
            $show->field('branch_code',__('Branch'))->as(function($branch_code){
                $branch = Branch::where('branch_code', $branch_code)->first();
                if($branch == null) return '';
                return '(' . $branch->branch_code . ')' . $branch->branch_name;
            });
    
            $show->field('requested_date',__('Requested Date'));
            $show->field('reported_date',__('Reported Date'));
            $show->field('cif_no',__('CIF No.'));
            $show->field('rm_name',__('RM Name'));
            $show->field('telephone',__('Telephone'));
            $show->field('information_type',__('Information Type'))->as(function($id){
                $informationtype = InformationType::where('id', $id)->first();
                return  $informationtype->information_type_name;
            });
            $show->field('location_type',__('Location Type'));
            $show->field('type_of_access_road',__('Type of Access Road'));
            $show->field('access_road_name',__('Access Road Name'));
            $show->field('property_type',__('Property Type'))->as(function($id){
                $propertytype = PropertyType::where('id', $id)->first();
                return  $propertytype->property_type_name;
            });
            $show->field('building_status',__('Building Status (%)'));
            $show->field('borey',__('Borey')); 
            $show->field('no_of_floor',__('No. of floor'));
            $show->field('land_title_type',__('Land Titil'));
            $show->field('land_title_no',__('Lang Title No'));
            $show->field('land_size',__('Land Size'));
            $show->field('land_value_per_sqm',__('Land Value per Sqm ($)'));
            $show->field('building_size',__('Building Size ($)'));
            $show->field('building_value_per_sqm',__('Building Value per Sqm ($)'));
            $show->field('property_value',__('Property Value ($)'));
        // });    
        // $show->column(1/2, function($show){
            $show->field('customer_name',__('Customer Name'));
            $show->field('client_contact_no',__('Cliend Contact No'));
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
            $show->field('longtitude',__('Altitude'));
            $show->field('latitude',__('Latitude'));
            $show->field('front_photo',__('Front Photo'));
            $show->field('photos',__('Photo'));
            //$show->avatar('photos',__('Photo'))->file();
            $show->field('remark',__('Remark'));
            //    $show->field('updated_at', __('Updated at'));
            //    $show->field('created_at', __('Created at'));
           
        // });    

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
   
    protected function form()
    {
        $form = new Form(new PropertyIndicator());
        $form->column(1/3, function ($form){
            
            $form->select('region', __('Region'))->rules('required')->options(function(){
                return Province::all()->pluck('province_name', 'id');})->load('branch_code', env('APP_URL') . '/public/api/branch');

            $form->select('branch_code',__('Branch'))->rules('required')->options(function(){
                 return Branch::all()->pluck('branch_name','branch_code');});

            
             $form->text('cif_no', __('CIF No.'));
            $form->text('rm_name', __('RM Name'))->rules('required');
           //Sum id
            $form->text('property_reference', __('Property Reference '))->value(function(){
                $id = PropertyIndicator::all()->last();
               return 'PL-00'. $id->id + 1 ;//$id == null? 1 :
            // $p = 1234567;
            // $p = sprintf("%08d",$p); 
            
               
            });
                 
           
            $form->text('access_road_name', __('Access Road Name'))->rules('required');
            $form->select('borey', __('Borey'))->rules('required')->options(function(){
                return Borey::all()->pluck('borey_name', 'id');
            });//->rules('required');
            $form->text('land_title_no', __('Land title No'))->rules('required');
            $form->text('building_size', __('Building Size(​$)'))->rules('required');
           $form->text('collateral_owner', __('Collateral Owner'))->rules('required');
            
            $form->select('province_id', __('Province'))->rules('required')->options(function(){
                return Province::all()->pluck('province_name','id');})->load('district_id', env('APP_URL') . '/public/api/district');
            
            $form->select('district_id', __('District'))->rules('required')->options(function(){
                return District::all()->pluck('district_name','id');})->load('commune_id', env('APP_URL') . '/public/api/commune');
            
            $form->select('commune_id', __('Commune / Sangkat'))->rules('required')->options(function(){
                return Commune::all()->pluck('commune_name','id');})->load('village_id', env('APP_URL') . '/public/api/village');         

            $form->select('village_id', __('Village'))->rules('required')->options(function(){
                return Village::all()->pluck('village_name','id');});
            
        });    
            $form->column(1/3, function ($form){            
              
              
                $form->date('requested_date', __('Requested Date'))->rules('required');
                $form->date('reported_date',__('Reported Date'))->rules('required');
                $form->text('telephone', __('Telephone'))->rules('required|max:10');//number <=10
                $form->select('location_type', __('Location Type'))->rules('required')->options(['Residential Area'=>'Residential Area', 'Commercial Area'=>'Commercial Area','Industrial Area'=>'Industrial Area','Agricultural Area'=>'Agricultural Area']);
                $form->select('property_type', __('Property Type'))->rules('required')->options(function(){
                    return PropertyType::all()->pluck('property_type_name','id');
                });
                $form->text('no_of_floor', __('No. of Floor'))->rules('required');
                $form->text('land_size', __('Land Size'))->rules('required');
                $form->text('building_value_per_sqm', __('Building Value per Sqm ($)'))->rules('required');
                $form->text('customer_name', __('Customer Name '))->rules('required');
              
               
                $form->text('remark', __('Remark'));//->rules('required');
                $form->image('front_photo',__('Front Photo'))->removable()->uniqueName();
                $form->multipleImage('photos', __('Photo'))->removable()->uniqueName();
                });
                
                $form->column(1/3, function ($form){
               
              
                $form->select('information_type', __('Information Type'))->rules('required')->options(function(){
                    return InformationType::all()->pluck('information_type_name','id');
                });
                $form->select('type_of_access_road', __('Type of Access Road'))->rules('required')->options(['Boulevard'=>'Boulevard','National Road'=>'National Road', 'Paved Road'=>'Paved Road','Upaved Road'=>'Upaved Road','Alley Road'=>'Alley Road','No Road'=>'No Road']);
                $form->text('building_status', __('Building Status (%)'))->rules('required')->rules('required');
                $form->select('land_title_type', __('Land Title Type'))->rules('required')->options(['Hard Title'=>'Hard Title', 'Soft Title'=>'Soft Title']);
                $form->text('land_value_per_sqm', __('Land Value per Sqm ($)'))->rules('required');
                $form->text('property_value', __('Property Value ($)'))->rules('required');
             
                $form->text('client_contact_no', __('Client Contact No. '))->rules('required|max:10');
                $form->text('longtitude', __('Longtitude'))->rules('required');
                $form->text('latitude', __('Latitude'))->rules('required');
                
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
