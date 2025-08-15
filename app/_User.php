<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _User extends Model
{
    protected $fillable = [
        'user_id','name','email','gender', 'nationality', 'country_code','mobile'
    ];
}
