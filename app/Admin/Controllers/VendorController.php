<?php

namespace App\Admin\Controllers;

use App\Models\Vendor;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Branch;
use App\Models\contracts;

use Illuminate\Support\Facades\Request;

class VendorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Vendor Management';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Vendor);
		$grid->model()->orderBy('id','desc');	
		$grid->column('id', __('Id'))->desc()->sortable();
		$grid->column('vendor_id', __('Vendor ID'));
		$grid->column('company_name', __('Company name'));
		$grid->column('remark', __('Remark'));
		$grid->column('created_at', __('Created_at'));
		$grid->column('updated_at', __('Updated_at'));
		
		
		// No need to change
        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('id' , 'company_name');
		
	

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
        $form = new Form(new Vendor());

		$form->text('vendor_id', __('Vendor ID'));
		$form->text('company_name', __('Company_name'));
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
