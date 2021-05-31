@extends('layouts.index')
@section('content')
@include('includes.title', [
'title' => 'Личный кабинет',
'breadcrumbs' => 'account.tasks'
])
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
                  <x-account.right-menu />
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

              <td><a href="{{route('account.tasks.show', $task)}}">{{$task->title}}</a></td>
              <td>{{ strip_tags($task->description) }}</td>
              <td>{{ $task->budget ?? "Не указан" }}</td>

            </tr>

            @endforeach
          </tbody>
        </table>
        {{$tasks->links()}}
      </div>
    </div>
  </div>
</div>
@endsection
