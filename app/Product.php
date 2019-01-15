<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name', 'description', 'approve', 'price', 'status', 'rating', 'image', 'country', 'quantity', 'category_id','brand_id'
    ];
    
    public function user()
    {
        # code...
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        # code...
        return $this->belongsTo('App\Category');
    }
    public function brand()
    {
        # code...
        return $this->belongsTo('App\Brand');
    }

    
}
