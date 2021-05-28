@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="mb-3">
            <x-project.project-card-one :category="$category" :project="$project" :images="$images" />

        <!--<h1>Страница подробная одного проекта</h1>
            <br>
            <h4>Данные компании </h4>
            <p>Имя компании : {{$company->name}}</p>
            <p>Phone компании : {{$company->phone}}</p>
            <p>Email компании : {{$company->email}}</p>
            <p>address компании : {{$company->address}}</p>
            <p>cover компании : {{$company->cover}}</p>
            <p>description компании : {{$company->description}}</p>
            <hr>
            <h4>данные категории</h4>
            <p>Имя категории : {{$category->name}}</p>
            <p>level категории : {{$category->level}}</p>
            <p>parent_id категории : {{$category->parent_id}}</p>
            <hr>
            <h4>Images</h4>
            @forelse($images as $image)
                <img src="{{$image->path}}" alt="photo">
            @empty
                <p>No pictures</p>
            @endforelse
            <hr>
            <h4>Project data</h4>
            <p>Имя проекта : {{$project->name}}</p>
            <p>Price проекта : {{$project->price}} &#8381;</p>
            <p>Cover проекта : {{$project->cover}}</p>
            <img src="{{$project->cover}}" alt="photo">
            <p>description проекта : {{$project->description}}</p>
            <p>content проекта : {{$project->content}}</p>
-->
        </div>
    </div>

@endsection
