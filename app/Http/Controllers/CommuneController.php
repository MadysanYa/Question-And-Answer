<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Transfer;

use App\Models\Commune;

use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CommuneController extends Controller
{
   
	 
    public function commune(Request $request)
    {
        $districtId = $request->get('q');
       
		$communes = Commune::where('district_id', $districtId)->pluck('commune_name','id');

		
		return $communes;

    }
}
