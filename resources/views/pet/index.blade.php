@extends('layouts.teste')
@section('content')

<div class="container-fluid mt-5">

    <div class="row wow fadeIn">

        <!-- botão novo pet -->
        <div class="col-lg-2 col-md-4 mb-4">

            <div class="card card-cascade wider">

                <!-- Card image -->
                <div class="view view-cascade overlay card-imagem">
                    <img class="card-img" src="teste/img/maislaranja.png" alt="Card image cap" height="285" width="100" style="object-fit: contain; object-position: center; height: 100%" >
                    <a href="#!" data-toggle="modal" data-target="#modal-create">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h6 class="card-title small"><strong>Novo Pet</strong></h6>
                    <!-- Subtitle -->
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary btn-sm btn-block d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#modal-create">
                                <i class="fa fa-paw animated rotateIn"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- botão novo pet -->

        <!--Grid column dinamic-->
        @foreach($pets as $pet)
        <div class="col-lg-2 col-md-4 mb-4 ">

            <div class="card card-cascade wider">

                @include('layouts.pet-card-image', ['pet' => $pet])

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h6 class="card-title small"><strong>{{$pet->name}}</strong></h6>
                    <!-- Subtitle -->
                    <div class="row">
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary btn-sm btn-block d-flex justify-content-center align-items-center" data-toggle="modal" data-target="{{ '#modal-edit-' . $pet->id}}">
                                <i class="fa fa-edit animated rotateIn"></i>
                            </button>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <form method="POST" action="{{ route('pet.delete', ['pet' => $pet]) }}" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-block d-flex justify-content-center align-items-center">
                                    <i class="fa fa-trash animated rotateIn"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
        <!--Grid column dinamic-->

        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-6 mb-4">

                <div class="card">
                    <!--Section: Modals-->
                    <section>

                        <!-- Create modal -->
                        @include('layouts.pet-form', ['pet' => null])

                        @foreach($pets as $pet)
                            @include('layouts.pet-form', ['pet' => $pet])
                        @endforeach

                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection