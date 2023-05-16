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
        $grid->column('test_id', __('Exam Type'))->display(function($testId){
            $test = Test::where('id', $testId)->first();
            return $test->name ?? null;
        });
        $grid->column('score', __('Score'))->label();
        $grid->column('started_at', __('Started At'))->display(function(){
            if ($this->started_at) {
                return date('Y-m-d', strtotime($this->started_at));
            }
        });
        $grid->column('ended_at', __('Ended At'))->display(function(){
            if ($this->ended_at) {
                return date('Y-m-d', strtotime($this->ended_at));
            }
        });
        $grid->column('time_taken', __('Time Taken'));
        
        // $grid->column('created_at', __('Created At'))->display(function(){
        //     if ($this->created_at) {
        //         return date('Y-m-d', strtotime($this->created_at));
        //     }
        // });
        // $grid->column('updated_at', __('Updated at'))->display(function(){
        //     if ($this->updated_at) {
        //         return date('Y-m-d', strtotime($this->updated_at));
        //     }
        // });

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
        $show->field('user_id', __('User ID'));
        $show->field('test_id', __('Exam Type'));
        $show->field('score', __('Score'));
        $show->field('time_taken', __('Time Taken'));
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
            $form->date('started_at', __('Started At'))->rules('required');
            $form->decimal('score', __('Score'))->rules('required');
        });

        $form->column(6,function($form){
            $form->select('test_id', __('Exam Type'))->rules('required')->options(function(){
                return Test::all()->pluck('name', 'id');
            });
            $form->date('ended_at', __('Ended At'))->rules('required');
            $form->time('time_taken', __('Time Taken'))->default(date('H:i:s'));
        });

        $form->footer(function ($footer) {
            $footer->disableReset();
        });

        return $form;
    }
}
