@extends('layouts.base')
@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-sm-12 mb-4 text-center">
            <div class="card p-5">
                <h1>{{ $pet->name }}</h1>
                <div id="main-gallery">
                    <div class="large-img">
                        @include('layouts.pet-card-image', ['pet' => $pet])
                    </div>
                    <div class="small-img">
                        @foreach($pet->photos as $photo)
                        <div class="img-holder">
                            <img class="card-img-top thumb-post" src="{{ URL::asset('storage/' . $photo->path)}}" alt="{{ $pet->name }}" onclick="showImage(this, {{$photo->id}}) ">
                        </div>
                        @endforeach
                    </div>
                </div>

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

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card" style="border: none">
            <section>
                @foreach($pet->photos as $photo)
                <div id="{{'imageModal-' . $photo->id}}" class="img-modal">
                    <span id="close" class="img-close">&times;</span>
                    <div class="img-modal-content">
                        @if(Auth::user()->id == $pet->user->id)
                        <form method="POST" action="{{route('pet.destroyphoto', ['pet' => $pet, 'photo' => $photo])}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Deletar
                                <i class="fa fa-trash ml-1 animated rotateIn"></i>
                            </button>
                        </form>
                        @endif
                        <img class="img-view" src="{{ URL::asset('storage/' . $photo->path)}}">
                    </div>
                </div>
                @endforeach

                @include('layouts.pet-form', ['pet' => $pet])
                @include('layouts.pet-match')
                @include('layouts.pet-requests', ['pets' => Auth::User()->pet])
                @if(Auth::User()->id == $pet->user_id)
                @include('layouts.pet-solicitations', ['solicitations' => $solicitations, 'pet' => $pet])
                @endif
            </section>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(function() {
        $('.small-img img').hover(function() {
            var imgSrc = $(this).attr('src');
            $('.large-img img').attr('src', imgSrc);
        });
    });
</script>

<script>
    var modal = document.getElementById('imageModal-1');

    function showImage(el, id) {
        modal = document.getElementById('imageModal-' + id);
        modal.style.display = "block";
    }

    var span = document.getElementsByClassName("close")[0];

    document.getElementById("close").onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<style>
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .img-view {
        max-width: 70vw !important;
        opacity: 1 !important;
        margin-bottom: 10vh;
    }

    .img-modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.9);
    }

    .img-modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    .img-modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    .img-close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .img-close:hover,
    .img-close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    @media only screen and (max-width: 700px) {
        .img-modal-content {
            width: 100%;
        }
    }
</style>
@endsection
