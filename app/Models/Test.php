<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory;

    public function getDateFormatAttribute()
    {
        if ($this->date) {
            return date('l, jS F Y', strtotime($this->date));
        } 
    }

    public function getDurationFormatAttribute()
    {
        if ($this->duration) {
            $format = date('H:i', strtotime($this->duration));
            $explode = explode(":", $format);

            if ($explode[0] >= 1) {
                return $format." hour";
            }

            return $format." minute";
        } 
    }
}
