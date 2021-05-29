@extends('layouts.index')

@section('content')
@include('includes.title', [
'title'=> $task->title,
'breadcrumbs' => 'tasks.index',
'breadcrumbsAttrs' => [ "task" => $task],
])
<div class="wrapper tab-content">
    <div class="clearfix tab-pane fade show active" id="tab_pane-main">
        <div class="page_content no_sidebar d-flex flex-column landing">
            <div class="cols_table no_hover">
                <div class="row">
                    <div class="col-12">
                        <div class="float-right text-muted hidden-xs-down">
                            <span data-toggle="tooltip" title="" data-timestamp="1618322266" class="time_ago" data-original-title="13.04.2021 в 16:57">{{ $task->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="user_brief">
                            <div class="userpic">
                                @if (($task->attachments()->count() > 0)&&($task->attachments()->whereIn('mime', ['image/jpeg', 'image/png'])->count() > 0))
                                <img src="{{  Storage::url($task->attachments()->whereIn('mime', ['image/jpeg', 'image/png'])->first()->path) }}" alt="">
                                @else
                                <img src="/storage/nopic.png" alt="">
                                @endif
                            </div>
                            <div class="brief">
                                <div><span class="name">
                                        <b>{{ $task->user->name }}</b>
                                    </span>
                                    <span class="login hidden">
                                        <span class="nickname hidden">&nbsp;</span>
                                    </span>
                                </div>
                                <div>trans_choice('messages.age_choice', $profile->getAgeAttribute())}}</div>
                                <div class="text-muted">Зарегистрировался в сервисе {{ $task->user->created_at->diffForHumans() }}</div>
                                <div class="text-muted">Дата последнего входа <span data-toggle="tooltip" title="" data-timestamp="1618325833" class="time_ago" data-original-title="13.04.2021 в 17:57">{{$taskCreator->getLastLoginAt()}}</span></div>
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
                        <p class="amount">@if($task->budget)объявленная стоимость {{ $task->budget }}&#8381;@else заказчик не заявил желаемую стоимость @endif</p>
                        <br>
                        @if($task->attachments()->count() > 0)
                        <ul>
                            @foreach($task->attachments as $attach)
                            <li><a href="{{ route('attachment.download',  $attach) }}">{{ $attach->title }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                        <br>
                        @if(isset($user))
                        @if($task->user->id == $user->id)
                        <a href="{{route('tasks.edit', ['task' => $task])}}" class="btn btn-success">Редактировать задачу</a>
                        @endif
                        @if($user->companies->first())

                        @if($companyAlreadyResponded)
                        <a href="{{route('tasks.response.edit', ['task' => $task->id])}}" class="btn btn-success">редактировать отклик</a>
                        <div class="block-info alert alert-info">Вы уже откликались на эту заявку</div>
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