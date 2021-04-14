<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  public function tasks()
  {
    $user = Auth::user();
    $hasCompany = $this->hasCompany($user);
    $tasks = Auth::user()->tasks;
    return view('account.tasks', ['tasks' => $tasks, 'hasCompany' => $hasCompany]);
  }
}
