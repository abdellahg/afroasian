<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'active',
        'order',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function photos()
    {
        return $this->hasMany(Gphoto::class, 'gallery_id');
    }
}
