@extends('layouts.base')
@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-sm-12 mb-4 text-center">
            <div class="card p-5">
                <h1>{{ $pet->name }}</h1>
                <!--
                        @foreach($pet->photos as $photo)
                        @endforeach
                -->
                @if (count($pet->photos) > 1)
                <div id="galeria-pet">
                    @foreach($pet->photos as $photo)
                    @if(Auth::user()->id == $pet->user->id)
                    <form class="galeria-item-delete" method="POST" action="{{route('pet.destroyphoto', ['pet' => $pet, 'photo' => $photo])}}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger mb-2">
                            Excluir foto <i class="fas fa-trash ml-1"></i>
                        </button>
                    </form>
                    @endif
                    <img class="galeria-item img-fluid rounded mx-auto" src="{{ URL::asset('storage/' . $photo->path)}}" alt="{{ $pet->name }}" />
                    @endforeach
                    <button class="btn btn-sm btn-info galeria-button-left" onclick="plusDivs(-1)"><i class="fas fa-2x fa-angle-left"></i></button>
                    <button class="btn btn-sm btn-info galeria-button-right" onclick="plusDivs(+1)"><i class="fas fa-2x fa-angle-right"></i></button>
                </div>
                @elseif (count($pet->photos) == 1)
                @if(Auth::user()->id == $pet->user->id)
                    <form class="galeria-item-delete" method="POST" action="{{route('pet.destroyphoto', ['pet' => $pet, 'photo' => $photo])}}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger mb-2">
                            Excluir foto <i class="fas fa-trash ml-1"></i>
                        </button>
                    </form>
                    @endif
                <img class="galeria-item img-fluid rounded mx-auto" src="{{ URL::asset('storage/' . $photo->path)}}" alt="{{ $pet->name }}">
                @endif

                <div class="card-body card-body-cascade">
                    @if(Auth::user()->id == $pet->user_id) @if(count($pet->photos)
                    < 5) <label id="upload_btn" for="upload_file" class="btn btn-info">
                        <form method="POST" action="{{ route('pet.addphoto', ['pet' => $pet->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" id="upload_file" name="images[]" accept="image/*" multiple onChange="this.form.submit()">
                            <i class="fas fa-plus mr-1 animated rotateIn"></i> Fotos
                            <i class="fas fa-camera-retro ml-1 animated rotateIn"></i>
                        </form>
                        </label>
                        @endif

                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="{{ '#modal-edit-' . $pet->id}}">
                            Editar
                            <i class="fas fa-edit ml-1 animated rotateIn"></i>
                        </button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#fluidModalRightSuccessDemo">
                            Solicitações
                            <i class="far fa-comments"></i> @if(count($solicitations->where('status', 'pendente')) > 0)
                            <span>
                                ( {{count($solicitations->where('status', 'pendente'))}} pendente(s) )
                            </span>
                            @endif
                        </button>

                        @elseif(count($solicitations) > 0)
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="{{ '#modal-requests' }}">
                            Solicitações
                            <i class="far fa-comments"></i> @if(count($solicitations->where('status', 'pendente')) > 0)
                            <span>
                                ( {{count($solicitations->where('status', 'pendente'))}} pendente(s) )
                            </span>
                            @endif
                        </button>

                        @else
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="{{ '#modal-match' }}">
                            Cruzar <i class="far fa-paper-plane"></i>
                        </button>
                        @endif
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <div class="">
                    <h2 class="text-center"><strong>Ficha do Pet<i class="fas fa-dog ml-2"></i></strong></h2>
                    <hr />
                    <div class="">
                        <p><strong>Raça: </strong>{{ $pet->race }}</p>
                        <p><strong>Tamanho: </strong>{{ $pet->size }}</p>
                        <p><strong>Cor: </strong>{{ $pet->color }}</p>
                        <p><strong>Gênero: </strong>{{ $pet->gender }}</p>
                        <p><strong>Pedigree: </strong>{{ $pet->pedigree ? 'Sim' : 'Não' }}</p>
                        <p><strong>Descrição: </strong>{{ $pet->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h2 class="text-center"><strong>Ficha do Dono</strong><i class="fas fa-male ml-2"></i></h2>
                <hr />
                <div class="">
                    <p><strong>Nome: </strong>{{ $pet->user->name }}</p> @if($address != null)
                    <p><strong>Rua: </strong>{{ $address->street }}</p>
                    <p><strong>Número: </strong>{{ $address->number }}</p> @if($address->complement != null)
                    <p><strong>Complemento: </strong>{{ $address->complement }}</p> @endif @foreach($phones as $phone)
                    <p><strong>Telefone {{ $loop->iteration }}: </strong>{{ $phone->number }}</p> @endforeach
                    <p><strong>Cidade: </strong>{{ $address->city }}</p>
                    <p><strong>Bairro: </strong>{{ $address->district }}</p>
                    <p><strong>Estado: </strong>{{ $address->state }}</p>
                    <p><strong>País: </strong>{{ $address->country }}</p> @else
                    <p><strong>Cidade: </strong>{{ $pet->user->address->city }}</p>
                    <p><strong>Estado: </strong>{{ $pet->user->address->state }}</p> @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.pet-form', ['pet' => $pet])
@include('layouts.pet-match')
@include('layouts.pet-requests', ['pets' => Auth::User()->pet])
@if(Auth::User()->id == $pet->user_id)
@include('layouts.pet-solicitations', ['solicitations' => $solicitations, 'pet' => $pet])
@endif
@endsection
