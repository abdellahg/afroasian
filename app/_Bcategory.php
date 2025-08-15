<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Bcategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'locale_id',
    ];
}
