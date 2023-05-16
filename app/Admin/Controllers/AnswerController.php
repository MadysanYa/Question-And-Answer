<?php

namespace App\Admin\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AnswerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Answer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Answer());

        $grid->column('id', __('ID'));
        $grid->column('question_id', __('Question'))->display(function($questionId){
            $question = Question::where('id', $questionId)->first();
            return $question->question_text ?? null;
        });
        $grid->column('answer_text', __('Answer'));
        $grid->column('is_correct', __('Is Correct'))->bool();
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
        $show = new Show(Answer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('question_id', __('Question id'));
        $show->field('answer_text', __('Answer text'));
        $show->field('is_correct', __('Is correct'));
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
        $form = new Form(new Answer());

        $form->select('question_id', __('Question'))->rules('required')->options(function(){
            return Question::all()->pluck('question_text', 'id');
        });
        $form->text('answer_text', __('Answer'))->rules('required');
        $form->switch('is_correct', __('Is Correct'))->default(false)->rules('required');
        // $form->radio('is_correct', __('Is Correct'))->options([false => "False", true => "True" ])->default(false)->rules('required');

        $form->footer(function ($footer) {
            $footer->disableReset();
        });

        return $form;
    }
}
