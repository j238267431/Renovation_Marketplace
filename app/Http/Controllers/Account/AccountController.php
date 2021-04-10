<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    public function tasks()
    {
      $tasks = Task::all()->where('user_id', '=', Auth::id());
      return view('account.tasks', ['tasks' => $tasks]);
    }

  public function orders()
  {
    $orders = Order::all()->where('customer_id', '=', Auth::id());
    return view('account.orders', ['orders' => $orders]);
  }

  public function companies()
  {
    $orders = User::find(Auth::id())->orders;

    return view('account.executor', ['orders' => $orders]);
  }
}
