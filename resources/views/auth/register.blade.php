@extends('layouts.base')
@section('content')

<div class="row justify-content-center">
    <div class="col-10 ">
        <form class="card p-5" method="POST" action="{{ route('register') }}"
        oninput='confirmation.setCustomValidity(confirmation.value != senha.value ? "As senhas não são iguais." : "")'>
            @csrf
            <div class="text-center">
                <h1 class="">Crie sua conta</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <label class="font-weight-bolder mt-4" for="name" class="ml-0">Nome completo</label>
                    <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>
                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-12">
                    <label class="font-weight-bolder mt-4" for="e-mail" class="ml-0">E-mail</label>
                    <input id="e-mail" name="e-mail" type="email" class="form-control ml-0 {{ $errors->has('e-mail') ? ' is-invalid' : '' }}" required>
                    @if ($errors->has('e-mail'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('e-mail') }}</strong>
                    </span>
                    @endif
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

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="phone" class="ml-0">Telefone</label>
                    <input id="phone" name="phone" type="tel" class="form-control ml-0 {{ $errors->has('phone') ? ' is-invalid' : '' }}" required>
                    @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="whatsapp_available">WhatsApp nesse número?</label>
                    <select id="whatsapp_available" name="whatsapp_available" class="custom-select d-block w-100 {{ $errors->has('whatsapp_available') ? ' is-invalid' : '' }}" required>
                        <option value="true" selected>Sim</option>
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
                    <input id="city" name="city" type="text" class="form-control ml-0 {{ $errors->has('city') ? ' is-invalid' : '' }}" required>
                    @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="state">Estado</label>
                    <select id="state" name="state" class="custom-select d-block w-100 {{ $errors->has('state') ? ' is-invalid' : '' }}" required>
                        <option value="" disabled selected>Selecione</option>
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

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="street" class="ml-0">Rua</label>
                    <input name="street" type="text" id="street" class="form-control ml-0 {{ $errors->has('street') ? ' is-invalid' : '' }}" required>
                    @if ($errors->has('street'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('street') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-4">
                    <label class="font-weight-bolder mt-4" for="district" class="ml-0">Bairro</label>
                    <input id="district" name="district" type="text" class="form-control ml-0 {{ $errors->has('district') ? ' is-invalid' : '' }}" required>
                    @if ($errors->has('district'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('district') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-2">
                    <label class="font-weight-bolder mt-4" for="number" class="ml-0">Número</label>
                    <input name="number" type="text" id="number" class="form-control ml-0 {{ $errors->has('number') ? ' is-invalid' : '' }}" required>
                    @if ($errors->has('number'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('number') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="complement" class="ml-0">Complemento</label>
                    <input id="complement" name="complement" type="text" class="form-control ml-0">
                </div>

                <div class="col-sm-6">
                    <label class="font-weight-bolder mt-4" for="public_contact_info">Permitir que qualquer um veja seus contatos?</label>
                    <select name="public_contact_info" class="custom-select d-block w-100 {{ $errors->has('public_contact_info') ? ' is-invalid' : '' }}" id="public_contact_info" required>
                        <option value="true" selected>Sim</option>
                        <option value="false">Não</option>
                    </select>
                    @if ($errors->has('public_contact_info'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('public_contact_info') }}</strong>
                    </span>
                    @endif

                </div>

                <div class="col-sm-12">
                    <label class="font-weight-bolder mt-4" for="agree">Concorda com os <a href="/termos" target="_blank">termos de uso e serviço</a>?</label>
                    <input type="checkbox" name="agree" id="agree" onclick="document.getElementById('submeter').disabled = !this.checked">
                </div>

                <button id="submeter" type="submit" class="col-sm-6 col-lg-4 btn btn-primary mt-4" disabled>Criar minha conta</button>

            </div>
        </form>
    </div>
</div>

@endsection
