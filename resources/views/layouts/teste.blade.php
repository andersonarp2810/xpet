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

  <!-- Icon -->
  <link rel="shortcut icon" type="image/png" href="teste/img/logo2.png"/>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.0/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

  <!-- Material Design Bootstrap -->
  <link href="teste/css/mdb.min.css" rel="stylesheet"/>

  <!-- Bootstrap core CSS -->
  <link href="teste/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="teste/css/simple-sidebar.css" rel="stylesheet">

  <!-- Image show profile -->
  <link href="teste/css/image-show.css" rel="stylesheet"/>
  <script src="teste/js/jquery.js"></script>

  <script type="text/javascript">
		// script de filtro
		var atributo = 1;
		/*
			@atributo: 0 = nome, 7 = cidade, 6 = raça, 1-5 = icones de pata
		*/
    function filtro(nome){
      var cards = document.getElementsByClassName('filtravel');
      for(card of cards){
        card.style.display = "block";
        cidade = card.children[0].children[1].children[atributo].innerText;
        //console.log(cidade); // cidade do cachorro
        if(cidade.toLowerCase().search(nome.toLowerCase())){
          card.style.display = "none";
        }
      }
    }
</script>

<!-- Image show profile -->
<link href="teste/css/image-show.css" rel="stylesheet"/>

<style type="text/css">
  #upload_file{width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;}
  .card-imagem{
    height: 20vh;
  }
</style>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">
					<a class="" href="/home">
					  <img src="teste/img/logo.png" class="img-fluid" alt="" style="width: 200px">
					</a>
      </div>
        
      <div class="list-group list-group-flush">
					<a class="list-group-item list-group-item-action waves-effect" href="/home">
					<img src="teste/img/icon/dog-house2.png" class="mr-2"><strong>Home</strong>
					<span class="sr-only">(current)</span>
					</a>
					<a href="/pets" class="list-group-item list-group-item-action waves-effect">
					<img src="teste/img/icon/dog.png" class="mr-2"><strong>Pets</strong>
					</a>
					<a href="/user" class="list-group-item list-group-item-action waves-effect">
					<img src="teste/img/icon/boy.png" class="mr-2"><strong>Perfil</strong>
					</a>
					<a href="/emobra" class="list-group-item list-group-item-action waves-effect">
					<img src="teste/img/icon/pdog2.png" class="mr-2"><strong>Adotar</strong>
					</a>
					<a href="/emobra" class="list-group-item list-group-item-action waves-effect">
					<img src="teste/img/icon/donation.png" class="mr-2"><strong>Doar</strong>
					</a>
					<a href="/emobra float-xs-right ml-auto" class="list-group-item list-group-item-action waves-effect">
					<img src="teste/img/icon/dog3.png" class="mr-2"><strong>Filhotes</strong>
					</a>
					<!-- <a href="#" class="list-group-item list-group-item-action waves-effect">
						<img src="img/icon/exit.png"></i>  Sair</a>-->
				</div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary btn-sm" id="menu-toggle">&equiv;</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left -->
          <ul class="navbar-nav ml-auto mt-lg-0">
            @if(Route::currentRouteName() == 'home')
            <div class="search-box nav-item mr-3">
              <input class="search-txt" type="text" name="busca" placeholder="Busca" onkeyup="filtro(this.value)">
              <a class="search-btn" href="#" onclick="return false;">
                <i class="fas fa-search animated rotateIn"></i>
              </a>
            </div>
            <li class="nav-item active">
              <strong>Buscar por: </strong>
              <select style="border-radius: 5px;" class="ml-1" name="atributo" id="select-atributo" onchange="atributo = this.value">
                <option value="1" selected >Raça</option>
                <option value="2">Cidade</option>
              </select>
            </li>
            @endif
          </ul>
          <!-- Right -->
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            @if(session('erro'))
            <span class="nav-item alert alert-danger alert-dismissible fade show" role="alert">
              <strong> {{ session('erro') }} </strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>   
            </span>
            @endif
            @if(Auth::guest())
            <li class="nav-item active">
              <a class="nav-link waves-effect" href="/register">
                <img src="teste/img/icon/note.png" class="mr-1"><strong>Cadastro</strong>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" data-toggle="modal" data-target="#modalLoginAvatarDemo" href="#">
                <img src="teste/img/icon/enter.png" class="mr-1"><strong>Login</strong>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @else
            <li class="nav-item active">
              <a class="nav-link waves-effect" data-target="#modalLoginAvatarDemo" href="/logout">
                <img src="teste/img/icon/exit.png" class="mr-1"><strong>Logout</strong>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="teste/css/jquery.min.js"></script>
  <script src="teste/css/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

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
              <button type="submit" class="btn btn-success btn-sm" style="width: 125px;">
                Login 
                <i class="fa fa-sign-in ml-1 animated rotateIn"></i>
              </button>
              <a href="/register"  class="btn btn-cyan btn-sm">
                Cadastrar
                <i class="fa fa-sign-in ml-1 animated rotateIn"></i>
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
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn" style="background-color: #ff6a3b !important; position: inherit; width: 100%;">
			<hr class="my-4" style="border-top: 0px">
			<!-- Social icons -->
			<div class="pb-4">
				<a href="https://www.facebook.com/" target="_blank">
				<i class="fa fa-facebook mr-3"></i>
				</a>
				<a href="https://twitter.com/" target="_blank">
				<i class="fa fa-instagram mr-3"></i>
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

</body>

</html>
