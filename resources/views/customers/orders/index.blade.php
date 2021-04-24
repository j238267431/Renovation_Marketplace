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
    @component('components.home.categories', [
    "showCreateTaskButton" => true,
    "categories" => $categories,
    "linkRoute" => 'tasks.index',
    "categoryId" => $categoryId,

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

{{-- <div class="page_header">--}}
{{--        <div class="wrapper cols_table no_hover">--}}
{{--            <div class="row">--}}
{{--                <div class="col page_header_content">--}}
{{--                    <a href="{{route('tasks.index')}}"><h1>Все заказы</h1></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="wrapper tab-content">--}}
{{--        <div class="clearfix tab-pane fade show active" id="tab_pane-main">--}}
{{--            <div class="sidebar sidebar-left">--}}
{{--                <div class="navbar navbar-toggleable">--}}
{{--                    <div class="navbar-collapse">--}}
{{--                        <div>--}}
{{--                            <div class="block-content">--}}
{{--                                <a class="btn btn-success btn-md btn-block" href="{{ route('tasks.create') }}" data-btn_type="freelancers" rel="nofollow">--}}
{{--                                    <b>Разместить заказ</b>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <hr>--}}
{{--                            <div class="navbar-nav">--}}
{{--                                <div class="nav-item dropdown">--}}
{{--                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Категория</a>--}}
{{--                                    <div class="dropdown-menu block-content text_field">--}}
{{--                                        <ul class="list-unstyled list-wide category_tree toggle_parents">--}}
{{--                                            @forelse($categories as $category)--}}
{{--                                                @if(isset($categoryId))--}}
{{--                                                    @if($category->id == $categoryId)--}}
{{--                                                        <li>--}}
{{--                                                            <b>{{$category->name}}</b>--}}
{{--                                                            <span class="num"> {{$category->tasks->count()}}</span>--}}
{{--                                                        </li>--}}
{{--                                                    @else--}}
{{--                                                        <li>--}}
{{--                                                            <a href="{{route('categories.tasks', ['category' => $category->id])}}"> {{$category->name}} </a>--}}
{{--                                                            <span class="num"> {{$category->tasks->count()}}</span>--}}
{{--                                                        </li>--}}
{{--                                                    @endif--}}
{{--                                                @else--}}
{{--                                                    <li>--}}
{{--                                                        <a href="{{route('categories.tasks', ['category' => $category->id])}}"> {{$category->name}} </a>--}}
{{--                                                        <span class="num"> {{$category->tasks->count()}}</span>--}}
{{--                                                    </li>--}}
{{--                                                @endif--}}
{{--                                            @empty--}}
{{--                                                <li>нет категорий</li>--}}
{{--                                            @endforelse--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


            </div>
{{--            <div class="page_content d-flex flex-column">--}}
{{--                <div class="cols_table no_hover indent-b10">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">--}}
{{--                            <form action="/jobs/"><input type="hidden" name="action" value="search">--}}
{{--                                <input type="text" class="form-control form-control-md form-control-branded typeahead autosubmit" name="query" placeholder="Поиск по заказам" autocomplete="off">--}}
{{--                                <ul class="typeahead dropdown-menu"></ul>--}}
{{--                                <a class="btn btn-transparent btn-submit" title="Найти"><i class="icon-search"></i></a>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-5 col-md-4 col-lg-3"><a class="btn btn-secondary btn-md btn-block need_login" data-toggle="modal" data-target="#filter_form">Настроить фильтр</a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="cols_table divided_rows">--}}

{{--                    @forelse($tasks as $task)--}}
{{--                        <div class="row click_container-link set_href">--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <div class="title">--}}
{{--                                    <a class="text-bold show_visited" href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>--}}
{{--                                </div>--}}
{{--                                <div class="text_field text-inline"><span class="snippet">{!! $task->description !!}</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-2 text-sm-right">--}}
{{--                                <div class="float-right float-sm-none title amount indent-xs-b0"><span data-toggle="tooltip" title="" data-original-title="725 грн • 1 959 руб">@if($task->budget){{$task->budget}} &#8381;@else цена не указана @endif</span></div>--}}
{{--                                <div class="float-left float-sm-none text_field">23 заявки</div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-8 text-muted dot_divided d-flex"><span class="text-nowrap"><a class="text-muted" href="{{route('categories.tasks', ['category'=>$task->categoryName->id])}}">@if(isset($categoryName)){{$categoryName}}@else{{$task->categoryName->name}}@endif</a></span></div>--}}
{{--                            <div class="col-sm-4 text-sm-right"><span class="text-muted">Открыт <span data-toggle="tooltip" title="" data-timestamp="1618322266" class="time_ago" data-original-title="13.04.2021 в 16:57">{{$task->created_at->diffForHumans()}}</span></span></div>--}}
{{--                        </div>--}}
{{--                    @empty--}}
{{--                        <div class="row click_container-link set_href">--}}
{{--                            <div class="col-sm-10">--}}
{{--                                Нет заказов--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforelse--}}
{{--                    {{$tasks->links()}}--}}
{{--                </div>--}}
{{--            </div>--}}
              <div class="float-right float-sm-none title amount indent-xs-b0"><span data-toggle="tooltip" title="" data-original-title="725 грн • 1 959 руб">@if($task->budget){{$task->budget}} &#8381;@else цена не указана @endif</span></div>
            <div class="float-left float-sm-none text_field">23 заявки</div>
          </div>
            <div class="col-sm-8 text-muted dot_divided d-flex"><span class="text-nowrap"><a class="text-muted" href="{{route('categories.tasks', ['category'=>$task->categoryName->id])}}">@if(isset($categoryName)){{$categoryName}}@else{{$task->categoryName->name}}@endif</a></span></div>            <div class="col-sm-4 text-sm-right"><span class="text-muted">Открыт <span data-toggle="tooltip" title="" data-timestamp="1618322266" class="time_ago" data-original-title="13.04.2021 в 16:57">{{$task->created_at->diffForHumans()}}</span></span></div>        </div>
        @empty
        Нет заказов
        @endforelse
{{--        {{ $tasks->appends(['category' => $category])->links() }}--}}
            {{$tasks->links()}}
      </div>
    </div>
  </div>

</div>
@endsection



{{--            --}}{{--@endsection--}}

{{--        </div>--}}

{{--    </div>--}}

{{--@endsection --}}


