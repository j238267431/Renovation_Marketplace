<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function index()
  {
    $customers = $this->getCustomers();
    return view('customers.index', ['customers' => $customers]);
  }

  public function view($id)
  {
    $customer = current(array_filter($this->getCustomers(), function ($c) use ($id) {
      return $c["id"] == $id;
    }));
    return view('customers.view', ['customer' => $customer]);
  }

  private function getCustomers()
  {
    return [
      [
        'id' => 1,
        'user_id' => 1,
        'name' => 'Иванов Иван Иванович',
        'status' => 1,
        'email' => 'ione@kremlin.club',
        'create_time' => '2021-03-25 10:00:00'
      ],
      [
        'id' => 2,
        'user_id' => 2,
        'name' => 'Сталонне Тимур Тахирович',
        'status' => 1,
        'email' => 'slayteam@mail.ru',
        'create_time' => '2021-03-25 10:00:00'
      ],
      [
        'id' => 3,
        'user_id' => 3,
        'name' => 'Рубан Сергей Альбертович',
        'status' => 0,
        'email' => 'ruban-sergey@yandex.ru',
        'create_time' => '2021-03-25 10:00:00'
      ],
    ];
  }
}
