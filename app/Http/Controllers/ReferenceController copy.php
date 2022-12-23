<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Transfer;
use Encore\Admin\Controllers\AdminController;
use App\Models\Reference;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class ReferenceController extends Controller
{
   
	 
    public function Reference(Request $request)
    {
        $ReferenceId = $request->get('q');       
		$References = Reference::where('reference_id', $ReferenceId)->getlastid(['id', DB::raw('aaa as text')]);
		return $References;

    }
}
