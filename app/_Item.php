<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Item extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'meta_description',
        'meta_keywords',
        'price_policy',
        'notes',
        'locale_id',
    ];
}
