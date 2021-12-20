@extends('AdminSite.layouts.headfood')

@section('title')
Página de Registro Administración
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card w-50">
                <div class="card-header">
                    <h3 class="text-center">Agregar usuario<br> Administrador</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('newuser') }}">
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
                            <input type="submit" value="Agregar" class="btn-lg login_btn btn-outline-primary mx-auto">
                        </div>
                    </form>                           
                </div>
                @include('AdminSite.Mensajes.error')
                <div class="card-footer">                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection