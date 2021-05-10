<ul class="navbar-nav navbar-left">
  @foreach ($menu as $item)
    @empty($item['submenu'])
      <li class="nav-item">
        <a class="nav-link"
           href="{{ route($item['route']) }}"
           @isset($item['title']) title="{{ $item['title'] }}" @endisset
           @isset($item['rel']) rel="{{ $item['rel'] }}" @endisset>
          {{ $item['value'] }}
        </a>
      </li>

    @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false"
           @isset($item['title']) title="{{ $item['title'] }}" @endisset>
          {{ $item['value'] }} tttt
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

          @foreach ($item['submenu'] as $subitem)
            <a class="dropdown-item"
               href="{{ route($subitem['route']) }}"
               @isset($subitem['title']) title="{{ $subitem['title'] }}" @endisset
               @isset($subitem['rel']) rel="{{ $subitem['rel'] }}" @endisset>
              {{ $subitem['value'] }}
            </a>
          @endforeach

        </div>
      </li>

    @endif
  @endforeach
</ul>
