@extends('AdminSite.layouts.headfood')

@section('title')
Página de Registro Administración
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row mt-3">
            @if(Session::has('mensajeinsert'))
    <div class="alert alert-success">
        {{Session::get('mensajeinsert')}}
    </div>
    @elseif(Session::has('mensajeupdate'))
    <div class="alert alert-warning">
        {{Session::get('mensajeupdate')}}
    </div>
    @elseif(Session::has('mensajedelete'))
    <div class="alert alert-danger">
        {{Session::get('mensajedelete')}}
    </div>
        </div>
    @endif
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive my-4">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Correo electronico</th>
                                    <th>Rol</th>
                                    <th>Contraseña</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol }}</td>
                            <td>{{ $user->password }}</td>
                            <td>
                                <form action="{{ route('borrarusuario', $user->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger mt-2"
                                        onclick="return confirm('¿Quieres borrar el usuario?')">Eliminar</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection