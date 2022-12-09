<?php

namespace App\Admin\Controllers;
use App\Admin\Actions\Post\Replicate;
use App\Models\Ipt;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Auth;


class IptController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'IPT User Information Management';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Ipt);

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
		
        //$grid->column('id', __('ID'));
        $grid->column('branch_code', __('Branch code'))->editable()->sortable();
        $grid->column('ext', __('Ext'))->editable()->sortable();
        $grid->column('did', __('DID'))->editable()->sortable();
		$grid->column('emp_id', __('Emp-ID'))->editable()->sortable();
        $grid->column('employee_name', __('User Name'))->editable()->sortable();
		$grid->column('department', __('Title & Department'))->editable()->sortable();
		$grid->column('device_type', __('Device Type'))->editable();
		$grid->column('grade', __('Grade'))->editable();
		$grid->column('pickup_number', __('Pickup Number'))->editable()->sortable();
		$grid->column('ipphone_mac', __('IP-Phone MAC'))->editable();
		$grid->column('os', __('OS'))->editable();
		$grid->column('model', __('Model/Processor'))->editable();
		$grid->column('ram', __('RAM'))->editable();
		$grid->column('hostname', __('Host Name'))->editable();
		$grid->column('pc_ip', __('PC IP'))->editable()->sortable();
		$grid->column('phone_ip', __('Phone IP'))->editable();
		$grid->column('subnet', __('Subnet Mask'))->editable();
		$grid->column('gateway', __('Gateway'))->editable();
		$grid->column('tftp1', __('TFTP/MOH1'))->editable();
		$grid->column('tftp2', __('TFTP/MOH2'))->editable();
		$grid->column('vlan', __('VLAN'))->editable();
		$grid->column('remark', __('Remark'))->editable();
		$grid->column('created_by', __('Updated by'));
		$grid->column('updated_at')->display(function ($updated_at){
			if($updated_at != null)
				return date('Y-m-d',strtotime($updated_at));
			if($this->created_at != null)
				return date('Y-m-d',strtotime($this->created_at));
			return '';
		});
		
		$grid->actions(function ($actions){
			$actions->add(new Replicate);
		});
		
		
		$grid->filter(function($filter){
			$filter->disableIdFilter();
			$filter->equal('branch_code');
		});
		
		
		
        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('emp_id' , 'employee_name','pickup_number', 'remark','ext');

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
        $show = new Show(Ipt::findOrFail($id));
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
        $form = new Form(new Ipt());
        $form->text('branch_code', __('Branch Code'))->rules('required');
        $form->text('ext', __('Extension'));
        $form->text('branch_code', __('Branch code'));
        $form->text('ext', __('Ext'));
        $form->text('did', __('DID'));
		$form->text('emp_id', __('Emp-ID'));
        $form->text('employee_name', __('User Name'));
		$form->text('department', __('Title & Department'));
		$form->text('device_type', __('Device Type'));
		$form->text('grade', __('Grade'));
		$form->text('pickup_number', __('Pickup Number'));
		$form->text('ipphone_mac', __('IP-Phone MAC'));
		$form->text('os', __('OS'));
		$form->text('model', __('Model/Processor'));
		$form->text('ram', __('RAM'));
		$form->text('hostname', __('Host Name'));
		$form->text('pc_ip', __('PC IP'));
		$form->text('phone_ip', __('Phone IP'));
		$form->text('subnet', __('Subnet Mask'));
		$form->text('gateway', __('Gateway'));
		$form->text('tftp1', __('TFTP/MOH1'));
		$form->text('tftp2', __('TFTP/MOH2'));
		$form->text('vlan', __('VLAN'));
		$form->text('remark', __('Remark'));
		$form->text('created_by', __('Updated by'))->default(Auth::user()->name)->disable();
		
		
		$form->saving(function (Form $form){
			$form->created_by = Auth::user()->name;
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
