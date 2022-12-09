<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vendor;

class Vendor extends Model

{

	public function Vendor($inventory_id){
	$Vendor = Vendor::whereInventoryId($inventory_id);
		return $Vendor;
	}
	
	public function usedByEmployee($inventory_id){
		$Vendor = Vendor::whereInventoryId($inventory_id)->orderByDesc('id')->first();
		return $Vendor;
	}
}