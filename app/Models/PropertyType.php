<?php

namespace App\Models;
use App\Models\PropertyIndicator;
use App\Traits\DeleteByUserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyType extends Model
{
    use SoftDeletes;
    use DeleteByUserTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'property_types';

    public function proIndicator()
    {
        return $this->hasMany(PropertyIndicator::class);
    }
}