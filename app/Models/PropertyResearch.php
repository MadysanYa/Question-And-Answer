<?php

namespace App\Models;
use App\Models\Borey;
use App\Models\Commune;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\UserAdmin;
use App\Models\PropertyType;
use App\Models\InformationType;
use App\Traits\DeleteByUserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyResearch extends Model
{
    use SoftDeletes;
    use DeleteByUserTrait;

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
    public function setLatitudeAttribute($value)
    {
        $this->attributes['latitude'] = trim($value,"_");
    }

    public function setLongtitudeAttribute($value)
    {
        $this->attributes['longtitude'] = trim($value,"_");
    }

    public function setContactNoAttribute($value)
    {
        $this->attributes['contact_no'] = trim($value,"_");
    }

    public function getProvinceNameAttribute()
    {
        return optional($this->province)->province_name;
    }

    public function getDistrictNameAttribute()
    {
        return optional($this->district)->district_name;
    }

    public function getCommuneNameAttribute()
    {
        return optional($this->commune)->commune_name;
    }

    public function getVillagNameAttribute()
    {
        return optional($this->village)->village_name;
    }

    /**
     * Accessor
     */
    public function getIsPropertyApprovedAttribute()
    {
        if ($this->is_approved == 1) {
            return true;
        }

        return false;
    }
    
    public function getIsPropertyVerifiedOrApprovedAttribute()
    {
        if ($this->is_verified == 1 || $this->is_approved == 1) {
            return true;
        }

        return false;
    }

    public function getIsPropertyRejectedAttribute($key)
    {
        if ($this->is_verified == 2 || $this->is_approved == 2) {
            return true;
        }

        return false;
    }

    public function verified(){

    }

    public function approved(){

    }
}
