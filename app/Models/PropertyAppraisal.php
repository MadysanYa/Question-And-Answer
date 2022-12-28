<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyAppraisal extends Model

{
    public  function setPhotosAttribute($photos)
    {
        if (is_array($photos)) {
            $this->attributes['photos'] = json_encode($photos);
        }
    }

    public  function getPhotosAttribute($photos)
    {
        return json_decode($photos, true);
    }

}