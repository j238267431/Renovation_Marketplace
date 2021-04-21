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
                @foreach ($categories as $category)
                <li>
                  <a href='{{ route($linkRoute, ['category' => $category->id]) }}'>{{ $category->name }}</a>
                  <span class="num">{{ $category->counter }}</span>
                </li>
                @endforeach
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>