@extends('AdminSite.layouts.headfood')

@section('title')
    Edicion Productos
@endsection

@section('content')
<div class="container my-3">
    <h1>Edicion Productos</h1>
    <h2 class="text-center">PRODUCTOS</h2>
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="text-center my-3 text-negro"> EDIT </h2>                
                <form action="{{ route('updateproduct', $productos->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre: </span>
                    <input type="text" class="form-control" placeholder="Producto" aria-label="Username"
                        aria-describedby="basic-addon1" value="{{ $productos->nombre }}" name="nombre" id="nombre" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Descripción: </span>
                    <textarea type="text" step="0.1" class="form-control" placeholder="Descripción"
                        aria-label="Username" aria-describedby="basic-addon1" name="descripcion" id="descripcion"
                        required>{{ $productos->descripcion }}
                    </textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Imagen: </span>
                    {{-- {{ $productos->imagen }} --}}
                    <img src="{{ asset('storage').'/'.$productos->imagen }}" alt=""
                                            class="img-fluid" width="150px">
                    <input type="file" class="form-control" placeholder="Genero" aria-label="Username"
                        aria-describedby="basic-addon1" value="" name="imagen" id="imagen">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Precio: </span>
                    <input type="number" step="0.1" min="0" class="form-control" placeholder="Precio"
                        aria-label="Username" aria-describedby="basic-addon1" value="{{ $productos->precio }}" name="precio" id="precio" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Tipo: </span>
                    <select class="form-select" aria-label="Default select example" name="tipo" id="tipo" required>
                        <option selected>{{ $productos->tipo }}</option>
                        <option value="Acción">Acción</option>
                        <option value="Arcade">Arcade</option>
                        <option value="Deportivo">Deportivo</option>
                        <option value="Estrategia">Estrategia</option>
                        <option value="Simulación">Simulación</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Plataforma: </span>
                    <select class="form-select" aria-label="Default select example" name="plataforma" id="plataforma" required>
                        <option selected>{{ $productos->plataforma }}</option>
                        <option value="Computadora">Computadora</option>
                        <option value="Xbox 360">Xbox 360</option>
                        <option value="Play Station 4">Play Station 4</option>
                        <option value="Nintendo Switch">Nintendo Switch</option>
                        <option value="Xbox One">Xbox One</option>
                        <option value="Play Station 3">Play Station 3</option>
                        <option value="Nintendo Wii">Nintendo Wii</option>
                    </select>                    
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>

@endsection