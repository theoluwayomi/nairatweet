<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'user_id', 'recipient', 'amount'
    ];
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
