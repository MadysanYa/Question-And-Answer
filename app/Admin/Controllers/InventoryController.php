<?php

namespace App\Admin\Controllers;

use App\Models\Inventory;
use App\Models\Branch;
use App\Models\Transfer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Auth;
use Encore\Admin\Admin;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Layout\Content;

class InventoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Inventory';
	
	
	
	public function index(Content $content){
			$content->header($this->title);
			$content->body($this->dashboard());
			$content->body($this->grid());
			return $content;
	}
	
	protected function dashboard(){
		
		
		if(isset($_REQUEST['branch_code']))
			$branch_code =  $_REQUEST['branch_code'];
		else 
			$branch_code = '';
		
		if(isset($_REQUEST['item_type'])){
			$cond_item_type = $_REQUEST['item_type'];
		}
		else {
			$cond_item_type = array();
		}
		
		$instock = '';
		$using = '';
		$spare = '';
		$broken = '';
		
		$conditions_instock = array('branch_code'=> $branch_code, 'status' => 'instock');
		$conditions_using = array('branch_code'=> $branch_code, 'status' => 'using');
		$conditions_spare = array('branch_code'=> $branch_code, 'status' => 'spare');
		$conditions_broken = array('branch_code'=> $branch_code, 'status' => 'broken');
		
		/*
		$conditions_instock = array_merge($cond_item_type, $conditions_instock);
		$conditions_using = array_merge($cond_item_type, $conditions_using);
		$conditions_spare = array_merge($cond_item_type, $conditions_spare);
		$conditions_broken = array_merge($cond_item_type, $conditions_broken);
		*/
		
		if($branch_code != ''){
			if(isset($_REQUEST['item_type'])){
				$instock = Inventory::where($conditions_instock)->whereIn('item_type', $cond_item_type)->count();
				$using = Inventory::where($conditions_using)->whereIn('item_type', $cond_item_type)->count();
				$spare = Inventory::where($conditions_spare)->whereIn('item_type', $cond_item_type)->count();
				$broken = Inventory::where($conditions_broken)->whereIn('item_type', $cond_item_type)->count();
			}else {
				$instock = Inventory::where($conditions_instock)->count();
				$using = Inventory::where($conditions_using)->count();
				$spare = Inventory::where($conditions_spare)->count();
				$broken = Inventory::where($conditions_broken)->count();
			}
			
		}
		else {
			$instock = Inventory::where(['status' => 'instock'])->count();
			$using = Inventory::where(['status' => 'using'])->count();
			$spare = Inventory::where(['status' => 'spare'])->count();
			$broken = Inventory::where(['status' => 'broken'])->count();
		}
		
		$title1 = "IN STOCK";
		$value1 = $instock;
		$title2 = "USING";
		$value2 = $using;
		$title3 = "SPARE";
		$value3 = $spare;
		$title4 = "BROKEN";
		$value4 = $broken;
		
		
		$html = <<<HTML
			<div class="row">
				<div class="col-lg-3" style="padding: 0 15px 15px 15px; height: 100px;text-align: center;">
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
	 

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Inventory);
		
		$grid->rows(function (Grid\Row $row){
			$currentPage = 1;
			$perPage = 20;
			if(isset($_REQUEST['page']))
				$currentPage = $_REQUEST['page'];
			
			if(isset($_REQUEST['per_page']))
				$perPage = $_REQUEST['per_page'];
			
			$row->column('No',$row->number+1 + ($currentPage-1) * $perPage);
			
		});
		
		$grid->column('No');

		$grid->column('item_type', __('Type'))->display(function($item_type){
			
			$color = '#00c0ef';
			if($item_type == 'pc')
				$color = '#00c0ef';
			if($item_type == 'monitor')
				$color = '#4c047d';
			if($item_type == 'ipphone')
				$color = '#7d046d';
			if($item_type == 'laptop')
				$color = '#7d0442';
			if($item_type == 'tablet')
				$color = '#047d71';
			if($item_type == 'phone')
				$color = '#047d4c';
			if($item_type == 'pinpad')
				$color = '#167d04';
			if($item_type == 'passbook')
				$color = '#577d04';
			if($item_type == 'printer')
				$color = '#7d7d04';
			if($item_type == 'chequeprinter')
				$color = '#7d4e04';
			if($item_type == 'scanner')
				$color = '#7d2e04';
			if($item_type == 'projector')
				$color = '#042c7d';
			if($item_type == 'billmachine')
				$color = '#04797d';
			if($item_type == 'atm')
				$color = '#7d0404';
			if($item_type == 'ups')
				$color = '#65d6bf';
			
			return '<div style="background:' . $color .';color: white;padding: 2px;text-align: center;border-radius: 15px;">' . strtoupper($item_type) . '</div>' ;
		})->sortable()->filter(['pc'=>'PC', 'monitor'=>'Monitor', 'ipphone'=>'IP Phone', 'laptop'=>'Laptop','table' => 'Tablet', 'phone' => 'Phone',
		                        'pinpad' => 'PinPad', 'passbook' => 'Passbook', 'chequeprinter'=>'Cheque Printer', 'scanner' => 'scanner','printer' => 'Printer', 'billmachine' => 'Bill Machine', 'atm' => 'ATM', 'projector' => 'Projector']);
		
		Admin::script("$('.modal-backdrop').remove();");
		
        $grid->column('model', __('Model'))->sortable();
		$grid->column('serial', __('Serial'))->sortable();
		$grid->column('os', __('OS'))->sortable();
		$grid->column('cpu', __('CPU'))->sortable();
		$grid->column('ram', __('RAM (GB)'))->sortable();
		$grid->column('hdd', __('HDD Size'))->sortable();
		$grid->column('ssd', __('SSD Size'))->sortable();
		$grid->column('mac', __('MAC'))->sortable();
		$grid->column('status', __('Status'))->display(function($status){
			$color = '';
			if($status == 'instock')
				$color = '#abffbd';
			if($status == 'using')
				$color = '#ffc0ab';
			if($status == 'disposal')
				$color = '#d4d2fc';
			if($status == 'spare')
				$color = '#f1fa75';
			if($status == 'broken')
				$color = 'red;color: white;';
			
			return '<div style="background:' . $color . ';padding: 2px;text-align: center;border-radius: 15px;">' . ucwords($status) . '</div>' ;
		})->sortable()->filter(['using'=>'Using', 'instock'=>'In Stock', 'spare'=>'Spare', 'disposal'=>'Disposal' , 'broken' => 'Broken']);
		$grid->column('fixed_asset', __('Fixed Asset'))->sortable();
		$grid->column('asset_number', __('Asset Number'))->sortable();
		$grid->column('branch_code', __('Branch'))->display(function($branch_code){
			$branch = Branch::where('branch_code',$branch_code)->first();
			if($branch == null) return '';
			return $branch->branch_name == null? '' : $branch->branch_name;
			
		});
		
		$grid->column('remark', __('Remark'))->sortable();
		
		$grid->column('updated_at', __('Updated date'))->display(function ($updated_at){
			if($updated_at != null)
				return date('Y-m-d',strtotime($updated_at));
			if($this->created_at != null)
				return date('Y-m-d',strtotime($this->created_at));
			return '';
		});
		$grid->column('updated_by', __('Updated by'))->sortable();
		
		
		$grid->column('Transfer')->display(function(){ return 'Transfer';})->modal('Transfer', function($model){
			
			$form = new Form(new Transfer());
			
			$branch_code = $model->branch_code;
			
			$branch = Branch::where('branch_code',$branch_code)->first();
			
			$form->hidden('inventory_id', __('Inventory ID'))->default($model->id);
			
			$form->hidden( 'from_branch', 'From Branch')->value($model->branch_code);
			$form->text( 'from_branch_label', 'From Branch')->value($branch->branch_name)->disable();
			
			
			$form->select('to_branch','To Branch')->options(Branch::all()->pluck('branch_name', 'branch_code'))->rules('required');
				
			
			$form->text('department', __('Department'));
			$form->text('emp_id', __('Employee ID'))->rules('required');
			$form->text('emp_name', __('Employee Name'))->rules('required');
			$form->date('transfered_date', __('Transfered Date'));
			$form->text('delivery_by', __('Delivery By'));
			$form->text('approved_by', __('Approved By'));
			$form->date('approved_date', __('Approved Date'));
			$form->text('received_by', __('Received By'))->rules('required');
			$form->date('received_date', __('Received date'))->rules('required');
			//$form->select('return', __('Return'))->options(['Yes'=>'Yes']);
			$form->radio('return', __('Return'))->options([''=>'No','Return'=>'Yes'])->default('No');
			$form->textarea('remark', __('Remark'));
			
			$form->hidden('updated_by', __('Updated by'))->default(Auth::user()->name);
			
			
			$form->saving(function(Form $form){
				Admin::script("$('.modal-backdrop').remove();");
			});
			
			$form->saved(function(Form $form){
				admin_toastr('Save completed','success');
				
				return redirect('/admin/inventory');
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

			$form->tools(function(Form\Tools $tools){
				$tools->disableList();
			});
			$form->setAction('../api/transfer');
			
			return $form;
			
		});
		
		$grid->column('History')->display(function(){return 'View';})->modal('Transfer History',function($model){
			$transfer_history =  $this->transfers($model->id)->orderByDesc('id')->get()->map(function ($transfer){
				
				$transfer->return = ($transfer->return == 'Return'? '<span style="background: #63db18;padding: 3px;border-radius: 15px;">&nbsp;&nbsp;&nbsp;Return&nbsp;&nbsp;&nbsp;</span>' : '');
				
				$branch = Branch::where('branch_code',$transfer->from_branch)->first();
				if($branch != null)
					$transfer->from_branch = $branch->branch_name;
				
				
				$branch = Branch::where('branch_code',$transfer->to_branch)->first();
				if($branch != null)
					$transfer->to_branch = $branch->branch_name;
				
				return $transfer->only(['from_branch','to_branch','department', 'emp_id', 'emp_name', 'delivery_by','transfered_date', 'received_by', 'received_date', 'updated_by','return']);
			}
			);
			
			
			return new Table(['From Branch','To Branch','Department', 'Emp ID', 'Employee Name', 'Delivered by','Transfer date', 'Received by', 'Received date', 'Updated by', 'Status'], $transfer_history->toArray());
		});
		
		/*
		$grid->column('id','Current Holder')->display(function($id){
		
			$transfer = $this->usedByEmployee($id);
			if($transfer != null){
				if($transfer->return == 'Return') 
					$transfer->emp_name = 'ICT';
				return $transfer->emp_name;
			}
			return '';
		});*/
		
		$grid->column('current_holder','Current Holder');
		
		$grid->filter(function($filter){
			$filter->disableIdFilter();
			$filter->equal('branch_code');
		});
		
		
        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('serial' , 'model', 'fixed_asset','asset_number', 'branch_code','remark','current_holder');

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
        $show = new Show(Inventory::findOrFail($id));
        // $show->field('id', __('Id'));
        // $show->field('name', __('Name'));
        // $show->field('username', __('Username'));
        // $show->field('password', __('Password'));
        // $show->field('remark', __('Remark'));
        // $show->field('updated_at', __('Updated at'));
        // $show->field('created_at', __('Created at'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Inventory());
       		
		$form->select('item_type', __('Type'))->options(['pc'=>'PC', 'monitor'=>'Monitor', 'ipphone'=>'IP Phone', 'laptop'=>'Laptop','table' => 'Tablet', 'phone' => 'Phone', 
		                                                 'pinpad' => 'PinPad', 'passbook' => 'Passbook', 'chequeprinter'=>'Cheque Printer', 'scanner' => 'scanner','printer' => 'Printer', 'billmachine' => 'Bill Machine', 'atm' => 'ATM', 'projector' => 'Projector' , 'ups'=>'UPS'])->rules('required');
        $form->text('model', __('Model'))->rules('required');
		$form->text('serial', __('Serial'))->rules('required');
		$form->text('os', __('OS'));
		$form->text('cpu', __('CPU'));
		$form->text('ram', __('RAM (GB)'));
		$form->text('hdd', __('HDD Size'));
		$form->text('ssd', __('SSD Size'));
		$form->text('mac', __('MAC'));
		$form->select('status', __('Status'))->options(['using'=>'Using', 'instock'=>'In Stock', 'spare'=>'Spare', 'broken' => 'Broken', 'disposal'=>'Disposal'])->rules('required');
		$form->text('fixed_asset', __('Fixed Asset'));
		$form->text('asset_number', __('ICT Asset Number'));
		$form->select('branch_code')->options(Branch::all()->pluck('branch_name', 'branch_code'))->rules('required');
		
		$form->textarea('remark', __('Remark'));
		
		
		$form->hidden('updated_by', __('Updated by'))->default(Auth::user()->name)->disable();
		$form->saving(function (Form $form){
			$form->updated_by = Auth::user()->name;
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
		
		$form->tools(function(Form\Tools $tools){
				$tools->disableList();
			});


        return $form;
    }
	
	
}
