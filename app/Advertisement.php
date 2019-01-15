<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    //
    protected $fillable = [
        'name', 'image', 'url', 'approve'
    ];
}
