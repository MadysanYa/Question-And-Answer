<?php

namespace App\Admin\Controllers;
use App\Admin\Actions\Post\Replicate;
use App\Models\Branch;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Auth;


class BranchController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Branches';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Branch);
        $grid->column('id', __('ID'));
        $grid->column('branch_code', __('Branch code'))->editable()->sortable();
        $grid->column('branch_name', __('Branch Name'))->editable()->sortable();

        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('id' , 'branch_code','branch_name');

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
        $show = new Show(Branch::findOrFail($id));
        
        $show->field('id', __('Id'));
        $show->field('branch_code', __('Branch code'));
        $show->field('branch_name', __('Branch Name'));
        $show->field('created_at', __('Created at'))->as(function(){
            if ($this->created_at) {
                return date('Y-m-d', strtotime($this->created_at));
            };
        });
        $show->field('updated_at', __('Updated at'))->as(function(){
            if ($this->updated_at) {
                return date('Y-m-d', strtotime($this->updated_at));
            };
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */

    protected function form()
    {
        $form = new Form(new Branch());
        $form->text('branch_code', __('Branch Code'))->rules('required');
        $form->text('branch_name', __('Branch Name'))->rules('required');

        $form->footer(function ($footer) {
            // disable reset btn
            // $footer->disableReset();
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
