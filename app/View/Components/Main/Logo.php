<?php

namespace App\View\Components\Main;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logo extends Component
{
  protected string $classList;

  /**
   * Create a new component instance.
   *
   * @param string $classList
   */
  public function __construct(string $classList = '')
  {
    $this->classList = $classList;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return View|Closure|string
   */
  public function render()
  {
    return view('components.main.logo')->with('classList', $this->classList);
  }
}
