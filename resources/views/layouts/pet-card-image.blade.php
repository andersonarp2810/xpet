<!-- Card image -->
<div class="view view-cascade overlay">
    @if($pet->photos->first() != null)
    <a href="/pet/profile/{{ $pet->id }}">
        <img class="card-img-top thumb-post" src="{{ URL::asset('storage/' . $pet->photos->first()->path)}}" alt="Card image cap" height="285" width="100" />
        <div class="mask rgba-white-slight"></div>
    </a>
    @else
        <img class="card-img-top thumb-post" src="teste/img/pet1.jpg" alt="Card image cap" height="285" width="100" />
    @endif
    
</div>
