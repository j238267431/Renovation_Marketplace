<div class="sidebar sidebar-left">
  <div class="navbar navbar-toggleable">
    <div class="navbar-collapse">
      <div>
        @if ($showCreateTaskButton)
        <div class="block-content">
          <a class="btn btn-success btn-md btn-block" href="{{ route('tasks.create') }}" data-btn_type="freelancers" rel="nofollow">
            <b>Разместить заказ</b>
          </a>
        </div>
        <hr>
        @endif
        <div class="navbar-nav">
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Категория</a>
            <div class="dropdown-menu block-content text_field">
              <ul class="list-unstyled list-wide category_tree toggle_parents">
                <li>
                  @if($category)
                  <a href='{{ route($linkRoute) }}'>Все категории</a>
                  @else
                  <b>Все категории</b>
                  @endif
                  <span class="num">{{$categories->sum("counter")}}</span>
                </li>

                @forelse ($categories as $cat)
                <li>
                  @if (($category)&&($category->id == $cat->id))
                  <b>{{ $cat->name }}</b>
                  @else
                  <a href='{{ route($linkRoute, ['category' => $cat]) }}'>{{ $cat->name }}</a>
                  @endif
                  <span class="num">{{ $cat->counter }}</span>
                </li>
                @empty
                <b>Категории отсутствуют</b>
                @endforelse

              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>