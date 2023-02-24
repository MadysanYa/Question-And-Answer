<?php

namespace App\Admin\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Borey;
use App\Models\Branch;
use App\Models\Region;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Commune;
Use Encore\Admin\Widgets\Table;
use App\Models\Village;
use Encore\Admin\Admin;
use Encore\Admin\index;
use App\Models\District;
use App\Models\Province;
use App\Models\UserAdmin;
use App\Models\PropertyType;
use App\Models\InformationType;
use Encore\Admin\Form\Field\Id;
use Encore\Admin\Layout\Content;
use App\Models\PropertyIndicator;
use Encore\Admin\Widgets\Collapse;
use Illuminate\Support\Facades\DB;
use Encore\Admin\Form\Field\Button;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Encore\Admin\Grid\Displayers\Actions;
use Encore\Admin\Controllers\AdminController;

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
        //filter
        $filterRegionID = isset($_REQUEST['region_id'])? $_REQUEST['region_id'] : [];
        $filterProvinceId = isset($_REQUEST['province_id'])? $_REQUEST['province_id'] : [];
        $filterDistrictId = isset($_REQUEST['district_id'])? $_REQUEST['district_id'] : [];

        $grid = new Grid(new PropertyIndicator);

        $grid->model()->queryPropertyIndicatorGrid();
		$grid->model()->orderBy('id','desc');

        $grid->column('id', __('No.'))->asc()->sortable();
		$grid->column('property_reference', __('Reference'))->sortable();
        $grid->column('collateral_owner',__('Owner'))->sortable();
        $grid->column('information_type',__('Type'))->sortable();
        $grid->column('longtitude',__('Geo Code'))->sortable();// longtitude just example for show Geo Code on grid!
        $grid->column('region_id',__('Region'))->filter($this->convertToArrayRegion(Region::all(['id', 'region_name'])))->Display(function($id){// add filter
            $region = Region::where('id', $id)->first();
            return $region->region_name ?? '';
        });

        $grid->column('branch_code',__('Branch'))->filter($this->convertToArrayBranch(Branch::all(['branch_code', 'branch_name'])))->Display(function($branch_code){// add filter
            $branch = Branch::where('branch_code', $branch_code)->first();
            return $branch->branch_name ?? '';
        });

        $grid->column('requested_date',__('Requested Date'))->filter('range', 'date')->display(function(){
            if ($this->requested_date) {
                return date('d-M-Y', strtotime($this->requested_date));
            }
        });
        if (User::isVerifierRole() || User::isApproverRole()){
            $grid->column('reported_date',__('Reported Date'))->filter('range', 'date')->display(function(){
                if ($this->reported_date) {
                    return date('d-M-Y', strtotime($this->reported_date));
                }
            });
        }
        $grid->column('cif_no',__('CIF No.'))->sortable();
        $grid->column('rm_name',__('RM Name'))->sortable();
        $grid->column('telephone',__('Telephone'))->sortable();
        $grid->column('information_type',__('Information Type'))->sortable()->Display(function($id){
            $informationtype = InformationType::where('id',$id)->first();
            return $informationtype->information_type_name ?? '';
        });
        $grid->column('location_type',__('Location Type'))->sortable();
        $grid->column('type_of_access_road',__('Type of Access Road'))->sortable();
        $grid->column('access_road_name',__('Access Road Name'))->sortable();
        $grid->column('property_type',__('Property Type'))->sortable()->Display(function($id){
            $propertytype = PropertyType::where('id',$id)->first();
            return $propertytype->property_type_name ?? '';
        });
        $grid->column('building_status',__('Building Status (%)'))->sortable();
        $grid->column('borey',__('Borey'))->sortable()->display(function($id){
            $borey = Borey::where('id',$id)->first();
            return $borey->borey_name ?? '';
        });
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
            return $province->province_name ?? '';
        });
        $grid->column('district_id',__('District/Khan'))->filter($this->convertToArrayDistrict(District::whereIn('province_id', $filterProvinceId)->get(['id', 'district_name'])))->Display(function($district_id){ //Add filter when click ex:province->distict..
            $district = District::where('id', $district_id)->first();
            return $district->district_name ?? '';
        });
        $grid->column('commune_id',__('Commune/Sangkat'))->filter($this->convertToArrayCommune(Commune::whereIn('district_id', $filterDistrictId)->get(['id','commune_name'])))->Display(function($comune_id){
            $commune = Commune::where('id', $comune_id)->first();
            return $commune->commune_name ?? '';
        });
        $grid->column('village_id',__('Village'))->sortable()->Display(function($village_id){
            $village = Village::where('id', $village_id)->first();
            return $village->village_name ?? '';
        });
        $grid->column('latitude',__('Latitude'))->sortable();
        $grid->column('longtitude',__('Longtitude'))->sortable();
        $grid->column('remark',__('Remark'))->sortable();
        $grid->column('comparable_id1',__('ID'))->sortable();
        $grid->column('comparable_cif_no1',__('CIF No./ Name'))->sortable();
        $grid->column('comparable_geo_code1',__('Geo Code'))->sortable();
        $grid->column('comparable_size',__('Size'))->sortable();
        $grid->column('comparable_value_per_sqm1',__('Value Per Sqm'))->sortable();
        $grid->column('comparable_total_value1',__('Total Value'))->sortable();
        $grid->column('user_id',__('Created By'))->sortable()->display(function($id){
            $userName = UserAdmin::where('id', $id)->first();
            return $userName->name ?? null;
        });
        $grid->column('created_at',__('Created Date'))->filter('range', 'date')->display(function(){
            if ($this->created_at) {
                return date('d-M-Y', strtotime($this->created_at));
            }
        });
        $grid->column('deleted_by',__('Deleted By'))->sortable()->display(function($id){
            $userName = UserAdmin::where('id', $id)->first();
            return $userName->name ?? null;
        });
        $grid->column('deleted_at',__('Deleted Date'))->filter('range', 'date')->display(function(){
            if ($this->deleted_at) {
                return date('d-M-Y', strtotime($this->deleted_at));
            }
        });
        // create btn with api
        $grid->column('is_verified',__('Verified'))->display(function($is_verified){
            if ($is_verified == null) {
                if (User::isVerifierRole() && !empty($this->reported_date)) {
                    $id = $this->id;
                    return '<a href="'. env('APP_URL') . '/public/api/verify_indicator/' . $id . '/1" class="btn btn-sm btn-success">
                                <i class="fa fa-check"></i>
                                <span>&nbsp;&nbsp;Verify</span>
                            </a>
                            <a href="'. env('APP_URL') . '/public/api/verify_indicator/' . $id . '/2" class="btn btn-sm btn-danger">
                                <i class="fa fa-times"></i>
                                <span>&nbsp;&nbsp;Reject</span>
                            </a>';
                } else {
                    return '<p style="color: #172191;border: 1px solid #172191;padding: 12px;text-align:center;margin-bottom: 0px;border-radius: 3px;height: 45px;">Processing</p>';
                }
            } elseif ($is_verified == 1) {
                return '<p style="color: #00a65a;border: 1px solid #00a65a;padding: 12px;text-align:center;margin-bottom: 0px;border-radius: 3px;height: 45px;">Verified</p>';
            } else {
                return '<p style="color: #dd4b39;border: 1px solid #dd4b39;padding: 12px;text-align:center;margin-bottom: 0px;border-radius: 3px;height: 45px;">Rejected</p>';
            }
        });

        $grid->column('is_approved',__('Approved'))->display(function($is_approved){
            if($this->is_verified == 1){
                if($is_approved == null) {
                    if(User::isApproverRole()){
                        $id = $this->id;
                        return '<a href="'. env('APP_URL') . '/public/api/approve_indicator/' . $id . '/1" class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i>
                                    <span>&nbsp;&nbsp;Approv</span>
                                </a>
                                <a href="'. env('APP_URL') . '/public/api/approve_indicator/' . $id . '/2" class="btn btn-sm btn-danger">
                                    <i class="fa fa-times"></i>
                                    <span>&nbsp;&nbsp;Reject</span>
                                </a>';
                    }
                    else {
                        return '<p style="color: #172191;border: 1px solid #172191;padding: 12px;text-align:center;margin-bottom: 0px;border-radius: 3px;height: 45px;">Processing</p>';
                    }
                }
                else if($is_approved ==1){
                    return '<p style="color: #00a65a;border: 1px solid #00a65a;padding: 12px;text-align:center;margin-bottom: 0px;border-radius: 3px;height: 45px;">Approved</p>';
                }
                else{
                    return '<p style="color: #dd4b39;border: 1px solid #dd4b39;padding: 12px;text-align:center;margin-bottom: 0px;border-radius: 3px;height: 45px;">Rejected</p>';
                }
            }
        });

        // Export to PDF
        $grid->column(__('To PDF'))->display(function(){
            $id = $this->id;

            if ($this->IsPropertyApproved || User::isAdminRole()) {
                return '<a target="_blank" class="btn btn-primary" href="' .env('APP_URL') . '/public/api/pdfindicator/' . $id . '">Download</a>';
            }
        });

        $grid->quickSearch(function ($model, $query) {
            $model->where('id', $query);
            $model->orWhere('collateral_owner', $query);
            $model->orWhere('telephone', 'like', "%{$query}%");
            $model->orWhere('property_reference', 'like', "%{$query}%");
            // IF YOU NEED MORE SEARCH FIELDS BELOW THIS COMMAND
            $model->orWhereHas('user', function($q) use($query) {
                $q->where('name', 'like', "%{$query}%")
                ->orWhere('id', 'like', "%{$query}%");
            });
        });

        $grid->actions(function (Actions $actions) {
            $userId = Auth::user()->id;
            if (!User::isAdminRole()) {
                if ($actions->row->IsPropertyApproved) {
                    $actions->disableEdit();
                }
                // USER LOGIN NOT PROPERTY CREATOR OR USER LOGIN IS PROPERTY CREATOR BUT PROPERTY NOT REJECTED USER CAN'T DELETE
                if ($actions->row->user_id != $userId || $actions->row->user_id == $userId && !$actions->row->IsPropertyRejected) {
                    $actions->disableDelete();
                }
            }
        });

        // DISABLE BUTTON CREATE NEW, EDIT AND DELETE FOR USER HAS ROLE BM
        if (User::isBmRole()) {
            $grid->disableCreateButton();
            $grid->actions(function (Actions $actions) {
                $actions->disableEdit();
                $actions->disableDelete();
            });
        }
        
        // $grid->disableFilter();
        $grid->fixColumns(0, -4);
		$grid->filter(function($filter){
            $filter->scope('trashed', 'Trash Bin')->onlyTrashed();
			$filter->disableIdFilter();
		});

        // Remove action from trash
        if(request()->_scope_ == "trashed"){
            $grid->disableActions();
            $grid->disableCreateButton();
            $grid->column(__('To PDF'))->hide()->display(function(){
                $id = $this->id;
                if ($this->IsPropertyApproved || User::isAdminRole()) {
                    return '<a target="_blank" class="btn btn-primary" href="' .env('APP_URL') . '/public/api/pdfindicator/' . $id . '">Download</a>';
                }
            });
         }

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
        $propertyIndicator = PropertyIndicator::findOrFail($id);
        $show = new Show($propertyIndicator);

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
        $show->field('borey',__('Borey'))->as(function($id){
            $borey = Borey::where('id', $id)->first();
            return $borey->borey_name;
        }) ;
        $show->field('no_of_floor',__('No. of floor'));
        $show->field('land_title_type',__('Land Titil'));
        $show->field('land_title_no',__('Lang Title No'));
        $show->field('land_size',__('Land Size'));
        $show->field('land_value_per_sqm',__('Land Value per Sqm ($)'));
        $show->field('building_size',__('Building Size ($)'));
        $show->field('building_value_per_sqm',__('Building Value per Sqm ($)'));
        $show->field('property_value',__('Property Value ($)'));
        $show->field('customer_name',__('Customer Name'));
        $show->field('client_contact_no',__('Cliend Contact No'));
        $show->field('province_id',__('Province'))->as(function($province_id){
            $province = Province::where('id', $province_id)->first();
            return $province->province_name ?? '';
        });
        $show->field('district_id',__('District/ Khan'))->as(function($district_id){
            $district = District::where('id', $district_id)->first();
            return $district->district_name ?? '';
        });
        $show->field('commune_id',__('Commune / Sangkat'))->as(function($comune_id){
            $commune = Commune::where('id', $comune_id)->first();
            return $commune->commune_name ?? '';
        });
        $show->field('village_id',__('Village'))->as(function($village_id){
            $village = Village::where('id', $village_id)->first();
            return $village->village_name ?? '';
        });
        $show->field('latitude',__('Latitude'));
        $show->field('longtitude',__('Longtitude'));
        $show->field('remark',__('Remark'));
        $show->field('user_id', __('Created By'))->as(function ($userId){
            $userName = UserAdmin::where('id', $userId)->first();
            return $userName->name ?? null;
        });

        if (!User::isAdminRole()) {
            $show->panel()->tools(function ($tools) use($propertyIndicator) {
                // USER LOGIN
                $userId = Auth::user()->id;

                // PROPERTY WAS APPROVED OR REJECTED USER CAN'T EDIT
                if ($propertyIndicator->IsPropertyApproved || $propertyIndicator->IsPropertyRejected) {
                    $tools->disableEdit();
                }
                // USER LOGIN NOT PROPERTY CREATOR OR USER LOGIN IS PROPERTY CREATOR BUT PROPERTY NOT REJECTED USER CAN'T DELETE
                if ($propertyIndicator->user_id != $userId || $propertyIndicator->user_id == $userId && !$propertyIndicator->IsPropertyRejected) {
                    $tools->disableDelete();
                }
            });
        }

        if (User::isBmRole()) {
            $show->panel()->tools(function ($tools) {
                $tools->disableEdit();
                $tools->disableDelete();
            });
        }

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
            if (User::isRmRole()) {
                $form->select('region_id', __('Region'))->rules('required')->options(function(){
                    return Region::all()->pluck('region_name', 'id');
                });
                $form->text(__('Branch'))->rules('required')->value(function(){
                    return Branch::where('branch_code', Auth::user()->branch_code)->get()->value('branch_name');
                })->disable();
                $form->hidden('branch_code')->value(Auth::user()->branch_code);
            } else {
                $form->select('region_id', __('Region'))->rules('required')->options(function(){
                    return Region::all()->pluck('region_name', 'id');
                })->load('branch_code', env('APP_URL') . '/public/api/branch');
                $form->select('branch_code',__('Branch'))->rules('required')->options(function(){
                    return Branch::all()->pluck('branch_name','branch_code');
                });
            }

            $form->hidden('user_id')->value(Auth::user()->id);
            $form->date('requested_date', __('Requested Date'))->rules('required')->attribute(['style' => 'width: 100%;']);

            if (User::isVerifierRole() || User::isApproverRole() || User::isAdminRole()){
                $form->date('reported_date',__('Reported Date'))->rules('required')->attribute(['style' => 'width: 100%;']);
            } else {
                $form->date('reported_date',__('Reported Date'))->disable()->attribute(['style' => 'width: 100%;']);
            };

            $form->text('cif_no', __('CIF No.'))->inputmask(['mask' => '9999999999']);

            if (User::isVerifierRole() || User::isApproverRole() || User::isAdminRole()){
                $form->text('rm_name', __('RM Name'))->rules('required');
            } else{
                $form->text('rm_name', __('RM Name'))->disable();
            }
            $form->mobile('telephone', __('Telephone'))->rules('required')->options(['mask' => '099 999 9999'])->attribute(['style' => 'width: 100%;']);
            $form->select('information_type',__('Information Type'))->rules('required')->options(function(){
                return InformationType::all()->pluck('information_type_name','id');
               });
            //zero loading
            $form->text('property_reference', __('Property Reference'))->disable()->value(function(){
                return null;
            })->placeholder('Reference No.');
            $form->select('location_type', __('Location Type'))->rules('required')->options(['Residential Area'=>'Residential Area', 'Commercial Area'=>'Commercial Area','Industrial Area'=>'Industrial Area','Agricultural Area'=>'Agricultural Area']);
            $form->select('type_of_access_road', __('Type of Access Road'))->rules('required')->options(['Boulevard'=>'Boulevard','National Road'=>'National Road', 'Paved Road'=>'Paved Road','Upaved Road'=>'Upaved Road','Alley Road'=>'Alley Road','No Road'=>'No Road']);
            $form->image('front_photo',__('Front Photo'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:2048');
            $form->image('left_photo',__('Access Road Photo Left'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:2048');
            $form->image('title_front_photo',__('Title Photo Front'))->removable()->uniqueName()->placeholder('Title Photo')->rules('required|mimes:jpg,png,jpeg|max:2048');



        });

        $form->column(1/3, function ($form){
            $form->text('access_road_name', __('Access Road Name'))->rules('required');
            $form->select('property_type', __('Property Type'))->rules('required')->options(function(){
                return PropertyType::all()->pluck('property_type_name','id');
            });
            $form->text('customer_name', __('Customer Name '))->rules('required');
            $form->text('building_status', __('Building Status (%)'))->rules('required')->attribute('maxlength', '3');
            $form->select('borey', __('Borey'))->rules('required')->options(function(){
                return Borey::all()->pluck('borey_name', 'id');
            });
            $form->text('no_of_floor', __('No. of Floor'))->rules('required')->attribute('maxlength', '3');
            $form->select('land_title_type', __('Land Title Type'))->rules('required')->options(['Hard Title'=>'Hard Title', 'Soft Title'=>'Soft Title']);
            $form->text('land_title_no', __('Land title No.'))->rules('required');
            $form->text('land_size', __('Land Size (sqm)'))->rules('required');
            $form->currency('land_value_per_sqm', __('Land Value per Sqm '))->rules('required')->attribute(['style' => 'width: 100%;']);
            $form->currency('building_size', __('Building Size'))->rules('required')->attribute(['style' => 'width: 100%;']);
            $form->image('inside_photo',__('Inside Photo'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:2048');
            $form->image('right_photo',__('Access Road Photo Right'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:2048');
            $form->image('title_back_photo',__('Title Photo Back'))->removable()->uniqueName()->rules('mimes:jpg,png,jpeg|max:2048');

        });

        $form->column(1/3, function ($form){
            $form->currency('building_value_per_sqm', __('Building Value per Sqm '))->placeholder('Value per Sqm (Part Building)')->rules('required')->attribute(['style' => 'width: 100%;']);
            $form->currency('property_value', __('Property Value '))->rules('required')->attribute(['style' => 'width: 100%;']);
             $form->text('collateral_owner', __('Collateral Owner'))->rules('required');
            $form->mobile('client_contact_no', __('Client Contact No. '))->options(['mask' => '099 999 9999'])->rules('required')->attribute(['style' => 'width: 100%;']);
            $form->select('province_id', __('Province'))->rules('required')->options(function(){
                return Province::all()->pluck('province_name','id');})->load('district_id', env('APP_URL') . '/public/api/district');

            $form->select('district_id', __('District'))->rules('required')->options(function(){
                return District::all()->pluck('district_name','id');})->load('commune_id', env('APP_URL') . '/public/api/commune');

            $form->select('commune_id', __('Commune / Sangkat'))->rules('required')->options(function(){
                return Commune::all()->pluck('commune_name','id');})->load('village_id', env('APP_URL') . '/public/api/village');

            $form->select('village_id', __('Village'))->rules('required')->options(function(){
                return Village::all()->pluck('village_name','id');});
            $form->text('latitude', __('Latitude'))->placeholder('Geo Code')->inputmask(['mask' => '99.999999'])->rules('required');
            $form->text('longtitude', __('Longtitude'))->placeholder('Geo Code')->inputmask(['mask' => '999.999999'])->rules('required');
            $form->text('remark', __('Remark'));
            $form->image('id_front_photo',__('ID Photo Front'))->removable()->uniqueName()->rules('mimes:jpg,png,jpeg|max:2048');
            $form->image('id_back_photo',__('ID Photo Back'))->removable()->uniqueName()->rules('mimes:jpg,png,jpeg|max:2048');
            $form->multipleFile('photos',__('Photos'))->removable()->uniqueName();//- >rules('required|mimes:jpg,png,jpeg|max:5000');

            $form->text('comparable_id1',__('ID'));
            $form->text('comparable_cif_no1',__('CIF No./ Name'));
            $form->text('comparable_geo_code1',__('Geo Code'));
            $form->text('comparable_size1',__('Size'));
            $form->text('comparable_value_per_sqm1',__('Value Per Sqm'));
            $form->text('comparable_total_value1',__('Total Value'));
            $form->text('comparable_id2',__('ID'));
            $form->text('comparable_cif_no2',__('CIF No./ Name'));
            $form->text('comparable_geo_code2',__('Geo Code'));
            $form->text('comparable_size2',__('Size'));
            $form->text('comparable_value_per_sqm2',__('Value Per Sqm'));
            $form->text('comparable_total_value2',__('Total Value'));
            if (User::isVerifierRole() || User::isApproverRole() || User::isAdminRole()){
                $form->button('comparable_reference', __('Comparable Reference'))->attribute('id', 'show-comparable-reference-modal')->on('click', '$("#modal-comparable-reference").modal();');
            }
            else{
                $form->button('comparable_reference', __('Comparable Reference'))->disable()->attribute('id', 'show-comparable-reference-modal')->on('click', '$("#modal-comparable-reference").modal();');
            }
            $form->html(view('admin.property.property_appraisal_script'));

        });
        // Modal Comparable Reference
        Admin::html('
            <div class="modal fade" id="modal-comparable-reference" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 style="color:red;">
                                <span class="glyphicon glyphicon"></span>Comparable Reference
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_id1" class="col-sm-2  control-label">ID 1</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_id1" class="form-control com_id1" placeholder="Input ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_cif_no_name1" class="col-sm-2  control-label">CIF No. / Name 1</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_cif_no_name1" class="form-control com_ref_cif_no_name1" placeholder="Input CIF No. / Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_geo_code1" class="col-sm-2  control-label">Geo Code 1</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_geo_code1" class="form-control com_ref_geo_code1" placeholder="Input Geo Code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_size1" class="col-sm-2  control-label">Size 1</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_size1" class="form-control com_ref_size1" placeholder="Input Size">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_value_per_sqm1" class="col-sm-2  control-label">Value per Sqm 1</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" id="com_ref_value_per_sqm1" class="form-control com_ref_value_per_sqm1" placeholder="Input Value per Sqm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_total_value1" class="col-sm-2  control-label">Total Value 1</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$
                                                    </span>
                                                    <input type="text" id="com_ref_total_value1" class="form-control com_ref_total_value1" placeholder="Input Total Value">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_id" class="col-sm-2  control-label">ID 2</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_id2" class="form-control com_id2" placeholder="Input ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_cif_no_name2" class="col-sm-2  control-label">CIF No. / Name 2</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_cif_no_name2" class="form-control com_ref_cif_no_name2" placeholder="Input CIF No. / Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_geo_code2" class="col-sm-2  control-label">Geo Code 2</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_geo_code2" class="form-control com_ref_geo_code2" placeholder="Input Geo Code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_size2" class="col-sm-2  control-label">Size 2</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_size2" class="form-control com_ref_size2" placeholder="Input Size">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_value_per_sqm2" class="col-sm-2  control-label">Value per Sqm 2</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" id="com_ref_value_per_sqm2" class="form-control com_ref_value_per_sqm2" placeholder="Input Value per Sqm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_total_value2" class="col-sm-2  control-label">Total Value 2</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$
                                                    </span>
                                                    <input type="text" id="com_ref_total_value2" class="form-control com_ref_total_value2" placeholder="Input Total Value">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn-input-comparable" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $("#btn-input-comparable").click(function() {
                    $("#comparable_cif_no1").val($("#com_ref_cif_no_name1").val());
                    $("#comparable_geo_code1").val($("#com_ref_geo_code1").val());
                    $("#comparable_id1").val($("#com_id1").val());
                    $("#comparable_size1").val($("#com_ref_size1").val());
                    $("#comparable_value_per_sqm1").val($("#com_ref_value_per_sqm1").val());
                    $("#comparable_total_value1").val($("#com_ref_total_value1").val());

                    $("#comparable_cif_no2").val($("#com_ref_cif_no_name2").val());
                    $("#comparable_geo_code2").val($("#com_ref_geo_code2").val());
                    $("#comparable_id2").val($("#com_id2").val());
                    $("#comparable_size2").val($("#com_ref_size2").val());
                    $("#comparable_value_per_sqm2").val($("#com_ref_value_per_sqm2").val());
                    $("#comparable_total_value2").val($("#com_ref_total_value2").val());
                    // Close Modal When User Click Submit
                    $("#modal-comparable-reference").modal("hide");
                });

                $("#show-comparable-reference-modal").click(function() {
                    $("#com_ref_cif_no_name1").val($("#comparable_cif_no1").val());
                    $("#com_ref_geo_code1").val($("#comparable_geo_code1").val());
                    $("#com_id1").val($("#comparable_id1").val());
                    $("#com_ref_value_per_sqm1").val($("#comparable_value_per_sqm1").val());
                    $("#com_ref_size1").val($("#comparable_size1").val());
                    $("#com_ref_total_value1").val($("#comparable_total_value1").val());

                    $("#com_ref_cif_no_name2").val($("#comparable_cif_no2").val());
                    $("#com_ref_geo_code2").val($("#comparable_geo_code2").val());
                    $("#com_id2").val($("#comparable_id2").val());
                    $("#com_ref_value_per_sqm2").val($("#comparable_value_per_sqm2").val());
                    $("#com_ref_size2").val($("#comparable_size2").val());
                    $("#com_ref_total_value2").val($("#comparable_total_value2").val());
                });

                $("#comparable_cif_no1, #comparable_geo_code1, #comparable_id1, #comparable_size1, #comparable_value_per_sqm1, #comparable_total_value1,#comparable_cif_no2, #comparable_geo_code2, #comparable_id2, #comparable_size2, #comparable_value_per_sqm2, #comparable_total_value2").closest(".form-group").css("display","none");
            </script>

        ');


        $form->footer(function ($footer) {
            // disable reset btn
            $footer->disableReset();
            // disable `View` checkbox
            $footer->disableViewCheck();
            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();
            // disable `Continue Creating` checkbox
            //$footer->disableCreatingCheck();
            // $footer->disableCreatingCheck();
        });

        return $form;
    }
}
