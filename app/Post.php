<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'links', 'user_id', 'plan_id'
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
