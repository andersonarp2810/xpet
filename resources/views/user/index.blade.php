@extends('layouts.base')
@section('content')

<div>
    <div class="row justify-content-center">
        <div class="col-md-10 mb-4">
            <div class="card p-5">
                <h1 class="text-center">Perfil do Dono</h1>
                <hr />
                <div>
                    <p><strong>Nome completo: </strong>{{ $user->name }}</p>
                    <p><strong>E-mail: </strong>{{ $user->email }}</p>
                    @foreach($user->phones as $phone)
                    <p><strong>Telefone: </strong>{{ $phone->number }}</p>
                    @endforeach
                    <p><strong>País: </strong>{{ $user->address->country }}</p>
                    <p><strong>Estado: </strong>{{ $user->address->state }}</p>
                    <p><strong>Cidade: </strong>{{ $user->address->city }}</p>
                    <p><strong>Bairro: </strong>{{ $user->address->district }}</p>
                    <p><strong>Rua: </strong>{{ $user->address->street }}</p>
                    <p><strong>Número: </strong>{{ $user->address->number }}</p>
                    <?php
                    if (!empty($user->address->complement)) {
                        echo '<p><strong>Complemento: </strong>' . $user->address->complement . '</p>';
                    }
                    ?>
                    @if($user->email_verified_at)
                    <p><strong>Conta verificada em: </strong>{{$user->email_verified_at}}</p>
                    @endif
                </div>
                <hr />
                <a class="row justify-content-center" href="{{ route('user.edit', ['user' => $user]) }}">
                    <button type="button" class="btn btn-info" data-toggle="modal">
                        Editar
                        <i class="fas fa-edit ml-1"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
