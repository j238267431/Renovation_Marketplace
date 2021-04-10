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
                    <li><b>Я заказчик</b></li>
                    <li><a href="{{route('account.tasks')}}">Список заявок</a></li>
                    <li><a href="{{route('account.orders')}}">Список заказов</a></li>
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
        <div class="block-content">
          <div class="title indent-b30">
            <a href="#">Как найти исполнителя</a>
          </div>
          <a href="{{route('tasks.create')}}" class="btn btn-primary">Разместить заказ</a>
        </div>
      </div>
    </div>
  </div>
@endsection
