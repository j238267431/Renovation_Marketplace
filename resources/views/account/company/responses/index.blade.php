@extends('layouts.index')
@section('content')

    @include('includes.title', [
    'title' => 'Отклики на заявки',
    'breadcrumbs' => 'account.responses',
    'hasCompany' => true
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
                                    <x-account.links />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page_content">
                @if(session('success'))
                    <div class="block-content">
                        <div class="alert-success">{{session('success')}}</div>
                    </div>
                @elseif(session('fail'))
                    <div class="block-content">
                        <div class="alert-danger">{{session('fail')}}</div>
                    </div>
                @endif
                <div class="block-content">
                    <div class="title indent-b30">
                        <a class="btn btn-success" href="{{route('account.companies.offer.create')}}">Создать услугу</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Компания</th>
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Чат</th>

                        </tr>
                        </thead>
                        @foreach($companies as $company)
                            @foreach($company->tasks as $task)
                                <tbody>
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>{{$task->title}}</td>
                                    <td>{!!$task->description !!}</td>
                                    <td><a class="btn btn-success" href="{{route('account.chat', ['toUserId' => $task->user->id])}}">написать</a></td>
                                </tr>
                            @endforeach
                        @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
