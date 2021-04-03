@extends('layouts.index')
@section('content')
  {{'edit review with id ' .$review->id}}
  <form method="POST" action="{{route('companies.reviews.update', ['company' => $company_id, 'review' => $review->id])}}">
    @method('PUT')
    @csrf
    <input type="text" name="title" placeholder="title" value="{{$review->title}}">
    <input type="text" name="content" placeholder="content" value="{{$review->content}}">
    <input type="submit" value="редактировать">
  </form>
@endsection
