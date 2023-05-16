<?php

namespace App\Admin\Controllers;

use App\Models\Question;
use App\Models\Test;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Question';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Question());

        $grid->column('id', __('ID'));
        $grid->column('test_id', __('Exam Type'))->display(function($testId){
            $text = Test::where('id', $testId)->first();
            return $text->name ?? null;
        });
        $grid->column('question_text', __('Question'));
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
        $show = new Show(Question::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('test_id', __('Exam id'));
        $show->field('question_text', __('Question text'));
        $show->field('created_at', __('Created at'));
        // $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Question());

        $form->select('test_id', __('Exam Type'))->rules('required')->options(function(){
            return Test::all()->pluck('name', 'id');
        });
        $form->text('question_text', __('Question'))->rules('required');
        
        // ADD ANSWER
        $form->hasMany('answers', __('Create Answers'), function (Form\NestedForm $form) {
            $form->text('answer_text', __('Answer'))->rules('required');
            $form->switch('is_correct', __('Is Correct'))->default(false)->rules('required');
        })->setWidth(0, 2);

        $form->footer(function ($footer) {
            $footer->disableReset();
        });

        $form->html(view('admin.general_script'));

        return $form;
    }
}
