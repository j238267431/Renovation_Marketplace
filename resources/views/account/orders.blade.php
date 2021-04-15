@extends('layouts.index')
@section('content')
<x-account.navigation/>
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
                    <li><a href="{{route('account')}}">Я заказчик</a></li>
                    <li><a href="{{route('account.tasks')}}">Список заявок</a></li>
                    <li><b>Список заказов</b></li>
                    <li><a href="{{route('account.executor')}}">Выбранные исполнители</a></li>
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
              <th scope="col">Описание</th>
            </tr>
            </thead>
            @foreach($orders as $order)
                <tbody>
                  <tr>
                    <td>{{$order->details}}</td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
    </div>
  </div>

@endsection
