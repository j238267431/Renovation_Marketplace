<ul class="list-unstyled list-wide">
  @if(request()->routeIs('account.companies.index'))
    <li><b>Мои компании</b></li>
  @else
    <li><a href="{{route('account.companies.index')}}">Мои компании</a></li>
  @endif
    <li><a href="#">Отклики на заявки</a></li>
  <li><a href="#">Заказы в работе</a></li>
  <li><a href="#">Готовые проекты</a></li>
  <li><a href="#">Портфолио</a></li>
  <li><a href="#">Цены на услуги</a></li>
  <li><a href="#">Рейтинг</a></li>
</ul>
