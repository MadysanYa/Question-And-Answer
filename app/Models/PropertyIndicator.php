<?php

namespace App\Models;
use App\Models\Borey;
use App\Models\Branch;
use App\Models\UserAdmin;
use App\Models\PropertyType;
use App\Models\InformationType;
use Illuminate\Database\Eloquent\Model;

class PropertyIndicator extends Model
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
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Scope Query
     */
    public function scopeGetWithCount($query){
        return $query->get()->count();
    }

    /**
     * Mutator
     */
	public function setPhotosAttribute($photos)
    {
        if (is_array($photos)) {
            $this->attributes['photos'] = json_encode($photos);
        }
    }

    public function setLatitudeAttribute($value)
    {
        $this->attributes['latitude'] = trim($value,"_");
    }

    public function setLongtitudeAttribute($value)
    {
        $this->attributes['longtitude'] = trim($value,"_");
    }

    /**
     * Accessor
     */
    public function getPhotosAttribute($photos)
    {
        return json_decode($photos, true);  
    }

    public function getBranchNameAttribute($value)
    {
        return optional($this->branchCode)->branch_name;
    }
    public function getBoreyNameAttribute($value)
    {
        return optional($this->boreyType)->borey_name;
    }
    public function getVillageNameAttribute($value)
    {
        return optional($this->village)->village_name;
    }

    public function getFullAddressAttribute()
    {
        return optional($this->boreyType)->borey_name.', '
              .$this->access_road_name.', '
              .optional($this->village)->village_name.', '
              .optional($this->commune)->commune_name.', '
              .optional($this->district)->district_name.', '
              .optional($this->province)->province_name.'.';
    }

    public function getGeoCodeAttribute()
    {
        return $this->latitude.', '.$this->longtitude;
    }

    public function getLandTotalValuePerSqmAttribute()
    {
        return $this->land_size * $this->land_value_per_sqm;
    }

    public function getBuildingTotalValuePerSqmAttribute()
    {
        return $this->building_size * $this->building_value_per_sqm;
    }

    public function getLandBuildingGrandTotalAttribute()
    {
        return $this->LandTotalValuePerSqm + $this->BuildingTotalValuePerSqm;
    }

    public function getPropertyTypeNameAttribute()
    {
        return optional($this->propertyType)->property_type_name;
    }

    public function verified(){

    }
    
    public function approved(){

    }



    
    // public function setFrontphotosAttribute($frontphoto)
    // {
    //     if (is_array($frontphoto)) {
    //         $this->attributes['front_photo'] = json_encode($frontphoto);
    //     }
    // }

    // public function getFrontphotosAttribute($frontphoto)
    // {
    //     return json_decode($frontphoto, true);
    // }
}

