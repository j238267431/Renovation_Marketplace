<?php

namespace App\View\Components\Home;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Categories extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */
  // private Collection $categories;
  public function __construct()
  {
    // $this->categories = Category::all();//withCount('projects')->where('projects_count', '>', 0)->get()->sortBy('name');
    //
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.home.categories');
  }
}
