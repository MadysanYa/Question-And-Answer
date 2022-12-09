<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transfer;

class Inventory extends Model
{

	public function transfers($inventory_id){
		$transfer_history = Transfer::whereInventoryId($inventory_id);
		return $transfer_history;
	}
	
	public function usedByEmployee($inventory_id){
		$transfer = Transfer::whereInventoryId($inventory_id)->orderByDesc('id')->first();
		return $transfer;
	}
}