@extends('AdminSite.layouts.headfood')

@section('title')
Administración Productos
@endsection

@section('content')
<h1 class="ms-4 my-3">Administración Productos</h1>
<div class="container my-3">
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
    <h2 class="text-center">PRODUCTOS</h2>
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2 class="text-center my-3 text-negro"> INSERT </h2>
            <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre: </span>
                    <input type="text" class="form-control" placeholder="Producto" aria-label="Username"
                        aria-describedby="basic-addon1" name="nombre" id="nombre" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Descripción: </span>
                    <textarea type="text" step="0.1" class="form-control" placeholder="Descripción"
                        aria-label="Username" aria-describedby="basic-addon1" name="descripcion" id="descripcion"
                        required></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Imagen: </span>
                    <input type="file" class="form-control" placeholder="Genero" aria-label="Username"
                        aria-describedby="basic-addon1" name="imagen" id="imagen" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Precio: </span>
                    <input type="number" step="0.1" min="0" class="form-control" placeholder="Precio"
                        aria-label="Username" aria-describedby="basic-addon1" name="precio" id="precio" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Tipo: </span>
                    <select class="form-select" aria-label="Default select example" name="tipo" id="tipo" required>
                        <option selected>Selecciona un tipo</option>
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
                        <option selected>Selecciona un tipo</option>
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
        <div class="col-12">
            <h2 class="text-center my-3 text-negro"> READ </h2>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Tipo</th>
                                    <th>Plataforma</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->id }}</td>                                  
                                    <td>
                                        {{-- <img src="{{ asset('storage').'/'.$producto->imagen }}"
                                        alt="{{ $producto->nombre }}"
                                        class="img-fluid" width="200px"> --}}
                                        <img src="{{ asset('storage/'.$producto->imagen) }}"
                                            alt="{{ $producto->nombre }}" class="img-fluid" width="150px">
                                    </td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>{{ $producto->tipo }}</td>
                                    <td>{{ $producto->plataforma }}</td>
                                    <td>

                                        <a href="{{ route('editproduct', $producto->id) }}"
                                            class="btn btn-warning ">Editar</a>

                                        <form action="{{ route('borrarproducto', $producto->id) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger mt-2"
                                                onclick="return confirm('¿Quieres borrar el producto?')">Eliminar</button>
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