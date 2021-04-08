<?php

namespace App\View\Components\Main;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
  public $email;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->email = env('COMPANY_SUPPORT_EMAIL', 'support@stroyhouse.site');
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return View|Closure|string
   */
  public function render()
  {
    return view('components.main.footer');
  }
}
