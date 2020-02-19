<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'tweet_1', 'tweet_2', 'tweet_3', 'date'
    ];
}
