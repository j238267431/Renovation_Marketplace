<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private int $countOnePagePaginate = 5;
    /**
     * Выводит список всех проектов независимо от компании
     */
    public function index()
    {
      $allProjects = Project::with(['company', 'category', 'images'])
          ->inRandomOrder()->paginate(20);
      return view('projects.index', ['projects' => $allProjects]);
    }

    public function showAllProjectsOfOneCompany(Company $company){
        $projects = $company->projects()->paginate($this->countOnePagePaginate);

        return view('companies.projects', [
            'company'     => $company,
            'projects'    => $projects]);
    }

    /**
     * Выводит страницу конретного проекта
     *
     * @param Project $project
     * @return View
     */
    public function show(Project $project):View
    {
        $companyOfProject = $project->company()->firstOrFail();
        $categoryOfProject = $project->category()->first();
        $imagesOfProject = $project->images()->get();
        return view('projects.showOne', [
            'project' => $project,
            'company' => $companyOfProject,
            'category' => $categoryOfProject,
            'images'    => $imagesOfProject
        ]);
    }
}
