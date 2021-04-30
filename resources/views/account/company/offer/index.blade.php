@extends('layouts.index')
@section('content')
    <x-account.nav />
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
{{--                    <div class="block-content alert-success">--}}
                        <div class="block-content alert-success">{{session('success')}}</div>
{{--                    </div>--}}
                @endif
                <div class="block-content">
                    <div class="title indent-b30">
                        <a class="btn btn-success" href="{{route('account.companies.offer.create')}}">Создать услугу</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">компания</th>
                            <th scope="col">название</th>
                            <th scope="col">описание</th>
                            <th scope="col">стоимость</th>
                            <th scope="col">редактировать</th>
                        </tr>
                        </thead>
                        @foreach($companies as $company)
                            <tbody>
                            @foreach($company->offers as $offer)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td>{{$offer->name}}</td>
                                <td>{!!$offer->description!!}</td>
                                <td>{{ $offer->price }}</td>
                                <td><a href="{{route('account.companies.offer.edit', ['offer' => $offer->id])}}" class="btn btn-warning">изменить</a></td>
                                <td><a data-id="{{$offer->id}}" onclick="offerDelete()" href="{{route('account.companies.offer.destroy', ['offer' => $offer->id])}}" class="btn btn-danger">удалить</a></td>
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
