@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5">

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