@extends('layouts.index')

@section('content')
<div class="page_header">
  <div class="wrapper cols_table no_hover">
    <div class="row">
      <div class="col page_header_content">
        <h1>Все организации</h1>
      </div>
    </div>
  </div>
</div>
<div class="wrapper tab-content">
  <div class="clearfix tab-pane fade show active" id="tab_pane-main">
    <div class="sidebar sidebar-left">
      <div class="navbar navbar-toggleable">
        <div class="navbar-collapse">
          <div>
            <div class="block-content">
              <a class="btn btn-success btn-md btn-block" href="#" data-btn_type="freelancers" rel="nofollow">
                <b>Разместить заказ</b>
              </a>
            </div>
            <hr>
            <div class="navbar-nav">
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Категория</a>
                <div class="dropdown-menu block-content text_field">
                  <ul class="list-unstyled list-wide category_tree toggle_parents">
                    @foreach ($categories as $category)
                    <li>
                      <a>{{ $category->name }}</a>
                      <span class="num">{{ $category->projects->count() }}</span>
                      <!-- <ul class="collapse" aria-expanded="false">
                        <li>
                          <a href="#" data-category_id="35">Наполнение сайтов</a>
                          <span class="num" data-cat_count="35">10</span>
                        </li>
                        <li>
                          <a href="#" data-category_id="54">Системное администрирование</a>
                          <span class="num" data-cat_count="54">8</span>
                        </li>
                      </ul> -->
                    </li>
                    @endforeach
                  </ul>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page_content d-flex flex-column">
      <div class="cols_table no_hover indent-b10">
        <div class="row">
          <div class="col">
            <form action="/freelancers/">
              <input type="hidden" name="action" value="search">
              <input type="text" class="form-control form-control-md form-control-branded typeahead autosubmit" name="query" placeholder="Поиск по фрилансерам" autocomplete="off">
              <ul class="typeahead dropdown-menu">
              </ul>
              <a class="btn btn-transparent btn-submit" title="Найти">
                <i class="icon-search">
                </i>
              </a>
            </form>
          </div>
          <div class="col-sm-5 col-md-4 col-lg-3">
            <a class="btn btn-secondary btn-md btn-block need_login" data-toggle="modal" data-target="#advanced_search">Расширенный поиск</a>
          </div>
        </div>
      </div>
      <div class="cols_table divided_rows freelancers">
        @forelse($companies as $company)

        <div class="row">
          <div class="col-12 col-sm-8">
            <div class="user_brief">
              <div class="userpic">
                <a href="#" rel="nofollow">
                  @if ($company->cover)
                  <img class="img-fluid" src="{{ $company->cover }}" alt="{{ $company->name }}" title="{{ $company->name }}">
                  @else
                  Нет картинки
                  @endif
                </a>
              </div>
              <div class="brief">
                <div>
                  <span class="name">
                    <a href="#">{{ $company->name }}</a>
                  </span>
                </div>
                <div>
                  <a href="#" rel="nofollow">{{ $company->reviews->count() }} отзывов</a>
                </div>
              </div>
            </div>
            <a class="btn btn-outline-info" data-btn_type="freelancers_hire" href="#" data-toggle="tooltip" title="" data-original-title="Предложить заказ">Заказать</a>
          </div>


          <div class="col-12">
            <p class="blockquote text_field">{{ $company->description }}</p>
          </div>
        </div>
        @empty
        <p>Ничего не найдено.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection