@extends('layouts.teste')
@section('content')

<div class="container-fluid mt-5">

    <div class="row wow fadeIn">

        <!--Grid column dinamic-->
        <div class="col-lg-4 col-md-12 mb-4">

            <div class="card card-cascade wider">

                <div id="main-gallery" style="width: 100%; height: 100%">
                    <div class="large-img" style="width: 100%">
                        @include('layouts.pet-card-image', ['pet' => $pet])
                    </div>

                    <div class="small-img" style="width: 100%; overflow: hidden; height: max-content">
                        @foreach($pet->photos as $photo)
                        <div class="img-holder" style="cursor: pointer;">
                            <img class="card-img-top thumb-post" src="{{ URL::asset('storage/' . $photo->path)}}" alt="Card image cap" height="285" width="100" onclick="showImage(this, {{$photo->id}}) ">
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    @if(Auth::user()->id == $pet->user_id) @if(count($pet->photos)
                    < 5) <label id="upload_btn" for="upload_file" class="btn btn-primary btn-sm">
                        <form method="POST" action="{{ route('pet.addphoto', ['pet' => $pet->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" id="upload_file" name="images[]" accept="image/*" multiple onChange="this.form.submit()">
                            <i class="fas fa-plus mr-1 animated rotateIn"></i> Fotos
                            <i class="fas fa-camera-retro ml-1 animated rotateIn"></i>
                        </form>
                        </label>
                        @endif

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-edit-' . $pet->id}}">
                            Editar
                            <i class="fas fa-edit ml-1 animated rotateIn"></i>
                        </button>

                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#fluidModalRightSuccessDemo">
                            Solicitações
                            <i class="far fa-envelope ml-1 animated rotateIn"></i> @if(count($solicitations->where('status', 'pendente')) > 0)
                            <span>
                        ( {{count($solicitations->where('status', 'pendente'))}} pendente(s) )
                        </span> @endif
                        </button>

                        @elseif(count($solicitations) > 0)
                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="{{ '#modal-requests' }}">
                            Solicitações
                            <i class="fa fa-list-ul animated rotateIn ml-1"></i> @if(count($solicitations->where('status', 'pendente')) > 0)
                            <span>
                        ( {{count($solicitations->where('status', 'pendente'))}} pendente(s) )
                        </span> @endif
                        </button>
                        @else
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-match' }}">
                            Cruzar
                            <i class="fa fa-paw ml-1 animated rotateIn"></i>
                        </button>
                        @endif
                </div>
            </div>

        </div>

        <!--Grid column-->

        <div class="col-lg-4 col-md-12 mb-4">

            <div class="card card-cascade wider">

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center" style="height: 350px">

                    <h6 class="card-title"><strong>Dados do Pet<i class="fas fa-dog animated rotateIn ml-2"></i></strong></h6>

                    <hr style="box-sizing:border-box;">

                    <div class="modal-body card-body-cascade text-left">
                        <h6 class="card-title small"><strong>Nome: </strong>{{ $pet->name }}</h6>
                        <h6 class="card-title small"><strong>Raça: </strong>{{ $pet->race }}</h6>
                        <h6 class="card-title small"><strong>Tamanho: </strong>{{ $pet->size }}</h6>
                        <h6 class="card-title small"><strong>Cor: </strong>{{ $pet->color }}</h6>
                        <h6 class="card-title small"><strong>Gênero: </strong>{{ $pet->gender }}</h6>
                        <h6 class="card-title small"><strong>Pedigree: </strong>{{ $pet->pedigree ? 'Sim' : 'Não' }}</h6>
                        <h6 class="card-title small"><strong>Descrição: </strong>{{ $pet->description }}</h6>

                    </div>

                </div>

            </div>

        </div>

        <!--Grid column-->

        <div class="col-lg-4 col-md-12 mb-4">

            <div class="card card-cascade wider">

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center" style="height: 350px">

                    <h6 class="card-title"><strong>Dados do Dono</strong><i class="fas fa-male animated rotateIn ml-2"></i></h6>

                    <hr style="box-sizing:border-box;">

                    <div class="modal-body card-body-cascade text-left">
                        <h6 class="card-title small"><strong>Nome: </strong>{{ $pet->user->name }}</h6> @if($address != null)
                        <h6 class="card-title small"><strong>Rua: </strong>{{ $address->street }}</h6>
                        <h6 class="card-title small"><strong>Número: </strong>{{ $address->number }}</h6> @if($address->complement != null)
                        <h6 class="card-title small"><strong>Complemento: </strong>{{ $address->complement }}</h6> @endif @foreach($phones as $phone)
                        <h6 class="card-title small"><strong>Telefone {{ $loop->iteration }}: </strong>{{ $phone->number }}</h6> @endforeach
                        <h6 class="card-title small"><strong>Cidade: </strong>{{ $address->city }}</h6>
                        <h6 class="card-title small"><strong>Bairro: </strong>{{ $address->district }}</h6>
                        <h6 class="card-title small"><strong>Estado: </strong>{{ $address->state }}</h6>
                        <h6 class="card-title small"><strong>País: </strong>{{ $address->country }}</h6> @else
                        <h6 class="card-title small"><strong>Cidade: </strong>{{ $pet->user->address->city }}</h6>
                        <h6 class="card-title small"><strong>Estado: </strong>{{ $pet->user->address->state }}</h6> @endif

                    </div>

                </div>

            </div>

        </div>
    </div>
    <!--Grid column dinamic-->

</div>

<div class="row wow fadeIn">

    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-6 mb-4">

        <!--Card-->
        <div class="card" style="border: none">

            <!--Section: Modals-->
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
                @endforeach @include('layouts.pet-form', ['pet' => $pet]) @include('layouts.pet-match') @include('layouts.pet-requests', ['pets' => Auth::User()->pet]) @if(Auth::User()->id == $pet->user_id) @include('layouts.pet-solicitations', ['solicitations' => $solicitations, 'pet' => $pet]) @endif

            </section>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    //script de lista de imagens
    $(function() {
        $('.small-img img').hover(function() {
            var imgSrc = $(this).attr('src');
            $('.large-img img').attr('src', imgSrc);
        });
    });
</script>

<script>
    //script de modal de imagem
    // Get the modal
    var modal = document.getElementById('imageModal-1');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    function showImage(el, id) {
        modal = document.getElementById('imageModal-' + id);
        modal.style.display = "block";
        // var modalImg = document.getElementById("img-view");
        // modalImg.src = el.src;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    document.getElementById("close").onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
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
    /* The Modal (background) */
    
    .img-modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }
    /* Modal Content (image) */
    
    .img-modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }
    /* Add Animation */
    
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
    /* The Close Button */
    
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
    /* 100% Image Width on Smaller Screens */
    
    @media only screen and (max-width: 700px) {
        .img-modal-content {
            width: 100%;
        }
    }
</style>
@endsection