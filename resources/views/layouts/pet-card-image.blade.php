<!-- Card image -->
<div class="view view-cascade overlay">
    <a href="/pet/profile/{{ $pet->id }}">
        @if($pet->photos->first() != null)
            <img class="card-img-top thumb-post card-imagem" src="{{ URL::asset('storage/' . $pet->photos->first()->path)}}" alt="Card image cap" height="285" width="100" />
        @else
            <img class="card-img-top thumb-post" src="teste/img/pet1.jpg" alt="Card image cap" height="285" width="100" />
        @endif
        <div class="mask rgba-white-slight"></div>
    </a>
        
</div>
