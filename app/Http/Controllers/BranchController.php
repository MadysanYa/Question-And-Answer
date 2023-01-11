<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Transfer;
use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;
use App\Models\Branch;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class BranchController extends Controller
{
   
	 
    public function branch (Request $request)
    {
        $regionId = $request->get('q');
		$regions = Branch::where('region_id', $regionId)->get([DB::raw('branch_code as id'),  DB::raw('branch_name as text')]);//DB::raw('branch_code as id')
		return $regions;
    }
}
