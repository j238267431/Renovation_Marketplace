@extends('layouts.index')

@section('content')
  <div class="container">
    <div class="mb-3">
        <h1>Страница всех компаний с сылкой перехода к проектам компании</h1>
      @forelse($companies as $company)
        <a href="{{ route('companyProjects', ['company' => $company->id])}} ">{{$company->id}}</a> <br>
        {{ $company->name }} <br>
        {{ $company->cover ?? '<Нет картинки>'}} <br>
        {{ $company->description }} <br>
        {{ $company->phone }} <br>
        {{ $company->email }} <br>
        {{ $company->address }} <br>
        {{ $company->orders->count() }} <br>
        {{ $company->reviews->count() }} <br>
        <hr style="border-color: black">
      @empty
        <p>Ничего не найдено.</p>
      @endforelse
      {{$companies->links()}}
    </div>
  </div>
@endsection
