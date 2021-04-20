@extends('layouts.index')

@section('content')
<div class="page_header">
  <div class="wrapper cols_table no_hover">
    <div class="row">
      <div class="col page_header_content">
        <h1>Все заказы</h1>
      </div>
    </div>
  </div>
</div>
<div class="wrapper tab-content">
  <div class="clearfix tab-pane fade show active" id="tab_pane-main">
    <div class="sidebar sidebar-left">
      <div class="navbar navbar-toggleable">
        <div class="navbar-collapse">
          <div>
            <div class="block-content">
              <a class="btn btn-success btn-md btn-block" href="{{ route('tasks.create') }}" data-btn_type="freelancers" rel="nofollow">
                <b>Разместить заказ</b>
              </a>
            </div>
            <hr>
            <div class="navbar-nav">
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Категория</a>
                <div class="dropdown-menu block-content text_field">
                  @if(isset($categories)&&(!empty($categories)))
                  <ul class="list-unstyled list-wide category_tree toggle_parents">
                    @foreach ($categories as $category)
                    <li>
                      <a> $category->name </a>
                      <span class="num"> $category->projects->count()</span>
                    </li>
                    @endforeach
                  </ul>
                  @else
                  <p>Нет категорий</p>
                  @endif
<<<<<<< HEAD
=======


{{--<h1>Все заказы</h1>--}}
{{--    <br>--}}
{{--    <div>--}}
{{--        @foreach($tasks as $task)--}}
{{--            <a href="{{route('tasks.show',['task' => $task->id])}}">{{$task->id}}</a>--}}
{{--            <h4>{{$task->title}}</h4>--}}
{{--            <p>{{$task->description}}</p>--}}
{{--            <p>{{$task->categoryName->name}}</p>--}}
{{--            <br><br>--}}

>>>>>>> eba6c839c6f55ef6752cbdee9cb6c02d67819230
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page_content d-flex flex-column">
      <div class="cols_table no_hover indent-b10">
        <div class="row">
          <div class="col">
            <form action="/jobs/"><input type="hidden" name="action" value="search">
              <input type="text" class="form-control form-control-md form-control-branded typeahead autosubmit" name="query" placeholder="Поиск по заказам" autocomplete="off">
              <ul class="typeahead dropdown-menu"></ul>
              <a class="btn btn-transparent btn-submit" title="Найти"><i class="icon-search"></i></a>
            </form>
          </div>
          <div class="col-sm-5 col-md-4 col-lg-3"><a class="btn btn-secondary btn-md btn-block need_login" data-toggle="modal" data-target="#filter_form">Настроить фильтр</a></div>
        </div>
      </div>
      <div class="cols_table divided_rows">
        @if(isset($tasks)&&(!empty($tasks)))
        @foreach ($tasks as $task)
        <div class="row click_container-link set_href">
          <div class="col-sm-10">
            <div class="title">
              <a class="text-bold show_visited" href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
            </div>
            <div class="text_field text-inline"><span class="snippet">{!! $task->description !!}</div>
          </div>
          <div class="col-sm-2 text-sm-right">
            <div class="float-right float-sm-none title amount indent-xs-b0">
              <span data-toggle="tooltip" title="" data-original-title="725 грн • 1 959 руб">
                {{ $task->budget }}
              </span>
            </div>
            <div class="float-left float-sm-none text_field">23 заявки</div>
          </div>
          <div class="col-sm-8 text-muted dot_divided d-flex"><span class="text-nowrap"><a class="text-muted" href="/jobs/nejming-i-slogany-86/">Нейминг и&nbsp;Слоганы</a></span></div>
          <div class="col-sm-4 text-sm-right"><span class="text-muted">Открыт <span data-toggle="tooltip" title="" data-timestamp="1618322266" class="time_ago" data-original-title="13.04.2021 в 16:57">17 часов назад</span></span></div>
        </div>
        @endforeach
            {{$tasks->links()}}
        @else
        Нет заказов
        @endif
      </div>
    </div>
<<<<<<< HEAD
=======


{{--@endsection--}}

>>>>>>> eba6c839c6f55ef6752cbdee9cb6c02d67819230
  </div>

</div>
<<<<<<< HEAD
@endsection
=======

@endsection
>>>>>>> eba6c839c6f55ef6752cbdee9cb6c02d67819230
