<?php

namespace App\Admin\Controllers;

use App\Models\Branch;
use App\Models\Commune;

use App\Models\District;
use App\Models\InformationType;
use App\Models\PropertyIndicator;
use App\Models\PropertyIndicatorBranch;
use App\Models\PropertyType;
use App\Models\Province;
use App\Models\Region;
use App\Models\Village;
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
   
    //  public function index(Content $PropertyIndicator){
    //      $PropertyIndicator->header($this->title);
    //      $PropertyIndicator->body($this->dashboard());
    //      $PropertyIndicator->body($this->grid());
       
        
    //     return $PropertyIndicator;
    // }
    // protected function dashboard(){
    
    
    // if(isset($_REQUEST['status']))
    //     $status =  $_REQUEST['status'];
    // else 
    //     $status = '';
            
    // $Progressing = '';
    // $Pending = '';
    // $Done = '';
    // $ETC = '';
    // $Cancelled ='';
    
    // $conditions_Progressing = array('status'=> $status, 'status' => 'Progressing');
    // $conditions_Pending = array('status'=> $status, 'status' => 'Pending');
    // $conditions_Done = array('status'=> $status, 'status' => 'Done');
    // $conditions_ETC = array('status'=> $status, 'status' => 'ETC');
    // $conditions_Cancelled = array('status'=> $status, 'status' => 'Cancelled');


    // if($status != ''){
    //     if(isset($_REQUEST['status'])){
    //         $Progressing = Invoice::where($conditions_Progressing)->whereIn('Progressing', $cond_status)->count();
    //         $Pending = Invoice::where($conditions_Pending)->whereIn('Pending', $cond_status)->count();
    //         $Done = Invoice::where($conditions_Done)->whereIn('Done', $cond_status)->count();
    //         $ETC = Invoice::where($conditions_Done)->whereIn('ETC', $cond_status)->count();
            
    //     }else {
    //         $Progressing = Invoice::where($conditions_Progressing)->count();
    //         $Pending = Invoice::where($conditions_Pending)->count();
    //         $Done = Invoice::where($conditions_Done)->count();
    //         $ETC = Invoice::where($conditions_ETC)->count();
    //     }
        
    // }
    // else {
    //     $Progressing = Invoice::where(['status' => 'Progressing'])->count();
    //     $Pending = Invoice::where(['status' => 'Pending'])->count();
    //     $Done = Invoice::where(['status' => 'Done'])->count();
    //     $ETC = Invoice::where(['status' => 'ETC'])->count();
    // }
    
    // $title1 = "Done";
    // $value1 = $Done;
    // $title2 = "Pending";
    // $value2 = $Pending;
    // $title3 = "Progressing";
    // $value3 = $Progressing;
    // $title4 = "ETC";
    // $value4 = $ETC;
    // $title5 = "Cancelled";
    // $value5 = $Cancelled;
    
    
    
    // $html = <<<HTML
           
    //         <section class= "btn-das" >
    //            <button>PENDING</button>
    //            <button>PROCESSING</button>
    //            <button>VERIFIED</button>
    //            <button>APPROVED</button>
    //            <button>CANCELLED</button>
    //         </section>
    //         <section class="drop-list">
    //             <select >
    //                 <option value="Province">Province</option>
    //                 <option value="Sr">Siem Reap</option>
    //                 <option value="pp">Phonm Penh</option>
    //                 <option value="tk">Takeo</option>
    //             </select>
    //             <select>
    //                 <option value="District">District</option>
    //                 <option value="Sen Sok">Sen Sok</option>
    //                 <option value=" Tuol Kouk">Tuol Kouk</option>
    //                 <option value=" Russey Keo">Russey Keo</option>
    //             </select>
    //             <select  >
    //                 <option value="Commune">Commune</option>
    //                 <option value="Touk Thla">Touk Thla</option>
    //                 <option value="Sangkat Chaom Chau">Chaom Chau</option>
    //                 <option value="Sangkat Dangkao">Sangkat Dangkao</option> 
    //             </select>
                
    //         </section>

    //         <section class="btn-pro">
               
  
    //             <button>Add New Property</button>
    //         </section>
           
           
            
    // HTML;
    
    
    // $html = str_replace('{{title1}}',$title1,$html);
    // $html = str_replace('{{value1}}',$value1,$html);
    // $html = str_replace('{{title2}}',$title2,$html);
    // $html = str_replace('{{value2}}',$value2,$html);
    // $html = str_replace('{{title3}}',$title3,$html);
    // $html = str_replace('{{value3}}',$value3,$html);
    // $html = str_replace('{{title4}}',$title4,$html);
    // $html = str_replace('{{value4}}',$value4,$html);
    // $html = str_replace('{{title5}}',$title5,$html);
    // $html = str_replace('{{value5}}',$value5,$html);
    // return $html;
    // }	
     
    protected function grid()
    {
        $grid = new Grid(new PropertyIndicator);
		
		$grid->model()->orderBy('id','asc');
        $grid->column('id', __('No.'))->asc()->sortable();
		$grid->column('property_reference', __('Reference'));//->as(function($id){
         //  $id = PropertyIndicator::get('id')->first();
         //  return $id+1;
        

       // });
        $grid->column('collateral_owner',__('Owner'));
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
        $grid->column('cif_no',__('Geo Code'));
        // 14-12-22  start project
        $grid->column('region',__('Region'));  
        $grid->column('branch',__('Branch')); 
        $grid->column('requested_date',__('Requested Date')); 
        $grid->column('reported_date',__('Reported Date'));
        $grid->column('cif_no',__('CIF No.')); 
        $grid->column('rm_name',__('RM Name')); 
        $grid->column('telephone',__('Telephone')); 
        $grid->column('information_type',__('Information Type')); 
        $grid->column('location_type',__('Location Type')); 
        $grid->column('type_of_access_road',__('Type of Access Road')); 
        $grid->column('access_name',__('Access Road Name')); 
        $grid->column('property_type',__('Property Type')); 
        $grid->column('building_status',__('Building Status')); 
        $grid->column('borey',__('Borey')); 
        $grid->column('no_of_floor',__('No. of floor')); 
        $grid->column('land_title_type',__('Land Titil')); 
        $grid->column('land_title_no',__('Lang Title No')); 
        $grid->column('land_size',__('Land Size')); 
        $grid->column('land_value_per_sqm',__('Land Value per Sqm'));
        $grid->column('building_size',__('Building Size')); 
        $grid->column('building_value_per_sqm',__('Building Value per Sqm'));
        $grid->column('property_value',__('Property Value'));
        $grid->column('customer_name',__('Customer Name')); 
        $grid->column('client_contact_no',__('Cliend Contact No.')); 
        $grid->column('province_id',__('Province'))->display(function($province_id){
            $province = Province::where('id', $province_id)->first();
            return $province->province_name;
        }); 
        $grid->column('district_id',__('District/Khan'))->display(function($district_id){
            $district = District::where('id', $district_id)->first();
            return $district->district_name;
        }); 
        $grid->column('commune_id',__('Commune/Sangkat'))->Display(function($comune_id){
            $commune = Commune::where('id', $comune_id)->first();
            return $commune->commune_name;
        }); 
        $grid->column('village_id',__('Village'))->Display(function($village_id){
            $village = Village::where('id', $village_id)->first();
            return $village->village_name   ;
        });
        $grid->column('altitude',__('Altitude')); 
        $grid->column('latitude',__('Latitude')); 
        $grid->column('photo',__('Photo')); 
        $grid->column('remark',__('Remark')); 
      
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
            $show->field('property_reference', __('Reference'));
            $show->field('collateral_owner', __('Collateral Owner '));
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
            $show->field('region',__('Region'))->as(function($region_id){
                $region = Region::where('id', $region_id)->first();
                return $region->region_name;
            });
            $show->field('branch',__('Branch'))->as(function($branch_code,){
                $branch = Branch::where('branch_code', $branch_code )->first();
                if($branch == null) return '';
                return '('. $branch->branch_code .') '. $branch->branch_name;
            });
            $show->field('requested_date',__('Requested Date'));
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
            $show->field('building_status',__('Building Status'));
            $show->field('borey',__('Borey')); 
            $show->field('no_of_floor',__('No. of floor'));
            $show->field('land_title_type',__('Land Titil'));
            $show->field('land_title_no',__('Lang Title No'));
            $show->field('land_size',__('Land Size'));
            $show->field('building_size',__('Building Size'));
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
            $show->field('altitude',__('Altitude'));
            $show->field('latitude',__('Latitude'));
            $show->field('photo',__('Photo'));
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
            
            $form->select('region',__('Region'))->options(function(){
                return Province::all()->pluck('province_name','id');
            });
            $form->select('branch',__('Branch'))->options(function(){
                return Branch::all()->pluck('branch_name','branch_code');
            });
            
            $form->date('requested_date', __('Requested Date'));//->rules('required');
            $form->text('cif_no', __('CIF No.'));//->rules('required');
            $form->text('rm_name', __('RM Name'));//->rules('required');
           
            $form->text('property_reference', __('Property Reference '))->value(function(){
                $id = PropertyIndicator::all()->last();
                return $id->id + 1 ;
            });
                 
           
            $form->text('access_road_name', __('Access Road Name'));//->rules('required');
            $form->text('borey', __('Borey'));//->rules('required');
            $form->text('land_title_no', __('Land title No'));//->rules('required');
           
           

           
            $form->text('collateral_owner', __('Collateral Owner'));//->rules('required');
            //select province 
            $form->select('province_id', __('Province'))->options(function(){
                return Province::all()->pluck('province_name', 'id');
                })->load('district_id', env('APP_URL') . '/public/api/district');
                // village get data from commune
                $form->select('village_id', __('Village'));
                $form->multipleFile('photo', __('Photo'));//->removable();
            
        });    
            $form->column(1/3, function ($form){
                $form->html('<br>');
                $form->html('<br>');
                $form->html('<br>');
                $form->html('<br>');
                $form->html('<br>');
                $form->html('<br>'); 
                $form->html('<br>');
                $form->html('<br>');
              
              
              
                $form->text('telephone', __('Telephone'));//->rules('required');
                $form->select('location_type', __('Location Type'))->options(['Residential Area'=>'Residential Area', 'Commercial Area'=>'Commercial Area','Industrial Area'=>'Industrial Area','Agricultural Area'=>'Agricultural Area']);
                $form->select('property_type', __('Property Type'))->options(function(){
                    return PropertyType::all()->pluck('property_type_name','id');
                });
                $form->text('no_of_floor', __('No. of Floor'));//->rules('required');
                $form->text('land_size', __('Land Size'));//->rules('required');
               
                $form->text('customer_name', __('Customer Name '));//->rules('required');
                // select district get data from province
                $form->select('district_id', __('District/ Khan'))->load('commune_id', env('APP_URL') . '/public/api/commune');
                $form->text('altitude', __('Altitude'));//->rules('required');
                $form->text('remark', __('Remark'));//->rules('required');
                });
                
                $form->column(1/3, function ($form){
                $form->html('<br>');
                $form->html('<br>');
                $form->html('<br>');
                $form->html('<br>');
                $form->html('<br>');
                $form->html('<br>'); 
              
                $form->select('information_type', __('Information Type'))->options(function(){
                    return InformationType::all()->pluck('information_type_name','id');
                });
                $form->select('type_of_access_road', __('Type of Access Road'))->options(['Boulevard'=>'Boulevard','National Road'=>'National Road', 'Paved Road'=>'Paved Road','Upaved Road'=>'Upaved Road','Alley Road'=>'Alley Road','No Road'=>'No Road']);
                $form->text('building_status', __('Building Status'));//->rules('required');
                $form->select('land_title_type', __('Land Title Type'))->options(['Hard Title'=>'Hard Title', 'Soft Title'=>'Soft Title']);
                $form->text('building_size', __('Building Size'));//->rules('required');
               
              
                // commune  get data from district
                $form->text('client_contact_no', __('Client Contact No. '));//->rules('required');
                $form->select('commune_id', __('Commune/ Sangkat'))->load('village_id', env('APP_URL') . '/public/api/village');
               
                $form->text('latitude', __('Latitude'));//->rules('required');
                $form->button('add_property',__('Add Property'));
                
                });
                
           
     
            
            // $form->text('type', __('Type'))->rules('required');
            // $form->text('property_address', __('Property Address'))->rules('required');
            // $form->text('geo_code', __('Geo Code'))->rules('required');
            // $form->date('startdate', 'Start date')->rules('required');
            // $form->date('enddate', 'End date');
            // $form->select('company', __('Company'))->options(['GCTMC'=>'GCTMC', 'GTMC'=>'GTMC', 'GNS'=>'GNS','KOSIGN'=>'KOSIGN', 'TECHDATA'=>'TECHDATA', 'TEST	'=>'TEST'])->rules('required');
            // $form->text('amount','Amount (USD)');
            // $form->multipleFile('file', __('File'))->removable();
            // $form->textarea('remark', __('Remark'));
       
       
            
        
       
        
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
