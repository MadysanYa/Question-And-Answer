<?php

namespace App\Models;
use App\Traits\DeleteByUserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borey extends Model
{
    use SoftDeletes;
    use DeleteByUserTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'boreys';
}