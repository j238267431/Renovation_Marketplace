<?php

namespace App\View\Components\Main;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LeftMenu extends Component
{
  protected array $menu = [];

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->menu = [
      [
        'route' => 'tasks.index',
        'value' => 'Заявки',
        'title' => 'Заявки клиентов',
      ],
      [
        'value' => 'Подрядчики',
        'submenu' => [
          [ 'route' => 'companies.index', 'value' => 'Каталог подрядчиков', 'title' => 'Лучшие подрядчики' ],
          [ 'route' => 'projects.index', 'value' => 'Проекты подрядчиков', 'title' => 'Популярные проекты' ],
        ],
      ],
//      [
//        'route' => '/blog',
//        'value' => 'Блог',
//        'title' => 'Блог о строительстве и отделке',
//      ],
//      [
//        'route' => '/forum',
//        'value' => 'Форум',
//        'title' => 'Форум СтройХаус',
//        'rel' => 'nofollow',
//      ],
    ];
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return View|Closure|string
   */
  public function render()
  {
    return view('components.main.left-menu')->with('menu', $this->menu);
  }
}
