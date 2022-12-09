<?php

namespace App\Admin\Controllers;

use App\Models\Mobileapp;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MobileappController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Mobile App Management';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Mobileapp());

        $grid->column('id', __('ID'));
        $grid->column('name', __('App Name'))->sortable()->modal('', function($model){
			
			 $show = new Show(Mobileapp::findOrFail($model['id']));
			 $show->panel()->tools(function ($tool){
				 $tool->disableEdit();
				 $tool->disableList();
				 $tool->disableDelete();
			 });
			  return $show;
		});
        $grid->column('username', __('Username'));
        $grid->column('password', __('Password'));
		$grid->column('url', __('URL'));
        $grid->column('remark', __('Remark'));
		//$grid->column('updated_at', __('Updated date'));
        $grid->disableExport();
        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('name' , 'username', 'remark');


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
        $show = new Show(Mobileapp::findOrFail($id));

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
        $form = new Form(new Mobileapp());

        $form->text('name', __('Name'))->rules('required');
        $form->text('username', __('Username'))->rules('required');
        $form->text('password', __('Password'))->rules('required');
		$form->text('url', __('URL'));
        $form->textarea('remark', __('Remark'));
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
