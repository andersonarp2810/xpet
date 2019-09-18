@extends('layouts.base')
@section('content')

<div class="row justify-content-center">
    <div class="col-10 ">
        <form class="card p-5" method="POST" action="{{ route('password.store',  ['passwordreset' => $reset]) }}"
        oninput='confirmation.setCustomValidity(confirmation.value != senha.value ? "As senhas não são iguais." : "")'>
            @csrf
            <input type="hidden" name="token" value="{{$reset->token}}">
            <div class="text-center">
                <h1 class="">Insira sua nova senha e confirme</h1>
            </div>

            <div class="col-sm-6">
                <label class="font-weight-bolder mt-4" for="senha" class="ml-0">Senha</label>
                <input id="senha" name="senha" type="password" class="form-control ml-0 {{ $errors->has('senha') ? ' is-invalid' : '' }}" required>
                @if ($errors->has('senha'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('senha') }}</strong>
                </span>
                @endif
            </div>

            <div class="col-sm-6">
                <label class="font-weight-bolder mt-4" for="confirmation" class="ml-0">Confirmar Senha</label>
                <input id="confirmation" name="confirmation" type="password" class="form-control ml-0 {{ $errors->has('confirmation') ? ' is-invalid' : '' }}" required>
                @if ($errors->has('confirmation'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('confirmation') }}</strong>
                </span>
                @endif
            </div>


            <button type="submit" class="col-sm-6 col-lg-4 btn btn-info mt-4">Redefinir senha</button>

        </div>
    </form>
</div>
</div>

@endsection
