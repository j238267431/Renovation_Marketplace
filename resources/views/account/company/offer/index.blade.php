@extends('layouts.index')

@section('content') 
@include('includes.title', [
'title' => 'Услуги',
'breadcrumbs' => 'account.companies.offer',
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
                            <th scope="col">название</th>
                            <th scope="col">описание</th>
                            <th scope="col">стоимость</th>
                            <th scope="col" colspan="2">редактировать</th>
                        </tr>
                        </thead>
                        @foreach($companies as $company)
                            <tbody>
                            @foreach($company->offers as $offer)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td>{{$offer->name}}</td>
                                <td>{!!$offer->description!!}</td>
                                <td>{{ $offer->price }}</td>
                                <td><a href="{{route('account.companies.offer.edit', ['offer' => $offer->id])}}" class="btn btn-warning">изменить</a></td>
                                <td><a data-id="{{$offer->id}}" onclick="offerDelete()" href="{{route('account.companies.offer.destroy', ['offer' => $offer->id])}}" class="btn btn-danger">удалить</a></td>
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
function offerDelete()
{
event.preventDefault();
var id = event.toElement.dataset.id
$.ajax({

url: "/account/companies/offer/destroy?id="+id, 
method: "DELETE",
// data: {id:id},

headers: {

'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
'Content-type': 'application/json; charset=utf-8',
},

success: function (data) {
    document.location.href = "/account/companies/offer/index"
},

error: function (msg) {
    console.log(msg)
}

});

}
</script>
@endpush

