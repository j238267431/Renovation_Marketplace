<div class="order-1">
  <div class="block-header">
    <div class="h2 d-block">Самые активные подрядчики</div>
    <a class="uppercase float-right hidden-xs-down" href="{{ route('companies.index') }}" rel="nofollow">Все активные</a>
  </div>

  <ul class="cell_list cell-xs-1 cell-sm-2 cell-lg-3 cell-xl-4">
    @forelse($companies as $company)
      <li class="click_container-link set_href">

          <div class="card-company">
              <div class="card-company__section">Загородное строительство</div>
              <a href="{{ route('companies.show', $company) }}" rel="nofollow">
                <img src="{{ $company->cover ?? asset('img/placeholder.jpg')}}" class="card-img-top" alt="{{ $company->name }}">
              </a>
              <div class="card-company__body">
                  <a href="{{ route('companies.show', $company) }}" rel="nofollow">
                    <div class="card-company__name">{{ $company->name }}</div>
                  </a>
                  <p class="card-company__text">{{ $company->description }}</p>
              </div>
              <div class="card-company__info">
                  <div class="rating-result">
                      <span class="active"></span>
                      <span class="active"></span>
                      <span class="active"></span>
                      <span class="active"></span>
                      <span></span>
                  </div>
                  <div class="counter ">
                      <a href="{{ route('account.orders', $company) }}" title="Заказы">
                          <span class="counter__order"><i class="bi bi-check-square-fill"></i> {{ $company->orders_count }}</span>
                      </a>
                      <a href="{{ route('companies.reviews', $company) }}" title="Отзывы">
                          <span class="counter__message"><i class="bi bi-chat-right-text-fill"></i> {{ $company->reviews_count }}</span>
                      </a>
                  </div>
              </div>
          </div>

      </li>
    @empty
      <p>Ничего не найдено.</p>
    @endforelse











  </ul>
</div>
