<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static function isVerifierRole(){
        $roles = Auth()->user()->roles()->get();
        
        foreach($roles as $role){ 
            if(strtoupper($role['name']) == 'VERIFIER') return true;
        }

        return false;
    }

    static function isApproverRole(){
        $roles = Auth()->user()->roles()->get();
        
        foreach($roles as $role){ 
            if(strtoupper($role['name']) == 'APPROVER') return true;
        }

        return false;
    }

    static function isRmRole(){
        $roles = Auth()->user()->roles()->get();
        
        foreach($roles as $role){ 
            if(strtoupper($role['name']) == 'RM') return true;
        }

        return false;
    }
}
