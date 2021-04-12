<li><a class="nav-link {{ request()->routeIs('account')?'active':'' }}" href="{{route('account')}}">Я заказчик</a></li>
<li><a class="nav-link {{ request()->routeIs('account.tasks')?'active':'' }}" href="{{route('account.tasks')}}">Список заявок</a></li>
<li><a class="nav-link {{ request()->routeIs('account.orders')?'active':'' }}" href="{{route('account.orders')}}">Список заказов</a></li>
<li><a class="nav-link {{ request()->routeIs('account.executor')?'active':'' }}" href="{{route('account.executor')}}">Выбранные исполнители</a></li>
<li><a href="#">Безопасные платежи</a></li>
