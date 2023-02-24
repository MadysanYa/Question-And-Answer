<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait DeleteByUserTrait
{
    protected static function boot()
    {
        parent::boot();

        // static::creating(function ($model) {
        //     $model->created_by = Auth::User()->id;
        // });

        // static::updating(function ($model) {
        //     $model->updated_by = Auth::User()->id;
        // });

        // AUTO LOG USER DELETED RECORD
        static::deleting(function ($model) {
            $model->deleted_by = Auth::User()->id;
            $model->save();
        });

        // static::restoring(function ($model) {
        //     $model->restored_by = Auth::User()->id;
        // });
    }
}