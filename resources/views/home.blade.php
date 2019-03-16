@extends('layouts.teste')
@section('content')
<div class="container-fluid mt-3">
    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column dinamic -->
        @foreach ($pets as $pet)
        <div class="col-lg-2 col-md-4 mb-4 filtravel">

            <div class="card card-cascade wider">
        
                @include('layouts.pet-card-image', ['pet' => $pet])
        
                <!-- Card content -->
                <div class="card-body card-body-cascade text-center p-1">
        
                    <!-- Title -->
                    <h6 class="card-title"><strong>{{ $pet->name }}</strong></h6>
                    
                    <!--i class="fas fa-paw" style="color:green"></i>
                    <i class="fas fa-paw"></i>
                    <i class="fas fa-paw"></i>
                    <i class="fas fa-paw"></i>
                    <i class="fas fa-paw"></i-->

                    <!-- Subtitle -->
                    <h6 class="mt-1 small" style=""><i class="fas fa-dog animated rotateIn mr-1"></i>{{$pet->race}}</h6>
                    <h6 class="mt-1 small"><i class="fas fa-city animated rotateIn mr-1"></i>{{$pet->user->address->city}}</h6>
                    
                    
                </div>
        
            </div>
        
        </div>
        @endforeach
        <!--Grid column dinamic-->
    </div>
    <!-- Grid Row -->
</div>
@endsection