<ul class="list-unstyled list-wide">
  @if(request()->routeIs('account.companies.index'))
    <li><b>Мои компании</b></li>
  @else
    <li><a href="{{route('account.companies.index')}}">Мои компании</a></li>
  @endif
  @if(request()->routeIs('account.companies.offer.index'))
      <li><b>Услуги</b></li>
  @else
      <li><a href="{{route('account.companies.offer.index')}}">Услуги</a></li>
  @endif
      <li><a href="#">Отклики на заявки</a></li>
      @if(request()->routeIs('account.project'))
          <li><b>Заказы в работе</b></li>
      @else
        <li><a href="{{route('account.project')}}">Заказы в работе</a></li>
      @endif
      <li><a href="#">Рейтинг</a></li>
</ul>
