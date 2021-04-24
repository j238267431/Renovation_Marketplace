@extends('layouts.index')
@section('content')
    <div class="container">
        <div class="mb-3">
            <h1>Страница всех проектов одной  компаний</h1>
            <br>
            <p>Имя компании : {{$company->name}}</p>
            <p>Phone компании : {{$company->phone}}</p>
            <p>Email компании : {{$company->email}}</p>
            <p>address компании : {{$company->address}}</p>
            <p>cover компании : {{$company->cover}}</p>
            <p>description компании : {{$company->description}}</p>
            <hr>
            <h3>Проекты компании <i style="color: #4dc0b5">{{$company->name}}</i></h3>
            @forelse($projects as $project)
                <a href="{{ route('projects.show', ['project' => $project->id])}} ">{{$project->id}}</a> <br>
                {{ $project->name }} <br>
                <h3>{{ $project->company->name }}</h3>
                <p>{{ $project->category->name }}</p> <br>
                @forelse($project->images as $oneImg)
                    <img src="{{$oneImg->path}}" alt="photo">
                @empty
                    <h4>Нет фото</h4>
                @endforelse
                @if($project->cover)
                    <img src="{{$project->cover}}" alt="cover">
                @else
                    <p>No cover</p>
                @endif
                <p>{{ $project->description }}</p>
                <p><strong>{{ $project->price}}</strong> &#8381;</p>
                <p>{{ $project->content }}</p>
                <hr style="border-color: black">
            @empty
                <p>Ничего не найдено.</p>
            @endforelse
        </div>
        {{$projects->links()}}
    </div>
@endsection
