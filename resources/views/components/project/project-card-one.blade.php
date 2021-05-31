<div class="card-project-one">
    <div class="card-project-one__body">
        <div class="card-project-one__cover">
            <div class="card-project-one__section">
                {{$category->name}}
            </div>
            <img src="{{$project->cover}}" class="card-project-one__img" alt="{{$project->name}}">
            <div class="card-project-one__price">
                {{$project->price}} &#8381;
            </div>
        </div>
        <div class="container-fluid">
            <h5 class="card-project-one__title">{{$project->name}}</h5>
            <p class="card-project-one__text">
                {{$project->description}}
            </p>
            <p class="card-project-one__text">
                {{$project->content}}
            </p>
        </div>
    </div>

    <div class="card-project-one__img-row">

        @forelse($images as $image)
            <div class="card-project-one__item">
                <img class="card-project-one__img" src="{{$image->path}}" alt="photo">
            </div>
        @empty
            <p>No pictures</p>
        @endforelse

    </div>
</div>

