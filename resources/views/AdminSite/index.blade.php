@extends('JetgamesSite.layouts.headerfooterS')

@section('meta')
<link rel="stylesheet" href="{{asset('CSS/login.css')}}">
@endsection

@section('title')
    Login Administración
@endsection

@section('content')
<div class="container-fluid img-bg">
    <div class="container-fluid">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Iniciar Sessión</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="
                        {{route('autenticacionUser')}}
                        ">
                            @csrf
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Correo electronico">

                            </div>
                            <div class="input-group form-group my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>                            
                            <div class="form-group d-flex justify-content-end">
                                <input type="submit" value="Login" class="btn float-right login_btn btn-outline-warning">
                            </div>
                        </form>
                    </div>                    
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <a href="#">¿Olvidaste la contraseña?</a>
                        </div>
                    </div>
                    <div>
                        @include('AdminSite.Mensajes.error')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection