<?php

namespace App\Admin\Controllers;

use App\Models\History;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Auth;
use Encore\Admin\Admin;
use Encore\Admin\Widgets\Table;

class HistoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tranfer History';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new History);

		$grid->column('history_name','All history');
		$grid->column('remark','Note');
		
		$grid->column('transfered_date', 'Transfer_Date');
		
		$grid->filter(function($filter){
			$filter->disableIdFilter();
			$filter->equal('branch_code');
		});
		
		
        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('serial' , 'model', 'fixed_asset','asset_number', 'branch_code','remark');

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
        $show = new Show(History::findOrFail($id));
       


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new History());
		
		$form->text('history_name','My History');
		//$form->text('remark','Note');
		$form->select('remark')->options(['F' => 'Female', 'M' => 'Male']);
		$form->multipleFile('file', __('File'))->removable();
		
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
