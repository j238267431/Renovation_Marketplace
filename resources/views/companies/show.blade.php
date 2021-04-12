@extends('layouts.index')

@section('content')
{{ $company->id }} <br>
{{ $company->name }} <br>
{{ $company->cover ?? '<Нет картинки>'}} <br>
{{ $company->description }} <br>
{{ $company->phone }} <br>
{{ $company->email }} <br>
{{ $company->address }} <br>
{{ $company->orders->count() }} <br>
{{ $company->reviews->count() }} <br>
<hr>
@endsection