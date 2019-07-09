@extends('layouts.base')
@section('content')
<div class="row justify-content-center">
    <div class="col-10 ">

        <form class="card p-5" method="POST" action="{{ route('user.update',  ['user' => $user]) }}">
            @csrf
            <div class="text-center">
                <h1 class="">Editar Meu Perfil</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <label class="font-weight-bolder mt-4" for="name" class="ml-0">Nome completo</label>
                    <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus value="{{ $user->name }}">
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="e-mail" class="ml-0">E-mail</label>
                    <input id="e-mail" name="e-mail" type="email" class="form-control ml-0 {{ $errors->has('e-mail') ? ' is-invalid' : '' }}" required value="{{ $user->email }}">
                    @if ($errors->has('e-mail'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('e-mail') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="senha" class="ml-0">Alterar Senha (Opcional)</label>
                    <input id="senha" name="senha" type="password" class="form-control ml-0 {{ $errors->has('senha') ? ' is-invalid' : '' }}">
                    @if ($errors->has('senha'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('senha') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="phone" class="ml-0">Telefone</label>
                    <input id="phone" name="phone" type="tel" class="form-control ml-0 {{ $errors->has('phone') ? ' is-invalid' : '' }}" required value="{{ $user->phones->first()->number }}">
                    @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="whatsapp_available">WhatsApp nesse número?</label>
                    <select id="whatsapp_available" name="whatsapp_available" class="custom-select d-block w-100 {{ $errors->has('whatsapp_available') ? ' is-invalid' : '' }}">
                        <option value="{{ $user->whatsapp_available }}" disabled selected>{{ $user->phones->first()->whatsapp_available ? 'Sim' : 'Não' }}</option>
                        <option value="true">Sim</option>
                        <option value="false">Não</option>
                    </select>
                    @if ($errors->has('whatsapp_available'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('whatsapp_available') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="city" class="ml-0">Cidade</label>
                    <input id="city" name="city" type="text" class="form-control ml-0 {{ $errors->has('city') ? ' is-invalid' : '' }}" required value="{{ $user->address->city }}">
                    @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="state">Estado</label>
                    <select id="state" name="state" class="custom-select d-block w-100 {{ $errors->has('state') ? ' is-invalid' : '' }}">
                        <option value="{{ $user->state }}" disabled selected>{{ $user->address->state }}</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                    @if ($errors->has('state'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('state') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-5">
                    <label class="font-weight-bolder mt-4" for="district" class="ml-0">Bairro</label>
                    <input id="district" name="district" type="text" class="form-control ml-0 {{ $errors->has('district') ? ' is-invalid' : '' }}" required value="{{ $user->address->district }}">
                    @if ($errors->has('district'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('district') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-5">
                    <label class="font-weight-bolder mt-4" for="street" class="ml-0">Rua</label>
                    <input name="street" type="text" id="street" class="form-control ml-0 {{ $errors->has('street') ? ' is-invalid' : '' }}" required value="{{ $user->address->street }}">
                    @if ($errors->has('street'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('street') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-2">
                    <label class="font-weight-bolder mt-4" for="number" class="ml-0">Número</label>
                    <input name="number" type="text" id="number" class="form-control ml-0 {{ $errors->has('number') ? ' is-invalid' : '' }}" required value="{{ $user->address->number }}">
                    @if ($errors->has('number'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('number') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-12">
                    <label class="font-weight-bolder mt-4" for="complement" class="ml-0">Complemento</label>
                    <input id="complement" name="complement" type="text" class="form-control ml-0" value="{{ $user->address->complement }}">
                </div>

                <div class="col-sm-12">
                    <label class="font-weight-bolder mt-4" for="whatsapp">Permitir que qualquer um veja seus contatos?</label>
                    <select name="public_contact_info" class="custom-select d-block w-100 {{ $errors->has('public_contact_info') ? ' is-invalid' : '' }}" id="whatsapp" required size="2">
                        <option value="{{ $user->public_contact_info }}" disabled selected>{{ $user->public_contact_info ? 'Sim' : 'Não' }}</option>
                        <option value="true">Sim</option>
                        <option value="false">Não</option>
                    </select>
                    @if ($errors->has('public_contact_info'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('public_contact_info') }}</strong>
                    </span>
                    @endif
                </div>

                <button type="submit" class="col-sm-6 col-lg-4 btn btn-info mt-4">Editar <i class="fas fa-edit ml-1"></i></button>

            </div>

        </form>
    </div>
</div>
@endsection
