<?php

namespace App\Admin\Controllers;

use App\Models\Invoice;
use App\Models\Inventory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Auth;
use Encore\Admin\Admin;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Layout\Content;

class InvoiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Invoice Management';

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
		
		
		if(isset($_REQUEST['status']))
			$status =  $_REQUEST['status'];
		else 
			$status = '';
				
		$Progressing = '';
		$Pending = '';
		$Done = '';
		$ETC = '';
		
		$conditions_Progressing = array('status'=> $status, 'status' => 'Progressing');
		$conditions_Pending = array('status'=> $status, 'status' => 'Pending');
		$conditions_Done = array('status'=> $status, 'status' => 'Done');
		$conditions_ETC = array('status'=> $status, 'status' => 'ETC');
		
		/*
		$conditions_Progressing = array_merge($cond_status, $conditions_Progressing);
		$conditions_Pending = array_merge($cond_status, $conditions_Pending);
		$conditions_Done = array_merge($cond_status, $conditions_Done);
		$conditions_broken = array_merge($cond_status, $conditions_broken);
		*/
		
		if($status != ''){
			if(isset($_REQUEST['status'])){
				$Progressing = Invoice::where($conditions_Progressing)->whereIn('Progressing', $cond_status)->count();
				$Pending = Invoice::where($conditions_Pending)->whereIn('Pending', $cond_status)->count();
				$Done = Invoice::where($conditions_Done)->whereIn('Done', $cond_status)->count();
				$ETC = Invoice::where($conditions_Done)->whereIn('ETC', $cond_status)->count();
				
			}else {
				$Progressing = Invoice::where($conditions_Progressing)->count();
				$Pending = Invoice::where($conditions_Pending)->count();
				$Done = Invoice::where($conditions_Done)->count();
				$ETC = Invoice::where($conditions_ETC)->count();
			}
			
		}
		else {
			$Progressing = Invoice::where(['status' => 'Progressing'])->count();
			$Pending = Invoice::where(['status' => 'Pending'])->count();
			$Done = Invoice::where(['status' => 'Done'])->count();
			$ETC = Invoice::where(['status' => 'ETC'])->count();
		}
		
		$title1 = "Done";
		$value1 = $Done;
		$title2 = "Pending";
		$value2 = $Pending;
		$title3 = "Progressing";
		$value3 = $Progressing;
		$title4 = "ETC";
		$value4 = $ETC;
		
		
		
		$html = <<<HTML
			<div class="row">
				<div class="col-lg-3" style="padding: 0 10px 15px 15px; height: 100px;text-align: center;">
						<div style="background-color:#abffbd;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
						{{title1}}
							<label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value1}}</label>
						</div>
				</div>
				<div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
						<div style="background-color:#ffc0ab;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
						{{title2}}
							<label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value2}}</label>
						</div>
				</div>
				<div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
						<div style="background-color:#f1fa75;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
						{{title3}}
							<label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value3}}</label>
						</div>
				</div>
				<div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
						<div style="background-color:red;height: 100%;width: 100%; font-size: 24px;font-weight: bold;padding: 10px; border-radius: 10px; box-shadow: rgba(50,50,93,0.25) 0px 6px 12px -2px, rgba(0,0,0, 0.3) 0px 3px 7px -3px;">
						{{title4}}
							<label style="font-size: 40px; font-weight: bold;margin-left: 20px;">{{value4}}</label>
						</div>
				</div>
				
			
			</div>
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
        $grid = new Grid(new Invoice);
		
		$grid->rows(function (Grid\Row $row){
			$currentPage = 1;
			$perPage = 20;
			if(isset($_REQUEST['page']))
				$currentPage = $_REQUEST['page'];
			
			if(isset($_REQUEST['per_page']))
				$perPage = $_REQUEST['per_page'];
			
			$row->column('No',$row->number+1 + ($currentPage-1) * $perPage);
			
		});
		
		
		

	
		$grid->model()->orderBy('id','desc');
		$grid->column('id', __('ID'))->desc()->sortable();
		$grid->column('vendor', __('Vendor'));
		$grid->column('invoice_number', __('Invoice Number'));
		$grid->column('invoice_date', __('invoice Date'));	
        $grid->column('subject', __('Subject'));
		$grid->column('total_amount', __('Total Amount'));
		$grid->column('received_date', __('Received Date'));
		$grid->column('received_by', __('Received By'));
		$grid->column('delivered_date', __('Delivered Date'));
		$grid->column('status', __('Status'))->display(function($status){
			
			
			if($status == 'Progressing')
				$color = '#f1fa75';
			if($status == 'Pending')
				$color = '#ffc0ab';
			if($status == 'Done')
				$color = '#abffbd';
			if($status == 'ETC')
				$color = 'red;color: black;';
							
			return '<div style="background:' . $color . ';padding: 2px;text-align: center;border-radius: 15px;">' . $status . '</div>' ;
		})->sortable();
		
		$grid->column('remark', __('Remark'));
	
		
		// No need to change
        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('vendor' , 'invoice_number', 'subject');
		
	

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
        $show = new Show(Network::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Invoice());
        $form->text('vendor', __('Vendor'));
		$form->text('invoice_number', __('Invoice No'));
		$form->date ('invoice_date', 'invoice date')-> rules('required');	
        $form->text('subject', __('Subject'));
		$form->text('total_amount', __('Total Amount'));
		$form->date ('received_date', 'Received Date')-> rules('required');
		$form->text('received_by', __('Received By'));
		$form->date ('delivered_date','delivered_date') -> rules('required');
		$form->select('status', __('Status'))->options(['Progressing' => 'Progressing', 'Pending' => 'Pending', 'Done' => 'Done','ETC' => 'ETC'])->required();
		$form->text('remark', __('Remark'));
		

       
	
		


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
