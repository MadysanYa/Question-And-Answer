<?php

namespace App\Http\Controllers;
//use App\Http\Controllers\Transfer;
use Encore\Admin\Controllers\AdminController;
use App\Models\Transfer;
use App\Models\Inventory;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Encore\Admin\Admin;

class TransferController extends Controller
{
   
	 
    protected function store(Request $request)
    {
        $transfer = new Transfer();
        
		$transfer->inventory_id = $request->inventory_id;
		$transfer->from_branch = $request->from_branch;
		$transfer->to_branch = $request->to_branch;
		$transfer->department = $request->department;
		$transfer->emp_id = $request->emp_id;
		$transfer->emp_name = $request->emp_name;
		$transfer->delivered_by = $request->delivered_by;
		$transfer->approved_by = $request->approved_by;
		$transfer->received_by = $request->received_by;
		$transfer->transfered_date = $request->transfered_date;
		$transfer->received_date = $request->received_date;
		$transfer->approved_date = $request->approved_date;
		$transfer->created_at = $request->created_at;
		$transfer->updated_at = $request->updated_at;
		$transfer->updated_by = $request->updated_by;
		$transfer->return = $request->return;
		$transfer->remark = $request->remark;
		
		$transfer->save();
		
		if($transfer->return == 'Return'){
			$inventory = Inventory::findOrFail($transfer->inventory_id); 
			$inventory->status = 'instock';
			$inventory->branch_code = '8031';
			$inventory->save();
		}
		

		return redirect()->back()->with('success', 'Transfered complete');
		
		


    }
}
