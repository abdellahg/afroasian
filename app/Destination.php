<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'order',
        'active',
        'foreign',
    ];

    protected $casts = [
        'active' => 'boolean',
        'foreign' => 'boolean',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
