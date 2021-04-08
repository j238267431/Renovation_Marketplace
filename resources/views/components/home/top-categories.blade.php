<div class="block-content text_field text-secondary pb-0 order-last">
  <div class="h3">ТОП-10 категорий</div>

  <table class="table indent-t20">
    <thead class="hidden-xs-down">
      <tr>
        <th class="hidden-sm-down" scope="col">#</th>
        <th scope="col">Категория</th>
        <th scope="col">
          <span class="hidden-md-down">Количество предложений</span><span class="hidden-lg-up">Предложений</span>
        </th>
        <th scope="col">
          <span class="hidden-md-down">Количество активных заявок</span><span class="hidden-lg-up">Заявок</span>
        </th>
      </tr>
    </thead>

    <tbody>
    @php($i = 1)
    @forelse ($categories as $category)
      <tr>
        <th class="hidden-sm-down text-nowrap" scope="row">{{ $i }}</th>
        {{--TODO определить, куда ведёт ссылка--}}
        <td><a href="#">{{ $category->name }} / {{ $category->parent->name }}</a></td>
        <td class="text-nowrap">{{ $category->offers_count }}</td>
        <td class="hidden-xs-down text-nowrap">{{ $category->tasks_count }}</td>
      </tr>
      @php($i++)
    @empty
      <p>Ничего не найдено.</p>
    @endforelse
    </tbody>
  </table>
</div>
