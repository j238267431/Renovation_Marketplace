<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

public function index()
{
  $user = Auth::user();
  $hasCompany = $this->hasCompany($user); // todo понять зачем это и исправить

  return view('account.customer', [
      'user' => $user,
      'hasCompany' => $hasCompany,
  ]);
}



}
