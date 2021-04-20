@extends('layouts.index')
@section('content')
  {{'создание нового отзыва о компании с id ' . $company_id}}
  <form method="POST" action="{{route('companies.reviews.store', ['company' => $company_id])}}">
    @csrf
    <input type="text" name="title" placeholder="title">
    <input type="text" name="content" placeholder="content">
    <input type="submit" value="оставить">
  </form>
@endsection
