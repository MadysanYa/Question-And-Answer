<?php

namespace App\Admin\Controllers;

use App\Models\Test;
use App\Models\Result;
use App\Models\UserAdmin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Controllers\AdminController;

class ResultController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Result';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Result());

        $grid->column('id', __('ID'));
        $grid->column('user_id', __('User Name'))->display(function($userId){
            $user = UserAdmin::where('id', $userId)->first();
            return $user->username ?? null;
        });
        $grid->column('test_id', __('Test Type'))->display(function($testId){
            $test = Test::where('id', $testId)->first();
            return $test->name ?? null;
        });
        $grid->column('score', __('Score'))->label();
        $grid->column('time_taken', __('Time taken'));
        $grid->column('created_at', __('Created at'))->display(function(){
            if ($this->created_at) {
                return date('Y-m-d', strtotime($this->created_at));
            }
        });
        $grid->column('updated_at', __('Updated at'))->display(function(){
            if ($this->updated_at) {
                return date('Y-m-d', strtotime($this->updated_at));
            }
        });

        $grid->quickSearch();
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
        $show = new Show(Result::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('test_id', __('Test id'));
        $show->field('score', __('Score'));
        $show->field('time_taken', __('Time taken'));
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
        $form = new Form(new Result());

        $form->column(6,function($form){
            $form->select('user_id', __('User Name'))->rules('required')->options(function(){
                return UserAdmin::all()->pluck('username', 'id');
            });
            $form->decimal('score', __('Score'))->rules('required');
        });

        $form->column(6,function($form){
            $form->select('test_id', __('Test Type'))->rules('required')->options(function(){
                return Test::all()->pluck('name', 'id');
            });
            $form->time('time_taken', __('Time taken'))->default(date('H:i:s'));
        });

        $form->footer(function ($footer) {
            $footer->disableReset();
        });

        return $form;
    }
}
