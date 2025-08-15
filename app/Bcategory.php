<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bcategory extends Model
{
    protected $fillable = [
        'active',
        'order',
        'photo',
    ];
}
