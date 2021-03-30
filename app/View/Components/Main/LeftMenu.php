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
        'link' => '/tasks',
        'value' => 'Работа',
        'title' => 'Заявки клиентов',
      ],
      [
        'value' => 'Подрядчики',
        'submenu' => [
          [ 'link' => '/developers', 'value' => 'Каталог подрядчиков', 'title' => 'Лучшие подрядчики' ],
          [ 'link' => '/projects', 'value' => 'Проекты подрядчиков', 'title' => 'Популярные проекты' ],
          [ 'link' => '/portfolio', 'value' => 'Работы подрядчиков', 'title' => 'Примеры работ' ],
        ],
      ],
      [
        'link' => '/blog',
        'value' => 'Блог',
        'title' => 'Блог о строительстве и отделке',
      ],
      [
        'link' => '/forum',
        'value' => 'Форум',
        'title' => 'Форум СтройХаус',
        'rel' => 'nofollow',
      ],
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
