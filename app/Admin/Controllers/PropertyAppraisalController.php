<?php

namespace App\Admin\Controllers;

use App\Models\PropertyAppraisal;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\index;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\Request;

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

 public function index(Content $PropertyAppraisal){
    $PropertyAppraisal->header($this->title);
    $PropertyAppraisal->body($this->dashboard());
    $PropertyAppraisal->body($this->grid());
  
   
   return $PropertyAppraisal;
}

        protected function dashboard(){


if(isset($_REQUEST['status']))
   $status =  $_REQUEST['status'];
else 
   $status = '';
       
$Progressing = '';
$Verified = '';
$Approved = '';
$Cancelled ='';

$conditions_Progressing = array('status'=> $status, 'status' => 'Progressing');
$conditions_Verified = array('status'=> $status, 'status' => 'Verified');
$conditions_Approved = array('status'=> $status, 'status' => 'Approved');
$conditions_Cancelled = array('status'=> $status, 'status' => 'Cancelled');

/* 
// if($status != ''){
//     if(isset($_REQUEST['status'])){
//         $Progressing = Invoice::where($conditions_Progressing)->whereIn('Progressing', $cond_status)->count();
//         $Verified = Invoice::where($conditions_Pending)->whereIn('Verified', $cond_status)->count();
//         $Approved = Invoice::where($conditions_Done)->whereIn('Approved', $cond_status)->count();
//         
       
//     }else {
//         $Progressing = Invoice::where($conditions_Progressing)->count();
//         $Verified = Invoice::where($conditions_Pending)->count();
//         $Approved = Invoice::where($conditions_Done)->count();
//         
//     }
   
// }
// else {
//     $Progressing = Invoice::where(['status' => 'Progressing'])->count();
//     $Verified = Invoice::where(['status' => 'Verified'])->count();
//     $Approved = Invoice::where(['status' => 'Approved'])->count();
//     
// } */

$title1 = "Approved";
$value1 = $Approved;
$title2 = "Verified";
$value2 = $Verified;
$title3 = "Progressing";
$value3 = $Progressing;
$title4 = "Cancelled";
$value4 = $Cancelled;



$html = <<<HTML
     <!--   <section >
          
           
      <button style="margin-left: 10px;display: block;background-color: #0331FF; border-radius: 5px; border: 4px ;color: #000000;text-align: center; font-size: 18px;" >Property Appraisal</button>
               
       </section> -->
       <section style="margin: 15px 15px">
          
           
          <button style="block;background-color: #1affa3; color: #000000;text-align: center; font-size: 20px; margin-left:10px">PROCESSING</button>
          <button style="block;background-color: #F6FA6B;color: #000000;text-align: center; font-size: 20px; margin-left:10px">VERIFIED</button>
          <button style="block;background-color: #0E3DFA;color: #000000;text-align: center; font-size: 20px; margin-left:10px">APPROVED</button>
          <button style="block;background-color: #ff1a8c;color: #000000;text-align: center; font-size: 20Px; margin-left:10px">CANCELLED</button>
  </section>
  <section style="margin: 15px 15px;">
                <select style="font-size: 15px; width: 15%">
                    <option value="Province">Province</option>
                    <option value="Sr">Siem Reap</option>
                    <option value="pp">Phonm Penh</option>
                 
                </select>
                <select style="font-size: 15px; width: 15%; margin-left: 10px; ">
                    <option value="District">District</option>
                    <option value="Sen Sok">Sen Sok</option>
                    <option value=" Tuol Kouk">Tuol Kouk</option>
                    <option value=" Russey Keo">Russey Keo</option>
                    <option value="Olympic">Olympic</option>
                    <option value="Takeo">Takeo</option>
                    <option value="Ta Khmau">Ta Khmau</option>
                    <option value="Monivong">Monivong</option>
                    <option value="Beong Keang Kong">Beong Keang Kong</option>
                    <option value="Stueng Mean Chey">Stueng Mean Chey</option>
                </select>
                <select style="font-size: 15px; width: 15%; margin-left: 10px; ">
                    <option value="Commune">Commune</option>
                    <option value="Touk Thla">Touk Thla</option>
                    <option value="Sangkat Chaom Chau"> Chaom Chau</option>
                    <option value="Sangkat Dangkao">Sangkat Dangkao</option> 
                </select>
               
            </section>
         
   
       
HTML;

$html = str_replace('{{title1}}',$title1,$html);
$html = str_replace('{{value1}}',$value1,$html);
$html = str_replace('{{title2}}',$title2,$html);
$html = str_replace('{{value2}}',$value2,$html);
$html = str_replace('{{title3}}',$title3,$html);
$html = str_replace('{{value3}}',$value3,$html);
$html = str_replace('{{title4}}',$title4,$html);
$html = str_replace('{{value4}}',$value4,$html);

return $html;

}	

    protected function grid()
    {
  
               $grid = new Grid(new PropertyAppraisal());        

               $grid->column('id', __('No.'));              
               $grid->column('reference', __('reference'));               
               $grid->column('owner', __('Owner'));
               $grid->column('type', __('Type'));
               $grid->column('property_address', __('Property Address'));
               $grid->column('geo_code', __('Geo Code'));

        /* $grid->column('Action')->display(function(){
        $text = $this->id;
            return "<button style='background: wihte;'> $text</button>";
        }); */

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
        $show = new Show(PropertyAppraisal::findOrFail($id)); 
     


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
        $show->field('photo')->file();

        $show->field('information_type', __(' information_type'));
        $show->field('type_of_access_road', __('type_of_access_road'));
        $show->field('building_status', __('building_status'));
        $show->field('land_title_type', __(' land_title_type'));
        $show->field('land_size_by_measurement', __('land_size_by_measurement'));
        $show->field('customer_name', __('customer_name'));
        $show->field('building_size_per_sqm', __('building_size_per_sqm'));
        $show->field('district_khan', __('district_khan'));
        $show->field('altitude', __('altitude'));
        $show->field('reference', __('reference'));  

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

        $form->column(1/2,function($form){
            
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
            $form->text('telephone', __('telephone'));
            $form->date('report_date', __('Report Date'));
            $form->text('location_type', __('location_type'));
            $form->text('property_type', __('property_type'));
            $form->text('no_of_floor', __('no_of_floor'));
            $form->text('land_size', __('land_size'));
            $form->text('building_size_by_measure', __('building_size_by_measure'));           

        });

        $form->column(1/2,function($form){            
       
            $form->text('collateral_owner', __('collateral_owner'));
            $form->text('province', __('province'));
            $form->text('village', __('village'));
            $form->file('photo', __('photo'));
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
            $form->text ('reference', __('reference'));          

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

