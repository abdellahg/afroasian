<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagessetting extends Model
{
    
    protected $fillable = [
        'slug', 'name_setting', 'value', 'updated_at'
    ];
    
    
}
