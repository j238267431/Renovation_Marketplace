<?php

namespace App\View\Components\Home;

use App\Models\Company;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActiveDevelopers extends Component
{
  public $companies = [];
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->companies = Company::active(12)->withCount(['orders', 'reviews'])->get();
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return View|Closure|string
   */
  public function render()
  {
    return view('components.home.active-developers');
  }
}
