<?php

namespace App\Http\Controllers;
use App\Models\Commune;
use App\Models\PropertyResearch;
use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class PropertyResearchController extends Controller
{
   
	 
    public function verified(Request $request)
    {
        
      
        $propertyResearch = PropertyResearch::findOrFail($request->id);
        $propertyResearch->is_verified = $request->value;
        $propertyResearch->save();
        return Redirect::to(url()->previous());
        
    }
    
    public function approved(Request $request)
    {
        
        //echo $request->id;
        $propertyResearch = PropertyResearch::findOrFail($request->id);
        $propertyResearch->is_approved = $request->value;
        $propertyResearch->save();
        return Redirect::to(url()->previous());
        // $verifieds = $request->get('q');
        // $verified = PropertyIndicator::where('id', $verifieds)->get(['id', DB::raw('verified as text')]);
		// return $verified;

    }

}
