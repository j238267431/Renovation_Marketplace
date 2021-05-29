<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  public function orders()
  {
    $user = Auth::user();
    $hasCompany = $user->companies()->exists();
    $orders = $user->orders;
    return view('account.orders', ['orders' => $orders, 'hasCompany' => $hasCompany]);
  }

  public function ordersFulfilling()
  {
      $statuses = Status::all();
      $user = Auth::user();
      $companies = Auth::user()->companies;
      $hasCompany = $user->companies()->exists();
      return view('companies.orders.index', [
          'hasCompany' => $hasCompany,
          'companies' => $companies,
          'statuses' => $statuses] );
  }

  public function changeStatus(Request $request)
  {
      $orderId = $request->get('id');
      $statusId = $request->get('statusId');
      $newStatus = Order::query()->find($orderId)->update([
          'status_id' => $statusId
      ]);
      if ($newStatus){
          return true;
      }
      return false;
  }
  public function orderConfirm(Request $request)
  {
      $orderId = $request->get('id');
      $newStatus = Order::query()->find($orderId)->update([
          'status_id' => 5
      ]);
      if ($newStatus){
          return true;
      }
      return false;
  }
}
