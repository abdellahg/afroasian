<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homesetting extends Model
{
    protected $fillable = [
        'slug', 'name_setting', 'value', 
    ];
}
