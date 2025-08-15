<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Survey extends Model
{
    protected $fillable = [
        'user_id',
        'city_id',
        'hotel',
        'driver',
        'cars',
        'leader',
        'tour',
        'guide',
    ];
}
