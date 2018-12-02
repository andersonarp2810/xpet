@extends('layouts.app')
@section('content')



<div class="container-fluid mt-5">

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-40 col-md-11 mb-4">

            <div class="card card-cascade wider">

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h5 class="card-title"><strong>Cadastro do Usuário</strong></h5>
                    <!-- Subtitle -->

                    <form method="POST" action="{{ route('user.update',  ['user' => $user]) }}">
                        @csrf

                        <div class="md-form ml-0 mr-0" style="width:750px">
                            <input id="name" name="name" type="text" class="form-control ml-0 {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $user->name }}" required autofocus>
                            <label for="name" class="ml-0">Nome completo</label>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0" style="width:750px">
                            <input id="e-mail" name="e-mail" type="email" class="form-control ml-0 {{ $errors->has('e-mail') ? ' is-invalid' : '' }}" value="{{ $user->email }}" required>
                            <label for="e-mail" class="ml-0">E-mail</label>
                            @if ($errors->has('e-mail'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('e-mail') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0" style="width:750px">
                            <input id="senha" name="senha" type="password" class="form-control ml-0 {{ $errors->has('senha') ? ' is-invalid' : '' }}" >
                            <label for="senha" class="ml-0">Senha</label>
                            @if ($errors->has('senha'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('senha') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row ml-0" >
                        <div class="md-form ml-0 mr-0" style="width:350px">
                            <input id="phone" name="phone" type="tel" class="form-control ml-0 {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $user->phones->first()->number }}" required>
                            <label for="phone" class="ml-0">Telefone</label>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-5 mr-0" style="width:350px">
                            <select id="whatsapp_available" name="whatsapp_available" class="custom-select d-block w-100 {{ $errors->has('whatsapp_available') ? ' is-invalid' : '' }}" >
                                    <option value="{{ $user->whatsapp_available }}" disabled selected>{{ $user->whatsapp_available ? 'Sim' : 'Não' }}</option>
                                    <option value="true">Sim</option>
                                    <option value="false">Não</option>
                            </select>
                            @if ($errors->has('whatsapp_available'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('whatsapp_available') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div>

                        <div class="row ml-0">

                        <div class="md-form ml-0 mr-0" style="width:350px">
                            <input id="city" name="city" type="text" class="form-control ml-0 {{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ $user->address->city }}" required>
                            <label for="city" class="ml-0">Cidade</label>
                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-5 mr-0" style="width:350px">
                            <select id="state" name="state" class="custom-select d-block w-100 {{ $errors->has('state') ? ' is-invalid' : '' }}" >

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

                        </div>
                        <div class="row ml-0">
                        <div class="md-form ml-0 mr-0" style="width:350px">
                            <input id="district" name="district" type="text" class="form-control ml-0 {{ $errors->has('district') ? ' is-invalid' : '' }}" value="{{ $user->address->district }}" required>
                            <label for="district" class="ml-0">Bairro</label>
                            @if ($errors->has('district'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('district') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-5 mr-0" style="width:350px">
                            <input name="street" type="text" id="street" class="form-control ml-0 {{ $errors->has('street') ? ' is-invalid' : '' }}" value="{{ $user->address->street }}" required>
                            <label for="street" class="ml-0">Rua</label>
                            @if ($errors->has('street'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('street') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                        <div class="row ml-0">
                        <div class="md-form ml-0 mr-0" style="width:350px">
                            <input name="number" type="text" id="number" class="form-control ml-0 {{ $errors->has('number') ? ' is-invalid' : '' }}" value="{{ $user->address->number }}" required>
                            <label for="number" class="ml-0">Número</label>
                            @if ($errors->has('number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-5 mr-0" style="width:350px">
                            <input id="complement" name="complement" type="text" class="form-control ml-0" value="{{ $user->address->complement }}">
                            <label for="complement" class="ml-0">Complemento</label>
                        </div>
                        </div>

                        <div class="md-form ml-0 mr-0" style="width:350px">
                            <select name="public_contact_info" class="custom-select d-block w-100 {{ $errors->has('public_contact_info') ? ' is-invalid' : '' }}" value="{{ $user->public_contact_info }}" id="whatsapp" >
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
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Finalizar
                            <i class="fa fa-sign-in ml-1 animated rotateIn"></i>
                        </button>
                        <br>

                    </form>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection