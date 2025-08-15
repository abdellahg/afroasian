<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Gallery extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'gallery_id',
        'locale_id',
    ];
}
