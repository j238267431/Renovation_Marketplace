@extends('layouts.index')

@section('content')
{{--<x-company.navigation :company="$company->name"/>--}}
{{--@include('includes.title', ['title' => 'Организации'])--}}
@include('includes.title', [

'title' => 'О компании ' . $company->name,
'breadcrumbs' => 'companies.show',
'breadcrumbsAttrs' => ['company' => $company]
])

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
                                <img class="container-fluid no-padding" src="{{ $company->cover ?? asset('img/placeholder150.png')}}" alt="{{ $company->name }}">
                            </div>
                            <div class=" pt-3">
                                <a href="" class="btn btn-primary container-fluid">Заказать</a>
                            </div>

                            {{-- Отзывы рейтинг--}}

                            <div class="card-company-hor__info pt-3 space-between">
                                <div class="rating-result">
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span></span>
                                </div>
                                <div class="counter ">
                                    <a href="{{ route('account.orders', $company) }}" title="Заказы">
                                        <span class="counter__order"><i class="bi bi-check-square-fill"></i> {{ $company->orders->count() }}</span>
                                    </a>
                                    <a href="{{ route('companies.reviews', $company) }}" title="Отзывы">
                                        <span class="counter__message"><i class="bi bi-chat-right-text-fill"></i> {{ $company->reviews->count() }}</span>
                                    </a>
                                </div>
                            </div>

                            <h2 class="contact-header pt-4">Контакты</h2>
                            <div class="contact-row">
                                <i class="bi bi-geo-alt-fill contact-icon"></i>
                                <div class="text_field pt-3"> {{ $company->address }}</div>
                            </div>
                            <div class="contact-row">
                                <i class="bi bi-telephone-fill contact-icon"></i>
                                <div class="text_field pt-3"> {{ $company->phone }}</div>
                            </div>
                            <div class="contact-row">
                                <i class="bi bi-envelope-fill contact-icon"></i>
                                <div class="text_field pt-3"> {{ $company->email }}</div>
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
                        <h2 class="h2">
                            <a href="{{route('projects.index')}}">Проекты </a>
                        </h2>

                        <div class="row no-padding justify-content-between pt-3">

                            @forelse($company->projects as $project)

                            <x-project.project-card :project="$project" />

                            @empty
                            <div class="no-padding">
                                <p>Проекты не найдены</p>
                            </div>
                            @endforelse

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="h2">Отзывы </h2>

                            @forelse($company->reviews as $review)

                            <x-company.review-card :review="$review" />

                            @empty
                            <div class="pt-3">
                                <p>Отзывы не найдены</p>
                            </div>
                            @endforelse

                        </div>
                    </div>

                    <div class="row">

                        <x-company.review-form />

                    </div>

                </div>

            </div>
        </div>
    </div>


    @endsection