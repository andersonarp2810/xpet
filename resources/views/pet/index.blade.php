@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5">

<div class="row wow fadeIn">

    <!-- botão novo pet -->
    <div class="col-lg-3 col-md-12 mb-4">

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
                <h6 class="card-title"><strong>Novo Pet</strong></h6>
                <!-- Subtitle -->

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-create">
                    Cadastrar
                    <i class="fa fa-paw ml-1 animated rotateIn"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- botão novo pet -->

    <!--Grid column dinamic-->
    @foreach($pets as $pet)
    <div class="col-lg-3 col-md-12 mb-4">

        <div class="card card-cascade wider">

            @include('layouts.pet-card-image', ['pet' => $pet])

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">

                <!-- Title -->
                <h6 class="card-title"><strong>{{$pet->name}}</strong></h6>
                <!-- Subtitle -->
                
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-edit-' . $pet->id}}">
                    Editar
                    <i class="fa fa-edit ml-1 animated rotateIn"></i>
                </button>

                <form method="POST" action="{{ route('pet.delete', ['pet' => $pet]) }}" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        Excluir
                        <i class="fa fa-trash ml-1 animated rotateIn"></i>
                    </button>
                </form>

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
@endsection