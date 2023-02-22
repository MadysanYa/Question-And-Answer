<?php

namespace App\Models;
use App\Models\PropertyIndicator;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Scope Query
     */
    public function scopeQueryAdminUserGrid($query)
    {
        $userLogin = Auth::user();

        if (User::isManagerRole()) {
            return $query->where('user_id', $userLogin->id);
        } 

        return $query;
    }
}
