<?php

namespace App\Models;
use App\Models\PropertyIndicator;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
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