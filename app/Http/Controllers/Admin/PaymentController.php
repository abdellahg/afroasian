<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;
use DB;

class PaymentController extends Controller
{
    public function payments(){
         $payments = DB::table('payments')
             ->orderby('id', 'desc')
             ->get();
        return view('admin.pages.payments.index')
        ->with('payments', $payments);
    }
}
