<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gphoto extends Model
{
    protected $fillable = [
        'photo_title',
        'gallery_id',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
