@extends('layouts.app')
@section('title','Trainers')


@section('content')

    @include('common.success')

    <div class="row"><!--la clase row nos posiciona a un lado los elementos-->
        <!--nos traemos el arreglo con los entrenadores y los vamos guardando en la variable trainer-->
        @foreach($trainers as $trainer)
            <div class="col-sm"><!--toma en cuenta la cantidad de cards-->
                <div class="card text-center micard">
                    <img class="card-img-top rounded-circle mx-auto d-block mi-imagen" src="images/{{$trainer->avatar}}" alt="">
                    <div class="card-body">
                        <!--imprimimos cada trainer pero solo el nombre-->
                        <h5 class="card-title">{{ $trainer->name }}</h5>
                          <p class="card-text">{{ $trainer->description }}</p>
                        <a href="/trainers/{{ $trainer->slug }}" class="btn btn-primary">Ver más...</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        
@endsection