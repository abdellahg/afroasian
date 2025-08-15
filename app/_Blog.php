<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'text',
        'blog_id',
        'locale_id',
    ];
}
