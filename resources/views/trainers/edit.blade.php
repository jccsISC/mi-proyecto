@extends('layouts.app')
@section('title','Trainers Edit')


@section('content')
    <!--con method utilizamos el vervo para la request y con action accede a la ruta nuestra carpeta-->
    <form class="form-group" method="POST" action="/trainers/{{ $trainer->slug }}" enctype="multipart/form-data"><!--con este ultimo atributo a nuestro formulario ahora si enviará todo lo que contenga-->
        @method('PUT') <!--como no soporta acciones put o path o delete lo mandamos de forma oculta la peticion-->
        <!--directiva de blade para proteger ataques de peticiones maliciosas csrf-->
        @csrf 
     
        @include('trainers.formulario')

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
        
@endsection

