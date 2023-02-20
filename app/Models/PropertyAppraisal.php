<?php

namespace App\Models;
use App\Models\Borey;
use App\Models\Branch;
use App\Models\Commune;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
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
    public function proType()
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
     * Accessor
     */
    public function getPhotosAttribute($photos)
    {
        return json_decode($photos, true);
    }

    public function getFrontphotosAttribute($frontphoto)
    {
        return json_decode($frontphoto, true);
    }
    
    public function getBranchNameAttribute() 
    {
        return optional($this->branchCode)->branch_name;
    }

    public function getRmNamePhoneAttribute() 
    {
        return $this->rm_name.' / '.$this->telephone;
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
        return $this->building_size_by_measurement * $this->building_value_per_sqm;
    }

    public function getFairMarketValueAttribute()
    {
        return $this->LandTotalValuePerSqm + $this->BuildingTotalValuePerSqm;
    }

    public function getForcedSaleValueAttribute()
    {
        return $this->FairMarketValue * 80;
    }

    public function getPropertyTypeNameAttribute()
    {
        return optional($this->proType)->property_type_name;
    }

    /**
     * Mutator
     */
    public function setFrontphotosAttribute($frontphoto)
    {
        if (is_array($frontphoto)) {
            $this->attributes['frontphoto'] = json_encode($frontphoto);
        }
    }

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

    public function verified(){

    }

    public function approved(){

    }
}