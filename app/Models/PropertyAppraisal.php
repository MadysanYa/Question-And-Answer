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
use App\Traits\DeleteByUserTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyAppraisal extends Model
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

    public function scopeQueryPropertyAppraisalGrid($query)
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

    public function getLandTotalValuePerSqmFormatAttribute()
    {
        return number_format($this->land_size * $this->land_value_per_sqm, 2);
    }

    public function getBuildingTotalValuePerSqmAttribute()
    {
        return $this->building_size_by_measurement * $this->building_value_per_sqm;
    }

    public function getBuildingTotalValuePerSqmFormatAttribute()
    {
        return number_format($this->building_size_by_measurement * $this->building_value_per_sqm, 2);
    }

    public function getFairMarketValueAttribute()
    {
        return $this->LandTotalValuePerSqm + $this->BuildingTotalValuePerSqm;
    }

    public function getFairMarketValueFormatAttribute()
    {
        return number_format($this->LandTotalValuePerSqm + $this->BuildingTotalValuePerSqm, 2);
    }

    public function getForcedSaleValueFormatAttribute()
    {
        return number_format(($this->FairMarketValue * 80) / 100, 2);
    }

    public function getPropertyTypeNameAttribute()
    {
        return optional($this->proType)->property_type_name;
    }

    public function getLandSizeFormatAttribute()
    {
        return number_format($this->land_size, 2);
    }

    public function getBuildingSizeByMeasurementFormatAttribute()
    {
        return number_format($this->building_size_by_measurement, 2);
    }

    public function getLandValuePerSqmFormatAttribute()
    {
        return number_format($this->land_value_per_sqm, 2);
    }

    public function getBuildingValuePerSqmFormatAttribute()
    {
        return number_format($this->building_value_per_sqm, 2);
    }

    public function getComparableSizeOneFormatAttribute()
    {
        return number_format($this->comparable_size1, 2);
    }

    public function getComparableSizeTwoFormatAttribute()
    {
        return number_format($this->comparable_id2, 2);
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

    public function getAppraisalCertificateFeeFormatAttribute()
    {
        return number_format($this->appraisal_certificate_fee * 4100, 2);
    }

    public function getLandAreaWithStringAttribute()
    {
        return number_format($this->land_size, 2).' sq. m';
    }

    public function getLandSizeByMeasurementStringAttribute()
    {
        return number_format($this->land_size_by_measurement, 2).' sq. m';
    }

    public function getBuildingSizeByMeasurementStringAttribute()
    {
        return number_format($this->building_size_by_measurement, 2).' sq. m';
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

    public function getIsPropertyRejectedAttribute($key)
    {
        if ($this->is_verified == 2 || $this->is_approved == 2) {
            return true;
        }

        return false;
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

    public function verified(){

    }

    public function approved(){

    }
}
