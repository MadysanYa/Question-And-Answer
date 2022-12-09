<?php

namespace App\Admin\Controllers;

use App\Models\Contract;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Request;
class ContractController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Contract Management';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Contract());
		
		$grid->model()->orderBy('id','desc');
        $grid->column('id', __('ID'))->desc()->sortable();
		$grid->column('name', __('Contrac Title'))->sortable();
       /* $grid->column('name', __('Contrac Title'))->sortable()->modal('', function($model){
			
			 //$show = new Show(Contract::findOrFail($model['id']));
			 
			  return $model['id'];
		});*/
        $grid->column('startdate', __('Start date'))->display(function ($startdate){
			
			return '<div style="background:#00c0ef;color: white;padding: 2px;width: 100px;text-align: center;border-radius: 15px;">' . $startdate . '</div>';
		});
		
        $grid->column('enddate', __('End date'))->display(function ($enddate){
			
			if($enddate == '') return '';
			return '<div style="background:#ff6600;color: white;padding: 2px;width: 100px;text-align: center;border-radius: 15px;">' . $enddate . '</div>';
		});
		$grid->column('file', __('Attachment(s)'))->downloadable('../upload');
		$grid->column('company', __('Company'));
		$grid->column('amount', __('Amount (USD)'));
		$grid->column('Status', __('Status'))->display(function ($title){
			$date_now = date("Y-m-d");
			if($this->enddate < $date_now && $this->enddate != NULL)
				return '<div style="background:red;color: white;padding: 3px;width: 70px;text-align: center;border-radius: 4px;">Expired</div>';
			else 
				return '<div style="background: #03fc66;padding: 3px;width: 70px; text-align: center;border-radius: 4px;">Valid</div>';
		});
        $grid->column('remark', __('Remark'));
		
        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('name', 'remark');
		
		
		$grid->filter(function($filter){
			$filter->disableIdFilter();
			$filter->equal('company');
		});

		
		//print_r(Request::route('company'));

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
        $show = new Show(Contract::findOrFail($id));
        $show->field('name', __('Contract title'));
        $show->field('startdate', __('Start date'));
        $show->field('enddate', __('End date'));
        
    //    $show->field('updated_at', __('Updated at'));
    //    $show->field('created_at', __('Created at'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Contract());
        $form->text('name', __('Contract Title'))->rules('required');
        $form->date('startdate', 'Start date')->rules('required');
        $form->date('enddate', 'End date');
		$form->select('company', __('Company'))->options(['GCTMC'=>'GCTMC', 'GTMC'=>'GTMC', 'GNS'=>'GNS','KOSIGN'=>'KOSIGN', 'TECHDATA'=>'TECHDATA', 'TEST	'=>'TEST'])->rules('required');
		$form->text('amount','Amount (USD)');
		$form->multipleFile('file', __('File'))->removable();
        $form->textarea('remark', __('Remark'));

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
