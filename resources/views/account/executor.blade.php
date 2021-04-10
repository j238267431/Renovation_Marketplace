@extends('layouts.index')
@section('content')
  @include('components.account.navigation')
  <div class="wrapper tab-content">
    <div class="clearfix tab-pane fade show active">
      <div class="sidebar">
        <div class="navbar navbar-toggleable">
          <div class="navbar-collapse">
            <div class="navbar-nav">
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle">Навигация</a>
                <div class="dropdown-menu block-content text_field">
                  <ul class="list-unstyled list-wide">
                    <li><a href="{{route('account.customer')}}">Я заказчик</a></li>
                    <li><a href="{{route('account.tasks')}}">Список заявок</a></li>
                    <li><a href="{{route('account.orders')}}">Список заказов</a></li>
                    <li><b>Выбранные исполнители</b></li>
                    <li><a href="#">Безопасные платежи</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="page_content">
        <div class="block-content text-muted">
          <table class="table table-striped">
            <thead>
            <tr>
              <th scope="col">Название</th>
              <th scope="col">Телефон</th>
              <th scope="col">e-mail</th>
              <th scope="col">заказы</th>
            </tr>
            </thead>
          @foreach($orders as $order)
              <tbody>
              <tr>
                <td>{{$order->company->name}}</td>
                <td>{{$order->company->phone}}</td>
                <td>{{$order->company->email}}</td>
                <td>{{$order->details}}</td>
              </tr>
          @endforeach
              </tbody>
            </table>
        </div>
      </div>
    </div>
@endsection
