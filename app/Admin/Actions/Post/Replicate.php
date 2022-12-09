<?php

namespace App\Admin\Actions\Post;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Replicate extends RowAction
{
    public $name = 'Copy';

    public function handle(Model $model)
    {
        // $model ...
		
		$data = $model->replicate();
		$data->created_by = Auth::user()->name;
		$data->save();

        return $this->response()->success('Success message.')->refresh();
    }

}