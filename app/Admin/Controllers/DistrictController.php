<?php

namespace App\Admin\Controllers;
use App\Admin\Actions\Post\Replicate;
use App\Models\District;
use App\Models\Province;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Auth;


class DistrictController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'District ';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new District);
        $grid->column('id', __('ID'));
        $grid->column('district_name', __('District Name'))->editable()->sortable();


        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('id' , 'district_name');

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
        $show = new Show(District::findOrFail($id));
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
        $form = new Form(new District());
        $form->select('province_id', __('Province'))->rules('required')->options(function(){
            return Province::all()->pluck('province_name','id');
        });
        $form->text('district_name', __('District Name'))->rules('required');


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
