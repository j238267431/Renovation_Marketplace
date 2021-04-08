<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Выводит список всех проектов
     */
    public function index()
    {
      echo "Скоро здесь будут все проекты застройщиков";
    }

    /**
   * Выводит страницу конретного проекта
   *
   * @return View
   */
    public function show(Project $project)
    {
      echo "Скоро здесь будет описание проекта #" . $project->id;
    }
}
