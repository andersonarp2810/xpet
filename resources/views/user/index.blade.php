@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

            <h4 class="mb-2 mb-sm-0 pt-1">
                        <span>Painel de seleção</span>
                    </h4>

            <form class="d-flex justify-content-center">
                <!-- Default input -->
                <input type="search" placeholder="Encontre um parceiro" aria-label="Search" class="form-control">
                <button class="btn btn-primary btn-sm my-0 p" type="submit">
                    <i class="fa fa-search"></i>
                </button>

            </form>

        </div>

    </div>
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

            <div class="card mb-4">

                <!-- Card header -->
                <div class="card-header text-center">
                    Novidades
                </div>

                <!--Card content-->
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalRightSuccessDemo"><img src="img/icon/pdog2.png" class="mr-2"> Adote um animal</button>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalRightSuccessDemo"><img src="img/icon/donation.png" class="mr-2"> Doe para instituições</button>
                    <!-- <img src="img/icon/donation.png">-->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalRightSuccessDemo"><img src="img/icon/dog3.png" class="mr-2"> Filhotes</button>
                </div>

            </div>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

            <!--Card-->
            <div class="card mb-4">

                <!-- Card header -->
                <div class="card-header text-center">
                    Propostas/Convites
                </div>

                <!--Card content-->
                <div class="card-body text-center">

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fluidModalRightSuccessDemo"><img src="img/icon/invitation.png" class="mr-2"> Conferir</button>

                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>

</div>

<div class="row wow fadeIn">

    <!--Grid column-->
    <div class="col-md-12 mb-4">

        <div class="col-lg-40 col-md-12 mb-4">

            <div class="card card-cascade wider">

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h4 class="card-title"><strong>Perfil</strong></h4>
                    <!-- Subtitle -->

                    <div class="modal-body card-body-cascade text-left">
                        <h4 class="card-title"><strong>Nome completo: </strong>{{ $user->name }}</h4>
                        <h4 class="card-title"><strong>Email: </strong>{{ $user->email }}</h4>
                        @foreach($user->phones as $phone)
                        <h4 class="card-title"><strong>Telefone: </strong>{{ $phone->number }}</h4>
                        @endforeach
                        <h4 class="card-title"><strong>País: </strong>{{ $user->address->country }}</h4>
                        <h4 class="card-title"><strong>Estado: </strong>{{ $user->address->state }}</h4>
                        <h4 class="card-title"><strong>Cidade: </strong>{{ $user->address->city }}</h4>
                        <h4 class="card-title"><strong>Bairro: </strong>{{ $user->address->district }}</h4>
                        <h4 class="card-title"><strong>Rua: </strong>{{ $user->address->street }}</h4>
                        <h4 class="card-title"><strong>Número: </strong>{{ $user->address->number }}</h4>
                        <h4 class="card-title"><strong>Complemento: </strong>{{ $user->address->complement }}</h4>

                    </div>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal">Editar</button>
                    <br>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection