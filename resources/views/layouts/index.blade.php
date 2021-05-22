<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <!-- styles -->
  <!-- <link rel="stylesheet" href="/css/app.css"> -->
  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/new_style.css">
    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style>
  <title>СтройХаус</title>
</head>

<body class="web">
<div id="app">
  <div  class="main-wrapper">
    <x-main-header></x-main-header>

    <main class="content">
        @yield('content')
    </main>

    <x-main-footer></x-main-footer>
  </div>
</div>
  <!-- scripts -->
    <script src="{{asset('js/app.js')}}"></script>
  <script src="/js/jquery.js"></script>
  <script src="/js/jquery.visible.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/tether.min.js"></script>
  <script src="/js/bootstrap.js"></script>
  <script src="/js/bootstrap-typeahead.min.js"></script>
  <script src="/js/offer.js"></script>


  <!-- summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

  @stack('js')
</body>
</html>
