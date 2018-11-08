<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>XPetX</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="teste/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="teste/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="teste/css/style.min.css" rel="stylesheet">
    <style type="text/css">
    html,
    body,
    header,
    .view{
      background-image: url("teste/img/background5.jpg");
      background-size: 1420px 750px;

    }
 .thumb-post {
  object-fit: none; /* Do not scale the image */
  object-position: center; /* Center the image within the element */
  width: 100%;
}
  </style>
</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header >

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar" style="background-color: #ffefc0 !important">
            <div class="container-fluid">

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                     
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="#">
                                <img src="teste/img/icon/note.png" class="mr-2">Cadastro
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect"data-toggle="modal" data-target="#modalLoginAvatarDemo" href="#">
                                <img src="teste/img/icon/enter.png" class="mr-2">Login
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div  class="sidebar-fixed position-fixed"style="background-color: #ffefc0 !important" >

            <a class=" waves-effect">
                <img src="teste/img/logo.png" height="300" width="1100" class="img-fluid" alt="">
            </a>

            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item active waves-effect">
                    <i class=""></i>Dashboard
                </a>
                            <a class="list-group-item list-group-item-action waves-effect" href="#">
                                <img src="teste/img/icon/dog-house2.png" class="mr-2"> Home
                                <span class="sr-only">(current)</span>
                            </a>

                <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalLoginAvatarDemo">
                    <img src="teste/img/icon/dog.png" class="mr-2"></i>  Pets</a>
                <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalLoginAvatarDemo">
                    <img src="teste/img/icon/boy.png" class="mr-2"></i>Perfil</a>
               <!-- <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <img src="img/icon/exit.png"></i>  Sair</a>-->
            </div>

        </div>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
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

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4">

                   <div class="card card-cascade wider">

  <!-- Card image -->
  <div class="view view-cascade overlay">
    <img  class="card-img-top thumb-post" src="teste/img/pet1.jpg" alt="Card image cap" height="285" width="100">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">

    <!-- Title -->  
    <h4 class="card-title"><strong>Frodo</strong></h4>
    <!-- Subtitle -->
     <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modalLRFormDemo">Conferir</button>
                                        <br>

  </div>

</div> 


                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

<!-- Card Wider -->
<div class="card card-cascade wider">

  <!-- Card image -->
  <div class="view view-cascade overlay">
    <img  class="thumb-post" src="teste/img/pet2.jpg" alt="Card image cap" height="285" width="100">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">

    <!-- Title -->
    <h4 class="card-title"><strong>Astolfo</strong></h4>
    <!-- Subtitle -->

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modalLRFormDemo">Conferir</button>

  </div>

</div>
<!-- Card Wider -->                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                    <!-- Card Wider -->
<div class="card card-cascade wider">

  <!-- Card image -->
  <div class="view view-cascade overlay">
    <img  class="card-img-top thumb-post" src="teste/img/pet3.jpg" alt="Card image cap"  height="285" width="100">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">

    <!-- Title -->
    <h4 class="card-title"><strong>Belmont</strong></h4>
    <!-- Subtitle -->

   <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modalLRFormDemo1">Conferir </button>

  </div>

</div>
                </div>
                <!--Grid column-->
<div class="col-lg-4 col-md-12 mb-4">

                   <div class="card card-cascade wider">

  <!-- Card image -->
  <div class="view view-cascade overlay">
    <img  class="card-img-top thumb-post" src="teste/img/pet1.jpg" alt="Card image cap" height="285" width="100">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">

    <!-- Title -->  
    <h4 class="card-title"><strong>Frodo</strong></h4>
    <!-- Subtitle -->
     <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modalLRFormDemo">Conferir</button>
                                        <br>

  </div>

</div> 


                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

<!-- Card Wider -->
<div class="card card-cascade wider">

  <!-- Card image -->
  <div class="view view-cascade overlay">
    <img  class="card-img-top thumb-post" src="teste/img/pet2.jpg" alt="Card image cap" height="285" width="100">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">

    <!-- Title -->
    <h4 class="card-title"><strong>Astolfo</strong></h4>
    <!-- Subtitle -->

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modalLRFormDemo">Conferir</button>

  </div>

</div>
<!-- Card Wider -->                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                    <!-- Card Wider -->
<div class="card card-cascade wider">

  <!-- Card image -->
  <div class="view view-cascade overlay">
    <img  class="card-img-top thumb-post" src="teste/img/pet3.jpg" alt="Card image cap"  height="285" width="100">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">

    <!-- Title -->
    <h4 class="card-title"><strong>Belmont</strong></h4>
    <!-- Subtitle -->

   <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modalLRFormDemo1">Conferir </button>

  </div>

</div>
                </div>


            </div> <!--aqui-->
            <!--Grid row-->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Section: Modals-->
                        <section>

                            
                            <!--Modal Form Login with Avatar Demo-->
                            <div class="modal fade" id="modalLoginAvatarDemo" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true" method="POST" action="{{ route('login') }}">

                                @csrf

                                <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                                    <!--Content-->
                                    <div class="modal-content">

                                        <!--Header-->
                                        <div class="modal-header">
                                            <img src="teste/img/pawprintvector.jpg"
                                                class="rounded-circle img-responsive" alt="Avatar photo">
                                        </div>
                                        <!--Body-->
                                        <div class="modal-body text-center mb-1">

                                            <!--<h5 class="mt-1 mb-2">Maria Doe</h5>-->

                                            <div class="md-form ml-0 mr-0">
                                                <input type="email" id="email" class="form-control ml-0 {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif

                                                <label for="email" class="ml-0">Email</label>

                                            </div>
                                            <div class="md-form ml-0 mr-0">
                                                <input type="password" id="password" class="form-control ml-0 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                                <label for="password" class="ml-0">Senha</label>
                                            </div>


                                            <div class="text-center mt-4">


                                                <button type="submit" class="btn btn-success">Login
                                                    <i class="fa fa-sign-in ml-1"></i>
                                                </button>
                                                <button class="btn btn-cyan">Cadastrar
                                                    <i class="fa fa-sign-in ml-1"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <!--/.Content-->
                                </div>
                            </div>
                            <!--Modal Form Login with Avatar Demo-->
                            <div class="modal fade" id="modalLRFormDemo1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
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
                            <!--Modal: Login / Register Form Demo-->
                            <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
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
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" >Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Modal: Login / Register Form Demo-->
                            <!-- Full Height Modal Right Success Demo-->
                            <div class="modal fade right" id="fluidModalRightSuccessDemo" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
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

    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn" style="background-color: #ff6a3b !important">


        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">
            <a href="https://www.facebook.com/mdbootstrap" target="_blank">
                <i class="fa fa-facebook mr-3"></i>
            </a>

            <a href="https://twitter.com/MDBootstrap" target="_blank">
                <i class="fa fa-twitter mr-3"></i>
            </a>

            <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
                <i class="fa fa-youtube mr-3"></i>
            </a>

        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            Copyright © 2018 XPetX.
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="teste/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="teste/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="teste/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="teste/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>

</body>

</html>