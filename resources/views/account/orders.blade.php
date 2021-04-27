@extends('layouts.index')
@section('content')

@include('includes.title', [
'title' => 'Личный кабинет',
'breadcrumbs' => 'account.orders',
'hasCompany' => $hasCompany
])
<div class="wrapper tab-content">
  <div class="clearfix tab-pane fade show active">
    <div class="sidebar">
      <div class="navbar navbar-toggleable">
        <div class="navbar-collapse">
          <div class="navbar-nav">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle">Навигация</a>
              <div class="dropdown-menu block-content text_field">
                <x-account.right-menu />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page_content">

      <div class="block-content text-muted">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Описание</th>
            </tr>
          </thead>
          @foreach($orders as $order)
          <tbody>
            <tr>
              <td>{{$order->details}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection