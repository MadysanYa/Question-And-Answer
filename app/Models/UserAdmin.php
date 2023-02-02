<?php

namespace App\Models;
use App\Models\PropertyIndicator;
use Illuminate\Database\Eloquent\Model;

class UserAdmin extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin_users';

    public function propertyIndicator()
    {
        return $this->hasMany(PropertyIndicator::class);
    }
}
