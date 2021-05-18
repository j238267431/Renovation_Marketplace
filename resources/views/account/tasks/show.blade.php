@extends('layouts.index')
@section('content')

    @include('includes.title', [
    'title' => 'Личный кабинет',
    'breadcrumbs' => 'account.tasks.show',
    'task' => $task,
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
                                        <li>название задачи: <b>{{$task->title}}</b></li>
                                        <li>заявленная стоимость: <b>{{$task->budget}}</b></li>
                                            <li>описание: <b>{!! $task->description !!}</b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page_content">
                <div class="block-content text-muted">
                    @if(!empty($companiesAndResponses->first()))
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Компания</th>
                            <th scope="col">Предложение по стоимости</th>
                            <th scope="col">Комментарии</th>
                            <th scope="col">когда направлено</th>
                            <th scope="col">связаться в чате</th>
                            <th scope="col">подтвердить предложение</th>
                        </tr>
                        </thead>
                        @foreach($companiesAndResponses as $companyAndResponse)
                            <tbody>
                            <tr>
                                <td>{{$companyAndResponse->name}}</td>
                                <td>{{$companyAndResponse->pivot->price}}</td>
                                <td>{!! $companyAndResponse->pivot->comment !!}</td>
                                <td>{{$companyAndResponse->pivot->created_at->diffForHumans()}}</td>
                                <td><a href="{{route('account.chat', $companyAndResponse)}}"><div class="btn btn-success">чат с застройщиком</div></a></td>
                                <td><a href="#"><div class="btn btn-success">подтверждаю предложение</div></a></td>
                            </tr>
                        @endforeach
                            </tbody>
                    </table>
                    @else
                        пока нет ни одного отклика
                    @endif
                    {{$companiesAndResponses->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection