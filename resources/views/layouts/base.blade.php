<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <base href="/" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>XPetX</title>

    <link rel="shortcut icon" type="image/png" href="assets/img/logo2.png" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/mdb.min.css" rel="stylesheet">
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="assets/css/image-show.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- SIDEBAR -->
    <div class="d-flex white" id="wrapper">
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <a class="" href="/home">
                    <img src="assets/img/logo.png" class="img-fluid" style="width: 200px">
                </a>
            </div>
            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="/home">
                    <img src="assets/img/icon/dog-house2.png" alt="Página Inicial" class="mr-2"><strong>Página Inicial</strong>
                </a>
                @if(!Auth::guest())
                <a href="/pets" class="list-group-item list-group-item-action">
                    <img src="assets/img/icon/dog.png" alt="Pets" class="mr-2"><strong>Pets</strong>
                </a>
                <a href="/user" class="list-group-item list-group-item-action">
                    <img src="assets/img/icon/boy.png" alt="Perfil" class="mr-2"><strong>Perfil</strong>
                </a>
                @endif
                <a href="/emobra" class="list-group-item list-group-item-action">
                    <img src="assets/img/icon/pdog2.png" alt="Adotar" class="mr-2"><strong>Adotar</strong>
                </a>
                <a href="/emobra" class="list-group-item list-group-item-action">
                    <img src="assets/img/icon/donation.png" alt="Doar" class="mr-2"><strong>Doar</strong>
                </a>
                <a href="/emobra" class="list-group-item list-group-item-action">
                    <img src="assets/img/icon/dog3.png" alt="Filhotes" class="mr-2"><strong>Filhotes</strong>
                </a>
            </div>
        </div>
        <!-- /SIDEBAR -->

        <div id="page-content-wrapper">
            <!-- NAVBAR -->
            <nav>
                <div class="ml-0 deep-orange lighten-1 pr-3 pb-5 pb-md-0 pb-md-0-nav">
                    <button class="btn btn-sm btn-info" id="menu-toggle"><i class="fas fa-caret-left fa-2x"></i></button>
                    @if(Auth::guest())
                    <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalLoginAvatarDemo" href="#">
                        Entrar <i class="fas fa-sign-in-alt"></i>
                    </a>
                    <a class="btn btn-sm btn-light float-right" href="/register">
                        Criar minha conta
                    </a>
                    @else
                    <a class="btn btn-sm btn-light float-right" data-target="#modalLoginAvatarDemo" href="/logout">
                        Sair <i class="fas fa-sign-out-alt"></i>
                    </a>
                    @endif
                    @if(session('erro'))
                    <button id="btnModalLoginNecessario" type="button" class="d-none" data-toggle="modal" data-target="#modalLoginNecessario"></button>
                    <div class="modal fade right show" id="modalLoginNecessario" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button id="btnModalLoginNecessarioClose" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{ session('erro') }}
                                </div>
                                <div class="modal-footer">
                                    <button id="btnModalLoginNecessarioEntrar" class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalLoginAvatarDemo">
                                        Entrar <i class="fas fa-sign-in-alt"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light"><a class="black-text" href="/register">Criar minha conta</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <span class="nav-item alert alert-danger alert-dismissible fade show" role="alert">
                        <strong> {{ session('erro') }} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </span> -->
                    @endif
                </div>
            </nav>
            <!-- /NAVBAR -->

            <!-- CONTEÚDO -->
            <div class="container-fluid">
                <div class="mt-5 p-2">
                    @yield('content')
                </div>
            </div>
            <!-- /CONTEÚDO -->

        </div>
    </div>

    <!-- /MODAL LOGIN -->
    <div class="modal row" id="modalLoginAvatarDemo" tabindex="-1" role="dialog" aria-hidden="true">
        @csrf
        <div class="modal-dialog modal-dialog-centered pl-5 pr-5" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="mt-3">Entrar</h1>
                    <p><i class="fa-4x fa-bone fas deep-orange-text animated rotateIn"></i></p>
                </div>
                <div class="modal-body mb-1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label class="font-weight-bolder" for="email" class="ml-0">E-mail</label>
                        <input name="email" type="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif

                        <label class="font-weight-bolder mt-4" for="password" class="ml-0">Senha</label>
                        <input name="password" type="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-info">
                                Entrar <i class="fas fa-sign-in-alt"></i>
                            </button>
                            <p class="mt-4">Ainda não tem uma conta? <a href="/register">Criar uma.</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /MODAL LOGIN -->

    <footer class="page-footer text-center font-small deep-orange lighten-1 mt-5">
        <div class="p-1">
            <a href="https://www.facebook.com/" target="_blank">
                <i class="fab fa-facebook-square mr-3"></i>
            </a>
            <a href="https://twitter.com/" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <div class="footer-copyright p-2">
            <i class="far fa-copyright mr-1"></i><span id="anoAtual"></span> XPetX
        </div>
    </footer>

    <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>
