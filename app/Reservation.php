<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   protected $fillable = [
        'user_id', 'item_id', 'arrivaldate','depaturedate','persons','childs','total_amount', 'deposit_amount', 'total_paid', 'deposit_paid', 'status', 'user_notes','agent_notes', 'cancel_reason'
    ];
}
