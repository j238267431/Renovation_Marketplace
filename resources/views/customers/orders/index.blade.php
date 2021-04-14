@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="mb-3">
@if(session()->has('success'))
    <div class="alert alert-success">Заявка добавлена</div>
@endif

<h1>Все заказы</h1>
    <br>
    <div>
        @foreach($tasks as $task)
            <a href="{{route('tasks.show',['task' => $task->id])}}">{{$task->id}}</a>
            <h4>{{$task->title}}</h4>
            <p>{{$task->description}}</p>
            <p>{{$task->categoryName->name}}</p>
            <br><br>
        @endforeach
    </div>
    {{$tasks->links()}}
@endsection
