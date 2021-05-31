<div class="order-3">
  <div class="block-header">
    <div class="h2">Новые примеры работ</div>

    <a class="uppercase float-right hidden-xs-down" href="{{ route('projects.index') }}" rel="nofollow">Все работы</a>
  </div>

  <ul class="block-content work_list-bordered">
    @forelse ($projects as $project)
      <li class="col-6 col-sm-4 col-lg-3 hover click_container-link set_href">
        <div class="crop">
          <a href="{{ route('projects.show', ['project' => $project]) }}" rel="nofollow">
            <img src="{{ $project->cover ?? asset('img/placeholder150.png')}}"
                 alt="{{ $project->name }}"
                 title="{{ $project->name }}">
          </a>
        </div>

        <div class="text_field">
          <a href="{{ route('projects.show', ['project' => $project]) }}"
             title="{{ $project->name }}" rel="nofollow">{{ $project->name }}</a>
        </div>

      </li>
    @empty
      <p>Ничего не найдено.</p>
    @endforelse
  </ul>
</div>
