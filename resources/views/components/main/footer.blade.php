<footer>
  <div class="wrapper cols_table no_hover">
    <div class="row border-0">
      <div class="col-12 col-md">
        <x-main-logo classList="header navbar-brand"></x-main-logo>

        <ul class="social-list d-block">
          <li>
            <a href="https://www.facebook.com/WeblancerNet" target="_blank" rel="nofollow">
              <i class="icon-fb"></i>
            </a>
          </li>

          <li>
            <a href="https://vk.com/weblancermedia" target="_blank" rel="nofollow">
              <i class="icon-vk"></i>
            </a>
          </li>

          <li>
            <a href="https://twitter.com/weblancer_net" target="_blank" rel="nofollow">
              <i class="icon-tw"></i>
            </a>
          </li>

          <li>
            <a href="https://www.instagram.com/weblancer_net/" target="_blank" rel="nofollow">
              <i class="icon-instagram"></i>
            </a>
          </li>

          <li>
            <a href="https://www.youtube.com/user/WeblancerMedia" target="_blank" rel="nofollow">
              <i class="icon-you-tube"></i>
            </a>
          </li>
        </ul>

        <div class="links indent-t10">
          <a class="d-inline-flex align-items-center support_link" href="mailto:{{ $email }}">
            <i class="icon-message small"></i> {{ $email }}
          </a>
        </div>
      </div>

      <div class="col-sm-auto col-md-2 links">
        <b class="h3 header">О сервисе</b>
        <a href="{{ route('home') }}">О компании</a>
        <a href="{{ route('home') }}">Контакты</a>
      </div>

      <div class="col-sm-auto col-md-3 links">
        <b class="h3 header">Пользователям</b>
        <a href="{{ route('home') }}">Тарифы</a>
        <a href="{{ route('tasks.create') }}">Разместить заказ</a>
        <a href="{{ route('companies.index') }}">Каталог подрядчиков</a>
      </div>

      <div class="col-sm-auto col-md-3 links">
        <b class="h3 header">Помощь</b>
        <a href="{{ route('home') }}">Помощь</a>
        <a href="{{ route('home') }}">Правила сервиса</a>
        <a href="mailto:{{ $email }}">Служба поддержки</a>
      </div>
    </div>

    <div class="row text_field">
      <div class="col text-muted" data-toggle="tooltip" title="" data-original-title="Россия - Москва, Санкт-Петербург">© СтройХаус, 2021
      </div>

      <div class="col-sm-5 text-muted">
        <a class="text-muted" href="{{ route('home') }}">Пользовательское соглашение</a>
      </div>

      <div class="col-sm-3 text-muted">

      </div>
    </div>
  </div>
</footer>