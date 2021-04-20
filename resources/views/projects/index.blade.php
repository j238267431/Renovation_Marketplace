@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="mb-3">
            <h1>Страница всех проектов всех компаний</h1>
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
            {{$projects->links()}}
        </div>
    </div>
@endsection
