<form action="#" method="post" autocomplete="off">
  <input type="hidden" name="action" value="save_task">

  <input type="hidden" name="fk" value="">

  <input type="hidden" name="type" value="project">

  <h1 class="lg indent-b10">Строительная биржа</h1>

  <div class="title indent-b30 dot_divided">
    <span>Малоэтажное строительство</span>

    <span>Ремонт и отделка помещения</span>

    <span>Безопасные сделки с комиссией <span class="text-warning text-nowrap">всего 3%</span></span>
  </div>

  <div class="form-group col-lg-7 col-xl-6 p-0">
    <div class="input-group input-group-lg">
      <input class="form-control form-control-lg" type="text" id="task_name" name="name"
             placeholder="Что нужно сделать?" maxlength="128">
      <span class="input-group-btn">
        <button class="btn btn-success" type="submit" data-btn_type="index">Заказать</button>
      </span>
    </div>

    <div class="text_field indent-t10 hidden-xs-down">
      Например:
      <a class="dotted" onclick="$('#task_name').val($(this).text()); return false;">построить одноэтажный дом</a>
      или
      <a class="dotted" onclick="$('#task_name').val($(this).text()); return false;">сделать ремонт ванной комнаты</a>
    </div>
  </div>
</form>
