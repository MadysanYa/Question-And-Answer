<?php

namespace App\Admin\Controllers;

use App\Models\Wifi;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Branch;
use App\Models\contracts;

use Illuminate\Support\Facades\Request;

class WifiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'WiFi Mac Management';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new wifi);
		$grid->model()->orderBy('id','desc');	
		$grid->column('id', __('Id'))->desc()->sortable();
		$grid->column('maca_ddress', __('Mac Address'));
		$grid->column('devices_name', __('Devices name'));
		$grid->column('responsible_person', __('Name'));	
        $grid->column('devies_type', __('Devies Type'));
		$grid->column('department', __('Department'));
		$grid->column('status', __('status'));
		$grid->column('updated_by', __('Updated_By'));
		
		
		// No need to change
        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('id','department', 'responsible_person');
		
	

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
        $show = new Show(Network::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new wifi());
        $form->text('responsible_person', __('responsible_person'));
		$form->text('mac_address', __('mac_address'));
		$form->text('devices_name', __('devices_name'));
		$form->text('devies_type', __('devies_type'));
		$form->text('department', __('department')); 
		$form->text('status', __('status')); 
		
		
		
		

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
