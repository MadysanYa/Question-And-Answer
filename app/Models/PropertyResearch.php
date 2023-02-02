<?php

namespace App\Models;
use App\Models\UserAdmin;
use Illuminate\Database\Eloquent\Model;

class PropertyResearch extends Model
{
    /**
     * Relationship
     */
    public function user()
    {
        return $this->belongsTo(UserAdmin::class);
    }

    /**
     * Scope Query
     */
    public function scopeGetWithCount($query){
        return $query->get()->count();
    }

    // public function setPhotosAttribute($photos)
    // {
    //     if (is_array($photos)) {
    //         $this->attributes['photos'] = json_encode($photos);
    //     }
    // }

    // public function getPhotosAttribute($photos)
    // {
    //     return json_decode($photos, true);  
    // }

    public function verified(){

    }
    
    public function approved(){

    }
}