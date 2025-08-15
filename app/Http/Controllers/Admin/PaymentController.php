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
            ->leftJoin('users', 'payments.user_id', '=', 'users.id')
            ->select(
                'payments.*',
                DB::raw('COALESCE(users.name, "") as firstname'),
                DB::raw("'' as lastname"),
                'users.email',
                DB::raw('payments.id as order_id'),
                DB::raw('payments.created_at as record_time')
            )
            ->orderByDesc('payments.id')
            ->get();
        return view('admin.pages.payments.index')
        ->with('payments', $payments);
    }
}
