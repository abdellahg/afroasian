<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitesetting extends Model
{
    protected $fillable = [
        'slug', 'name_setting', 'value', 'type',
    ];
}
