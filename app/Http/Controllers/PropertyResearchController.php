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
        
      
        $Propertyresearch = PropertyResearch::findOrFail($request->id);
        $Propertyresearch->is_verified = $request->value;
        $Propertyresearch->save();
        return Redirect::to(url()->previous());
        
    }
    
    public function approved(Request $request)
    {
        
        //echo $request->id;
        $Propertyresearch = PropertyResearch::findOrFail($request->id);
        $Propertyresearch->is_approved = $request->value;
        $Propertyresearch->save();
        return Redirect::to(url()->previous());
        // $verifieds = $request->get('q');
        // $verified = PropertyIndicator::where('id', $verifieds)->get(['id', DB::raw('verified as text')]);
		// return $verified;

    }

}
