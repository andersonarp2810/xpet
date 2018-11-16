@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5">

<div class="row wow fadeIn">

    <!--Grid column dinamic-->
    <div class="col-lg-4 col-md-12 mb-4">

        <div class="card card-cascade wider">

            @include('layouts.pet-card-image', ['pet' => $pet])

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">

                <!-- Title -->
                <h4 class="card-title"><strong>{{$pet->name}}</strong></h4>
                <!-- Subtitle -->

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-' . $pet->id }}">Combinar </button>

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-edit-' . $pet->id}}">Editar </button>
                <br>

            </div>

        </div>

    </div>
    <!--Grid column dinamic-->
    <div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-12 mb-4">

        <div class="col-lg-40 col-md-12 mb-4">

            <div class="card card-cascade wider">

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <div class="modal-body card-body-cascade text-left">
                        <h4 class="card-title"><strong>Raça: </strong>{{ $pet->race }}</h4>
                        <h4 class="card-title"><strong>Tamanho: </strong>{{ $pet->size }}</h4>
                        <h4 class="card-title"><strong>Cor: </strong>{{ $pet->color }}</h4>
                        <h4 class="card-title"><strong>Gênero: </strong>{{ $pet->gender }}</h4>
                        <h4 class="card-title"><strong>Pedigree: </strong>{{ $pet->pedigree }}</h4>
                        <h4 class="card-title"><strong>Descrição: </strong>{{ $pet->description }}</h4>

                    </div>

                </div>

            </div>

        </div>

    </div>
    
    </div>

    <div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-12 mb-4">

        <div class="col-lg-40 col-md-12 mb-4">

            <div class="card card-cascade wider">

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <div class="modal-body card-body-cascade text-left">
                        <h4 class="card-title"><strong>Dono: </strong>{{ $pet->user->name }}</h4>
                        <h4 class="card-title"><strong>Cidade: </strong>{{ $pet->user->address->city }}</h4>
                        <h4 class="card-title"><strong>Estado: </strong>{{ $pet->user->address->state }}</h4>
                        <h4 class="card-title"><strong>País: </strong>{{ $pet->user->address->country }}</h4>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row wow fadeIn">

        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <!--Card-->
            <div class="card">

                <!--Section: Modals-->
                <section>
                <!-- Create modal -->
                @include('layouts.pet-form', ['pet' => null])
                    <!-- Create modal -->
                @include('layouts.pet-form', ['pet' => $pet])
                </section>
            </div>
        </div>
    </div>
</div>

</div>
@endsection