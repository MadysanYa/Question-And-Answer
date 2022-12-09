<?php

namespace App\Http\Controllers;
use Encore\Admin\Controllers\AdminController;
use App\Models\Task;
use App\Models\TaskDetail;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Encore\Admin\Admin;

class TaskdetailController extends Controller
{
   
	 
    protected function store(Request $request)
    {
        $task_detail = new TaskDetail();
        
		$task_detail->task_id = $request->task_id;
		$task_detail->detail = $request->detail;
		$task_detail->emp_id = $request->emp_id;
		$task_detail->emp_name = $request->emp_name;
				
		$task_detail->save();

		//return redirect()->back()->with('success', 'task_detailed complete');
		
		


    }
	
	 protected function delete(Request $request)
    {
		$id = $request->id;
        $details = TaskDetail::find($id)->delete();
		//return redirect()->back()->with('success', 'task_detailed complete');

    }
}
