@extends('layouts.index')

@section('content')
<div class="page_layer page_layer-index text-center-xs-down">
  <x-home-quick-start></x-home-quick-start>
  <x-home-procedure></x-home-procedure>
</div>

<div class="clearfix tab-pane fade show active" id="tab_pane-main">
  <div class="page_content no_sidebar d-flex flex-column landing">

    {{--Самые активные подрядчики за 1 кв 2021--}}
    <x-home-active-developers></x-home-active-developers>
    {{--Заявки по категориям--}}
    <x-home-tasks></x-home-tasks>
    {{--Новые примеры работ (проекты)--}}
    <x-home-portfolio></x-home-portfolio>
    {{--Преимущества строительной биржи СтройХаус--}}
    <x-home-advantage></x-home-advantage>
    {{--Строительная биржа - просто и надежно!--}}
    <x-home-about></x-home-about>
    {{--ТОП-10 категорий за месяц (по кол-ву заявок и заказов)--}}
    <x-home-top-categories></x-home-top-categories>

  </div>
</div>

@endsection
