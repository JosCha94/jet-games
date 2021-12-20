@extends('JetgamesSite.layouts.headerfooterS')

@section('meta')
<link rel="stylesheet" href="{{asset('CSS/login.css')}}">
@endsection

@section('title')
Página de Registro Administración
@endsection

@section('content')
<div class="container-fluid img-bg">
    <div class="container-fluid">
        <div class="container">
            <div class="row ">
                @if(Session::has('mensajeinsert'))
                <div class="alert alert-success mt-4">
                    {{Session::get('mensajeinsert')}}
                </div>
                @elseif(Session::has('mensajeupdate'))
                <div class="alert alert-warning mt-4">
                    {{Session::get('mensajeupdate')}}
                </div>
                @elseif(Session::has('mensajedelete'))
                <div class="alert alert-danger mt-4">
                    {{Session::get('mensajedelete')}}
                </div>
                @endif
            </div>
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card w-50">
                    <div class="card-header">
                        <h3 class="text-center">Crear nuevo<br> Usuario</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('crearuser')}}">
                            @csrf
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="Escriba su nombre"
                                    required>

                            </div>
                            <div class="input-group form-group my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                </div>
                                <input type="enmail" name="email" class="form-control" placeholder="Correo electronico"
                                    required>
                            </div>
                            <div class="input-group form-group my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Escriba una contraseña" required>
                            </div>
                            <div class="input-group form-group my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Repita la contraseña" required>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <input type="submit" value="Crear" class="btn-lg login_btn btn-outline-light mx-auto mb-2">
                            </div>
                        </form>
                        @include('AdminSite.Mensajes.error')
                    </div>                    
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
