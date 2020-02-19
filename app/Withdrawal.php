<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = [
        'amount', 'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User')->with('wallet');
    }
}
