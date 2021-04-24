@extends('layouts.index')
@section('content')
    @include('includes.title', ['title' => 'Отзывы о компании ' . optional($company)->name])

    <div class="wrapper tab-content">
        <div class="clearfix tab-pane fade show active" id="tab_pane-main">
            <div class="cols_table no_hover divided_rows">
                <div class="row">
                    <div class="col-12">
                        @forelse($reviews as $review)

                            <x-company.review-card :review="$review"/>

                            @if($review->user === Auth::user())
                                <a href="{{route('reviews.edit', $review)}}">редактировать</a>
                                <a style="color: red" href="javascript:;" class="delete" rel="{{ $review->id }}">удалить</a>
                            @endif
                            <br>
                        @empty
                            <p>пока нет ни одного отзыва</p>
                        @endforelse
                    </div>
                </div>

                <div class="row">
                    <x-company.review-form />
                </div>
            </div>
        </div>
    </div>
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
                    fetchData("{{ url('/companies/'.$company->id.'/reviews') }}/" + this.getAttribute('rel'), {
                        method: "DELETE",
                        headers: {
                            'Content-type': 'application/json; charset=utf-8',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then((data) => {
                        document.location.href = '{{ route('companies.reviews', $company) }}'
                    })

                })
            ))
        })
    </script>
@endpush
