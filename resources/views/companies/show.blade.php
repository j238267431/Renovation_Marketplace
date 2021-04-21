@extends('layouts.index')

@section('content')



{{-- нужно --}}

{{-- $categories --}}



@include('includes.title', ['title' => 'Все организации'])

<div class="wrapper tab-content">
    <div class="clearfix tab-pane fade show active" id="tab_pane-main">

        <div class="sidebar sidebar-left">
            <div class="navbar navbar-toggleable">
                <div class="navbar-collapse">
                    <div>
                        <div class="block-content">
                            <h1 class="h1">
                                {{ $company->name }}
                            </h1>
                            <div class="pt-3">
                                <img class="img-fluid "
                                     src="{{ $company->cover ?? asset('img/placeholder150.png')}}"
                                     alt="{{ $company->name }}">
                            </div>
                            <div class=" pt-3">
                                <a href="" class="btn btn-primary container-fluid">Заказать</a>
                            </div>
                            <div class="pt-4">
                                Рейтинг

                                <div class="rating-result">
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                            <div class="pt-3">
                                <a href="{{ route('companies.reviews', $company) }}" rel="nofollow">{{ $company->reviews->count() }} отзывов</a>
                            </div>

                            <div class="pt-3">
                                <a href="{{ route('account.orders', $company) }}" rel="nofollow">{{ $company->orders->count() }} заказов</a>
                            </div>

                            <h2 class="h2 pt-4">Контакты</h2>
                                <p class="text_field pt-3"><b>Адрес:</b> {{ $company->address }}</p>
                                <p class="text_field pt-3"><b>Телефон:</b> {{ $company->phone }}</p>
                                <p class="text_field pt-3"><b>Электронная почта:</b> {{ $company->email }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="page_content d-flex flex-column">

            <div class="cols_table no_hover divided_rows">
                <div class="row">
                    <div class="col-12">
                        <h2 class="h2">О компании </h2>
                        <p class="text_field pt-3">{{ $company->description }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="h2">Проекты </h2>
                        <div class="pt-3">Запрос проектов</div>
                        {{ $company->projects }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="h2">Отзывы </h2>
                        <div class="pt-3">Запрос списка отзывов</div>
                        {{ $company->reviews }}
                        @foreach($company->reviews as $reviews)
                            <div class="row">
                            <div>{{$reviews->title}}</div>
                            <div>{{$reviews->rating}}</div>
                            <div>{{$reviews->content}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
