@extends('layouts.index')

@section('content')

@include('includes.title', [
'title' => 'Все заказы' . ($category ? ' в категории ' . $category->name : ''),
'breadcrumbs' => 'tasks'
])

<div class="wrapper tab-content">
  <div class="clearfix tab-pane fade show active" id="tab_pane-main">
    @component('components.home.categories', [
    "allItemsText" => "Все заказы",
    "showCreateTaskButton" => true,
    "parentCategories" => $parentCategories,
    "categories" => $categories,
    "linkRoute" => 'tasks.index',
    "category" => $category, 
    ])
    @endcomponent
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
        @forelse($tasks as $task)
        <div class="row click_container-link set_href">
          <div class="col-sm-10">
            <div class="title">
              <a class="text-bold show_visited" href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
            </div>
            <div class="float-right float-sm-none title amount indent-xs-b0">
              <span data-toggle="tooltip" title="" data-original-title="725 грн • 1 959 руб">@if($task->budget){{$task->budget}} &#8381;@else цена не указана @endif</span>
            </div>
            @if($task->responses()->count())
            <div class="float-left float-sm-none text_field">{{$task->responses()->count()}} {{trans_choice('messages.responses_choice', $task->responses()->count())}}</div>
            @else
            <div class="float-left float-sm-none text_field">пока нет ни одного отклика</div>
            @endif
          </div>
          <div class="col-sm-8 text-muted dot_divided d-flex">
            <span class="text-nowrap">
              @if($task->category)
              <a class="text-muted" href="{{route('tasks.index', ['category'=>$task->category])}}">#{{ $task->category->name }}</a>
              @endif
            </span>
          </div>
          <div class="col-sm-4 text-sm-right">
            <span class="text-muted">Открыт
              <span data-toggle="tooltip" title="" data-timestamp="1618322266" class="time_ago" data-original-title="13.04.2021 в 16:57">{{ $task->created_at->diffForHumans() }}</span>
            </span>
          </div>
        </div>
        @empty
        Нет заказов
        @endforelse
        {{ $tasks->appends(['category' => $category])->links() }}
      </div>
    </div>
  </div>

</div>
@endsection