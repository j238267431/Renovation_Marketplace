<div class="card-project-all">
    <div class="card-project-all__section">
        {{ $project->category->name }}
    </div>

    <div class="card-project-all__cover">
        <img src="{{$project->cover}}" class="card-project-all__img" alt="{{$project->name}}">
        <div class="card-project-all__like">
            <i class="bi bi-heart-fill"></i>
        </div>
    </div>

    <h5 class="card-project-all__title">{{$project->name}}</h5>
    <p class="card-project-all__text">
        {{$project->description}}
    </p>
    <div class="card-project-all__price">
        {{$project->price}} &#8381;
    </div>
</div>
