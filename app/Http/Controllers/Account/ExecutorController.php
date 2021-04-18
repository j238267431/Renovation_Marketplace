<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExecutorController extends Controller
{
  public function companies()
  {
    $user = Auth::user();
    $hasCompany = $user->companies()->exists();
    $orders = $user->orders();
    return view('account.executor', ['orders' => $orders, 'hasCompany' => $hasCompany]);
  }
}
