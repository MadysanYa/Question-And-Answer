<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Transfer;
use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;
use App\Models\District;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class DistrictController extends Controller
{
   
	 
    public function district(Request $request)
    {
        $provinceId = $request->get('q');
		$districts = District::where('province_id', $provinceId)->get(['id',  DB::raw('district_name as text')]);
		return $districts;
    }
}
