<?php

namespace App\View\Components\Home;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Tasks extends Component
{
  public Collection $topCategories;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->topCategories = Category::top()->with(['children.tasks'])->get();
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return View|Closure|string
   */
  public function render()
  {
    return view('components.home.tasks');
  }
}
