@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-5">

        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">

                <h4 class="mb-2 mb-sm-0 pt-1">
                        <span>Painel de seleção</span>
                    </h4>

                <form class="d-flex justify-content-center">
                    <!-- Default input -->
                    <input type="search" placeholder="Encontre um parceiro" aria-label="Search" class="form-control">
                    <button class="btn btn-primary btn-sm my-0 p" type="submit">
                        <i class="fa fa-search"></i>
                    </button>

                </form>

            </div>

        </div>
        <!-- Heading -->

        <!--Grid row-->
        <div class="row wow fadeIn">
            <br>
        </div>

    </div>
    <!--Grid row-->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column dinamic -->
        @foreach ($pets as $pet)
        <div class="col-lg-4 col-md-4 mb-4">

            <div class="card card-cascade wider">

                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="card-img-top thumb-post" src="{{ URL::asset('storage/' . $pet->photos->first()->path)}}" alt="Card image cap" height="285" width="100">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h4 class="card-title"><strong>{{ $pet->name }}</strong></h4>
                    <!-- Subtitle -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-' . $pet->id }}">Conferir</button>
                    <br>

                </div>

            </div>

        </div>
        @endforeach
            <!--Grid column dinamic-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-4 mb-4">

            <div class="card card-cascade wider">

                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="card-img-top thumb-post" src="teste/img/pet1.jpg" alt="Card image cap" height="285" width="100">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h4 class="card-title"><strong>Frodo</strong></h4>
                    <!-- Subtitle -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLRFormDemo">Conferir</button>
                    <br>

                </div>

            </div>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-4 mb-4">

            <!-- Card Wider -->
            <div class="card card-cascade wider">

                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="thumb-post" src="teste/img/pet2.jpg" alt="Card image cap" height="285" width="100">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h4 class="card-title"><strong>Astolfo</strong></h4>
                    <!-- Subtitle -->

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLRFormDemo">Conferir</button>

                </div>

            </div>
            <!-- Card Wider -->
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-4 mb-4">

            <!-- Card Wider -->
            <div class="card card-cascade wider">

                <!-- Card image -->
                <div class="view view-cascade overlay">
                    <img class="card-img-top thumb-post" src="teste/img/pet3.jpg" alt="Card image cap" height="285" width="100">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade text-center">

                    <!-- Title -->
                    <h4 class="card-title"><strong>Belmont</strong></h4>
                    <!-- Subtitle -->

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLRFormDemo1">Conferir </button>

                </div>

            </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <!--Card-->
            <div class="card">

                <!--Section: Modals-->
                <section>

                    <!-- modal informações dinamic -->
                    @foreach ($pets as $pet)
                    <div class="modal fade" id="{{'#modal-' . $pet->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Informações</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="card-title"><strong>Nome:</strong> {{$pet->name}}</h4>
                                    <h4 class="card-title"><strong>Raça:</strong> {{$pet->race}}</h4>
                                    <h4 class="card-title"><strong>Cor:</strong> {{$pet->color}}</h4>
                                    <h4 class="card-title"><strong>Pedigree:</strong> {{$pet->pedirgree? 'Sim' : 'Não'}}</h4>
                                    <h4 class="card-title"><strong>Porte:</strong> {{$pet->size}}</h4>
                                    <h4 class="card-title"><strong>Sexo:</strong> {{$pet->gender}}</h4>
                                    <h4 class="card-title"><strong>Nome do dono(a):</strong> {{$pet->user->name}}</h4>
                                    <h4 class="card-title"><strong>Cidade:</strong> {{$pet->user->address->city}}</h4>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modalLoginAvatarDemo">Combinar</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- modal informações dinamic -->

                    <div class="modal fade" id="modalLRFormDemo1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Informações</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="card-title"><strong>Nome:</strong> Belmont</h4>
                                    <h4 class="card-title"><strong>Raça:</strong> Golden Retriever</h4>
                                    <h4 class="card-title"><strong>Cor:</strong> Amarelou</h4>
                                    <h4 class="card-title"><strong>Pedigree:</strong> Sim</h4>
                                    <h4 class="card-title"><strong>Porte:</strong> Grande</h4>
                                    <h4 class="card-title"><strong>Sexo:</strong> Masculino</h4>
                                    <h4 class="card-title"><strong>Nome do dono(a):</strong> Luana</h4>
                                    <h4 class="card-title"><strong>Cidade:</strong> Narnia</h4>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modalLoginAvatarDemo">Combinar</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Informações</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="card-title"><strong>Nome:</strong> Astolfo</h4>
                                    <h4 class="card-title"><strong>Raça:</strong> Husky Siberiano</h4>
                                    <h4 class="card-title"><strong>Cor:</strong> Azul</h4>
                                    <h4 class="card-title"><strong>Pedigree:</strong> Sim</h4>
                                    <h4 class="card-title"><strong>Porte:</strong> Grande</h4>
                                    <h4 class="card-title"><strong>Sexo:</strong> Masculino</h4>
                                    <h4 class="card-title"><strong>Nome do dono(a):</strong> Teodoro</h4>
                                    <h4 class="card-title"><strong>Cidade:</strong> Narnia</h4>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modalLoginAvatarDemo">Combinar</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal: Login / Register Form Demo-->
                    <!-- Full Height Modal Right Success Demo-->
                    <div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-full-height modal-right modal-notify modal-success" role="document">
                            <!--Content-->
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <p class="heading lead">Propostas/Convites</p>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="white-text">&times;</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body">
                                    <div class="text-center">
                                        <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                                        <p>Interessados.
                                        </p>
                                    </div>
                                    <ul class="list-group z-depth-0">
                                        <li class="list-group-item justify-content-between">
                                            <a>Nome do dono(a):</strong> F.Franco</a>
                                            <br>
                                            <a>Contato:</strong> (00)91111-1111</a>
                                        </li>
                                        <li class="list-group-item justify-content-between">
                                            <a>Nome:</strong> Muzy</a>
                                            <br>
                                            <a>Contato:</strong> (00)91111-1111</a>
                                        </li>
                                        <li class="list-group-item justify-content-between">
                                            <a>Nome:</strong> Vladnelson</a>
                                            <br>
                                            <a>Contato:</strong> (00)91111-1111</a>
                                        </li>
                                    </ul>
                                </div>

                                <!--Footer-->
                                <div class="modal-footer justify-content-center">
                                    <!-- <a role="button" class="btn btn-success">Get it now
                                                <i class="fa fa-diamond ml-1"></i>
                                            </a>-->
                                    <a role="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Visualizado</a>
                                </div>
                            </div>
                            <!--/.Content-->
                        </div>
                    </div>
                    <!-- Full Height Modal Right Success Demo-->

                </section>
                <!--Section: Modals-->

                <!-- Card header -->
            </div> <!-- Coluna dos modal -->
        </div>
    </div> <!-- Grid Row -->

@endsection