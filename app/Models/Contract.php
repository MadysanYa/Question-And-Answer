<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
	public function getFileAttribute($file){
		if(is_string($file)){
			return json_decode($file,true);
		}
		return $file;
	}
	
	public function setFileAttribute($file){
		if(is_array($file)){
			$this->attributes['file'] = json_encode($file);
		}
	}
}

