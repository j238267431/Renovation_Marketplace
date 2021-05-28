<div class="card-project-one">
    <div class="card-project-one__body">
        <div class="card-project-one__cover">
            <div class="card-project-one__section">
                {{$category->name}}
            </div>
            <img src="{{$project->cover}}" class="card-project-one__img" alt="{{$project->name}}">
            <div class="card-project-one__price">
                {{$project->price}}
            </div>
        </div>

        <h5 class="card-project-one__title">{{$project->name}}</h5>
        <p class="card-project-one__text">
            {{$project->description}}
        </p>

    </div>



    <div class="card-project-one__img-row">

        @forelse($images as $image)
            <div class="card-project-one__img">
                <img class="img-fluid pt-3" src="{{$image->path}}" alt="photo">
            </div>
        @empty
            <p>No pictures</p>
        @endforelse

    </div>
</div>

