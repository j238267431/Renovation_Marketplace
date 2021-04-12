<ul class="nav navbar-nav navbar-right">

  @guest
  @if (Route::has('register'))
  <li>
    <a class="nav-link" href="{{ route('register') }}" rel="nofollow">{{ __('Register') }}</a>
  </li>
  @endif
  <li>
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
  </li>
  @else
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      @if (Route::has('account'))
      <a class="dropdown-item" href="{{ route('account') }}">{{ __('Account') }}</a>
      @endif
        <a class="dropdown-item" href="{{route('account')}}">Личный кабинет</a>
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>


      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  </li>
  @endguest
</ul>
