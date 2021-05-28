<div class="card-project-big">
    <div class="card-project-big__section">
        категория
    </div>
    <h5 class="card-project__title">{{$project->name}}</h5>
    <div class="card-project-big__cover">
        <img src="{{$project->cover}}" class="card-project__img" alt="{{$project->name}}">
    </div>
    <div class="card-project-big__img-row">
        <div class="card-project-big__img">

        </div>
    </div>
    <p class="card-project__text">
        {{$project->description}}
    </p>
    <p class="card-project__text">
        {{$project->content}}
    </p>
    <div class="card-project-big__price">
        {{$project->price}} &#8381;
    </div>
</div>
