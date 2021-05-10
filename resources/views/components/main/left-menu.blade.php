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


<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
    </ul>
</div>
