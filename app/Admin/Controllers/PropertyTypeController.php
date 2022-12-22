<?php

namespace App\Admin\Controllers;
use App\Admin\Actions\Post\Replicate;
use App\Models\PropertyType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Auth;


class PropertyTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Property Type Management';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PropertyType);
        $grid->column('id', __('ID'));
      //  $grid->column('region_code', __('Region code'))->editable()->sortable();
        $grid->column('property_type_name', __('Property Type Name'))->editable()->sortable();
		
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
        $show = new Show(PropertyType::findOrFail($id));
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
        $form = new Form(new PropertyType());
    //    $form->text('region_code', __('Region Code'))->rules('required');
        $form->text('property_type_name', __('Property Type Name'));
        
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
