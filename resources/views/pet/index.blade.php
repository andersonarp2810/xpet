@extends('layouts.app')
@section('content')
<div class="container-fluid mt-5">

<div class="row wow fadeIn">

    <!-- botão novo pet -->
    <div class="col-lg-3 col-md-12 mb-4">

        <div class="card card-cascade wider">

            <!-- Card image -->
            <div class="view view-cascade overlay card-imagem">
                <img class="card-img" src="teste/img/maislaranja.png" alt="Card image cap" height="285" width="100" style="object-fit: contain; object-position: center; height: 100%" >
                <a href="#!" data-toggle="modal" data-target="#modal-create">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">

                <!-- Title -->
                <h6 class="card-title"><strong>Novo Pet</strong></h6>
                <!-- Subtitle -->

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-create">
                    Cadastrar
                    <i class="fa fa-paw ml-1 animated rotateIn"></i>
                </button>

            </div>

        </div>

    </div>
    <!-- botão novo pet -->

    <!--Grid column dinamic-->
    @foreach($pets as $pet)
    <div class="col-lg-3 col-md-12 mb-4">

        <div class="card card-cascade wider">

            @include('layouts.pet-card-image', ['pet' => $pet])

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">

                <!-- Title -->
                <h6 class="card-title"><strong>{{$pet->name}}</strong></h6>
                <!-- Subtitle -->
                
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#modal-edit-' . $pet->id}}">
                    Editar
                    <i class="fa fa-edit ml-1 animated rotateIn"></i>
                </button>

                <form method="POST" action="{{ route('pet.delete', ['pet' => $pet]) }}" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-danger btn-sm">
                        Excluir
                        <i class="fa fa-trash ml-1 animated rotateIn"></i>
                    </button>
                </form>

            </div>

        </div>

    </div>
    @endforeach
    <!--Grid column dinamic-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-12 mb-4">

        <div class="card card-cascade wider">

            <!-- Card image -->
            <div class="view view-cascade overlay">
                <img class="card-img-top" src="teste/img/pet3.jpg" alt="Card image cap" height="285" width="100">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">

                <!-- Title -->
                <h4 class="card-title"><strong>Belmont</strong></h4>
                <!-- Subtitle -->

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLRFormDemo1">Dados </button>

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalLoginAvatarDemo">Editar </button>
                <br>

            </div>

        </div>

    </div>
    <!--Grid column-->


    <div class="row wow fadeIn">

        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <!--Card-->
            <div class="card">

                <!--Section: Modals-->
                <section>

                    <!-- Create modal -->
                    @include('layouts.pet-form', ['pet' => null])
                    <!-- Create modal -->

                    @foreach($pets as $pet)
                        @include('layouts.pet-form', ['pet' => $pet])
                    @endforeach

                    <!--Modal Info-->
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
                                    <h4 class="card-title"><strong>Cor:</strong> Azul</h4>
                                    <h4 class="card-title"><strong>Pedigree:</strong> Sim</h4>
                                    <h4 class="card-title"><strong>Porte:</strong> Grande</h4>
                                    <h4 class="card-title"><strong>Sexo:</strong> Masculino</h4>
                                    <h4 class="card-title"><strong>Nome do dono(a):</strong> Luana</h4>
                                    <h4 class="card-title"><strong>Contato:</strong> (00)91111-1111 </h4>
                                    <h4 class="card-title"><strong>Email:</strong> bla@gmail.com </h4>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal: Login / Register Form Demo-->
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
                                    <h4 class="card-title"><strong>Porte:</strong> Grande</h4>
                                    <h4 class="card-title"><strong>Sexo:</strong> Masculino</h4>
                                    <h4 class="card-title"><strong>Nome do dono(a):</strong> Teodoro</h4>
                                    <h4 class="card-title"><strong>Contato:</strong> (00)91111-1111 </h4>
                                    <h4 class="card-title"><strong>Email:</strong> bla@gmail.com </h4>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal propostas direita -->
                    <div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog modal-full-height modal-right modal-notify modal-success" role="document">
                            <!--Content-->
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <p class="heading lead">Solicitações</p>

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
                                            <a>Nome do dono:</strong> F.Franco</a>
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
                    <!-- modal propostas direita -->

                </section>
            </div>
        </div>
    </div>
</div>

</div>
@endsection