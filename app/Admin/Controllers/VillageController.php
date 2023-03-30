<?php

namespace App\Admin\Controllers;
use App\Admin\Actions\Post\Replicate;
use App\Models\Commune;
use App\Models\Village;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Auth;


class VillageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Village  ';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Village);
        $grid->column('id', __('ID'));
        $grid->column('village_name', __('Village Name'))->editable()->sortable();

        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('id' , 'village_name');

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
        $show = new Show(Village::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('village_name', __('Village Name'));
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
        $form = new Form(new Village());
        $form->select('commune_id', __('Commune / Sangkat'))->rules('required')->options(function(){
            return Commune::all()->pluck('commune_name','id');
        });
        $form->text('village_name', __('Village Name'))->rules('required');

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
