<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <!-- styles -->
  <link rel="stylesheet" href="/css/normalize.css">

  <title>СтройХаус</title>
</head>

<body class="web">
  <div class="main-wrapper">
    <x-main-header></x-main-header>

    <main class="content">

        <div class="wrapper tab-content">
            <div class="page_layer page_layer-index text-center-xs-down">
                <form action="{{route('tasks.create')}}" method="get" autocomplete="off">
                    @csrf
                    <h1 class="lg indent-b10">Строительная биржа</h1>
                    <div class="title indent-b30 dot_divided">
                        <span>Ремонт под ключ</span><span>Малоэтажное строительство</span><span>Безопасные сделки с комиссией <span
                            class="text-warning text-nowrap">всего 5%</span></span>
                    </div>
                    <div class="form-group col-lg-7 col-xl-6 p-0">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control form-control-lg" id="job_name" name="name"
                                   placeholder="Что нужно сделать?" maxlength="70">
                            <span class="input-group-btn">
{{--		<button type="submit" class="btn btn-success" data-btn_type="index">Заказать</button>--}}
                                <a class="btn btn-success" href=" {{ route ('tasks.create')}}">Сделать заказ</a>
		</span>
                        </div>
                        <div class="text_field indent-t10 hidden-xs-down">Например: <a class="dotted">построить дом</a>
                            или
                            <a
                                    class="dotted">сделать ремонт</a>
                        </div>
                    </div>
                </form>
                <div class="cols_table no_hover hidden-sm-down">
                    <div class="row">
                        <div class="col-sm-3">
                            <div>
                                <span class="num">1</span><b class="title">Заказчик</b>
                                <p>размещает <span class="hidden-md-down">свой</span> заказ<br>за пару минут</p>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <span class="num">2</span><b class="title">Строительные компании</b>
                                <p>предлагают услуги,<br>цены и сроки</p>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div><span class="num">3</span><b class="title">Заказчик</b>
                                <p>выбирает <span class="hidden-md-down">подходящего</span><br>исполнителя</p>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div>
                                <span class="num">4</span><b class="title">Исполнитель</b>
                                <p>выполняет работу<br>и получает оплату</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </main>

    <x-main-footer></x-main-footer>
  </div>

  <!-- scripts -->
  <script src="/js/jquery.js"></script>
  <script src="/js/jquery.visible.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/tether.min.js"></script>
  <script src="/js/bootstrap.js"></script>
  <script src="/js/bootstrap-typeahead.min.js"></script>
</body>
</html>
