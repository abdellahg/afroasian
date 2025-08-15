<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    public function isLtr(){
        return (bool) $this->ltr;
    }
}
