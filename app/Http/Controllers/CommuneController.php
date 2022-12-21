<?php

namespace App\Http\Controllers;
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
        $districts = $request->get('q');
        $communeId = Commune::where('district_id', $districts)->get(['id', DB::raw('commune_name as text')]);
		return $communeId;

    }
}
