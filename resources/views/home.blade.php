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
                    <h6 class="card-title small"><strong>{{ $pet->name }}</strong></h6>
                    
                    <!--i class="fas fa-paw" style="color:green"></i>
                    <i class="fas fa-paw"></i>
                    <i class="fas fa-paw"></i>
                    <i class="fas fa-paw"></i>
                    <i class="fas fa-paw"></i-->

                    <!-- Subtitle -->
                    <div class="row p-0 m-0">
                        <div class="col-md-1 p-0 m-auto pl-1">
                            <h6 class="small text-center"><i class="fas fa-dog animated rotateIn"></i></h6>
                        </div>

                        <div class="col">
                            <h6 class="mt-1 ml-1 mr-1 small">{{$pet->race}}</h6>
                        </div>
                    </div>

                    <div class="row p-0 m-0">
                        <div class="col-md-1 p-0 m-auto pl-1">
                        <h6 class="mt-1 small"><i class="fas fa-city animated rotateIn"></i></h6>
                        </div>

                        <div class="col p-0 ml-1">
                            <h6 class="mt-1 ml-1 mr-1 small">{{$pet->user->address->city}}</h6>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
        @endforeach
        <!--Grid column dinamic-->
    </div>
    <!-- Grid Row -->
</div>
@endsection