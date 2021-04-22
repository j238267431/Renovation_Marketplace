<?php

namespace App\Http\Controllers;


use App\Http\Requests\TaskCreate;
use App\Models\Category;
use App\Models\Order;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

  /**
   * Выводит список всех заявок
   *
   * @return View
   */
  public function index(Request $request): View
  {
    $categories = Category::withCount('tasks as counter')->get()->where('counter', '>', 0);
    $category = null;
    if ($request->input("category")) {
      $category = $request->input("category");
      $tasks = Task::where('category_id', '=', $category)->paginate(4);
    } else {
      // $companies = Company::inRandomOrder();
      $tasks = Task::latest('id')->paginate(4);
    }
    return view(
      'customers.orders.index',
      [
        'tasks' => $tasks,
        'categories' => $categories,
        'category'   => $category,
        'categoryId' => null,
      ]
    );
  }



  /**
   * Выводит список всех заявок для категории
   * @param Category $category
   * @return View
   */

  public function allFromCategory(Category $category): View
  {
    $tasks = $category->tasks()->paginate(4);
    $categories = Category::withCount('tasks as counter')->get()->where('counter', '>', 0);
    $categoryId = $category->id;
    return view('customers.orders.index', [
      'tasks' => $tasks,
      'categories' => $categories,
      'category' => $category,
      'categoryName' => $category->name
    ]);
  }



  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //TODO доделать шаблон для формы создания заказа
    $categories = Category::all();
    return view('customers.orders.create', ['categories' => $categories]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \App\Http\Requests\TaskCreate $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(TaskCreate $request)
  {
    $data = $request->validated();
    //TODO цена и пользователь не принимается на вход
    $data['user_id'] = Auth::user()->id;
    $create = Task::create($data);
    if ($create) {
      return redirect()->route('tasks.index')->with('success', 'Заявка успешно добавлена');
    }
    return back()->with('fail', 'Не удалось добавить заявку');
  }


  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Task $task
   * @return \Illuminate\Http\Response
   */
  public function show(Task $task)
  {
    $user = $task->with('user')->get();
    $id = $task->id;

    return view('customers.orders.show', [
      'id' => $id,
      'task' => $task,
    ]);
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Task $task
   * @return \Illuminate\Http\Response
   */
  public function edit(Task $task)
  {
    return view('customers.orders.edit');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Task $task
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Task $task)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Task $task
   * @return \Illuminate\Http\Response
   */
  public function destroy(Task $task)
  {
    //
  }
}
