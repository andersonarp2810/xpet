<!-- Card image -->
<div class="view view-cascade overlay">
    @if($pet->photos->first() != null)
        <img class="card-img-top thumb-post" src="{{ URL::asset('storage/' . $pet->photos->first()->path)}}" alt="Card image cap" height="285" width="100">
    @else
        <img class="card-img-top thumb-post" src="teste/img/pet1.jpg" alt="Card image cap" height="285" width="100">
    @endif
    <a href="#!">
        <div class="mask rgba-white-slight"></div>
    </a>
</div>
