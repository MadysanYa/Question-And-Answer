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
use App\Models\Village;
use Encore\Admin\Admin;
use Encore\Admin\hiden;
use Encore\Admin\index;
use App\Models\District;
use App\Models\Province;
use App\Models\UserAdmin;
use App\Models\PropertyType;
use App\Models\InformationType;
use Encore\Admin\Form\Field\Id;
use Encore\Admin\Layout\Content;
use App\Models\PropertyAppraisal;
Use Encore\Admin\Widgets\Table;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Form\Field\Button;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Encore\Admin\Controllers\AdminController;







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

        $grid->model()->orderBy('id','desc');
        $grid->column('id', __('No.'))->asc()->sortable();

            /* $grid->column('swot_analyze', __("swot_analyze"))->display(function(){ return 'Swot Analyze';})->modal('Swot Analyze', function($model){

            $form = new Form(new PropertyAppraisal());

            $form->column(1/2,function($form){
            $form->text('strength', __('Strength'))->rules('required');
            $form->text('weakness', __('Weakness'))->rules('required');
        });
            $form->column(1/2,function($form){
            $form->text('opportunity', __('Opportunity'))->rules('required');
            $form->text('threat', __('Threat'))->rules('required');

            // $form->text('	updated_at',__ ('	updated_at'));
            // $form->text('	created_at',__ ('	created_at'));

        });

            //  $form->select('return', __('Return'))->options(['Yes'=>'Yes']);
            // $form->radio('return', __('Return'))->options([''=>'No','Return'=>'Yes'])->default('No');
            //   $form->textarea('remark', __('Remark'));

            $form->setAction('../../api/PropertyAppraisal');

            return $form;

        });  */

        $grid->column('property_reference', __('Reference'))->sortable();
        $grid->column('collateral_owner', __('Owner'))->sortable();
        $grid->column('information_type',__(' Type'))->sortable()->Display(function($id){
            $informationtype = InformationType::where('id',$id)->first();
            if ($informationtype == null ) return '';
            return $informationtype->information_type_name;
        });



            /*   $grid->column('property_address',__('Property Address '))->display(function(){
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

        });  */
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
        $grid->column('requested_date',__('Requested Date'))->filter('range', 'date');
        $grid->column('reported_date',__('Reported Date'))->filter('range', 'date');
        $grid->column('cif_no',__('CIF No.'))->sortable();
        $grid->column('rm_name',__('RM Name'))->sortable();
        $grid->column('telephone',__('Telephone'))->sortable();
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
        $grid->column('building_value_per_sqm',__('Building Value per sqm '))->sortable();
        $grid->column('building_size_by_measurement', __('Building Size by measurement'))->sortable();
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
        //$grid->column('property_address', __('Property Address'));
        $grid->column('remark',__('Remark'))->sortable();
        $grid->column('user_id',__('Created By'))->sortable()->display(function($id){
            $userName = UserAdmin::where('id', $id)->first();
            return $userName->name ?? null;
        });

        // create btn with api
        $grid->column('is_verified',__('Verified'))->display(function($is_verified){
            if($is_verified == null) {
                if(User::isVerifierRole()){ // user login
                    $id = $this->id;
                    return '<a href="'. env('APP_URL') . '/public/api/verify_appraisal/' . $id . '/1" class="btn btn-sm btn-success">
                                <i class="fa fa-check"></i>
                                <span>&nbsp;&nbsp;Verify</span>
                            </a>
                            <a href="'. env('APP_URL') . '/public/api/verify_appraisal/' . $id . '/2" class="btn btn-sm btn-danger">
                                <i class="fa fa-times"></i>
                                <span>&nbsp;&nbsp;Reject</span>
                            </a>';
                }
                else {
                    return '<p style="color: #172191;border: 1px solid #172191;padding: 12px;text-align:center;margin-bottom: 0px;border-radius: 3px;height: 45px;">Processing</p>';
                }
            }
            else if($is_verified == 1){
                return '<p style="color: #00a65a;border: 1px solid #00a65a;padding: 12px;text-align:center;margin-bottom: 0px;border-radius: 3px;height: 45px;">Verified</p>';
            }
            else{
                return '<p style="color: #dd4b39;border: 1px solid #dd4b39;padding: 12px;text-align:center;margin-bottom: 0px;border-radius: 3px;height: 45px;">Rejected</p>';
            }
        });

        $grid->column('is_approved',__('Approved'))->display(function($is_approved){
            if($this->is_verified == 1){
                if($is_approved == null) {
                    if(User::isApproverRole()){
                        $id = $this->id;
                        return '<a href="'. env('APP_URL') . '/public/api/approve_appraisal/' . $id . '/1" class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i>
                                    <span>&nbsp;&nbsp;Approv</span>
                                </a>
                                <a href="'. env('APP_URL') . '/public/api/approve_appraisal/' . $id . '/2" class="btn btn-sm btn-danger">
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

        // $grid->column('report_date', __('Report Date'));
        $grid->fixColumns(0, -3);

        $grid->quickSearch(function ($model, $query) {
            $model->where('id', $query);
            $model->orWhere('collateral_owner', $query);
            $model->orWhere('telephone', 'like', "%{$query}%");
            $model->orWhereHas('user', function($q) use($query) {
                $q->where('name', 'like', "%{$query}%")
                ->orWhere('id', 'like', "%{$query}%");
            });
        });

        $grid->disableFilter();
        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->where(function ($query) {
                $query->whereHas('user', function($q) {
                    $q->where('name', 'like', "%{$this->input}%");
                    $q->orWhere('id', 'like', "%{$this->input}%");
                });
            }, 'Created By');
        });

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
        $show->field('property_address',__('Property_address '));


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

        $show->field('cif_no', __('CIF No'))->sortable();
        $show->field('swot_analyze', __('swot_analyze'))->sortable();
        $show->field('rm_name', __('Loan Officer'))->sortable();
        $show->field('requested_date', __('Request Date'))->sortable();
        $show->field('access_road_name', __('Access Road Name'))->sortable();
        $show->field('borey', __('Borey'))->sortable();
        $show->field('land_title_no', __('Land title no'))->sortable();
        $show->field('land_value_per_sqm', __('Land Value Persqm'))->sortable();
        $show->field('property_value', __('Property Value'))->sortable();
        $show->field('client_contact_no', __('Client Contact No'))->sortable();
        $show->field('commune_id', __('Commune Sangkat'))->sortable();
        $show->field('latitude', __('Latitude'))->sortable();
        $show->field('longtitude', __('longtitude'))->sortable();
        $show->field('remark', __('Remark'))->sortable();
        $show->field('client_contact_no',__('Client Contact No'));
        $show->field('reported_date',__('Reported Date'));
        $show->field('requested_date',__('Requested Date'));
        $show->field('location_type', __('Location Type'))->sortable();
        $show->field('property_type',__('Property Type'))->as(function($id){
            $propertytype = PropertyType::where('id', $id)->first();
            if ($propertytype == null ) return '';
            return  $propertytype->property_type_name;
        });
        $show->field('no_of_floor', __('No Of Floor'))->sortable();
        $show->field('appraisal_certificate_fee',__('Appraisal Certificate Fee'))->sortbale();
        $show->field('land_size', __('Land_size'))->sortable();
        $show->field('building_value_per_sqm', __('Building Value per Sqm'))->sortable();
        $show->field('collateral_owner', __('Owner'))->sortable();

       // $show->field('photos',__('Photo'))->sortable();
       // $show->field('front_photo',__('Front Photo'))->sortable();


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
        $show->field('building_size_by_measurement', __('Building Size by measurement '))->sortable();

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
        $show->field('strength',__('Strength'));
        $show->field('weakness',__('Weakness'));
        $show->field('opportunity',__('Opportunity'));
        $show->field('threat',__('Threat'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */

    protected function form()
    {
        // Add dialog form
        Admin::html('
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 style="color:red;">
                                <span class="glyphicon glyphicon"></span> Swot Analyze
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="strength">
                                            <span class="glyphicon glyphicon">Strength</span>
                                        </label>
                                        <textarea type="text" class="form-control" id="input_strength"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="weakness">
                                            <span class="glyphicon glyphicon">Weakness</span>
                                        </label>
                                        <textarea type="text" class="form-control" id="input_weakness"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="opportunity">
                                            <span class="glyphicon glyphicon">Opportunity</span>
                                        </label>
                                        <textarea type="text" class="form-control" id="input_opportunity"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="threat">
                                            <span class="glyphicon glyphicon">Threat</span>
                                        </label>
                                        <textarea type="text" class="form-control" id="input_threat"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="btnInputSWOT" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $("#btnInputSWOT").click(function() {
                    // Push Value From Modal To Input
                    $("#strength").val($("#input_strength").val());
                    $("#weakness").val($("#input_weakness").val());
                    $("#opportunity").val($("#input_opportunity").val());
                    $("#threat").val($("#input_threat").val());

                    // Close Modal When User Click Submit
                    $("#myModal").modal("hide");
                });

                // Push Value From Input To Modal
                $("#show-swot-modal").click(function() {
                    $("#input_strength").val($("#strength").val());
                    $("#input_weakness").val($("#weakness").val());
                    $("#input_opportunity").val($("#opportunity").val());
                    $("#input_threat").val($("#threat").val());
                });
            </script>
        ');

        $form = new Form(new PropertyAppraisal());

        $form->column(1/3,function($form){
            $form->hidden('user_id')->value(Auth::user()->id);
            $form->select('region_id', __('Region'))->rules('required')->options(function(){
                return Region::all()->pluck('region_name', 'id');})->load('branch_code', env('APP_URL') . '/public/api/branch');
            $form->select('branch_code',__('Branch'))->rules('required')->options(function(){
                 return Branch::all()->pluck('branch_name','branch_code');
            });
            $form->date('requested_date', __('Requested Date'))->rules('required')->attribute(['style' => 'width: 100%;']);
            if (User::isVerifierRole() || User::isApproverRole()){
                $form->date('reported_date',__('Reported Date'))->rules('required')->attribute(['style' => 'width: 100%;']);
            } else {
                $form->date('reported_date',__('Reported Date'))->disable()->attribute(['style' => 'width: 100%;']);
            };

            $form->text('cif_no', __('CIF No'))->inputmask(['mask' => '9999999999']);
            $form->currency('appraisal_certificate_fee',__('Appraisal Certificate Fee'))->attribute(['style' => 'width: 100%;']);
            if (User::isVerifierRole() || User::isApproverRole()){
                $form->text('rm_name', __('RM Name'))->rules('required');
            } else{
                $form->text('rm_name', __('RM Name'))->disable();
            }
            $form->mobile('telephone', __('Telephone'))->rules('required')->options(['mask' => '099 999 9999'])->attribute(['style' => 'width: 100%;']); // add number
            $form->select('information_type',__('Information Type'))->rules('required')->options(function(){
                return InformationType::all()->pluck('information_type_name','id');
            });
            $form->text('property_reference', __('Property Reference '))->disable()->value(function(){
                return null;
                // $id = PropertyAppraisal::all()->last();
                // return 'PL-'. sprintf('%010d', $id == null ? 1 : $id->id + 1);
            })->placeholder('Property Reference');
            $form->select('location_type', __('Location Type'))->rules('required')->options(['Residential Area'=>'Residential Area','Commercial Area'=>'Commercial Area', 'Industrial Area'=>'Industrial Area', 'Agricultural Area'=>'Agricultural Area']);
            $form->select('type_of_access_road', __('Type of Access Road'))->rules('required')->options(['Boulevard'=>'Boulevard','National Road'=>'National Road', 'Paved Road'=>'Paved Road','Upaved Road'=>'Upaved Road','Alley Road'=>'Alley Road','No Road'=>'No Road']);
            $form->text('access_road_name', __('Access Road Name'))->rules('required');
            $form->select('property_type', __('Property Type'))->rules('required')->options(function(){
                return PropertyType::all()->pluck('property_type_name','id');
            });
            $form->text('customer_name', __('Customer Name'))->rules('required');
            $form->mobile('client_contact_no', __('Client Contact No'))->rules('required')->options(['mask' => '099 999 9999'])->attribute(['style' => 'width: 100%;']);
        });

        $form->column(1/3,function($form){
            $form->html('<div style="height:105px"></div>');
            $form->text('building_status', __('Building Status (%)'))->rules('required')->attribute('maxlength', '3');
            $form->select('borey', __('Borey'))->rules('required')->options(function(){
                return Borey::all()->pluck('borey_name', 'id');
            });
            $form->text('no_of_floor', __('No. of Floor'))->rules('required')->attribute('maxlength', '3');
            $form->select('land_title_type', __('Land Title Type'))->rules('required')->options(['Hard Title'=>'Hard Title','Soft Title'=>'Soft Title']);
            $form->text('land_title_no', __('Land Title No'))->rules('required')->inputmask(['mask' => '999999999-9999']);
            $form->text('land_size', __('Land Size(Sqm)'))->rules('required');
            $form->text('land_size_by_measurement', __('Land Size by Measurement'))->inputmask(['mask' => '9999999.99'])->rules('required');
            $form->currency('land_value_per_sqm', __('Land Value per Sqm '))->rules('required')->attribute(['style' => 'width: 100%;']);
            $form->text('building_size_by_measurement', __('Building Size by measurement'))->inputmask(['mask' => '9999999.99'])->rules('required');
            $form->text('building_value_per_sqm', __('Building Value per Sqm'))->inputmask(['mask' => '9999999.99'])->rules('required');
            $form->currency('property_value', __('Property Value '))->rules('required')->attribute(['style' => 'width: 100%;']);
            $form->text('collateral_owner', __('Collateral Owner'))->rules('required');
            $form->text('remark', __('Remark'));

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

            $form->text('latitude', __('Latitude'))->inputmask(['mask' => '99.9999999'])->rules('required');
            $form->text('longtitude', __('Longtitude'))->inputmask(['mask' => '999.999999'])->rules('required');

            $form->image('inside_photo',__('Inside Photo'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:5000');
            $form->image('right_photo',__('Access Road Photo Right'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:5000');
            $form->image('left_photo',__('Access Road Photo Left'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:5000');
            $form->image('front_photo',__('Title Photo Front'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:5000');
            $form->image('back_photo',__('Title Photo Back'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:5000');
            $form->image('id_front_photo',__('ID Photo Front'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:5000');
            $form->image('id_back_photo',__('ID Photo Back'))->removable()->uniqueName()->rules('required|mimes:jpg,png,jpeg|max:5000');
            // $form->multipleImage('photos', __('Gallery'))->removable()->uniqueName();

            $form->text('strength',__('Strength'));
            $form->text('weakness',__('Weakness'));
            $form->text('opportunity',__('Opportunity'));
            $form->text('threat',__('Threat'));
            $form->text('comparable_cif_no',__('CIF No./ Name'));
            $form->text('geo_code',__('Geo Code'));
            $form->text('distance',__('Distance'));
            $form->text('size',__('Size'));
            $form->text('value_per_sqm',__('Value per_sq. m'));
            $form->text('total_value',__('Total Value'));
            $form->button('comparable_reference', __('Comparable Reference'))->attribute('id', 'show-comparable-reference-modal')->on('click', '$("#modal-comparable-reference").modal();');
            $form->button('swot_analyze', __('Swot Analyze'))->attribute('id', 'show-swot-modal')->on('click', '$("#myModal").modal();');
            $form->html(view('admin.propertyAppraisal.property_appraisal_script'));
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
                                            <label for="com_ref_cif_no_name" class="col-sm-2  control-label">CIF No. / Name</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_cif_no_name" class="form-control com_ref_cif_no_name" placeholder="Input CIF No. / Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_geo_code" class="col-sm-2  control-label">Geo Code</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_geo_code" class="form-control com_ref_geo_code" placeholder="Input Geo Code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_distance" class="col-sm-2  control-label">Distance</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_distance" class="form-control com_ref_distance" placeholder="Input Distance">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_size" class="col-sm-2  control-label">Size</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_size" class="form-control com_ref_size" placeholder="Input Size">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_value_per_sqm" class="col-sm-2  control-label">Value per Sq. m</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_value_per_sqm" class="form-control com_ref_value_per_sqm" placeholder="Input Value per Sq. m">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <div class="row" style="display: flex;align-items: center;">
                                            <label for="com_ref_total_value" class="col-sm-2  control-label">Total Value</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-pencil fa-fw"></i>
                                                    </span>
                                                    <input type="text" id="com_ref_total_value" class="form-control com_ref_total_value" placeholder="Input Total Value">
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
                    $("#comparable_cif_no").val($("#com_ref_cif_no_name").val());
                    $("#geo_code").val($("#com_ref_geo_code").val());
                    $("#distance").val($("#com_ref_distance").val());
                    $("#size").val($("#com_ref_size").val());
                    $("#value_per_sqm").val($("#com_ref_value_per_sqm").val());
                    $("#total_value").val($("#com_ref_total_value").val());

                    // Close Modal When User Click Submit
                    $("#modal-comparable-reference").modal("hide");
                });

                $("#show-comparable-reference-modal").click(function() {
                    $("#com_ref_cif_no_name").val($("#comparable_cif_no").val());
                    $("#com_ref_geo_code").val($("#geo_code").val());
                    $("#com_ref_distance").val($("#distance").val());
                    $("#com_ref_size").val($("#size").val());
                    $("#com_ref_total_value").val($("#total_value").val());
                });

                $("#comparable_cif_no, #geo_code, #distance, #size, #value_per_sqm, #total_value").closest(".form-group").css("display","none");
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
        });

        return $form;
    }
}
