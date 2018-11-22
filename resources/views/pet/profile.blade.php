@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5">

    <div class="row wow fadeIn">

        <!--Grid column dinamic-->
        <div class="col-lg-4 col-md-12 mb-4">

            <div class="card card-cascade wider">

                <div id="main-gallery">
                    <div class="large-img">
                        @include('layouts.pet-card-image', ['pet' => $pet])
                    </div>
                    
                    <div class="small-img">
                    @foreach($pet->photos as $photo)
                    <a href="{{ URL::asset('storage/' . $photo->path)}}">
                        <div class="img-holder">
                        <img class="card-img-top thumb-post" src="{{ URL::asset('storage/' . $photo->path)}}" alt="Card image cap" height="285" width="100" />
                        </div>
                    </a>
                        
                    @endforeach
                    
                    </div>

                </div>
                
                <!-- Card content -->
                <div class="card-body card-body-cascade text-center mt-5">
                    <!-- Title -->
                    <h5 class="card-title">
                        <strong>
                            {{$pet->name}}
                        </strong>

                    <form action="POST" action="{{ route('pet.addphoto', ['pet' => $pet->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <a href="">
                        <input type="file" id="upload_file" name="images[]" accept="image/*" multiple onChange="this.form.submit()">
                        <label id="upload_btn" for="upload_file">
                            <i class="fas fa-camera-retro"></i>
                        </label>
                        </a>
                    </form>
                    </h5>
                    <!-- Subtitle -->

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-' . $pet->id }}">Combinar </button>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-edit-' . $pet->id}}">Editar </button>
                    <br>

                </div>

            </div>

        </div>
        <!--Grid column dinamic-->

        <!--Grid column-->

        <div class="col-lg-4 col-md-12 mb-4">

            <div class="card card-cascade wider">

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <div class="modal-body card-body-cascade text-left">
                        <h5 class="card-title"><strong>Raça: </strong>{{ $pet->race }}</h5>
                        <h5 class="card-title"><strong>Tamanho: </strong>{{ $pet->size }}</h5>
                        <h5 class="card-title"><strong>Cor: </strong>{{ $pet->color }}</h5>
                        <h5 class="card-title"><strong>Gênero: </strong>{{ $pet->gender }}</h5>
                        <h5 class="card-title"><strong>Pedigree: </strong>{{ $pet->pedigree ? 'Sim' : 'Não' }}</h5>
                        <h5 class="card-title"><strong>Descrição: </strong>{{ $pet->description }}</h5>

                    </div>

                </div>

            </div>

        </div>

        <!--Grid column-->

        <div class="col-lg-4 col-md-12 mb-4">

            <div class="card card-cascade wider">

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <div class="modal-body card-body-cascade text-left">
                        <h5 class="card-title"><strong>Dono: </strong>{{ $pet->user->name }}</h5>
                        <h5 class="card-title"><strong>Rua: </strong>{{ $address->street ? $address->street : 'Oculto' }}</h5>
                        <h5 class="card-title"><strong>Número: </strong>{{ $address->number ? $address->number : 'Oculto'  }}</h5>
                        <h5 class="card-title"><strong>Complemento: </strong>{{ $address->complement ? $address->complement : 'Oculto' }}</h5>
                        @foreach($phones as $phone)
                        <h5 class="card-title"><strong>Telefone {{ $loop->iteration }}: </strong>{{ $phone->number }}</h5>
                        @endforeach
                        <h5 class="card-title"><strong>Cidade: </strong>{{ $address->city }}</h5>
                        <h5 class="card-title"><strong>Bairro: </strong>{{ $address->district ? $address->district : 'Oculto' }}</h5>
                        <h5 class="card-title"><strong>Estado: </strong>{{ $address->state }}</h5>
                        <h5 class="card-title"><strong>País: </strong>{{ $address->country }}</h5>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row wow fadeIn">

        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <!--Card-->
            <div class="card">

                <!--Section: Modals-->
                <section>
                    @include('layouts.pet-form', ['pet' => $pet])
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
@endsection