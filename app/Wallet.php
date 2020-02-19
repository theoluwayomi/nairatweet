<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'account_name', 'account_number', 'bank_name', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function plan()
    {
        return $this->belongsTo('App\Plan');
    }
}
