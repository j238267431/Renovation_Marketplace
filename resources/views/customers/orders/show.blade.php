@extends('layouts.index')

@section('content')
    @include('includes.title', [
'breadcrumbs' => 'tasks.index'
])
<div class="page_header">
  <div class="wrapper cols_table no_hover">
    <div class="row">
      <div class="col page_header_content">
        <h1>{{ $task->title }} <span class="small text-muted">– №{{ $task->id }}</span></h1>
          @if(session()->has('success'))
              <div class="alert alert-success">{{session('success')}}</div>
          @endif
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
              <span data-toggle="tooltip" title="" data-timestamp="1618322266" class="time_ago" data-original-title="13.04.2021 в 16:57">{{$task->created_at->diffForHumans()}}</span>
            </div>
            <div class="user_brief">
              <div class="userpic"><img src="/img/userpic_male.png" alt=""></div>
              <div class="brief">
                <div><span class="name">
                    <b>{{$task->user->name}}</b>
                  </span>
                  <span class="login hidden">
                    <span class="nickname hidden">&nbsp;</span>
                  </span>
                </div>
                <div>{{$profile->getAgeAttribute()}} {{trans_choice('messages.age_choice', $profile->getAgeAttribute())}}, {{$profile->country->name}}</div>
                <div class="text-muted">Зарегистрировался в сервисе {{$task->user->created_at->diffForHumans()}}</div>
                <div class="text-muted">Дата последнего входа <span data-toggle="tooltip" title="" data-timestamp="1618325833" class="time_ago" data-original-title="13.04.2021 в 17:57">16 часов назад</span></div>
                <div>
                  <span>27 отзывов</span>
                  <span class="text-danger ml-1">(-1)</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 text_field">
            <div class="float-right text-muted block-top_right hidden-sm-up">
              <span data-toggle="tooltip" title="" data-timestamp="1618322266" class="time_ago" data-original-title="13.04.2021 в 16:57">{{$task->created_at->diffForHumans()}}</span>
            </div>
            <p>{!! $task->description !!}</p>
              <p class="amount"> @if($task->budget)объявленная стоимость {{ $task->budget }}&#8381;@else заказчик не заявил желаемую стоимость @endif</p>
              @if(isset($user))
                  @if($user->companies->first())
                      @if($companyAlreadyResponded)
                          <div class="block-info alert alert-info">Вы уже откликались на эту заявку</div>
                          <a href="{{route('tasks.response.edit', ['task' => $task->id])}}" class="btn btn-success">редактировать отклик</a>
                      @else
                        <a href="{{route('tasks.response.create', ['task' => $task->id])}}" class="btn btn-success">откликнуться на заявку</a>
                      @endif
                  @else
                      <div class="block-info alert alert-danger">Для отклика на заявку необходимо зарегистрировать компанию в личном кабинете</div>
                  @endif
              @else
                  <div class="block-info alert alert-danger">Для отклика на заявку необходимо авторизоваться и создать компанию в личном кабинете</div>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
