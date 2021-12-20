<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('CSS/estilos.css')}}">
    @yield('meta')  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <title>Jetgames - @yield('title')</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light mb-0 bg-whitesmoke">
            <div class="container-fluid bg-whitesmoke mb-0">
                <a href="
                @if(Auth::check())
                {{ route('main-page') }}
                @else
                {{ route('index') }}
                @endif
                " class="text-decoration-none" title="Link to INDEX">
                    <img src="{{asset('IMG/logo.png')}}" title="logo Jetgames" alt="logo Jetgames"
                        class="img-fluid ms-2" style="width: 9em; border-image: 2px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mb-0" id="navbarSupportedContent1">
                    <form class="d-flex my-2 my-lg-0 ms-auto">
                        <div class="input-group mb-3 my-sm-3">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                aria-describedby="barrabuscarheader">
                            <button class="btn btn-primary" type="submit" id="barrabuscarheader"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                    @if(Auth::check())
                    <ul class="navbar-nav ms-auto">                        
                        <li>
                            <div class="dropdown mx-4">
                                <a class="dropdown-toggle text-uppercase" type="button" id="dropdownMenuUser"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuUser">
                                    <li class="dropdown-item">
                                        <a class="nav-link mx-3" href="{{ route('index') }}" title="Link to INDEX">
                                            Ver sitio  <i class="fas fa-home"></i> 
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('creauser') }}">Agregar <br> Administradores</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                            @csrf
                                            <a href="{{ route('logout') }}" role="button"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                <i class="me-2 icon-xxs dropdown-item-icon"
                                                    data-feather="power"></i>Cerrar Sessión
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mb-2 mb-lg-0 me-3">
                            <a href="#">
                                <img src="{{asset('IMG/user-outlined.svg')}}" alt="logo usuario" class="icono-user" id="user">
                                <label for="user" class="me-2 text-dark">Acceder</label>
                            </a>
                        </li>
                        <li class="nav-item mb-2 mb-lg-0">
                            <a href="#">
                                <img src="{{asset('IMG/user-plus.svg')}}" alt="logo usuario" class="icono-user" id="user">
                                <label for="user" class="me-2 text-dark">Crear cuenta</label>
                            </a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>
        @if(Auth::check())
        <nav class="navbar navbar-expand-lg navbar-dark bg-purple mt-0" name="nav2">
            <div class="container-fluid py-1 mt-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mt-0" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center mx-auto">                    
                        <li class="nav-item mx-4">
                            <a class="nav-link active fs-5" aria-current="page" href="{{ route('listproducts') }}">Productos</a>
                          </li>
                          <li class="nav-item mx-4">
                            <a class="nav-link active fs-5" aria-current="page" href="{{ route('veruser') }}">Usuarios</a>
                          </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endif
    </header>
    <!-- BODY -->

    @yield('content')

    <!-- FOOTER -->
    <footer>
        <div class="container-fluid">
            <div class="row bg-purple">
                <div class="col-md-3 col-6 mt-3">
                    <h3>MEDIOS DE PAGO</h3>
                    <img src="{{ asset('IMG/tarjetas.png') }}" width="200px" class="img-fluid mb-2 ms-sm-5">
                </div>
                <div class="col-md-3 col-6 mt-3">
                    <h3>ENLACES DE INTERES</h3>
                    <p class="ms-sm-4"><a href="#">Nosotros</a><br><a href="#">Aviso de
                            privacidad</a><br>
                        <a href="#">Condiciones de uso</a></p>
                </div>
                <div class="col-md-3 col-6 mt-3">
                    <h3>SIGUENOS EN</h3>
                    <a class="text-light display-6 px-4 text-dark ms-sm-4" href="#" 
                        alt="icono instagram" title="Link to Instsgram"><i class="fab fa-instagram text-white"></i></a>
                    <a class="text-light display-6 px-4 text-dark" href="#"  alt="icono twitter"
                        title="Link to Twitter"><i class="fab fa-twitter text-white"></i></a>
                    <a class="text-light display-6 px-4 text-dark" href="#" alt="icono facebook"
                        title="Link to Facebook"><i class="fab fa-facebook text-white"></i></a>
                </div>
                <div class="col-md-3 col-6 mt-3">
                    <h3>ATENCION AL CLIENTE</h3>
                    <p class="ms-sm-4">Número: 960984854 / 922990079 <br> Lunes a sábado: 10:00 am a 05:00 pm <br>
                        Correo: JetgamesStore@gmail.com</p>
                </div>
                <div class="col-12">
                    <hr class="bg-white">
                    <p class="text-center text-white">Copyright © <span id="anio"></span> - JetGamesStore</p>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    document.getElementById("anio").innerHTML = new Date().getFullYear();
    src = "JS/script.js"

</script>

</html>