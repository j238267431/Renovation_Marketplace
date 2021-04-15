@extends('layouts.index')
@section('content')
  <x-account.navigation :hasCompany="$hasCompany"/>
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
                    <x-account.right-menu/>
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
            <th scope="col">Описание</th>
            <th scope="col">Бюджет</th>
          </tr>
          </thead>
          @foreach($tasks as $task)
            <tbody>
            <tr>
              <td>{{$task->title}}</td>
              <td>{{$task->description}}</td>
              <td>{{$task->budget}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
