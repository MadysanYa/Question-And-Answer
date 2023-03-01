<?php

namespace App\Models;
use App\Traits\DeleteByUserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiskIndicator extends Model
{
    use SoftDeletes;
    use DeleteByUserTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'risk_indicators';
    
    public function setLatitudeAttribute($value)
    {
        $this->attributes['latitude'] = trim($value,"_");
    }

    public function setLongtitudeAttribute($value)
    {
        $this->attributes['longtitude'] = trim($value,"_");
    }

}