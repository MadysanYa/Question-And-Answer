<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;

use App\Models\Commune;

use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class CommuneController extends Controller
{
   
	 
    public function commune(Request $request)
    {
<<<<<<< HEAD
        $districts = $request->get('q');
       
		// $communes = Commune::where('district_id', $communeId)->get('commune_name','id');
        $communes = Commune::where('district_id', $districts)->get(['id', DB::raw('commune_name as text')]);
=======
        $districts= $request->get('q');
       
		$communes = Commune::where('district_id', $districts)->get(['id', DB::raw('commune_name as text')]);
>>>>>>> 2901c9d3cb2a65a87e598082218bdf9aaa17d396

		
		return $communes;

    }
}
