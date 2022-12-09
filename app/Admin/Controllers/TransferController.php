<?php

namespace App\Admin\Controllers;

use App\Models\Transfer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Branch;
use App\Models\contracts;

use Illuminate\Support\Facades\Request;

class TransferController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Transfer History';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Transfer);
		
		$grid->column('inventory_id', __('number'));
		
		$grid->column('to_branch', __('to branch'))->display(function($to_branch){
			$branch = Branch::where('branch_code', $to_branch)->first();
			return $branch->branch_name;
		});
		
		$grid->column('from_branch', __('From branch'))->display(function($to_branch){
			$branch = Branch::where('branch_code', $to_branch)->first();
			return $branch->branch_name;
		});
		
	
		$grid->column('approved_date', __('approved_date'));
		$grid->column('recevied_by', __('recevied_by'));
		$grid->column('return', __('return'));
		$grid->column('emp_name', __('Name'));	
        $grid->column('emp_id', __('Emp ID'));
		$grid->column('department', __('Department'));
		$grid->column('transfer_date', __('transfer_date'));
		$grid->column('received_date', __('received_date'));
		$grid->column('remark', __('remark'));
		$grid->column('updated_at', __('Updated_at'));
		$grid->column('created_at', __('created_at'));
		
		
		// No need to change
        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('emp_id' , 'emp_name');
		
	

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
        $form = new Form(new Transfer());
        $form->text('emp_id', __('EMP_ID / Name'));


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
