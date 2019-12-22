@extends('layouts.app')
@section('title','Trainer')


@section('content')

    <div class="text-center">
    <img class="card-img-top rounded-circle mx-auto d-block" src="/images/{{ $trainer->avatar }}" style="width:200px; height=200px; background:#efefef; margin-top:50px" alt="">
        <h5 class="card-title">{{ $trainer->name }}</h5>
        <p class="card-text">{{ $trainer->description }}</p>

        <a href="/trainers/{{ $trainer->slug }}/edit" class="btn btn-primary">Editar</a>

        
        <form class="form-group" method="POST" action="/trainers/{{ $trainer->slug }}">
            @csrf 
            @method('DELETE')

            <button type="submit" class="btn btn-danger mt-2">Eliminar</button>
        </form>
    </div>

@endsection