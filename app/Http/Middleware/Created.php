<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Created
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->task;
        $task = Task::query()->find($id);
        $companiesResponded = $task->response()->get();
        $companyAlreadyResponded = false;
        foreach ($companiesResponded as $company){
            $companyAlreadyResponded = $company->users()->get()->contains(Auth::id()) ? true : false;
        }
        if($companyAlreadyResponded){
            return redirect()->route('tasks.show', $id)->with('fail', 'Вы уже откликались на эту заявку');
        }
        return $next($request);
    }
}
