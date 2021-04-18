<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Collection;

class AccountController extends Controller
{

public function index()
{
  $user = Auth::user();
  $hasCompany = $user->companies()->exists(); 
  
  return view('account.customer', ['user' => $user, 'hasCompany' => $hasCompany]);
}



}
