<?php

namespace App\Admin\Controllers;

use App\Models\Document;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Request;
class DocumentController extends AdminController







{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Document Management';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Document());
		
		$grid->model()->orderBy('id','desc');
        $grid->column('id', __('ID'))->desc()->sortable();
		$grid->column('category', __('Category'))->sortable();
        $grid->column('document', __('Document'));
		
	   
		$grid->column('file', __('Attachment(s)'))->downloadable('../upload');
		
        $grid->column('remark', __('Remark'));
		
        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('name', 'remark');
		
		
		$grid->filter(function($filter){
			$filter->disableIdFilter();
			$filter->equal('category');
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
        $show = new Show(Document::findOrFail($id));
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
	 
	 //check extention
	
				 
			 
			 
    protected function form()
    {
	
		
        $form = new Form(new Document());
        $form->select('category', __('Category'))->options(['NBC'=>'NBC', 'Bakong'=>'Bakong', 'CSS'=>'CSS','SOL'=>'SOL', 'EDC'=>'EDC'])->rules('required');
        $form->text('document', __('Document Name'));
		$form->multipleFile('file', __('File'))->removable()->rules(); 
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
