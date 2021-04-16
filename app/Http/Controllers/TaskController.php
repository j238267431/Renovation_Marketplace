<?php

namespace App\Http\Controllers;


use App\Http\Requests\TaskCreate;
use App\Models\Category;
use App\Models\Order;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Выводит список всех заявок
     *
     * @return View
     */
    public function index(): View
    {
      $tasks = Task::latest('id')->paginate(4);
      return view('customers.orders.index', ['tasks' => $tasks]);
    }


  /**
   * Выводит список всех заявок для категории
   * @param Category $category
   * @return View
   */
    public function allFromCategory(Category $category): View
    {
      $tasks = $category->tasks()->get();
      return view('customers.orders.index', ['tasks' => $tasks]);
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
        $data['user_id'] = 1;
        $create = Task::create($data);
        if ($create){
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
//        dd($user);
        dd($task->user()->firstOrFail());
        //TODO order object from index method
        return view('customers.orders.show', [
            'order' => 12
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
