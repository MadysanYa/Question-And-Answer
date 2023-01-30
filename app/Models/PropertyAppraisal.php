<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyAppraisal extends Model
{ 
    public function setPhotosAttribute($photos)
    {
        if (is_array($photos)) {
            $this->attributes['photos'] = json_encode($photos);
        }
    }

    public function getPhotosAttribute($photos)
    {
        return json_decode($photos, true);
    }

    public function setFrontphotosAttribute($frontphoto)
    {
        if (is_array($frontphoto)) {
            $this->attributes['frontphoto'] = json_encode($frontphoto);
        }
    }

    public function getFrontphotosAttribute($frontphoto)
    {
        return json_decode($frontphoto, true);
    }


    public function verified(){

    }

    public function approved(){

    }

    /**
     * Scope Query
     */
    public function scopeGetWithCount($query){
        return $query->get()->count();
    }
}