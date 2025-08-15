<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Category extends Model
{
   protected $fillable = [
        'name',
        'slug',
        'locale_id',
    ];
    
}

