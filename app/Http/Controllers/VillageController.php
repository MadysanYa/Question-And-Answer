<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Transfer;
use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;
use App\Models\Village;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class VillageController extends Controller
{
   
	 
    public function village(Request $request)
    {
        $communeId = $request->get('q');
       
		$villages = Village::where('commune_id', $communeId)->get(['id', DB::raw('village_name as text')]);

		
		return $villages;

    }
}
