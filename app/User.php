<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'last_name', 'first_name', 'mobile_number', 'gender', 'email', 'password', 'twitter_handle',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is($roleName) {
        foreach ($this->roles as $role) {
            if (strtolower($role->name) == strtolower($roleName) || strtolower($role->name) == 'admin') {
                // dd($role->name);
                return true;
            }
        }
        return false;
    }


    public function hasRole() {
        if (count($this->roles) > 0) {
            return true;
        }
        return false;
    }

    public function wallet()
    {
        return $this->hasOne('App\Wallet');
    }

    public function withdrawals()
    {
        return $this->hasMany('App\Withdrawal');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function transfer()
    {
        return $this->hasMany('App\Transfer');
    }
    
    public function roles() {
        return $this->belongsToMany('App\Role');
    }
}
