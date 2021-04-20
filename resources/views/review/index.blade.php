@extends('layouts.index')
@section('content')
    @include('includes.title', ['title' => 'Отзывы'])

    @forelse($reviews as $review)
        <h2><a style=""
               href="{{route('reviews.show',$review)}}">{{$review->title}}</a>
        </h2>
        <p>{{$review->content}}</p>
        @if($review->user === Auth::user())
            <a href="{{route('reviews.edit', $review)}}">редактировать</a>
            <a style="color: red" href="javascript:;" class="delete" rel="{{ $review->id }}">удалить</a>
        @endif
        <br>
    @empty
        <p>Пока нет ни одного отзыва.</p>
    @endforelse

@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            const fetchData = async (url, options) => {
                const response = await fetch(`${url}`, options)
                const body = await response;
                return body;
            }
            console.log(1)

            const button = document.querySelectorAll('.delete');
            button.forEach(el => (
                el.addEventListener('click', function () {
                    fetchData("{{ url('/reviews') }}/" + this.getAttribute('rel'), {
                        method: "DELETE",
                        headers: {
                            'Content-type': 'application/json; charset=utf-8',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then((data) => {
                        document.location.href = '{{ route('reviews.index') }}'
                    })

                })
            ))
        })
    </script>
@endpush
