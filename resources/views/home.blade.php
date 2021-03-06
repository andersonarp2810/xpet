@extends('layouts.base')
@section('content')


<div class="row justify-content-center">
    <div class="col-10 ">
        <form class="card p-3">
            <div class="text-center">
                <!-- <h1 class="mb-1">Busca</h1> -->
                <h2 class="mb-1">Encontre um par para o seu pet.</h2>
            </div>

            <label class="font-weight-bolder" for="select-atributo">Buscar por: </label>

            <select class="custom-select" size="2" name="atribute" id="select-atributo" onchange="atributo = this.value;">
                <option selected value="3">Raça</option>
                <option value="6">Localidade</option>
            </select>

            <label class="mt-1 font-weight-bolder" id="label-busca" for="busca"></label>
            <input class="form-control mb-1" name="busca" id="busca" onkeyup="filtro(this.value);">
            <div class="row">
                <div class="col-sm-3 col-lg-4"></div>
                <button class="col-sm-6 col-lg-4 btn btn-info mt-4" type="button" onclick="filtro(''); document.getElementById('busca').value=''">Limpar busca</button>
            </div>
        </form>
    </div>
</div>

<hr class="mt-4 mb-4" />

<div class="mt-1">
    <div class="row wow fadeIn">
        @foreach ($pets as $pet)
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4 filtravel">
            <div class="card card-cascade wider">
                @include('layouts.pet-card-image', ['pet' => $pet])
                <div class="card-body card-body-cascade text-center">
                    <h3 class="card-title">{{$pet->name}}</h3>
                    <hr />
                    <i class="fas fa-dog float-left"></i>
                    <h4 class="h6">{{$pet->race}}</h4>
                    <br />
                    <i class="fas fa-city float-left"></i>
                    <h4 class="h6">{{$pet->user->address->city}} - {{$pet->user->address->state}}</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
