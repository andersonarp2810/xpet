<div class="text-center mt-4">
    <a href="/pet/profile/{{ $pet->id }}">
        @if($pet->photos->first() != null)
        <img class="card-img-top card-img-pet rounded img-fluid" src="{{ URL::asset('storage/' . $pet->photos->first()->path)}}" alt="{{$pet->name}}" />
        @else
        <img class="card-img-top card-img-pet rounded img-fluid" src="assets/img/card-pet-default.jpg" alt="{{$pet->name}}" style="    opacity: 0.5;" />
        @endif
    </a>
</div>
