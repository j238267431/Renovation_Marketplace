<?php

namespace App\View\Components\Home;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class TopCategories extends Component
{
  public $categories;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->categories = Category::query()
      ->whereNotNull('parent_id')
      ->with(['parent'])
      ->withCount(['tasks', 'offers'])
      ->get();

    $this->categories = $this->categories->sortByDesc(function ($row, $key) {
      return $row['tasks_count'] + $row['offers_count'];
    })->take(10);
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return View|Closure|string
   */
  public function render()
  {
    return view('components.home.top-categories');
  }
}
