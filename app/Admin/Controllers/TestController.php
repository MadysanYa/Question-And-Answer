<?php

namespace App\Admin\Controllers;

use App\Models\Test;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TestController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Exam Type';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Test());

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'))->label();
        $grid->column('date', __('Date'))->display(function(){
            if ($this->date) {
                return date('l, jS F Y', strtotime($this->date));
            }
        });
        $grid->column('duration', __('Duration'));
        $grid->column('is_active', __('Is Active'))->bool();
        $grid->column('show_total', __('Show Total'));
        // $grid->column('description', __('Description'));
        $grid->column('created_at', __('Created at'))->display(function(){
            if ($this->created_at) {
                return date('Y-m-d', strtotime($this->created_at));
            }
        });
        // $grid->column('updated_at', __('Updated at'))->display(function(){
        //     if ($this->updated_at) {
        //         return date('Y-m-d', strtotime($this->updated_at));
        //     }
        // });

        $grid->quickSearch('name');
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableColumnSelector();

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
        $show = new Show(Test::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Test());

        $form->text('name', __('Name'))->rules('required|string');
        $form->date('date', __('Date'))->rules('required');
        $form->time('duration', __('Duration'))->default(date('H:i:s'))->rules('required');
        $form->ckeditor('description', __('Rule'))->rules('required');
        $form->switch('is_active', __('Is Active'))->default(false)->rules('required');
        $form->number('show_total', __('SHow Total'))->rules('required');

        return $form;
    }
}
