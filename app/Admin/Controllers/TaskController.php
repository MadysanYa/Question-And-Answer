<?php

namespace App\Admin\Controllers;

use App\Models\Task;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Auth;
use Encore\Admin\Admin;
use Encore\Admin\Widgets\Table;

class TaskController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Team Work';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Task);

		$grid->model()->orderBy('id', 'desc');
		/*$grid->column('created_at', __('Registered date'))->display(function($date){
			$date = date_format(date_create($date), 'Y-m-d');
			return $date;
		});*/
        $grid->column('id', __('ID'))->sortable();
		$grid->column('task', __('Task'))->modal('Team Work History',function($model){
			
			
			
			$emp_id = Auth::user()->id;
			$emp_name = Auth::user()->name;
			$task_id = $model->id;
			
				
			$task_detail = $this->details($model->id)->get();
			$message = '';
			$close_button = '';
			foreach($task_detail as $detail)
			{
				$close_button = '';
				if($emp_id  == $detail->emp_id){
					$style ='style="clear:both; border: 1px solid #ff5460; padding: 0px 20px 10px 20px; border-radius: 10px;margin-bottom: 10px;background: #ffd1d4;width: 40%;float: right;text-align: right;box-shadow:rgba(50,50,93,0.25) 0px 30px 60px -12px, rgba(0,0,0,0.3) 0px 18px 36px -18px"';
					$close_button = '<div style="float:left;"><a class="btnClose" href="../api/taskdetail/' . $detail->id . '">x</a></div>';
				}
				else {
					$style='style="clear:both; border: 1px solid #265db5; padding: 0px 20px 10px 20px; border-radius: 10px;margin-bottom: 10px;background: #d9e7ff;width: 57%;box-shadow:rgba(99,99,99,0.2) 0px 2px 8px 0px;"';
				}
				$box = '<div ' . $style . '> ' . $close_button. '
					<h5><b>{{NAME}} said at {{DATE}}</b><h5>
					<div style="text-align: left;line-height: 20px;">
					{{CONTENT}}
					</div>
				</div>';
				
				$box = str_replace('{{NAME}}', $detail->emp_name , $box);			
				$box = str_replace('{{DATE}}', date_format(date_create($detail->created_at), 'Y-m-d') ,$box);
				$box = str_replace('{{CONTENT}}', $detail->detail ,$box);
				$message .= $box;
			};
			
			
			$html = <<<HTML
				{{MESSAGE_CONTENT}}
				
				
				<table width="100%">
					<tr style="border-top: 1px solid #a1adc9; height: 1px;margin-top: 15px; padding-bottom: 15px;">
						<td style="padding-top: 10px;">
						<textarea class="form-control" id="reply{{task_id}}" name="reply" style="width: 100%; height: 100px;border: 1px solid #ff5460;border-radius: 10px;" placeholder="Message here" ></textarea></td>
						<td align="right" width="120" style="padding-top: 10px;"><button id="btnReply{{task_id}}" style="height: 100px;width:100px;" class="btn btn-primary">Save</button></td>
					</tr>
				</table>
				
				<script>
				
				$('.btnClose').click(function(e){
					e.preventDefault();
					var btn = $(this);
					var url = $(this).attr('href');
					
					swal({
						title: "Are you sure to delete it?",
						type: "warning",
						showCancelButton: true,
						confirmButtonText: 'Yes',
						cancelButtonText: 'No',
					}).then((isConfirm)=>{
							if(isConfirm.value == true){
								$.ajax({
									url: url,
									type:'get',
									success: function(){
										btn.parent().parent().remove();
									},
									error: function(error){
										alert(error.message);
									}
								});
							}
						}
					
					);
					
					
					//var answer = confirm('Are you sure to delete it?');
					//if(answer == false) return false;
					
					
				});
				
				$('#btnReply{{task_id}}').click(function(){
					var url ="../api/taskdetail";
					var task_id = '{{task_id}}';
					var detail =$('#reply{{task_id}}').val();
					var emp_id = '{{emp_id}}';
					var emp_name = '{{emp_name}}';
					
					if(detail == '') {alert('Please input message'); return false;}
					
					var data = {'task_id':task_id, 'detail':detail, 'emp_id':emp_id, 'emp_name':emp_name};
					$.ajax({
						url: url,
						data:data,
						type:'post',
						success: function(){
							location.reload();
						},
						error: function(error){
							alert(error.message);
						}
					});
				});
				</script>
			HTML;
			
			$html = str_replace('{{task_id}}', $task_id, $html);			
			$html = str_replace('{{TASK_ID}}', $task_id, $html);	
			$html = str_replace('{{emp_id}}', $emp_id, $html);
			$html = str_replace('{{emp_name}}', $emp_name, $html);
			
			$html = str_replace('{{MESSAGE_CONTENT}}',$message, $html);
			
			return $html;
		})->sortable();
		
		$grid->column('start_date', __('Start date'));
		$grid->column('end_date', __('End date'));
		$grid->column('status', __('Status'))->display(function($status){
			if($status == 'Done')
				$color = '#abffbd';
			if($status == 'Progressing')
				$color = '#ffc0ab';
			
				
			if($status == 'Pending')
				$color = '#f1fa75';
				
			
			return '<div style="background:' . $color . ';padding: 2px;text-align: center;border-radius: 15px;">' . ucwords($status) . '</div>' ;
		})->sortable();
		$grid->column('assign_to', __('In charge person'))->sortable();	
		
		//Admin::script("('.modal-body').append('<textarea>sdfdfs</textarea>');");
		
		//$grid->column('Detail')->display(function(){return 'View Detail';})
		
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
        $show = new Show(Inventory::findOrFail($id));
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
        $form = new Form(new Task());
		$form->text('task', __('Task'))->required();
		$form->date('start_date', __('Start date'))->required();
		$form->date('end_date', __('End date'));
		$form->select('status', __('Status'))->options(['Progressing' => 'Progressing', 'Pending' => 'Pending', 'Done' => 'Done'])->required();
		$form->text('assign_to', __('In charge person'))->required();	
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
