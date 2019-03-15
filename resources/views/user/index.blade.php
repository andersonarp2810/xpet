@extends('layouts.teste')
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
                    <h5 class="card-title"><strong>Perfil</strong></h5>
                    <!-- Subtitle -->

                    <div class="modal-body card-body-cascade text-left">
                        <h6 class="card-title"><strong>Nome completo: </strong>{{ $user->name }}</h6>
                        <h6 class="card-title"><strong>Email: </strong>{{ $user->email }}</h6>
                        @foreach($user->phones as $phone)
                        <h6 class="card-title"><strong>Telefone: </strong>{{ $phone->number }}</h6>
                        @endforeach
                        <h6 class="card-title"><strong>País: </strong>{{ $user->address->country }}</h6>
                        <h6 class="card-title"><strong>Estado: </strong>{{ $user->address->state }}</h6>
                        <h6 class="card-title"><strong>Cidade: </strong>{{ $user->address->city }}</h6>
                        <h6 class="card-title"><strong>Bairro: </strong>{{ $user->address->district }}</h6>
                        <h6 class="card-title"><strong>Rua: </strong>{{ $user->address->street }}</h6>
                        <h6 class="card-title"><strong>Número: </strong>{{ $user->address->number }}</h6>
                        <h6 class="card-title"><strong>Complemento: </strong>{{ $user->address->complement }}</h6>

                    </div>
                    <a href="{{ route('user.edit', ['user' => $user]) }}">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal">
                            Editar
                            <i class="fas fa-edit ml-1 animated rotateIn"></i>
                        </button>
                    </a>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection