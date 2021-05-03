<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProposalCreate;
use App\Http\Requests\TaskCreate;
use App\Models\Category;
use App\Models\CompaniesTasks;
use App\Models\Country;
use App\Models\Order;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  private int $countOnePagePaginate = 5;

  /**
   * Выводит список всех заявок
   *
   * @return View
   */
  public function index(Request $request)
  {
    $categories = Category::whereNotNull('categories.parent_id')
      ->withCount('tasks as counter')
      ->leftjoin("categories as parent_cat", "categories.parent_id", "=", "parent_cat.id")
      ->orderBy("parent_cat.name", "ASC")
      ->orderBy("categories.name")
      ->get()
      ->where('counter', '>', '0');
    $parentCategories = Category::whereIn("id", $categories->pluck("parent_id")->toArray())->orderBy("name")->get();

    $categoryId = null;
    if ($request->input("category")) {
      $categoryId = $request->input("category");
      $tasks = Task::where('category_id', '=', $categoryId);
    } else {
      $tasks = Task::latest('id');
    }
    $tasks = $tasks->paginate($this->countOnePagePaginate);
    return view(
      'customers.orders.index',
      [
        'tasks' => $tasks,
        'parentCategories' => $parentCategories,
        'categories' => $categories,
        'category'   => Category::find($categoryId)
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
    return view('customers.orders.index', [
      'tasks' => $tasks,
      'categories' => $categories,
      'category' => $category
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
      $companiesResponded = $task->response()->get();
      $TESTcompaniesResponded = $task->responses()->get();
      $companyAlreadyResponded = false;
      foreach ($companiesResponded as $company){
          $companyAlreadyResponded = $company->users()->get()->contains(Auth::id()) ? true : false;
      }
    $id = $task->id;
    $user = $task->user;
    $profile = $user->profile;
    return view('customers.orders.show', [
        'id' => $id,
        'task' => $task,
        'profile' => $profile,
        'companyAlreadyResponded' => $companyAlreadyResponded,
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

  public function taskResponseCreate($id)
  {
      $companies = Auth::user()->companies;
      $task = Task::query()->find($id);

    return view('companies.response.create',[
        'task' => $task,
        'companies' => $companies,

    ]);
  }
    public function taskResponseStore(ProposalCreate $request, $id)
    {

        $response = Task::query()->find($id)->response()->attach($request->company_id, [
            'price'=>$request->budget,
            'comment' => $request->description,
            'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            'updated_at' => Carbon::now()->timezone('Europe/Moscow'),
        ]);
            return redirect()->route('tasks.show', $id)->with('success', 'Вы откликнулись на эту заявку');
    }

    public function taskResponseEdit($id)
    {

        $companies = Auth::user()->companies;
        $task = Task::query()->find($id);
        $respondedCompanies = $task->companies()->get();
        $respondedCompany = null;
        foreach ($respondedCompanies as $respondedCompany){
            $companies->contains($respondedCompany->id) ? $respondedCompany = $respondedCompany : $respondedCompany = null;
        }
        $response = CompaniesTasks::query()
            ->where('company_id', '=', $respondedCompany->id)
            ->where('task_id', '=', $id)
            ->first();
        return view('companies.response.edit',[
            'task' => $task,
            'companies' => $companies,
            'respondedCompany' => $respondedCompany,
            'response' => $response,
        ]);
    }

    public function taskResponseUpdate(ProposalCreate $request, Task $task, $response)
    {
        CompaniesTasks::query()->find($response)->update([
            'price'=>$request->budget,
            'comment' => $request->description,
            'updated_at' => Carbon::now()->timezone('Europe/Moscow'),
        ]);
        return redirect()->route('tasks.show', $task)->with('success', 'Отклик успешно отредактирован');

    }
}
