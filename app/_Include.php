<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Include extends Model
{
    protected $fillable = [
        'text',
        'item_id',
        'locale_id',
    ];
}
