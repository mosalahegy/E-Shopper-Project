<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitesetting extends Model
{
    //
    protected $fillable = [
        'setting_name', 'setting_value', 'type'
    ];
}
