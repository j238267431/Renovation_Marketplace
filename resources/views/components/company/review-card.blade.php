<div class="h3 no-padding pt-3 ">
    {{$review->title}}
</div>
<div class="row pt-3 no-border vertical-align no-margin">

    <x-company.rating :rating="$review->rating"/>

    <div class=" no-padding col-md-9">{{$review->created_at}}</div>

</div>

<div class=" no-padding">{{$review->content}}</div>
