<div class="w-100">
  <div class="block-header">
    <div class="h2 d-block">Лучшие в одноэтажном строительстве</div>

    <a class="uppercase float-right hidden-xs-down" href="/developers" rel="nofollow">Все лучшие</a>
  </div>

  <ul class="cell_list cell-xs-1 cell-sm-2 cell-lg-3 cell-xl-2" id="top_users-freelancer">
    @for ($i = 1; $i <= 12; $i++)

      <li class="click_container-link set_href @if($i > 10) d-none d-lg-block d-xl-none @endif">
        <div class="pr_block">
          <div class="clearfix user_brief d-flex">
            <div class="userpic">
              <a href="#" rel="nofollow">
                <img class="img-fluid" src="https://st.weblancer.net/download/4663238_120xs.png" alt="">
              </a>
            </div>

            <div class="brief">
                          <span class="name">
                            <a href="/users/alexeybychkov/?account_type=freelancer" rel="nofollow">Алексей Бычков</a>
                          </span>

              <span class="login">
                            <span>alexeybychkov</span>
                            <span class="icon-checkmark text-success" data-toggle="tooltip"
                                  data-original-title="Личность подтверждена" title="">
                            </span>
                          </span>
            </div>
          </div>

          <div class="pr_title text_field">Дизайн сайтов</div>

          <div class="pr_text text_field dot_divided"><span class="text-success">12 отзывов</span></div>

          <div class="pr_text text_field text-muted">27 баллов рейтинга</div>
        </div>
      </li>

    @endfor
  </ul>
</div>
