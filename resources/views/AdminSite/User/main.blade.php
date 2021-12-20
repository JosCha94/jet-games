@extends('AdminSite.layouts.headfood')

@section('title')
Página de inicio Administración
@endsection

@section('content')
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
        @endif
    </div>
    <h1 class="text-center mt-5">Bienvenido Administrador</h1>
    <h2 class="text-center mb-5">{{ Auth::user()->name }}</h2>
</div>

@endsection