<div class="card project-card" style="width: 18rem;">
    <a href="{{route('projects.show', $project)}}">
        <img src="{{$project->cover}}" class="card-img-top" alt="{{$project->name}}">

    <div class="card-body">
        <h5 class="card-title">{{$project->name}}</h5>
        <p class="card-text">
            {{$project->description}}
        </p>

    </div>
    </a>
</div>
