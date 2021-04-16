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
    $hasCompany = $this->hasCompany($user);
    $orders = Auth::user()->orders;
    return view('account.orders', ['orders' => $orders, 'hasCompany' => $hasCompany]);
  }
}
