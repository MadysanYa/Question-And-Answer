<?php

namespace App\Models;
use App\Models\Borey;
use App\Models\Branch;
use App\Models\Region;
use App\Models\UserAdmin;
use App\Models\PropertyType;
use App\Models\InformationType;
use App\Traits\DeleteByUserTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyIndicator extends Model
{
    use SoftDeletes;
    use DeleteByUserTrait;

    protected $dates = ['requested_date','reported_date'];
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
    public function region()
    {
        return $this->belongsTo(Region::class);
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
    public function scopeGetWithCount($query) {
        return $query->get()->count();
    }

    public function scopeQueryPropertyIndicatorGrid($query)
    {
        $userLogin = Auth::user();

        if (User::isRmRole()) {
            return $query->where('user_id', $userLogin->id);

        } elseif (User::isBmRole()) {
            return $query->where('branch_code', $userLogin->branch_code);
        }

        return $query;
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

    public function setCifNoAttribute($value)
    {
        $this->attributes['cif_no'] = trim($value,"_");
    }

    public function setTelephoneAttribute($value)
    {
        $this->attributes['telephone'] = trim($value,"_");
    }

    public function setClientContactNoAttribute($value)
    {
        $this->attributes['client_contact_no'] = trim($value,"_");
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
    public function getPropertyInformationTypeAttribute()
    {
        return optional($this->infoType)->information_type_name;
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

    public function getBoreyNameAttribute($value)
    {
        return optional($this->boreyType)->borey_name;
    }
    public function getRegionNameAttribute()
    {
        return optional($this->region)->region_name;
    }
    public function getVillageNameAttribute($value)
    {
        return optional($this->village)->village_name;
    }

    public function getFullAddressAttribute()
    {
        $borey_blank = ', ';
        if (optional($this->boreyType)->borey_name == null) {
            $borey_blank = '';
        }

        $access_road_blank = ', ';
        if ($this->access_road_name == null) {
            $access_road_blank = '';
        }

        $village_blank = ', ';
        if (optional($this->village)->village_name == null) {
            $village_blank = '';
        }

        $commune_blank = ', ';
        if (optional($this->commune)->commune_name == null) {
            $commune_blank = '';
        }

        $district_blank = ', ';
        if (optional($this->district)->district_name == null) {
            $district_blank = '';
        }

        $province_blank = '.';
        if (optional($this->province)->province_name == null) {
            $province_blank = '';
        }

        return optional($this->boreyType)->borey_name.$borey_blank
              .$this->access_road_name.$access_road_blank
              .optional($this->village)->village_name.$village_blank
              .optional($this->commune)->commune_name.$commune_blank
              .optional($this->district)->district_name.$district_blank
              .optional($this->province)->province_name.$province_blank;
    }

    public function getGeoCodeAttribute()
    {
        return $this->latitude.', '.$this->longtitude;
    }

    public function getLandTotalValuePerSqmAttribute()
    {
        return $this->land_size * $this->land_value_per_sqm;
    }

    public function getLandTotalValuePerSqmFormatAttribute()
    {
        return number_format($this->land_size * $this->land_value_per_sqm, 2);
    }

    public function getBuildingTotalValuePerSqmAttribute()
    {
        return $this->building_size * $this->building_value_per_sqm;
    }

    public function getBuildingTotalValuePerSqmFormatAttribute()
    {
        return number_format($this->building_size * $this->building_value_per_sqm, 2);
    }

    public function getLandBuildingGrandTotalFormatAttribute()
    {
        return number_format($this->LandTotalValuePerSqm + $this->BuildingTotalValuePerSqm, 2);
    }

    public function getPropertyTypeNameAttribute()
    {
        return optional($this->propertyType)->property_type_name;
    }

    public function getLandSizeFormatAttribute()
    {
        return number_format($this->land_size, 2);
    }

    public function getLandValuePerSqmFormatAttribute()
    {
        return number_format($this->land_value_per_sqm, 2);
    }

    public function getBuildingSizeFormatAttribute()
    {
        return number_format($this->building_size, 2);
    }

    public function getBuildingValuePerSqmFormatAttribute()
    {
        return number_format($this->building_value_per_sqm, 2);
    }

    public function getComparableSizeOneAttribute()
    {
        return number_format($this->comparable_size1, 2);
    }

    public function getComparableSizeTwoAttribute()
    {
        return number_format($this->comparable_size2, 2);
    }

    public function getComparaleValuePerSqmOneFormatAttribute()
    {
        return number_format($this->comparable_value_per_sqm1, 2);
    }

    public function getComparaleValuePerSqmTwoFormatAttribute()
    {
        return number_format($this->comparable_value_per_sqm2, 2);
    }

    public function getComparableTotalValueOneFormatAttribute()
    {
        return number_format($this->comparable_total_value1, 2);
    }

    public function getComparableTotalValueTwoFormatAttribute()
    {
        return number_format($this->comparable_total_value2, 2);
    }

    public function getBuildingStatusWithStringAttribute()
    {
        return $this->building_status.' %' ?? '';
    }

    public function getBuildingAreaWithStringAttribute()
    {
        return number_format($this->building_size, 2).' sq. m';
    }

    public function getLandAreaWithStringAttribute()
    {
        return number_format($this->land_size, 2).' sq. m';
    }

    public function getRequestedDateFormatAttribute()
    {
        if ($this->requested_date) {
            return $this->requested_date->format('d-M-Y');
        }
    }

    public function getReportedDateFormatAttribute()
    {
        if ($this->reported_date) {
            return $this->reported_date->format('d-M-Y');
        }
    }

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

