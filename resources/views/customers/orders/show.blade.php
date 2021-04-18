@extends('layouts.index')

@section('content')
<div class="page_header">
  <div class="wrapper cols_table no_hover">
    <div class="row">
      <div class="col page_header_content">
        <h1>{{ $task->title }} <span class="small text-muted">– №{{ $task->id }}</span></h1>
      </div>
    </div>
  </div>
</div>
<div class="wrapper tab-content">
  <div class="clearfix tab-pane fade show active" id="tab_pane-main">
    <div class="page_content no_sidebar d-flex flex-column landing">
      <input type="hidden" id="id" value="1104490"><input type="hidden" id="fk" value="">
      <div class="cols_table no_hover">
        <div class="row">
          <div class="col-12">
            <div class="float-right text-muted hidden-xs-down">
              <span data-toggle="tooltip" title="" data-timestamp="1618322266" class="time_ago" data-original-title="13.04.2021 в 16:57">17 часов назад</span>
            </div>
            <div class="user_brief">
              <div class="userpic"><img src="/img/userpic_male.png" alt=""></div>
              <div class="brief">
                <div><span class="name">
                    <b>Заказчик</b>
                  </span>
                  <span class="login hidden">
                    <span class="nickname hidden">&nbsp;</span>
                  </span>
                </div>
                <div>34 года, Россия</div>
                <div class="text-muted">11 лет в сервисе</div>
                <div class="text-muted">Был онлайн <span data-toggle="tooltip" title="" data-timestamp="1618325833" class="time_ago" data-original-title="13.04.2021 в 17:57">16 часов назад</span></div>
                <div>
                  <span>27 отзывов</span>
                  <span class="text-danger ml-1">(-1)</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 text_field">
            <div class="float-right text-muted block-top_right hidden-sm-up">
              <span data-toggle="tooltip" title="" data-timestamp="1618322266" class="time_ago" data-original-title="13.04.2021 в 16:57">17 часов назад</span>
            </div>
            <p>{!! $task->description !!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
