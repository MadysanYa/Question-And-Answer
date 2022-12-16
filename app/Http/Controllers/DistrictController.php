<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Transfer;
use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;
use App\Models\District;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class DistrictController extends Controller
{
   
	 
    public function district(Request $request)
    {
        $provinceId = $request->get('q');
       
		$districts = District::where('province_id', $provinceId)->pluck('district_name','id');

		
		return $districts;

    }
}
