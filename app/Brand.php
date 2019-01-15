<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'category_id','approve'
    ];

    public function products()
    {
        # code...
        return $this->hasMany('App\Product');
    }
    public function category(Type $var = null)
    {
        # code...
        return $this->belongsTo('App\Category');
    }
}
