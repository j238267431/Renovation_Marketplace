<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\CompaniesTasks;
use App\Models\Company;
use App\Models\Order;
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

  public function confirmOffer(Task $task, $companyResponded)
  {
    $order = Order::query()->create([
       'customer_id' => Auth::id(),
       'company_id' => $companyResponded,
        'status_id' => 2,
        'details' => $task->description,
    ]);
    if($order){
        return redirect()->route('account.orders')->with('success', 'успешно выбрана компания '.Company::query()->find($companyResponded)->name);
    }
    return back()->with('fail', 'не удалось выбрать компанию');
  }

  public function deleteOffers(Request $request)
  {
      $task = $request->get('task');
      CompaniesTasks::query()->where('task_id', '=', $task['id'])->delete();
      Task::query()->find($task['id'])->delete();
  }
}
