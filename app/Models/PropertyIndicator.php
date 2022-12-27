<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyIndicator extends Model
{
	public function getPhotoAttribute($file){
		//if(is_string($file)){
			return json_decode($file,true);
		//}
		//return $file;
	}
	
	public function setPhotoAttribute($file){
		if(is_array($file)){
			$this->attributes['file'] = json_encode($file);
		}
	}
}

