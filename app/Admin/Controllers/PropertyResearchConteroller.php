<?php

namespace App\Admin\Controllers;

use App\Models\PropertyResearch;
use App\Models\Province;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Branch;
use App\Models\contracts;
use App\Models\District;
use App\Models\Commune;
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
        $grid->column('property_reference', __('Reference'));
        $grid->column('access_road_name', __('Owner'));
        $grid->column('information_type', __('Type'));
        $grid->column('location_type', __('Property Address'));
        $grid->column('build_size', __('Geo Code'));
		
		
		// No need to change (hided)
        $grid->disableExport();
        $grid->disableFilter();

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
        $show = new Show( PropertyResearch::findOrFail($id));
        $show->field('information_type', __('Information Type'));
        $show->field('property_reference', __('Property Reference'));
        $show->field('access_road_name', __('Access Road Name'));
        $show->field('no_of_floor', __('No of Floor'));
        $show->field('land_size', __('Land Size'));
        $show->field('build_value_per_sqm', __('Build Value per Sqm'));
        $show->field('district', __('District/Khan'));
        $show->field('contact_no', __('Contact No.'));
        $show->field('remark', __('Remark'));
        $show->field('location_type', __('Location Type'));
        $show->field('property_type', __('Property Type'));
        $show->field('land_title_type', __('Land Title Type'));
        $show->field('property_value_per_sqm', __('Property per Sqm'));
        $show->field('property_market_value', __('Property Market Value'));
        $show->field('commune', __('Commune/Sangkat'));
        $show->field('altitude', __('Altitude'));
        $show->field('type_of_access_road', __('Type of Access Road'));
        $show->field('borey', __('Borey'));
        $show->field('information_date', __('Information Date'));
        $show->field('build_size', __('Building Size'));
        $show->field('province', __('Province'));
        $show->field('village', __('Village'));
        $show->field('laltitude', __('Laltitude'));
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

        $form->column(1/3, function ($form){
            $form->select('information_type', __('Information Type'));

            // Region Testing
            // $form->select('information_type', __('Information Type'))->options(function(){
            //     return Province::all()->pluck('province_name', 'id');
            // });

            // Branch Testing
            // $form->select('information_type', __('Information Type'))->options(function(){
            // return Branch::all()->pluck('branch_name', 'id');
            // });

            $form->text('property_reference', __('Property Reference'));
            $form->text('access_road_name', __('Access Road Name'));
            $form->text('no_of_floor', __('No of Floor'));
            $form->text('land_size', __('Land Size'));
            $form->text('build_value_per_sqm', __('Build Value per Sqm'));

            // District select Commune
            $form->select('district_id', __('District'))->options(function(){
                // return District::all()->pluck('district_name', 'id');
            })->load('commune_id', __('../../api/commune'));
            // ->load('commune_id', __('../../api/commune'));
            // $form->select('district_id', __('District/Khan'));

            $form->text('contact_no', __('Contact No.'));
            $form->text('remark', __('Remark'));
        });

        $form->column(1/3, function ($form){
            $form->select('location_type', __('Location Type'));
            $form->select('property_type', __('Property Type'));
            $form->select('land_title_type', __('Land Title Type'));
            $form->text('property_value_per_sqm', __('Property per Sqm'));
            $form->text('property_market_value', __('Property Market Value'));

            $form->select('commune_id', __('Commune'))->options(function(){
                return Commune::all()->pluck('commune_name', 'id');
            });
            // ->load('commune_id', __('../../api/commune'));
            // $form->select('commune', __('Commune/Sangkat'));
            $form->text('altitude', __('Altitude'));
        });		

        $form->column(1/3, function ($form){
            $form->select('type_of_access_road', __('Type of Access Road'));
            $form->text('borey', __('Borey'));
            $form->date('information_date', __('Information Date'));
            $form->text('build_size', __('Building Size'));

            // Province select District
            $form->select('province', __('Province'))->options(function(){
                return Province::all()->pluck('province_name', 'id');
            })->load('district_id', __('../../api/district'));
            // $form->select('province', __('Province'));

            $form->select('village', __('Village'));
            $form->text('laltitude', __('Laltitude'));
        });		

        // Other
        // $form->column(1/2, function ($form){
        //     $form->select('region',__('Region'))->options(['Phnom Penh'=>'Phnom Penh', 'Siem Reap'=>'Siem Reap']);
        //     $form->select('branch',__('Branch'))->options(['LC'=>'8187(LOAN CENTER)','CC'=>'8186(CARLOAN CENTER)','CLB'=>'8185(COMMERCIAL LENDING BUSINESS)']);
        //     $form->date('requested_date', __('Requested Date'))->rules('required');
        //     $form->text('cif_no', __('CIF No.'))->rules('required');
        //     $form->text('loan_officer', __('Loan Officer'))->rules('required');
        //     $form->text('reference', __('Property Reference '))->rules('required');
        //     $form->text('access_name', __('Access Road Name'))->rules('required');
        //     $form->text('borey', __('Borey'))->rules('required');
        //     $form->text('land_titleno', __('Land title No'))->rules('required');
        //     $form->text('telephone', __('Telephone'))->rules('required');
        //     $form->select('location_type', __('Location Type'))->options(['Residential Area'=>'Residential Area', 'CA'=>'Commercial Area','IA'=>'Industrial Area']);
        //     $form->select('property_type', __('Property Type'))->options(['Vacant Land'=>'Vacant Land','FH'=>'Flat House','CD'=>'Cando']);
        //     $form->text('no_floor', __('No. of Floor'))->rules('required');
        //     $form->text('land_size', __('Land Size'))->rules('required');
        //     $form->select('information_type', __('Information Type'))->options(['Indication'=>'Indication']);
        //     $form->select('type_ofaccess_road', __('Type of Access Road'))->options(['NR'=>'National Road', 'PR'=>'Paved Road','UR'=>'Unpaved Road']);
        //     $form->text('building_status', __('Building Status'))->rules('required');
        //     $form->select('land_titletype', __('Land Title Type'))->options(['HT'=>'Hard Title', 'ST'=>'Soft Title']);
        //     $form->text('building_size', __('Building Size'))->rules('required');
        // });
       
            
        // $form->column(1/2, function ($form){
        //     $form->text('owner', __('Collateral Owner'))->rules('required');
        //     $form->select('province', __('Province'))->options(['Phnom Penh'=>'Phnom Penh', 'Takeo'=>'Takeo','Siem Reap'=>'Siem Reap']);
        //     $form->text('village', __('Village'))->rules('required');
        //     $form->multipleFile('photo', __('Photo'))->removable();
        //     $form->text('customer_name', __('Customer Name '))->rules('required');
        //     $form->select('district', __('District/Khan'))->options(['Sen Sok'=>'Sen Sok', 'Tuol Kouk'=>'Tuol Kouk']);
        //     $form->text('altitude', __('Altitude'))->rules('required');
        //     $form->text('remark', __('Remark'))->rules('required');
        //     $form->text('client_contact', __('client Contact No. '))->rules('required');
        //     $form->select('commune', __('Commune/Sangkat'))->options(['Tuek Thla'=>'Tuek Thla', 'PD'=>' Phsar Depou Ti Muoy']);
        //     $form->text('latitude', __('Latitude'))->rules('required');
          
        // });

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