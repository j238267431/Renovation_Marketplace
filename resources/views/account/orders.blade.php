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
              <th scope="col">Описание заказа</th>
                <th scope="col">Компания исполнитель</th>
                <th scope="col">Статус заказа</th>
                <th scope="col">Подтверждение</th>
            </tr>
          </thead>
          @foreach($orders as $order)
          <tbody>
            <tr>
              <td>{!! $order->details !!}</td>
                <td>{{$order->company->name}}</td>
                <td>{{$order->status->name}}</td>
                <td>@if($order->status->id == 4)
                    <div onclick="confirmOrderFulfilled({{$order->id}})" class="btn btn-success">подтвердить выполнение</div>
                @endif</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
    <script>
        function confirmOrderFulfilled(id)
        {
            event.preventDefault();
            $.ajax({
                url: "/account/order/confirm",
                method: "get",
                data: {id:id},

                headers: {

                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                    'Content-type': 'application/json; charset=utf-8',
                },

                success: function (data) {
                    document.location.href = "/account/orders"
                },

                error: function (msg) {
                    console.log(msg)
                }

            });

        }
    </script>
@endpush

