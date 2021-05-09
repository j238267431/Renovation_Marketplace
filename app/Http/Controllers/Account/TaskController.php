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

    $hasCompany = $user->companies()->exists();
    $tasks = Auth::user()->tasks()->paginate(4);

    return view('account.tasks', ['tasks' => $tasks, 'hasCompany' => $hasCompany]);
  }
  public function show(Task $task)
  {
//      $companiesAndResponses = $task->load('companiesAndResponses');
      $companiesAndResponses = $task->companiesAndResponses()->paginate(4);
      return view('account.tasks.show', [
          'task' => $task,
          'companiesAndResponses' => $companiesAndResponses,
      ]);
  }
}
