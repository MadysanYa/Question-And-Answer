<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\TaskDetail;


class Task extends Model
{
	public function details($task_id){
		$details = TaskDetail::whereTaskId($task_id);
		return $details;
	}
	
}