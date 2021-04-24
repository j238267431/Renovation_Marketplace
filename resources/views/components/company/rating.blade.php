
<div class="rating-result col-md-3 no-padding">
    @for($i = 1; $i <= 5; $i++)
        @if($i <= $rating)
            <span class="active"></span>
        @else
            <span></span>
        @endif
    @endfor
</div>
