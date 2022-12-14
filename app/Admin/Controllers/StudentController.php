<?php

namespace App\Admin\Controllers;

use App\Models\Student;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class StudentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Student Management';


    // public function index(Content $content){

    //     $content->body($this->dashboard());
    //     $content->body($this->grid());
    //     return $content;
    // }


    public function dashboard(){
        $button = "<button> Test</button>";
        return $button;
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Student());

        $grid->column('name', __('Student Name'))->sortable();
        $grid->column('dob', __('Date of birth'));

        $grid->column('Action')->display(function(){
            $text = $this->name;
            return "<button style='background: wihte;'> $text</button>";
        });

        $grid->quickSearch('name','dob');
      
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
        $show = new Show(Application::findOrFail($id));
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
        $form = new Form(new Student());

        $form->text('name', __('Student Name'));
        $form->date('dob', __('Date of Birth'));
        $form->select('gen')->options(['F'=>'Female', 'M'=>'Male']);
        

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
