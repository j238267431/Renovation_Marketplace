<ul class="list-unstyled list-wide">
  @if(request()->routeIs('account.index'))
    <li><b>Личный кабинет</b></li>
  @else
    <li><a href="{{route('account.index')}}">Личный кабинет</a></li>
  @endif
    @if(request()->routeIs('account.tasks'))
      <li><b>Список заявок</b></li>
    @else
      <li><a href="{{route('account.tasks')}}">Список заявок</a></li>
    @endif
    @if(request()->routeIs('account.orders'))
      <li><b>Список заказов</b></li>
    @else
      <li><a href="{{route('account.orders')}}">Список заказов</a></li>
    @endif
    @if(request()->routeIs('account.executor'))
      <li><b>Выбранные исполнители</b></li>
    @else
      <li><a href="{{route('account.executor')}}">Выбранные исполнители</a></li>
    @endif
{{--  <li><a href="#">Безопасные платежи</a></li>--}}
</ul>
