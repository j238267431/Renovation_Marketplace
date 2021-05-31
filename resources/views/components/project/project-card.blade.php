<div class="card-project">
    <a href="{{route('projects.show', $project)}}">
        <img src="{{ $project->cover ?? asset('img/placeholder_project.jpg')}}" class="card-project__img" alt="{{$project->name}}">
    <div class="card-project__body">
        <h5 class="card-project__title">{{$project->name}}</h5>
        <p class="card-project__text">
            {{$project->description}}
        </p>
    </div>
    </a>
</div>
