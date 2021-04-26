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
                  <a href='{{ route($linkRoute) }}'>{{ $allItemsText }}</a>
                  @else
                  <b>{{ $allItemsText }}</b>
                  @endif
                  <span class="num">{{ $categories->sum("counter") }}</span>
                </li>
                @forelse ($parentCategories as $pcatIndex => $pcat)
                <li>
                  <a data-toggle="collapse">{{ $pcat->name }}</a>
                  <ul class="collapse @if(($category)&&($pcat->children->contains('id', $category->id))) show  @endif" aria-expanded="@if(($category)&&($pcat->children->contains('id', $category->id))) true @else false @endif">
                    @foreach($categories as $ccat)
                    @if ($pcat->children->contains('id', $ccat->id))
                    <li>
                      @if(($category)&&($category->id == $ccat->id))
                      <b>{{ $ccat->name }}</b>
                      @else
                      <a href='{{ route($linkRoute, ['category' => $ccat]) }}' data-category_id='{{ $ccat->id }}'>{{ $ccat->name }}</a>
                      @endif
                      <span class='num' data-cat_count='{{ $ccat->id }}'>{{ $ccat->counter }}</span>
                    </li>
                    @endif
                    @endforeach
                  </ul>
                </li>
                @empty
                @endforelse

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/js/category_tree.js" defer></script>