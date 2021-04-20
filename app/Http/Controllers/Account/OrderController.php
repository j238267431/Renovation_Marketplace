<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  public function orders()
  {
    $user = Auth::user();
    $hasCompany = $user->companies()->exists();
    $orders = $user->orders();
    return view('account.orders', ['orders' => $orders, 'hasCompany' => $hasCompany]);
  }
}
