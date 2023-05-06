<?php

namespace App\Admin\Controllers;

use App\Models\Answer;
use App\Models\Test;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Question;
use App\Models\UserAdmin;
use App\Models\UserAnswer;
use Encore\Admin\Controllers\AdminController;

class UserAnswerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'UserAnswer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserAnswer());

        $grid->column('id', __('ID'));
        $grid->column('user_id', __('User Name'))->display(function($userId){
            $user = UserAdmin::where('id', $userId)->first();
            return $user->username ?? null;
        });
        $grid->column('test_id', __('Test Type'))->display(function($testId){
            $test = Test::where('id', $testId)->first();
            return $test->name ?? null;
        });
        $grid->column('question_id', __('Question'))->display(function($questionId){
            $question = Question::where('id', $questionId)->first();
            return $question->question_text ?? null;
        });
        $grid->column('answer_id', __('Answer'))->display(function($answerId){
            $answer = Answer::where('id', $answerId)->first();
            return $answer->answer_text ?? null;
        });
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
        $show = new Show(UserAnswer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('test_id', __('Test id'));
        $show->field('question_id', __('Question id'));
        $show->field('answer_id', __('Answer id'));
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
        $form = new Form(new UserAnswer());

        $form->column(6,function($form){
            $form->select('user_id', __('User Name'))->rules('required')->options(function(){
                return UserAdmin::all()->pluck('username', 'id');
            });
            $form->select('question_id', __('Question'))->rules('required')->options(function(){
                return Question::all()->pluck('question_text', 'id');
            });
        });

        $form->column(6,function($form){
            $form->select('test_id', __('Test Type'))->rules('required')->options(function(){
                return Test::all()->pluck('name', 'id');
            });
            $form->select('answer_id', __('Answer'))->rules('required')->options(function(){
                return Answer::all()->pluck('answer_text', 'id');
            });
        });

        $form->footer(function ($footer) {
            $footer->disableReset();
        });

        return $form;
    }
}
