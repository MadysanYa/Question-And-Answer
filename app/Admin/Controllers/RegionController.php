<?php

namespace App\Admin\Controllers;
use Auth;
use App\Models\Region;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Grid\Tools;
use App\Admin\Actions\Post\Replicate;
use App\Admin\Actions\Region\ImportRegion;
use Encore\Admin\Controllers\AdminController;


class RegionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Region';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Region);
        $grid->column('id', __('ID'));
      //  $grid->column('region_code', __('Region code'))->editable()->sortable();
        $grid->column('region_name', __('Region Name'))->editable()->sortable();

        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('id','region_name');

        // $grid->tools(function (Tools $tools) {
        //     $tools->append(new ImportRegion());
        // });

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
        $show = new Show(Region::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('region_name', __('Region Name'));
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
        $form = new Form(new Region());
        $form->text('region_code', __('Region Code'))->rules('required');
        $form->text('region_name', __('Region Name'))->rules('required');


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
