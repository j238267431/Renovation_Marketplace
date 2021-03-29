<div class="order-3">
  <div class="block-header">
    <div class="h2">Новые примеры работ</div>

    <a class="uppercase float-right hidden-xs-down" href="/portfolio" rel="nofollow">Все работы</a>
  </div>

  <ul class="block-content work_list-bordered">
    @for ($i = 1; $i <= 10; $i++)

      <li class="col-6 col-sm-4 col-lg-3 hover click_container-link set_href @if($i > 6) hidden-xs-down @endif
          @if($i > 8) d-xl-block @endif @if($i === 9) d-lg-none @endif @if($i === 10) d-sm-none @endif">
        <div>
          <a href="/users/DedYAGA_1/portfolio/illyustratcii-i-risunki-11/character-2355131/" rel="nofollow">
            <img src="https://st.weblancer.net/download/4409300_250xr.jpg" alt="Character" title="Character">
          </a>
        </div>

        <div class="text_field">
          <a href="/users/DedYAGA_1/portfolio/illyustratcii-i-risunki-11/character-2355131/" title="Character"
             rel="nofollow">Character</a>
        </div>

        <div class="text-secondary">Андрей С.</div>
      </li>

    @endfor
  </ul>
</div>
