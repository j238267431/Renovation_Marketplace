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
    @component('components.home.categories', ["showCreateTaskButton" => true, "categories" => $categories, "linkRoute" => 'tasks.index'])
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
        @empty
        Нет заказов
        @endforelse
        {{ $tasks->appends(['category' => $category])->links() }}
      </div>
    </div>
  </div>

</div>
@endsection