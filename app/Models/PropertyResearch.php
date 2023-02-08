<?php

namespace App\Models;
use App\Models\Borey;
use App\Models\UserAdmin;
use App\Models\PropertyType;
use App\Models\InformationType;
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
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type', 'id');
    }
    public function infoType()
    {
        return $this->belongsTo(InformationType::class, 'information_type', 'id');
    }
    public function boreyType()
    {
        return $this->belongsTo(Borey::class, 'borey', 'id');
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