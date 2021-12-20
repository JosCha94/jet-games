@extends('JetgamesSite.layouts.headerfooterS')

@section('title')
Juegos-PC
@endsection

@section('content')
<div class="container my-3">
    <div class="row mb-2">
        <div class="col-12 mb-5">
            <h2 class="text-center my-2 text-negro"> JUEGOS PARA NINTENDO WII </h2>
        </div>
        @foreach ($productos as $producto)
        @if ($producto->plataforma === "Nintendo Wii")
        <div class="col-md-3 col-6">
            <div class="card card-cascade card-ecommerce wider shadow mb-5 ">
                <!--Card image-->
                <div class="view view-cascade overlay text-center"> <img class="card-img-top"
                    src="{{ asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}"> <a>
                        <div class="mask rgba-white-slight"></div>
                    </a> </div>
                <!--Card Body-->
                <div class="card-body card-body-cascade text-center">
                    <!--Card Title-->
                    <h4 class="card-title"><strong><a href="" class="text-uppercase">{{ $producto->nombre }}</a></strong></h4> <!-- Card Description-->
                    <p class="card-text">This is a Mobile phone with all the advance features and at best price. </p>
                    <p class="price">{{ $producto->precio }}</p> <!-- Card Rating-->
                    <!--Card footer-->
                    <div class="card-footer">
                        @if(Auth::check())
                        <button type="button" class="btn btn-outline-primary btn-lg" >ADD TO CART</button>
                        @else
                        <p>ADD TO CART</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach         
    </div>       
</div>

@endsection
