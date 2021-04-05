@extends('layouts.index')
@section('content')
  <a href="{{route('companies.reviews.create', ['company' => $company_id])}}">новый отзыв</a>
  <h2>список отзывов компании c id {{$company_id}}</h2><br>
  @forelse($reviews as $review)
    <h2><a style="" href="{{route('companies.reviews.show',['company' => $company_id,'review'=>$review->id])}}">{{$review->title}}</a></h2>
    <p>{{$review->content}}</p>
    <a href="{{route('companies.reviews.edit', ['company' => $company_id,'review'=>$review->id])}}">редактировать</a>
    <a style="color: red" href="javascript:;" class="delete" rel="{{ $review->id }}">удалить</a>
    <br>
  @empty
    <p>пока нет ни одного отзыва</p>
  @endforelse

@endsection
@push('js')
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function (){
      const fetchData = async (url, options) => {
        const response = await fetch(`${url}`, options)
        const body = await response;
        return body;
      }
      console.log(1)

      const button = document.querySelectorAll('.delete');
      button.forEach(el => (
        el.addEventListener('click', function(){
          fetchData("{{ url('/companies/'.$company_id.'/reviews') }}/" + this.getAttribute('rel'), {
            method: "DELETE",
            headers: {
              'Content-type': 'application/json; charset=utf-8',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
          }).then((data)=>{
            document.location.href = '{{route('companies.reviews.index', ['company' => $company_id])}}'
          })

        })
      ))
    })
  </script>
@endpush
