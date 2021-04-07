@extends('layouts.index')
@section('content')
  <div class="page_header">
    <div class="wrapper cols_table no_hover">
      <div class="row">
        <div class="col page_header_content">
          <h1>Я заказчик</h1>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Строительная биржа</a></li>
            <li class="breadcrumb-item"><a href="#">Аккаунт</a></li>
            <li class="breadcrumb-item active">"Я заказчик"</li>
          </ol>
        </div>
        <div class="col-aut d-flex flex-column page_header_sidebar">
          <a href="{{route('tasks.create')}}" class="btn btn-success">Разместить заказ</a>
        </div>
      </div>
    </div>
  </div>
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
                    <li><a href="#">Список заказов</a></li>
                    <li><a href="#">Выбранные исполнители</a></li>
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
