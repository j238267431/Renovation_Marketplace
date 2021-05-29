@extends('layouts.index')

@section('content')
    @include('includes.title', [
    'title' => 'Заказы в работе',
    'breadcrumbs' => 'account.project',
    'hasCompany' => true
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
                                    <x-account.links />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page_content">
                @if(session('success'))
                    {{--                    <div class="block-content alert-success">--}}
                    <div class="block-content alert-success">{{session('success')}}</div>
                    {{--                    </div>--}}
                @endif
                <div class="block-content">
                    <div class="title indent-b30">
                        <a class="btn btn-success" href="{{route('account.companies.offer.create')}}">Создать услугу</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">компания</th>
                            <th scope="col">описание</th>
                            <th scope="col">статус</th>
                            <th scope="col">действия</th>
                        </tr>
                        </thead>
                        @foreach($companies as $company)
                            <tbody>
                            @foreach($company->orders as $order)
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>{!!$order->details!!}</td>
                                    <td>
                                        <Select class="form-select" id="status{{$order->id}}" @if($order->status->id == 5) disabled @endif>
                                            @foreach($statuses as $status)
                                                <option value="{{$status->id}}"
                                                    @if($status->id == $order->status->id) selected @endif
                                                    @if($status->id == 2 || $status->id == 3 || $status->id == 4) @else disabled @endif
                                                >{{$status->name}}</option>
                                            @endforeach
                                        </Select>
                                    </td>
                                    <td><a class="btn btn-success @if($order->status->id == 5) disabled @endif" onclick="changeStatus({{$order->id}})" href="">изменить статус</a></td>
                                </tr>
                            @endforeach
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
        function changeStatus(id)
        {
            event.preventDefault();
            let statusId = document.getElementById('status'+id).value
            $.ajax({

                url: "/account/order/status",
                method: "get",
                data: {id:id, statusId:statusId},

                headers: {

                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                    'Content-type': 'application/json; charset=utf-8',
                },

                success: function (data) {
                    document.location.href = "/account/project"
                },

                error: function (msg) {
                    console.log(msg)
                }

            });

        }
    </script>
@endpush

