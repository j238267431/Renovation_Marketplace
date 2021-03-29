<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Title</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
          integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>

<style>
    .logo_footer {
        width: 50px;
        height: 50px;
    }
</style>
<body class="web">
<div class="main-wrapper">
    <header>
        <div class="wrapper">
            <nav class="navbar navbar-toggleable">
                <a class="navbar-collapse col-md" href="#" alt="Строительная биржа">
                    <div class="logo ">
                        <img src="{{asset('icon/header_logo.svg')}}" alt="">
                    </div>
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav left-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Каталог компаний</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Заказы клиентов</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="nav-link d-block d-sm-none d-md-inline-block"
                               href="#" rel="nofollow">Регистрация</a></li>
                        <li><a class="nav-link" data-toggle="modal" data-target="#login_form">Вход в аккаунт</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="content">
        <div class="wrapper tab-content">
            <div class="page_layer page_layer-index text-center-xs-down">
                <form action="{{route('orders.create')}}" method="get" autocomplete="off">
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

    <footer>
        <div class="wrapper cols_table no_hover">
            <div class="row border-0">
                <div class="col-12 col-md">
                    <a class="header navbar-brand " href="#" alt="Строительная биржа" title="Строительная биржа">
                        <img class="logo_footer" src="icon/footer_logo.png" alt="Строительная биржа"> <strong>Строительная
                        биржа</strong>
                    </a>
                    <ul class="social-list d-block indent-t10">
                        <li>
                            <a href="#" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="nofollow"><i class="fab fa-vk"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="nofollow"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="nofollow"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                    <div class="links indent-t10">
                        <a class="d-inline-flex align-items-center support_link" href="#"> <i
                                class="fas fa-envelope"></i>&nbsp;info@mail.ru</a>
                        <p class="indent-t10 text-secondary">Ежедневно с 8:00 до 22:00</p>
                    </div>
                </div>
                <div class="col-sm-auto col-md-2 links"><b class="h3 header">О сервисе</b><a href="#">О компании</a><a
                        href="#">Контакты</a><a href="#">Отзывы</a></div>
                <div class="col-sm-auto col-md-3 links"><b class="h3 header">Пользователям</b><a href="#">Тарифы</a><a
                        href="#">Заказы</a><a href="#">Партнёрская программа</a></div>
                <div class="col-sm-auto col-md-3 links"><b class="h3 header">Помощь</b><a href="#">Как разместить
                    заказ</a><a href="#">Помощь юристов</a><a href="#">Регистрация</a></div>
            </div>
            <div class="row text_field">
                <div class="col text-muted">© Строительная биржа, 2021</div>
                <div class="col-sm-8
             text-muted"><a class="text-muted" href="#">Пользовательское соглашение</a>
                </div>
            </div>
        </div>

</footer>
</div>
</body>
</html>
