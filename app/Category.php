<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function user()
    {
        # code...
        return $this->belongsTo('App\User');
    }
    public function products()
    {
        # code...
        return $this->hasMany('App\Product');
    }
    public function brands()
    {
        # code...
        return $this->hasMany('App\Brand');
    }
}
