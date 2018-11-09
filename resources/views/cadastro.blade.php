@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5">

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-40 col-md-12 mb-4">

            <div class="card card-cascade wider">

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h4 class="card-title"><strong>Cadastro do Usuário</strong></h4>
                    <!-- Subtitle -->

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="md-form ml-0 mr-0">
                            <input id="name" name="name" type="text" class="form-control ml-0 {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
                            <label for="name" class="ml-0">Nome completo</label>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0">
                            <input id="email" name="email" type="email" class="form-control ml-0 {{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                            <label for="email" class="ml-0">E-mail</label>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0">
                            <input id="password" name="password" type="password" class="form-control ml-0 {{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                            <label for="password" class="ml-0">Senha</label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0">
                            <input id="phone" name="phone" type="tel" class="form-control ml-0 {{ $errors->has('phone') ? ' is-invalid' : '' }}" required>
                            <label for="phone" class="ml-0">Telefone</label>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0">
                            <select id="whatsapp_available" name="whatsapp_available" class="custom-select d-block w-100 {{ $errors->has('whatsapp_available') ? ' is-invalid' : '' }}" required>
                                    <option value="" disabled selected>WhatsApp nesse número?</option>
                                    <option value="{{true}}">Sim</option>
                                    <option value="{{false}}">Não</option>
                            </select>
                            @if ($errors->has('whatsapp_available'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('whatsapp_available') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0">
                            <select id="state" name="state" class="custom-select d-block w-100 {{ $errors->has('state') ? ' is-invalid' : '' }}" required>

                                <option value="" disabled selected>Estado</option>
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

                        <div class="md-form ml-0 mr-0">
                            <input id="city" name="city" type="text" class="form-control ml-0 {{ $errors->has('city') ? ' is-invalid' : '' }}" required>
                            <label for="city" class="ml-0">Cidade</label>
                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0">
                            <input id="district" name="district" type="text" class="form-control ml-0 {{ $errors->has('district') ? ' is-invalid' : '' }}" required>
                            <label for="district" class="ml-0">Bairro</label>
                            @if ($errors->has('district'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('district') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0">
                            <input name="street" type="text" id="street" class="form-control ml-0 {{ $errors->has('street') ? ' is-invalid' : '' }}" required>
                            <label for="street" class="ml-0">Rua</label>
                            @if ($errors->has('street'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('street') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0">
                            <input name="number" type="number" id="number" class="form-control ml-0 {{ $errors->has('number') ? ' is-invalid' : '' }}" required>
                            <label for="number" class="ml-0">Número</label>
                            @if ($errors->has('number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('number') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form ml-0 mr-0">
                            <input id="complement" name="complement" type="text" class="form-control ml-0">
                            <label for="complement" class="ml-0">Complemento</label>
                        </div>

                        <div class="md-form ml-0 mr-0">
                            <select name="public_contact_info" class="custom-select d-block w-100 {{ $errors->has('public_contact_info') ? ' is-invalid' : '' }}" id="whatsapp" required>
                                    <option value="" disabled selected>Permitir que qualquer um veja seus contatos?</option>
                                    <option value="{{true}}">Sim</option>
                                    <option value="{{false}}">Não</option>
                            </select>
                            @if ($errors->has('public_contact_info'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('public_contact_info') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Finalizar</button>
                        <br>

                    </form>
                </div>

            </div>

        </div>

    </div>

</div>