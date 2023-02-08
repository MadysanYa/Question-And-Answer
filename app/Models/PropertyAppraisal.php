<?php

namespace App\Models;
use App\Models\Borey;
use App\Models\Branch;
use App\Models\PropertyType;
use App\Models\InformationType;
use Illuminate\Database\Eloquent\Model;

class PropertyAppraisal extends Model
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
    public function branchCode()
    {
        return $this->belongsTo(Branch::class, 'branch_code', 'branch_code');
    }

    /**
     * Scope Query
     */
    public function scopeGetWithCount($query){
        return $query->get()->count();
    }
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
}