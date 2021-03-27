<a class="nav-link {{ request()->routeIs('home')?'active':'' }}" href="{{ route('home') }}">Home</a>
<a class="nav-link {{ request()->routeIs('developers')?'active':'' }}" href="{{ route('developers') }}">Developers</a>
<a class="nav-link {{ request()->routeIs('customers')?'active':'' }}" href="{{ route('customers') }}">Customers</a>
<a class="nav-link {{ request()->routeIs('orders.index')?'active':'' }}" href="{{ route('orders.index') }}">Orders</a>


