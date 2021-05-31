<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProposalCreate;
use App\Http\Requests\TaskCreate;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\CompaniesTasks;
use App\Models\Country;
use App\Models\Order;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use http\Cookie;
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
        $parentCategories = Category::whereNull("categories.parent_id")
            ->orderBy("name")
            ->get();

        $categories = Category::whereNotNull('categories.parent_id')
            ->withCount('tasks as counter')
            ->leftjoin("categories as parent_cat", "categories.parent_id", "=", "parent_cat.id")
            ->orderBy("parent_cat.name", "ASC")
            ->orderBy("categories.name")
            ->get()
            ->where('counter', '>', '0');

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
        $categories = Category::whereNotNull("parent_id")->get();
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
        $attachments = [];
        if ($request->file) {
            foreach ($request->file as $f) {
                $path = $f->store('uploads', 'public');
                $path_parts = pathinfo($path);
                $attachments[] = Attachment::create([
                    'title' => $path_parts["basename"],
                    'path' => $path,
                    'mime' => $f->getMimeType(),
                    'size' => $f->getSize(),
                ]);
            }
        }

        //TODO цена и пользователь не принимается на вход
        $data['user_id'] = Auth::id();
        $create = Task::create($data);
        if ($create) {
            if (!empty($attachments)) {
                $create->attachments()->saveMany($attachments);
            }
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
        $companyAlreadyResponded = false;
        foreach ($companiesResponded as $company) {
            $companyAlreadyResponded = $company->users()->get()->contains(Auth::id()) ? true : false;
        }
        $user = Auth::user();
        $taskCreator = $task->user;
        $profile = $taskCreator->profile;
        return view('customers.orders.show', [
            'task' => $task,
            'profile' => $profile,
            'companyAlreadyResponded' => $companyAlreadyResponded,
            'user' => $user,
            'taskCreator' => $taskCreator,
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
        return view(
            'customers.orders.edit',
            [
                "task" => $task,
                "categories" => Category::whereNotNull("parent_id")->get(),
            ]
        );
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
        // $data = $request->validated(); 
        if (Auth::id() !== $task->user->id) {
            return "fake!";
        }
        $task->update($request->all());
        $attachments = [];
        if ($request->file) {
            foreach ($request->file as $f) {
                $path = $f->store('uploads', 'public');
                $path_parts = pathinfo($path);
                $attachments[] = Attachment::create([
                    'title' => $path_parts["basename"],
                    'path' => $path,
                    'mime' => $f->getMimeType(),
                    'size' => $f->getSize(),
                ]);
            }
        }

        if (!empty($attachments)) {
            $task->attachments()->saveMany($attachments);
        }
        return redirect()->route('tasks.show', $task)
            ->with('success', 'Заявка обновлена');
        // return back()->with('fail', 'Не удалось обновить заявку');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->attachments()->delete();
        $task->delete();
        return redirect()->route("tasks.index");
    }

    public function taskResponseCreate($id)
    {
        $companies = Auth::user()->companies;
        $task = Task::query()->find($id);

        return view('companies.response.create', [
            'task' => $task,
            'companies' => $companies,

        ]);
    }
    public function taskResponseStore(ProposalCreate $request, $id)
    {

        $response = Task::query()->find($id)->response()->attach($request->company_id, [
            'price' => $request->budget,
            'comment' => $request->description,
            'created_at' => Carbon::now()->timezone('Europe/Moscow'),
            'updated_at' => Carbon::now()->timezone('Europe/Moscow'),
        ]);
        return redirect()->route('tasks.show', $id)
            ->with('success', 'Вы откликнулись на эту заявку');
    }

    public function taskResponseEdit($id)
    {
        $companies = Auth::user()->companies;
        $task = Task::query()->find($id);
        $respondedCompanies = $task->companies()->get();
        $respondedCompany = null;
        foreach ($respondedCompanies as $respondedCompany) {
            $companies->contains($respondedCompany->id) ? $respondedCompany = $respondedCompany : $respondedCompany = null;
        }
        $response = CompaniesTasks::query()
            ->where('company_id', '=', $respondedCompany->id)
            ->where('task_id', '=', $id)
            ->first();
        return view('companies.response.edit', [
            'task' => $task,
            'companies' => $companies,
            'respondedCompany' => $respondedCompany,
            'response' => $response,
        ]);
    }

    public function taskResponseUpdate(ProposalCreate $request, Task $task, $response)
    {
        CompaniesTasks::query()->find($response)->update([
            'price' => $request->budget,
            'comment' => $request->description,
            'updated_at' => Carbon::now()->timezone('Europe/Moscow'),
        ]);
        return redirect()->route('tasks.show', $task)->with('success', 'Отклик успешно отредактирован');
    }
}
