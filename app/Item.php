<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'active',
        'category_id',
        'destination_id',
        'price',
    ];
}
