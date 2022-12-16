<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Transfer;

use App\Models\Commune;
use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;
use App\Models\District;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CommuneController extends Controller
{
   
	 
    public function commune(Request $request)
    {
        $communeId = $request->get('q');
       
		$communeId = Commune::where('district_id', $communeId)->pluck('commune_name','id');

		
		return $communeId;

    }
}
