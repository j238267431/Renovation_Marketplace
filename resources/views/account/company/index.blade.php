@extends('layouts.index')
@section('content')
<x-account.nav />

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
      <div class="block-content">
        <div class="title indent-b30">
          <a href="#">Мои компании</a>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Название</th>
              <th scope="col">Телефон</th>
              <th scope="col">e-mail</th>
              <th scope="col">описание</th>
            </tr>
          </thead>
          @foreach($companies as $company)
          <tbody>
            <tr>
              <td>{{$company->name}}</td>
              <td>{{$company->phone}}</td>
              <td>{{$company->email}}</td>
              <td>{!! $company->description !!}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection