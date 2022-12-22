<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyAppraisal extends Model
{
    public function setphotoAttribute($pictures)
    {
        if (is_string($pictures)) {
            $this->attributes['photo'] = json_encode($pictures);
        }
    }

    public function getphotoAttribute($pictures)
    {
        return json_decode($pictures, true);
    }

}