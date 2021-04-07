<div class="order-1">
  <div class="block-header">
    <div class="h2 d-block">Самые активные подрядчики</div>
    <a class="uppercase float-right hidden-xs-down" href="{{ route('developers.index') }}" rel="nofollow">Все активные</a>
  </div>

  <ul class="cell_list cell-xs-1 cell-sm-2 cell-lg-3 cell-xl-4">
    @forelse($companies as $company)
      <li class="click_container-link set_href">
        <div class="pr_block">
          <div class="clearfix user_brief d-flex">
            {{--TODO Исправить разметку (отображение картинок и кол-во столбцов)--}}
            <div class="userpic">
              <a href="{{ route('developers.show', ['developer' => $company]) }}" rel="nofollow">
                <img class="img-fluid"
                     src="{{ $company->cover ?? asset('img/placeholder150.png')}}"
                     alt="{{ $company->name }}">
              </a>
            </div>

            <div class="brief">
              <span class="name">
                <a href="{{ route('developers.show', ['developer' => $company]) }}" rel="nofollow">
                  {{ $company->name }}
                </a>
              </span>
              <span class="login"><span>{{ $company->description }}</span></span>
            </div>
          </div>

          <div class="pr_title text_field">{{ $company->category ?? 'Загородное строительство' }}</div>

          <div class="pr_text text_field dot_divided">
            <span class="text-gold">Заказы: {{ $company->orders_count }}</span>
            <span class="text-success">Отзывы: {{ $company->reviews_count }}</span>
          </div>

        </div>
      </li>
    @empty
      <p>Ничего не найдено.</p>
    @endforelse











  </ul>
</div>
