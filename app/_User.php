<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _User extends Model
{
    protected $table = 'user_profiles';
    protected $fillable = [
        'user_id','name','email','gender', 'nationality', 'country_code','mobile'
    ];
}
