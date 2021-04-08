<div class="block-header border-0 order-2 indent-b10">
  <div class="h2">Заявки по категориям</div>

  <a class="uppercase float-right hidden-xs-down" href="{{ route('tasks.index') }}" rel="nofollow">Все заявки</a>
</div>

<div class="cols_table no_hover divided_cols divided_cols-narrow index index_categories order-2">
  <div class="row">
    @forelse($topCategories as $topCategory)

    <div class="col-sm-6 col-lg-4 d-flex align-items-stretch">
      <div class="block-content text_field w-100">
        <div class="title text-bold indent-b20">{{ $topCategory->name }}</div>

        <ul class="list-unstyled list-wide">
          @forelse($topCategory->children as $category)
            <li>
              <a href="{{ route('categories.tasks', ['category' => $category]) }}">{{ $category->name }}</a>
              <span class="float-right text-muted">{{ $category->tasks->count() }}</span>
            </li>
          @empty
            <p>В этом разделе нет категорий.</p>
          @endforelse
        </ul>

      </div>
    </div>
    @empty
      <p>Ничего не найдено.</p>
    @endforelse
  </div>
</div>
