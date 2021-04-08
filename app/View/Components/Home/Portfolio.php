<?php

namespace App\View\Components\Home;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Portfolio extends Component
{
  public Collection $projects;


  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->projects = Project::query()
      ->latest()
      ->with(['company'])
      ->take(10)
      ->get();
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return View|Closure|string
   */
  public function render()
  {
    return view('components.home.portfolio');
  }

}
