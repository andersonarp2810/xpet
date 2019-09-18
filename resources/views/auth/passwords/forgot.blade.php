@extends('layouts.base')
@section('content')

<div class="row justify-content-center">
    <div class="col-10 ">
        <form class="card p-5" method="POST" action="novaSenha/enviarEmail">
            @csrf
            <div class="text-center">
                <h1 class="">Insira o seu email para recuperar a senha</h1>
            </div>

            <div class="col-sm-6">
                <label class="font-weight-bolder mt-4" for="email" class="ml-0">E-mail</label>
                <input id="email" name="email" type="email" class="form-control ml-0 {{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <button type="submit" class="col-sm-6 col-lg-4 btn btn-info mt-4">Enviar email</button>

        </div>
    </form>
</div>
</div>

@endsection
