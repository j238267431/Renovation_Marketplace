@extends('layouts.index')

@section('content')
{{-- Список полей компании --}}
{{-- $company->name --}}
{{-- $company->cover ?? '<Нет картинки> --}}
{{-- $company->description --}}
{{-- $company->phone --}}
{{-- $company->email --}}
{{-- $company->address --}}
{{-- $company->orders->count() --}}
{{-- $company->reviews->count()--}}

@include('includes.title', ['title' => 'Все организации' . ($category ? ' в категории ' . $category->name : '')])

<div class="wrapper tab-content">
  <div class="clearfix tab-pane fade show active" id="tab_pane-main">

    @component('components.home.categories', [
     "showCreateTaskButton" => true,
     "categories" => $categories,
     "linkRoute" => 'companies.index',
     "categoryId" => $categoryId,])
      @endcomponent

    <div class="page_content d-flex flex-column">
      <div class="cols_table no_hover indent-b10">
        <div class="row">
          <div class="col">
            {{-- Форма поиска --}}
            <form action="#">
              <input type="hidden" name="action" value="search">
              <input type="text" class="form-control form-control-md form-control-branded typeahead autosubmit" name="query" placeholder="Найти подрядчика" autocomplete="off">
              <a class="btn btn-transparent btn-submit" title="Найти">
                <i class="icon-search"></i></a>
            </form>
          </div>
          <div class="col-sm-5 col-md-4 col-lg-3 m-auto">
            <a class="" data-toggle="modal" data-target="#advanced_search">Расширенный поиск</a>
          </div>
        </div>
      </div>
      <div class="cols_table divided_rows">
{{--          @if(isset($offers))--}}

{{--              @foreach($offers as $company)--}}
{{--@dd($companies)--}}
{{--                  <p>{{$company->name}}</p>--}}

{{--              @endforeach--}}


        @forelse($companies as $company)


          <div class="row">
            {{-- Картинка и отзывы --}}
            <div class="col-12 col-md-3">

              <div class="userpic">
                <a href="{{ route('companies.show', $company) }}" rel="nofollow">
                  <img class="img-fluid"
                       src="{{ $company->cover ?? asset('img/placeholder150.png')}}"
                       alt="{{ $company->name }}">
                </a>
              </div>


            <div class="pt-3">
              <a href="{{ route('companies.reviews', $company) }}" rel="nofollow">{{ $company->reviews->count() }} отзывов</a>
            </div>

          </div>
          {{-- Описание --}}
          <div class="col-12 col-md-9">
            <div class="user_brief">
              <div class="brief">
                <span class="name">
                  <a href="{{ route('companies.show', $company) }}">{{ $company->name }}</a>
                </span>
              </div>
            </div>
            <div class="pt-5">
              <p class="text_field">{{ $company->description }}</p>
            </div>
          </div>
        </div>
        @empty
        <p>Ничего не найдено.</p>
        @endforelse


{{--          @endif--}}
{{--            {{$companies->links()}}--}}

        {{ $companies->appends(['category' => $category])->links() }}

      </div>
    </div>
  </div>
</div>
@endsection
