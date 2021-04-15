<div class="page_header">
  <div class="wrapper cols_table no_hover">
    <div class="row">
      <div class="col page_header_content">
        <h1>Я заказчик</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Строительная биржа</a></li>
          <li class="breadcrumb-item active">Личный кабинет</li>
        </ol>
      </div>
      <div class="col-aut d-flex flex-column page_header_sidebar">
        <a class="btn btn-success" href="{{route('company.create')}}">Создать компанию</a>
      </div>
      @if($hasCompany)
      <div class="col-aut d-flex flex-column page_header_sidebar">
        <a class="btn btn-success" href="{{route('company.index')}}">Мои компании</a>
      </div>
      @endif
    </div>
  </div>
</div>
