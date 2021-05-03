@extends('layouts.index')

@section('content')

@include('includes.title', [
'title' => 'Все подрядчики' . ($category ? ' в категории ' . $category->name : ''),
'breadcrumbs' => 'companies'
])

<div class="wrapper tab-content">
  <div class="clearfix tab-pane fade show active" id="tab_pane-main">
    @component('components.home.categories', [
    "allItemsText" => "Все подрядчики",
    "showCreateTaskButton" => true,
    "categories" => $categories,
    'parentCategories' => $parentCategories,
    "linkRoute" => 'companies.index',
    "category" => $category
    ])
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
        @forelse($companies as $company)
        <div class="row click_container-link set_href">
          {{-- Картинка и отзывы --}}

          <div class="col-sm-12">
            <div class="title">
              <a class="text-bold show_visited" href="{{ route('companies.show', $company) }}">{{ $company->name }}</a>
            </div>
            <div class="companypic">
              <a href="{{ route('companies.show', $company) }}" rel="nofollow">
                <img class="img-fluid" src="{{ $company->cover ?? asset('img/placeholder150.png')}}" alt="{{ $company->name }}">
              </a>
            </div>
            {{-- Описание --}}
            <div class="pt-3">
              @if($company->reviews->count())
              <a href="{{ route('companies.reviews', $company) }}" rel="nofollow">
                {{ $company->reviews->count() }} {{trans_choice('messages.reviews_choice', $company->reviews->count())}}
              </a>
              @else
              {{'пока нет ни одного отзыва'}}
              @endif
            </div>
            <div class="pt-3">
              <p class="text_field">{!! $company->description !!}</p>
            </div>
          </div>
        </div>
        @empty
        <p>Ничего не найдено.</p>
        @endforelse
        {{ $companies->appends(['category' => $category])->links() }}
      </div>
    </div>
  </div>
</div>
@endsection