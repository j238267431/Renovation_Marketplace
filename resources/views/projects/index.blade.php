
@extends('layouts.index')

@section('content')
    <div class="wrapper tab-content">
        <div class="page_content no_sidebar d-flex flex-column landing">
            <div class="order-1">
                <h1 class="block-header">Страница всех проектов всех компаний</h1>

                <ul class="cell_list cell-xs-1 cell-sm-2 cell-lg-3 cell-xl-4 ">
                    @foreach($projects as $project)
                        <li class="click_container-link set_href">
                            <a href="{{ route('projects.show', ['project' => $project->id])}}">
                                <x-project.project-card-all :project="$project" />
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>

        <!--@forelse($projects as $project)
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
        {{$projects->links()}}-->





@endsection

