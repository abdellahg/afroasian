<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Itinerary extends Model
{
     protected $fillable = [
        'title',
        'text',
        'item_id',
        'locale_id',
    ];
}
