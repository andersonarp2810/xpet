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
                    <!-- Card content -->
                <div class="card-body card-body-cascade text-center">
                    <!-- Title -->
                    <div class="card-title mt-5">
                    <h6><strong>
                            {{$pet->name}}
                        </strong></h6>

                        <div>
                            @if(Auth::user()->id == $pet->user->id && count($pet->photos) < 5)
                            <form method="POST" action="{{ route('pet.addphoto', ['pet' => $pet->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <a href="">
                                <input type="file" id="upload_file" name="images[]" accept="image/*" multiple onChange="this.form.submit()">
                                <label id="upload_btn" for="upload_file">
                                    <i class="fas fa-camera-retro animated rotateIn"></i><h6><strong> Adicionar foto</strong></h6>
                                </label>
                                </a>
                            </form>
                            @else
                            <i class="fas fa-camera-retro animated rotateIn" disabled></i><h6><strong>Limite de fotos</strong></h6>
                            @endif
                        </div>
                        <div>
                        <!--    
                        @if(Auth::user()->id == $pet->user_id)
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-edit-' . $pet->id}}">Editar 
                                <i class="fas fa-pencil-alt ml-1 animated rotateIn"></i>
                            </button>
                        @elseif(count($accepts) > 0)
                            @foreach($accepts as $accet)
                                aceitar
                            @endforeach
                        @elseif(count($no_accepts) > 0)
                            @foreach($no_accepts as $no_accet)
                                aceito
                            @endforeach
                        @else
                            pendente 
                        @endif
                        -->

                        @if(Auth::user()->id == $pet->user_id)
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-edit-' . $pet->id}}">Editar 
                                <i class="fas fa-pencil-alt ml-1 animated rotateIn"></i>
                            </button>
                        @else
                            @if(count($solicitations) > 0)
                                @foreach($solicitations as $solicitation)
                                    @if($solicitation->status == 'pendente')
                                        @if($solicitation->requested_pet->id == $pet->id)
                                            <button type="button" class="btn btn-primary btn-sm" disabled >Pendente</button>
                                        @elseif($solicitation->requested->id != $pet->user_id)
                                            <form method="POST" action="{{ route('solicitation.update', ['solicitation' => $solicitation]) }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="status" value="aceito" >
                                                <button type="submit" class="btn btn-primary btn-sm">Aceitar
                                                    <i class="fa fa-check animated rotateIn"></i>
                                                </button>
                                                <button type="submit" class="btn btn-primary btn-sm">Recusar
                                                    <i class="fa fa-check animated rotateIn"></i>
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-match' }}">Combinar</button>
                                        @endif
                                    @else
                                        @if($solicitation->requested_pet->id == $pet->id)
                                            <button type="button" class="btn btn-primary btn-sm" disabled >Aceito</button>
                                        @else
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-match' }}">Combinar</button>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-match' }}">Combinar</button>
                            @endif
                        @endif
                        </div>
                        
                </div>
                </div>
                    </div>

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
                        <h6 class="card-title"><strong>Raça: </strong>{{ $pet->race }}</h6>
                        <h6 class="card-title"><strong>Tamanho: </strong>{{ $pet->size }}</h6>
                        <h6 class="card-title"><strong>Cor: </strong>{{ $pet->color }}</h6>
                        <h6 class="card-title"><strong>Gênero: </strong>{{ $pet->gender }}</h6>
                        <h6 class="card-title"><strong>Pedigree: </strong>{{ $pet->pedigree ? 'Sim' : 'Não' }}</h6>
                        <h6 class="card-title"><strong>Descrição: </strong>{{ $pet->description }}</h6>

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
                        <h6 class="card-title"><strong>Dono: </strong>{{ $pet->user->name }}</h6>
                        <h6 class="card-title"><strong>Rua: </strong>{{ $address->street ? $address->street : 'Oculto' }}</h6>
                        <h6 class="card-title"><strong>Número: </strong>{{ $address->number ? $address->number : 'Oculto'  }}</h6>
                        <h6 class="card-title"><strong>Complemento: </strong>{{ $address->complement ? $address->complement : 'Oculto' }}</h6>
                        @foreach($phones as $phone)
                            <h6 class="card-title"><strong>Telefone {{ $loop->iteration }}: </strong>{{ $phone->number }}</h6>
                        @endforeach
                        <h6 class="card-title"><strong>Cidade: </strong>{{ $address->city }}</h6>
                        <h6 class="card-title"><strong>Bairro: </strong>{{ $address->district ? $address->district : 'Oculto' }}</h6>
                        <h6 class="card-title"><strong>Estado: </strong>{{ $address->state }}</h6>
                        <h6 class="card-title"><strong>País: </strong>{{ $address->country }}</h6>

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

                    @include('layouts.pet-match', ['pets' => Auth::User()->pet])
                    
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
@endsection