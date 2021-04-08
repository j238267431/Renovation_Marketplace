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
        @yield('content')

      </div>
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
  @stack('js')
</body>
</html>
