<?php

namespace App\Http\Controllers;
use App\Models\Commune;
use App\Models\PropertyAppraisal;
use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class PropertyAppraisalController extends Controller
{
   
	 
    public function verified(Request $request)
    {
        
      
        $Propertyappraisal = PropertyAppraisal::findOrFail($request->id);
        $Propertyappraisal->is_verified = $request->value;
        $Propertyappraisal->save();
        return Redirect::to(url()->previous());
        
    }
    
    public function approved(Request $request)
    {
        
        //echo $request->id;
        $Propertyappraisal = PropertyAppraisal::findOrFail($request->id);
        $Propertyappraisal->is_approved = $request->value;
        $Propertyappraisal->save();
        return Redirect::to(url()->previous());
        // $verifieds = $request->get('q');
        // $verified = PropertyIndicator::where('id', $verifieds)->get(['id', DB::raw('verified as text')]);
		// return $verified;

    }

}
