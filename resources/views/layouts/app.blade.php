<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <base href="/" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>XPetX</title>
    <link rel="shortcut icon" type="image/png" href="teste/img/logo2.png"/>
    <!-- Seach -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Font Awesome -->
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- Bootstrap core CSS -->
    <link href="teste/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Material Design Bootstrap -->
    <link href="teste/css/mdb.min.css" rel="stylesheet"/>
    <!-- Your custom styles (optional) -->
    <link href="teste/css/style.css" rel="stylesheet"/>
    <!-- Image show profile -->
    <link href="teste/css/image-show.css" rel="stylesheet"/>
    <script src="teste/js/jquery.js"></script>
    
    <style type="text/css">
        html,
        body,
        header,
        .view {
            background-image: url("teste/img/background5.jpg");
            background-size: 1420px 750px;
        }
        
        .thumb-post {
            object-fit: none;
            /* Do not scale the image */
            object-position: center;
            /* Center the image within the element */
            width: 100%;
        }
        .modal-content1{
        width: 800px;
}


.search-box {
    position:absolute;
    top:50%;
    left:23%;
   /* transform:translate(-100%,-50%);*/
   transform:translate(0%,-50%);
    background:#ff6a3b;
    height:40px;
    border-radius:40px;
    padding: 10px;
}

.search-box:hover> .search-txt {
    width:340px;
    padding:0 6px;
}

.search-box:hover> .search-btn {
    background:#ffefc0;
}

.search-btn {
    color:#ff6a3b;
    float:right;
    width:40px;
    height:40px;
    border-radius:50%;
    background:#ffefc0;
    display:flex !important;
    justify-content:center;
    align-items:center;
    transition:0.4s;
}

.search-txt {
    border:none;
    background:none;
    outline:none;
    float:left;
    color:white;
    font-size:20px;
    transition:0.4s;
    line-height:10px;
    width:0px;
}

.card-imagem{
    height: 30vh;
}

#upload_file{width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;}
    </style>
</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar" style="background-color: #ffefc0 !important">
            <div class="container-fluid">

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                                            <div class="search-box nav-item">
                            <input class="search-txt" type="text" name="" placeholder="Type to search">
                                <a class="search-btn" href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                    </div>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        
                        @if(session('erro'))
                            <span class="nav-item alert alert-danger alert-dismissible fade show" role="alert">
                                <strong> {{ session('erro') }} </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>   
                            </span>
                        @endif

                        @if(Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="/register">
                                <img src="teste/img/icon/note.png" class="mr-2">Cadastro
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" data-toggle="modal" data-target="#modalLoginAvatarDemo" href="#">
                                <img src="teste/img/icon/enter.png" class="mr-2">Login
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link waves-effect" data-target="#modalLoginAvatarDemo" href="/logout">
                                <img src="teste/img/icon/exit.png" class="mr-2">Logout
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        @endif

                    </ul>


                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed" style="background-color: #ffefc0 !important">

            <a class=" waves-effect" href="/home">
                <img src="teste/img/logo.png" height="300" width="1100" class="img-fluid" alt="">
            </a>

            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action waves-effect" href="/home">
                    <img src="teste/img/icon/dog-house2.png" class="mr-2">Home
                    <span class="sr-only">(current)</span>
                </a>

                <a href="/pets" class="list-group-item list-group-item-action waves-effect">
                    <img src="teste/img/icon/dog.png" class="mr-2">Pets
                </a>
                <a href="/user" class="list-group-item list-group-item-action waves-effect">
                    <img src="teste/img/icon/boy.png" class="mr-2">Perfil
                </a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <img src="teste/img/icon/pdog2.png" class="mr-2">Adotar
                </a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <img src="teste/img/icon/donation.png" class="mr-2">Doar
                </a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                        <img src="teste/img/icon/dog3.png" class="mr-2">Filhotes
                </a>
                <a href="/solicitation/show" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#fluidModalRightSuccessDemo">
                    <img src="teste/img/icon/invitation.png" class="mr-2"> Solicitações
                </a>
                <!-- <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <img src="img/icon/exit.png"></i>  Sair</a>-->
            </div>

        </div>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        @yield('content')
    </main>
    <!--Main layout-->

    <!--Modal Form Login with Avatar Demo-->
    <div class="modal fade" id="modalLoginAvatarDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" method="POST" action="{{ route('login') }}">

        @csrf

        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header">
                    <img src="teste/img/pawprintvector.jpg" class="rounded-circle img-responsive" alt="Avatar photo">
                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="md-form ml-0 mr-0">
                            <input name="email" type="email" id="email" class="form-control ml-0 {{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus> 
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                            </span> 
                            @endif

                            <label for="email" class="ml-0">Email</label>

                        </div>
                        <div class="md-form ml-0 mr-0">
                            <input name="password" type="password" id="password" class="form-control ml-0 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <label for="password" class="ml-0">Senha</label>
                        </div>

                        <div class="text-center mt-4">

                            <button type="submit" class="btn btn-success">
                                Login
                                <i class="fa fa-sign-in ml-1"></i>
                            </button>
                            <a href="/register"  class="btn btn-cyan">
                                Cadastrar
                                <i class="fa fa-sign-in ml-1"></i>
                            </a>
                        </div>
                    </form>
                </div>

            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal Form Login with Avatar Demo-->

    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn" style="background-color: #ff6a3b !important">

        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">
            <a href="https://www.facebook.com/" target="_blank">
                <i class="fa fa-facebook mr-3"></i>
            </a>

            <a href="https://twitter.com/" target="_blank">
                <i class="fa fa-twitter mr-3"></i>
            </a>

            <a href="https://www.youtube.com/" target="_blank">
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
    <!--Friscura véa--script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script-->

</body>

</html>