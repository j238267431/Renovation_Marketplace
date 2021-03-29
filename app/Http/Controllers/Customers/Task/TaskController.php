<?php

namespace App\Http\Controllers\Customers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreate;
use App\Models\Category;
use App\Models\Customers\Order;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO вывод всех tasks без фильтра и авторизации по пользователю
        $tasks = Task::all();
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
     * @param  \Illuminate\Http\Request  $request
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
     * @param  \App\Models\Customers\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //TODO order object from index method
        return view('customers.orders.show', [
            'order' => 12
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('customers.orders.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
