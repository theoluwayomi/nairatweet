<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function getNameAttribute($value) {
        $value = str_replace(" ", " <strong>", $value);
        return $value.'</strong>';
    }

    public function getAmountAttribute($value) {
        return $value == 0 ? 'Free' : $value;
    }

    public function getName() {
        return str_replace("</strong>", "", str_replace(" <strong>", " ", $this->name));
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
