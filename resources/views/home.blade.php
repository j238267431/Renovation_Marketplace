@extends('layouts.index')

@section('content')

  <div class="wrapper tab-content">
    <div class="page_layer page_layer-index text-center-xs-down">
      <x-home-quick-start></x-home-quick-start>

      <x-home-procedure></x-home-procedure>
    </div>

    <div class="clearfix tab-pane fade show active" id="tab_pane-main">
      <div class="page_content no_sidebar d-flex flex-column landing">
        <x-home-about></x-home-about>

        <x-home-advantage></x-home-advantage>

        <x-home-tasks></x-home-tasks>

        <x-home-top-categories></x-home-top-categories>

        <x-home-active-developers></x-home-active-developers>

        <x-home-portfolio></x-home-portfolio>
      </div>
    </div>

  </div>
</div>

@endsection
